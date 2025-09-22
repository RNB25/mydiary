<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Mood - MyDiary</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex flex-col font-sans">

  <!-- Header -->
  <header class="hidden md:flex justify-between items-center px-8 py-5 bg-white/70 backdrop-blur-md shadow-lg">
    <h1 class="text-2xl font-bold text-blue-700 tracking-tight">📔 MyDiary</h1>
    <div class="flex items-center gap-6">
      <img src="https://i.pravatar.cc/60" alt="User" class="w-12 h-12 rounded-full border-2 border-blue-300 shadow-md">
    </div>
  </header>

  <main class="flex-1 flex items-center justify-center p-6">
    <section class="bg-white/90 backdrop-blur-lg p-8 rounded-3xl shadow-xl w-full max-w-2xl text-center">
      <h2 class="text-2xl font-semibold text-blue-900">Hari 1 - Hari Ini Dimulai</h2>
      <p class="text-blue-600 mt-2">Pilih mood kamu hari ini ✨</p>

      <!-- Pilih Mood -->
      <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Cerah -->
        <a href="{{ route('test.showForm', ['slug' => $user->slug, 'day_number' => $day->day_number, 'mood_id' => 1]) }}" 
           class="bg-gradient-to-br from-yellow-100 to-yellow-200 hover:from-yellow-200 hover:to-yellow-300 
                  rounded-2xl shadow-md p-6 flex flex-col items-center justify-center transition">
          <span class="text-4xl mb-2">🌞</span>
          <span class="font-medium text-yellow-800">Cerah</span>
        </a>

        <!-- Mendung -->
        <a href="{{ route('test.showForm', ['slug' => $user->slug, 'day_number' => $day->day_number, 'mood_id' => 2]) }}" 
           class="bg-gradient-to-br from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 
                  rounded-2xl shadow-md p-6 flex flex-col items-center justify-center transition">
          <span class="text-4xl mb-2">☁️</span>
          <span class="font-medium text-gray-700">Mendung</span>
        </a>

        <!-- Badai -->
        <a href="{{ route('test.showForm', ['slug' => $user->slug, 'day_number' => $day->day_number, 'mood_id' => 3]) }}" 
           class="bg-gradient-to-br from-blue-200 to-blue-300 hover:from-blue-300 hover:to-blue-400 
                  rounded-2xl shadow-md p-6 flex flex-col items-center justify-center transition">
          <span class="text-4xl mb-2">⛈️</span>
          <span class="font-medium text-blue-800">Badai</span>
        </a>
      </div>
    </section>
  </main>

</body>
</html>
