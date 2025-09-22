<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyDiary - Tambah Catatan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex flex-col font-sans">

  <main class="flex-1 p-6 md:p-10 flex items-center justify-center">
    <section class="bg-white/90 backdrop-blur-lg p-8 rounded-3xl shadow-xl w-full max-w-2xl">
      <h2 class="text-2xl font-semibold text-blue-900 mb-6 text-center">Tambah Catatan</h2>

      <!-- Form -->
      <form 
        action="{{ isset($answer) 
            ? route('answer.update', ['slug' => $user->slug, 'day_number' => $day->day_number, 'ans_id' => $answer->id]) 
            : route('answers.store', ['slug' => $user->slug, 'day_number' => $day->day_number, 'mood_id' => $mood_id]) }}" 
        method="POST">
        
        @csrf
        @if(isset($answer))
          @method('PUT')
        @endif

        @for($i = 1; $i <= $totalQuestions; $i++)
          <div id="step-{{ $i }}" class="{{ $i > 1 ? 'hidden' : '' }}">
            <label class="block font-medium mb-2">
              {{ $question->{'question_'.$i} }}
            </label>
            <textarea 
              name="answer_{{ $i }}" 
              rows="5" 
              class="w-full p-3 border rounded-xl"
              placeholder="Ceritakan di sini...">{{ old('answer_'.$i, $answer->{'answer_'.$i} ?? '') }}</textarea>
          </div>
        @endfor

        <div class="flex justify-between mt-6">
          <button type="button" id="cancelBtn" class="px-4 py-2 bg-red-400 text-white rounded">Cancel</button>
          <div class="flex gap-2">
            <button type="button" id="prevBtn" class="hidden px-4 py-2 bg-gray-200 rounded">Back</button>
            <button type="button" id="nextBtn" class="px-4 py-2 bg-blue-400 text-white rounded">Next</button>
            <button type="submit" id="submitBtn" class="hidden px-4 py-2 bg-green-500 text-white rounded">
              {{ isset($answer) ? 'Update' : 'Submit' }}
            </button>
          </div>
        </div>
      </form>

    </section>
  </main>

  <script>
    let currentStep = 1;
    const totalSteps = 3; // fixed 3 pertanyaan

    const showStep = (step) => {
      for (let i = 1; i <= totalSteps; i++) {
        document.getElementById("step-" + i).classList.add("hidden");
      }
      document.getElementById("step-" + step).classList.remove("hidden");

      // toggle tombol
      document.getElementById("prevBtn").classList.toggle("hidden", step === 1);
      document.getElementById("nextBtn").classList.toggle("hidden", step === totalSteps);
      document.getElementById("submitBtn").classList.toggle("hidden", step !== totalSteps);
    };

    document.getElementById("nextBtn").addEventListener("click", () => {
      if (currentStep < totalSteps) {
        currentStep++;
        showStep(currentStep);
      }
    });

    document.getElementById("prevBtn").addEventListener("click", () => {
      if (currentStep > 1) {
        currentStep--;
        showStep(currentStep);
      }
    });

    // Cancel button pakai SweetAlert2
    document.getElementById("cancelBtn").addEventListener("click", () => {
      Swal.fire({
        title: 'Batalkan catatan?',
        text: "Semua jawaban yang sudah ditulis akan hilang!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, batalkan',
        cancelButtonText: 'Kembali'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "{{ route('list', ['slug' => $user->slug, 'day_number' => $day->day_number]) }}";
        }
      })
    });

    // // Tangkap data form di console.log
    // document.getElementById("multiStepForm").addEventListener("submit", function(e) {
    //   e.preventDefault(); // stop submit ke server

    //   const formData = new FormData(this);
    //   const answers = {};

    //   formData.forEach((value, key) => {
    //     answers[key] = value;
    //   });

    //   // console.log("Jawaban user:", answers);

    //   Swal.fire({
    //     icon: 'success',
    //     title: 'Berhasil!',
    //     text: 'Jawaban berhasil ditangkap, cek console.log 🚀'
    //   });
    // });

    // awal load
    showStep(currentStep);
  </script>

</body>
</html>
s