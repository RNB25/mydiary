<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dashboard/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('dashboard/img/favicon.png') }}" />
    <title>Tulis Cerita Hari Ini</title>

    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Nucleo Icons -->
    <link href="{{ asset('dashboard/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="{{ asset('dashboard/js/sidenav-burger.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <!-- Main Styling -->
    <link href="{{ asset('dashboard/css/soft-ui-dashboard-tailwind.css?v=1.0.5') }}" rel="stylesheet" />
    <style>
    .btn-gradient {
        background-image: linear-gradient(to right, #ec4899, #ef4444, #facc15) !important; /* from-pink-500 via-red-500 to-yellow-500 */
        color: white !important;
        border-radius: 0.5rem;
        padding: 0.625rem 1rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .btn-gradient:hover {
        transform: scale(1.02);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-gradient:focus {
        outline: none;
        box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.3); /* focus:ring-pink-200 */
    }
</style>
  </head>

  <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
    @include('dashboard.partials.aside')

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
      @include('dashboard.partials.navbar')

      <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
          <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
                <h6 class="text-lg font-bold text-slate-700">Tulis Cerita Hari Ini</h6>
              </div>

              <div class="flex-auto px-6 pt-4 pb-6">
                <form method="POST" action="{{ route('catatan.update', ['slug' => $user->slug, 'id' => $catatan->id]) }}" class="space-y-6">
                  @csrf
                  @method('PUT')

                  {{-- Mood --}}
                  <div>
                      <label for="mood" class="block text-sm font-medium text-slate-600 mb-2">Mood</label>
                      <select name="mood" id="mood" required
                          class="block w-full rounded-lg border border-gray-300 bg-white py-2 px-3 text-sm shadow-sm">
                          <option value="">-- Pilih Mood --</option>
                          <option value="senang" {{ $catatan->mood == 'senang' ? 'selected' : '' }}>😊 Senang</option>
                          <option value="sedih" {{ $catatan->mood == 'sedih' ? 'selected' : '' }}>😢 Sedih</option>
                          <option value="lelah" {{ $catatan->mood == 'lelah' ? 'selected' : '' }}>😴 Lelah</option>
                          <option value="semangat" {{ $catatan->mood == 'semangat' ? 'selected' : '' }}>🔥 Semangat</option>
                      </select>
                  </div>

                  {{-- Title --}}
                  <div>
                      <label for="title" class="block text-sm font-medium text-slate-600 mb-2">Hari ini tentang apa?</label>
                      <input type="text" name="title" id="title" value="{{ $catatan->title }}" required
                          class="block w-full rounded-lg border border-gray-300 py-2 px-3 text-sm shadow-sm" />
                  </div>

                  {{-- Content --}}
                  <div>
                      <label for="content" class="block text-sm font-medium text-slate-600 mb-2">Gimana cerita kamu?</label>
                      <textarea name="content" id="content" rows="5" required
                          class="block w-full rounded-lg border border-gray-300 py-2 px-3 text-sm shadow-sm">{{ $catatan->content }}</textarea>
                  </div>

                  {{-- Buttons --}}
                  <div class="pt-4 flex gap-4 justify-center">
                      <button type="submit" class="btn-gradient">
                          💾 Update Cerita
                      </button>
                  </div>
              </form>

              {{-- Delete Button --}}
              <form action="{{ route('catatan.destroy', ['slug' => $user->slug, 'id' => $catatan->id]) }}" method="POST" onsubmit="return confirm('Yakin mau hapus catatan ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="w-full mt-4 bg-red-500 text-white py-2 rounded-lg hover:bg-red-600">
                      🗑 Hapus Cerita
                  </button>
              </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="{{ asset('dashboard/js/plugins/chartjs.min.js') }}" async></script>
    <script src="{{ asset('dashboard/js/plugins/perfect-scrollbar.min.js') }}" async></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('dashboard/js/soft-ui-dashboard-tailwind.js?v=1.0.5') }}" async></script>
  </body>
</html>
