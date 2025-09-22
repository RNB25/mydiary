<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>MyDiary - Refleksi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex flex-col font-sans">

  <!-- Header (desktop) -->
  <header class="hidden md:flex justify-between items-center px-8 py-5 bg-white/70 backdrop-blur-md shadow-lg">
    <img src="{{ asset('logo/logo.png') }}" alt="Logo" class="w-16 h-auto">
    <div class="flex items-center gap-6">
      <p class="font-semibold text-blue-900">{{ $user->name }}</p>
      <img src="https://i.pravatar.cc/60" alt="User" class="w-12 h-12 rounded-full border-2 border-blue-300 shadow-md">
    </div>
  </header>

  <!-- Header (mobile) -->
  <header class="md:hidden flex justify-between items-center px-4 py-4 bg-white/70 backdrop-blur-md shadow-lg">
    <!-- Burger button -->
    <button id="burger" class="text-2xl">☰</button>
    <img src="{{ asset('logo/logo.png') }}" alt="Logo" class="w-12 h-12">
  </header>

  <!-- Sidebar (desktop) -->
    <aside class="hidden md:flex flex-col fixed left-6 top-1/2 -translate-y-1/2 bg-white/70 backdrop-blur-lg p-4 space-y-4 shadow-xl rounded-2xl z-50">
        <!-- Active -->
        <a href="{{ route('dashboard2', $user) }}" class="flex items-center gap-3 px-5 py-4 bg-blue-500 text-white font-medium rounded-2xl shadow-md hover:bg-blue-600 transition">
        🏠 <span>Home</span>
        </a>
        <a href="{{ route('refleksi.index', ['slug' => $user->slug]) }}" class="flex items-center gap-3 px-5 py-4 bg-white text-blue-700 font-medium rounded-2xl shadow hover:shadow-md hover:bg-blue-100 transition">
        🔮 <span>Refleksi Diri</span>
        </a>
    </aside>
  <div class="flex flex-1 md:pl-56">
    <!-- Main content -->
    <main class="flex-1 p-6 md:p-10 space-y-8 pb-24">
      <section class="bg-white/90 backdrop-blur-lg p-8 rounded-3xl shadow-xl">
        <h3 class="text-xl font-semibold text-blue-900 mb-5">Refleksi Diri</h3>

        <div class="space-y-4">
          <!-- Hari ke-3 -->
          <div class="p-5 bg-gradient-to-r from-blue-50 to-blue-100 rounded-2xl shadow-md flex justify-between items-center">
            <div>
              <p class="font-semibold text-blue-800">Hari ke-3</p>
              <p class="text-blue-600 text-sm">“Mood Mirror”</p>
            </div>
            @if($answeredDays < 3 && $answeredDays < 14)
              <button onclick="showLockedAlert()" class="w-10 h-10 flex items-center justify-center rounded-full bg-white border border-blue-200 text-blue-600 shadow">
                🔒
              </button>
            @else
              <a href="{{ url($user->slug.'/refleksi/3') }}" class="text-blue-600 font-medium hover:underline">Buka</a>
            @endif
          </div>

          <!-- Hari ke-5 -->
          <div class="p-5 bg-gradient-to-r from-blue-50 to-blue-100 rounded-2xl shadow-md flex justify-between items-center">
            <div>
              <p class="font-semibold text-blue-800">Hari ke-5</p>
              <p class="text-blue-600 text-sm">“Suara dari Dirimu”</p>
            </div>
            @if($answeredDays < 5 && $answeredDays < 14)
              <button onclick="showLockedAlert()" class="w-10 h-10 flex items-center justify-center rounded-full bg-white border border-blue-200 text-blue-600 shadow">
                🔒
              </button>
            @else
              <a href="{{ url($user->slug.'/refleksi/5') }}" class="text-blue-600 font-medium hover:underline">Buka</a>
            @endif
          </div>

          <!-- Tambahin hari 7, 10, 12, 14 dengan format yang sama -->
        </div>
      </section>
    </main>
  </div>

  <!-- Bottom Navigation (mobile) -->
  <nav class="fixed bottom-0 left-0 right-0 bg-white/80 backdrop-blur-md border-t border-blue-200 flex justify-around items-center py-2 md:hidden shadow-lg">
    <a href="{{ route('dashboard2', ['user' => $user]) }}" class="flex flex-col items-center text-blue-700 text-sm">
      🏠
      <span>Home</span>
    </a>
    <a href="{{ route('refleksi.index', $user->slug) }}" class="flex flex-col items-center text-blue-700 text-sm">
      🔮
      <span>Refleksi</span>
    </a>
  </nav>

  <!-- Drawer (mobile sidebar) -->
  <div id="drawer" class="fixed inset-y-0 left-0 w-64 bg-white/90 backdrop-blur-md shadow-xl p-6 transform -translate-x-full transition-transform duration-300 md:hidden z-50">
    <button id="closeDrawer" class="mb-6 text-lg font-semibold text-blue-700">✖ Tutup</button>
    <a href="{{ route('dashboard2', ['user' => $user]) }}" class="block mb-3 px-4 py-3 rounded-xl bg-white text-blue-700 font-medium hover:bg-blue-100">🏠 Home</a>
    <a href="{{ route('refleksi.index', $user->slug) }}" class="block mb-3 px-4 py-3 rounded-xl bg-blue-500 text-white font-medium shadow">🔮 Refleksi Diri</a>
  </div>

  <script>
  // Drawer mobile
  const burger = document.getElementById('burger');
  const drawer = document.getElementById('drawer');
  const closeDrawer = document.getElementById('closeDrawer');

  if (burger) burger.addEventListener('click', () => drawer.classList.remove('-translate-x-full'));
  if (closeDrawer) closeDrawer.addEventListener('click', () => drawer.classList.add('-translate-x-full'));

  // SweetAlert2 untuk tombol terkunci
  function showLockedAlert() {
    Swal.fire({
      title: 'Terkunci',
      text: 'Isi dulu catatan sebelumnya ✨',
      icon: 'info',
      confirmButtonText: 'Oke',
      confirmButtonColor: '#3b82f6',
    });
  }
  window.showLockedAlert = showLockedAlert;
  </script>

</body>
</html>
