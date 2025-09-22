<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Refleksi Mood</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-blue-50 min-h-screen flex flex-col font-sans">

  <main class="flex-1 p-6 md:p-10 space-y-8">

    <section class="bg-white p-6 rounded-2xl shadow-xl text-center">
      <h2 class="text-xl font-bold text-blue-900">✨ 3 hari udah kamu lewatin ✨</h2>
      <p class="text-blue-600">Yuk, intip bagaimana mood kamu berubah?</p>
    </section>
    
    <!-- Refleksi -->
    <section class="bg-blue-100 p-4 rounded-xl text-center shadow">
      <p class="text-blue-900 font-medium">{{ $reflection }}</p>
    </section>

    <!-- Chart -->
    <section class="bg-white p-6 rounded-2xl shadow-xl">
      <canvas id="moodChart" class="h-56"></canvas>
    </section>


  </main>

  <script>
    const ctx = document.getElementById('moodChart').getContext('2d');
    const moodByDay = @json($moodByDay);

    // Extract labels (Day 1, Day 2, Day 3)
    const labels = Object.keys(moodByDay);

    // Ambil semua mood unik
    let allMoods = [];
    Object.values(moodByDay).forEach(day => {
      allMoods = [...new Set([...allMoods, ...Object.keys(day)])];
    });

    // Buat dataset per mood
    const datasets = allMoods.map(mood => {
      return {
        label: mood,
        data: labels.map(day => moodByDay[day][mood] ?? 0),
        borderWidth: 2,
        fill: true
      }
    });

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels.map(d => 'Hari ' + d),
        datasets: datasets
      },
      options: {
        responsive: true,
        maintainAspectRatio: false, // biar ikut tinggi div
        plugins: {
          legend: { position: 'bottom' }
        }
      }
    });
  </script>

</body>
</html>
