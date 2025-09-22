<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Day</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex flex-col font-sans">

  <!-- Header -->
  <header class="flex justify-between items-center px-6 py-4 bg-white/70 backdrop-blur-md shadow-md">
    <!-- Tombol Back (pakai url()->previous() agar kembali ke halaman sebelumnya) -->
    <a href="{{ url()->previous() }}"
       class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-blue-700 border border-blue-200 hover:bg-blue-50 hover:border-blue-300 transition"
       aria-label="Kembali">
      <!-- Icon chevron-left -->
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
      </svg>
      <span class="hidden sm:inline">Kembali</span>
    </a>

    <h1 class="text-lg font-bold text-blue-700">📔 MyDiary</h1>

    <!-- Notification (placeholder) -->
    <button class="inline-flex items-center justify-center w-10 h-10 rounded-full text-blue-700 hover:bg-blue-50 border border-blue-200 transition"
            aria-label="Notifikasi">
      <span class="text-xl">🔔</span>
    </button>
  </header>

  @include('test.partials.aside')

  <!-- Konten -->
  <main class="flex-1 p-6 md:p-10 space-y-6 pb-24 md:pl-64">

    <!-- Tema Day -->
    <section class="bg-white/90 p-6 rounded-2xl shadow-xl">
      <h2 class="text-xl font-semibold text-blue-900">Day {{ $day->day_number }}</h2>
      <p class="text-blue-600 mt-2">Tema: <span class="font-medium">"{{ $day->theme }}"</span></p>
    </section>

    <!-- Catatan & Pertanyaan -->
    <section class="bg-white/90 p-6 rounded-2xl shadow-xl">
      <h3 class="text-lg font-semibold text-blue-900 mb-4">Catatan Kamu</h3>

      @if($answers->count())
        @foreach($answers as $ans)
          @php
            $q = $questions[$ans->question_id] ?? null;
          @endphp

          @if($q)
            <ul class="space-y-4 mb-6 p-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl shadow">
              <li>
                <p class="text-black font-medium">{{ $q->question_1 }}</p>
                <p class="text-blue-800">{{ $ans->answer_1 ?? 'Belum ada jawaban' }}</p>
              </li>
              <li>
                <p class="text-black font-medium">{{ $q->question_2 }}</p>
                <p class="text-blue-800">{{ $ans->answer_2 ?? 'Belum ada jawaban' }}</p>
              </li>
              <li>
                <p class="text-black font-medium">{{ $q->question_3 }}</p>
                <p class="text-blue-800">{{ $ans->answer_3 ?? 'Belum ada jawaban' }}</p>
              </li>

              <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-3 gap-2">
                <div class="flex flex-col">
                  <span class="text-sm text-blue-500">
                    Dibuat: {{ $ans->created_at->format('d F Y H:i') }}
                  </span>

                  @if($ans->updated_at && $ans->updated_at != $ans->created_at)
                    <span class="text-sm text-green-600">
                      Diedit: {{ $ans->updated_at->format('d F Y H:i') }}
                    </span>
                  @endif
                </div>

                <!-- Tombol Edit yang diperbarui -->
                <a href="{{ route('answer.edit', ['slug' => $user->slug, 'day_number' => $day->day_number, 'ans_id' => $ans->id]) }}"
                   class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold shadow transition"
                   aria-label="Edit jawaban">
                  <!-- Icon pencil -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 4H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-5"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                  </svg>
                  <span>Ubah Jawaban</span>
                </a>
              </div>
            </ul>
          @endif
        @endforeach
      @else
        <p class="text-blue-600">Belum ada jawaban.</p>
      @endif
    </section>

  </main>

  <!-- Bottom Navigation -->
  <nav class="fixed bottom-0 left-0 right-0 bg-white/80 backdrop-blur-md border-t border-blue-200 flex justify-around items-center py-2 md:hidden shadow-lg">
    <a href="{{ route('dashboard2', ['user' => $user]) }}" class="flex flex-col items-center text-blue-700 text-sm" aria-label="Beranda">
      <!-- Home icon -->
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10l9-7 9 7v10a2 2 0 01-2 2h-4a2 2 0 01-2-2V12H9v8a2 2 0 01-2 2H5a2 2 0 01-2-2V10z"/>
      </svg>
      <span>Home</span>
    </a>

    <!-- Tombol Tulis (floating) -->
    <a href="{{ route('moodSelect', ['slug' => $user->slug, 'day_number' => $day->day_number]) }}"
       class="relative -top-4 bg-blue-600 hover:bg-blue-700 text-white rounded-full w-14 h-14 flex items-center justify-center text-3xl shadow-xl transition"
       aria-label="Tulis catatan">
      <!-- Icon pencil inside circle -->
      <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor">
        <circle cx="12" cy="12" r="10" stroke-width="2"></circle>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15 6l3 3M7 17l4-1 7-7-3-3-7 7-1 4z"/>
      </svg>
    </a>

    <a href="#" class="flex flex-col items-center text-blue-700 text-sm" aria-label="Refleksi">
      <!-- Icon sparkles -->
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5 3l2 5 5 2-5 2-2 5-2-5-5-2 5-2 2-5zM20 11l1 3 3 1-3 1-1 3-1-3-3-1 3-1 1-3z"/>
      </svg>
      <span>Refleksi</span>
    </a>
  </nav>

</body>
</html>
