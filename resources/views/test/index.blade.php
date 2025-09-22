<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>MyDiary - Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}">

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex flex-col font-sans">

  @include('test.partials.header')
  <!-- Sidebar (desktop only) -->
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
      <!-- Welcome -->
      <section class="bg-white/90 backdrop-blur-lg p-8 rounded-3xl shadow-xl text-center">
        <h2 class="text-2xl font-semibold text-blue-900">Halo, {{ $user->name }} 👋</h2>
        <p class="text-blue-600 mt-2">Selamat datang di MyDiary!</p>

        <div class="mt-6 bg-gradient-to-r from-blue-100 to-blue-200 rounded-2xl p-5 shadow-inner">
          @if($subscription && $subscription->status === 'trial' && !$isExpired)
            <p class="text-blue-800 font-medium">
              Trial: {{ $daysLeft }} hari tersisa 🚀
            </p>
            <a href="{{ route('pricing') }}">
              <button class="mt-3 px-6 py-2 bg-blue-500 text-white rounded-2xl shadow-lg hover:bg-blue-600 transition">
                Upgrade Sekarang
              </button>
            </a>

          @elseif($subscription && $subscription->status === 'active' && !$isExpired)
            <p class="text-green-700 font-medium">
              ✅ Langganan aktif sampai {{ \Carbon\Carbon::parse($subscription->ends_at)->format('d F Y') }}
            </p>

          @else
            <p class="text-red-600 font-medium flex items-center justify-center gap-2">
              ❌ Trial sudah berakhir
            </p>
            <a href="{{ route('pricing') }}">
              <button class="mt-3 px-6 py-2 bg-green-500 text-white rounded-2xl shadow-lg hover:bg-green-600 transition">
                Pilih Paket Berlangganan
              </button>
            </a>
          @endif
        </div>
      </section>




      <!-- Diary Today -->
      <section class="bg-white/90 backdrop-blur-lg p-8 rounded-3xl shadow-xl">
        <h3 class="text-xl font-semibold text-blue-900 mb-5">Catatan Hari Ini</h3>

        <div class="space-y-4">
          @foreach($days as $day)
            <div class="p-5 bg-gradient-to-r from-blue-50 to-blue-100 rounded-2xl shadow-md flex justify-between items-center">
              <div>
                <p class="font-semibold text-blue-800">Day {{ $day->day_number }}</p>
                <p class="text-blue-600 text-sm">"{{ $day->theme }}"</p>
              </div>

              @if($day->is_locked)
                <!-- Tombol terkunci -->
                <button
                  type="button"
                  onclick="showLockedAlert()"
                  aria-label="Terkunci"
                  class="w-10 h-10 flex items-center justify-center rounded-full bg-white border border-blue-200 text-blue-600 shadow hover:bg-blue-100 active:scale-95 transition"
                >
                  <!-- Icon Lock -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6 10V7a6 6 0 1112 0v3M8 10h8a2 2 0 012 2v7a2 2 0 01-2 2H8a2 2 0 01-2-2v-7a2 2 0 012-2z"/>
                    <circle cx="12" cy="16" r="1.5" />
                  </svg>
                </button>
              @else
                <!-- Bisa dibuka -->
                <a href="{{ route('list', ['slug' => $user->slug, 'day_number' => $day->day_number]) }}">
                  <button class="text-blue-600 font-medium hover:underline">Buka</button>
                </a>
              @endif
            </div>
          @endforeach



          {{-- <!-- Day 2: tombol gembok + SweetAlert2 -->
          <div class="p-5 bg-gradient-to-r from-blue-50 to-blue-100 rounded-2xl shadow-md flex justify-between items-center">
            <div>
              <p class="font-semibold text-blue-800">Day 2</p>
              <p class="text-blue-600 text-sm">"Energi & Batas Diri"</p>
            </div>
            <button
              type="button"
              onclick="showLockedAlert()"
              aria-label="Terkunci"
              class="w-10 h-10 flex items-center justify-center rounded-full bg-white border border-blue-200 text-blue-600 shadow hover:bg-blue-100 active:scale-95 transition"
            >
              <!-- Icon Lock -->
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                   viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M6 10V7a6 6 0 1112 0v3M8 10h8a2 2 0 012 2v7a2 2 0 01-2 2H8a2 2 0 01-2-2v-7a2 2 0 012-2z"/>
                <circle cx="12" cy="16" r="1.5" />
              </svg>
            </button>
          </div> --}}
        </div>
      </section>

    </main>
  </div>

  <!-- Bottom Navigation (mobile only) -->
  <nav class="fixed bottom-0 left-0 right-0 bg-white/80 backdrop-blur-md border-t border-blue-200 flex justify-around items-center py-2 md:hidden shadow-lg">
    <a href="#" class="flex flex-col items-center text-blue-700 text-sm">
      🏠
      <span>Home</span>
    </a>
    <a href="#" class="relative -top-4 bg-blue-500 text-white rounded-full w-14 h-14 flex items-center justify-center text-3xl shadow-xl hover:bg-blue-600 transition">
      +
    </a>
    <a href="#" class="flex flex-col items-center text-blue-700 text-sm">
      🔮
      <span>Refleksi</span>
    </a>
  </nav>

  <!-- Drawer (mobile sidebar) -->
  <div id="drawer" class="fixed inset-y-0 left-0 w-64 bg-white/90 backdrop-blur-md shadow-xl p-6 transform -translate-x-full transition-transform duration-300 md:hidden z-50">
    <button id="closeDrawer" class="mb-6 text-lg font-semibold text-blue-700">✖ Tutup</button>
    <a href="#" class="block mb-3 px-4 py-3 rounded-xl bg-blue-500 text-white font-medium shadow">🏠 Home</a>
    {{-- <a href="#" class="block mb-3 px-4 py-3 rounded-xl hover:bg-blue-100 text-blue-700">➕ Tambah Catatan</a> --}}
    <a href="#" class="block mb-3 px-4 py-3 rounded-xl hover:bg-blue-100 text-blue-700">🔮 Refleksi Diri</a>
  </div>

  <script>
    // Drawer mobile
    const burger = document.getElementById('burger');
    const drawer = document.getElementById('drawer');
    const closeDrawer = document.getElementById('closeDrawer');

    if (burger) {
      burger.addEventListener('click', () => {
        drawer.classList.remove('-translate-x-full');
      });
    }
    if (closeDrawer) {
      closeDrawer.addEventListener('click', () => {
        drawer.classList.add('-translate-x-full');
      });
    }

    // SweetAlert2 untuk tombol terkunci
    function showLockedAlert() {
      Swal.fire({
        title: 'Terkunci',
        text: 'Isi yang sebelumnya dulu ya ✨',
        icon: 'info',
        confirmButtonText: 'Mengerti',
        confirmButtonColor: '#3b82f6',
        background: '#ffffff',
        color: '#0f172a',
        showClass: { popup: 'swal2-show' },
        hideClass: { popup: 'swal2-hide' },
        backdrop: 'rgba(2,6,23,0.35)'
      });
    }
    window.showLockedAlert = showLockedAlert; // make global for inline onclick
  </script>

</body>
</html>
