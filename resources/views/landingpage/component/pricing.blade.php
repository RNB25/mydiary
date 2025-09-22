<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pricing - MyDiary</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}">
</head>
<body class="bg-gradient-to-br from-pink-50 to-blue-50 min-h-screen flex flex-col font-sans">

  <!-- Header -->
  <header class="flex justify-between items-center px-6 py-4 bg-white/70 backdrop-blur-md shadow-md">
    <h1 class="text-lg font-bold text-blue-700">📔 MyDiary</h1>
    <a href="{{ url('dashboard2') }}" 
       class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
      Dashboard
    </a>
  </header>

  <!-- Main Content -->
  <main class="flex-1 flex flex-col items-center justify-center p-6">
    <h2 class="text-3xl font-extrabold text-blue-800 mb-2">Pilih Paketmu ✨</h2>
    <p class="text-blue-600 mb-8 text-center max-w-md">
      Catat cerita harianmu dengan lebih leluasa. Pilih paket yang sesuai dengan kebutuhanmu.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full max-w-4xl">

      <!-- Trial -->
      <div class="bg-white/80 p-8 rounded-2xl shadow-lg hover:scale-105 transition transform">
        <h3 class="text-xl font-semibold text-pink-600 mb-4">🌸 Trial</h3>
        <p class="text-4xl font-bold text-blue-700 mb-4">Gratis</p>
        <p class="text-sm text-blue-500 mb-6">Coba semua fitur selama <span class="font-bold">17 hari</span>.</p>
        <ul class="space-y-3 text-blue-700 mb-6">
          <li>✅ Akses menulis harian</li>
          <li>✅ Mood tracker</li>
          <li>✅ Pertanyaan refleksi</li>
          <li>❌ Fitur premium</li>
        </ul>
        {{-- Jika belum sudah login --}}
        @auth
          <a href="{{ route('dashboard2', ['user' => auth()->user()->slug]) }}" 
            class="block text-center px-6 py-3 rounded-xl bg-pink-500 text-white font-medium shadow hover:bg-pink-600 transition">
            Mulai Sekarang
          </a>
        @endauth

        @guest
          <a href="{{ route('login') }}" 
            class="block text-center px-6 py-3 rounded-xl bg-pink-500 text-white font-medium shadow hover:bg-pink-600 transition">
            Mulai Sekarang
          </a>
        @endguest
      </div>

      <!-- Premium -->
      <div class="bg-white/80 p-8 rounded-2xl shadow-lg border-2 border-blue-400 hover:scale-105 transition transform">
        <h3 class="text-xl font-semibold text-blue-600 mb-4">💎 Premium</h3>
        <p class="text-4xl font-bold text-blue-700 mb-4">Rp 20.000</p>
        <p class="text-sm text-blue-500 mb-6">Nikmati semua fitur premium selama <span class="font-bold">28 hari</span>.</p>
        <ul class="space-y-3 text-blue-700 mb-6">
          <li>✅ Semua fitur Trial</li>
          <li>✅ Tanpa batas catatan</li>
          <li>✅ Analisis mood bulanan</li>
          <li>✅ Tema eksklusif pastel</li>
        </ul>
       <form action="{{ route('payment.create') }}" method="POST">
            @csrf
            <input type="hidden" name="amount" value="30000">
            <button type="submit"
                    class="block w-full text-center px-6 py-3 rounded-xl bg-blue-500 text-white font-medium shadow hover:bg-blue-600 transition">
                Langganan Sekarang
            </button>
        </form>
      </div>

    </div>
  </main>

  <!-- Footer -->
  <footer class="text-center py-6 text-blue-500 text-sm">
    © {{ date('Y') }} MyDiary. Semua hak dilindungi.
  </footer>

</body>
</html>
