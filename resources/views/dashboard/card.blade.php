<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" /> --}}
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dashboard/img/apple-icon.png') }}" />


    <link rel="icon" type="image/png" href="{{ asset('dashboard/img/favicon.png') }}" />
    <title>Soft UI Dashboard Tailwind</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('dashboard/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="{{ asset('dashboard/js/sidenav-burger.js') }}" ></script>
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{ asset('dashboard/css/soft-ui-dashboard-tailwind.css?v=1.0.5') }}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  </head>

  <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
    <!-- sidenav  -->
    @include('dashboard.partials.aside')

    <!-- end sidenav -->

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
      <!-- Navbar -->
      
      @include('dashboard.partials.navbar')

      <!-- end Navbar -->

      <!-- cards -->
      
      <!-- end cards -->
      
      {{-- tables --}}
      <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
              <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                  <h6>Catatan kamu bulan mei ini</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                  <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                      <thead class="align-bottom">
                        <tr>
                          {{-- <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal</th> --}}
                          <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs tracking-none whitespace-nowrap text-slate-400 opacity-70">Tetang apa?</th>
                          <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs tracking-none text-slate-400 opacity-70">Catatan</th>
                          <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($entries as $entry)
                          <tr>
                              {{-- <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                  <div class="flex px-2 pl-4 py-1">
                                      <div class="flex flex-col justify-center">
                                          <h6 class="mb-0 text-xs leading-tight">
                                              {{ \Carbon\Carbon::parse($entry->entry_date)->translatedFormat('d F Y') }}
                                          </h6>
                                      </div>
                                  </div>
                              </td>
                              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                  <p class="mb-0 text-xs font-semibold leading-tight">
                                      {{ \Carbon\Carbon::parse($entry->entry_date)->translatedFormat('l') }}
                                  </p>
                              </td> --}}
                              <td class="p-2 align-middle text-left bg-transparent border-b shadow-transparent" style="max-width: 250px;">
                                <p class="mb-0 text-xs font-semibold leading-tight overflow-hidden text-ellipsis" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                                  {{ $entry->title }}
                                </p>
                              </td>
                              <td class="p-2 align-middle text-left bg-transparent border-b shadow-transparent" style="max-width: 250px;">
                                  <p class="mb-0 text-xs font-semibold leading-tight overflow-hidden text-ellipsis"
                                    style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                                      {{ $entry->content }}
                                  </p>
                              </td>
                              <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                  <a href="{{ route('catatan.edit', ['slug' => $user->slug, 'id' => $entry->id]) }}"
                                    class="px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white bg-gradient-to-tl from-green-600 to-lime-400">
                                    Buka catatan
                                  </a>
                              </td>
                          </tr>
                          @endforeach
                          </tbody>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </main>
    <div>
      <a href="{{route('catatan.create', ['user' => $user->slug])}}" class="bottom-7.5 right-7.5 text-xl z-990 shadow-soft-lg rounded-circle fixed cursor-pointer bg-white px-4 py-2 text-slate-700">
        <i class="py-2 pointer-events-none fa fa-cog">+</i>
      </a>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
  </body>
  <!-- plugin for charts  -->
  {{-- <script src="./assets/js/plugins/chartjs.min.js" async></script> --}}
  <script src="{{ asset('dashboard/js/plugins/chartjs.min.js') }}" async></script>
  <!-- plugin for scrollbar  -->
  {{-- <script src="./assets/js/plugins/perfect-scrollbar.min.js" async></script> --}}
  <script src="{{ asset('dashboard/js/plugins/perfect-scrollbar.min.js') }}" async></script>

  <!-- github button -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- main script file  -->
  {{-- <script src="./assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5" async></script> --}}
  <script src="{{ asset('dashboard/js/soft-ui-dashboard-tailwind.js?v=1.0.5') }}" async></script>

</html>
