<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" /> --}}
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dashboard/img/apple-icon.png') }}" />


    <link rel="icon" type="image/png" href="{{ asset('dashboard/img/favicon.png') }}" />
    <title>Dashboard MyDiary</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

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
                          <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tema</th>
                          <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Rentang</th>
                          <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Mood Terbanyak</th>
                          <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Catatan</th>
                          <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 pl-4 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-xs leading-tight">Hari ini dimulai</h6>
                              </div>
                            </div>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight">Hari 1 - 3</p>
                          </td>
                          <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight">Senang</p>
                          </td>
                          <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <span class="text-xs font-semibold leading-tight text-slate-400">{{ $entries->count()}}</span>
                            <p class="mb-0 text-xs leading-tight text-slate-400">Catatan</p>
                          </td>
                          <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <a href="{{ route('detail.catatan.day', ['user' => $user->slug, 'day' => '10-jan-2025']) }}" class="px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white bg-gradient-to-tl from-green-600 to-lime-400"> Buka catatan </a>
                          </td>
                        </tr>
                        <tr>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 pl-4 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-xs leading-tight">11 Januari 2025</h6>
                              </div>
                            </div>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight">Selasa</p>
                          </td>
                          <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight">Senang</p>
                          </td>
                          <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <span class="text-xs font-semibold leading-tight text-slate-400">2</span>
                            <p class="mb-0 text-xs leading-tight text-slate-400">Catatan</p>
                          </td>
                          <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <a href="javascript:;" class="px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white bg-gradient-to-tl from-green-600 to-lime-400"> Buka catatan </a>
                          </td>
                        </tr>
                        <tr>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 pl-4 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-xs leading-tight">12 Januari 2025</h6>
                              </div>
                            </div>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight">Rabu</p>
                          </td>
                          <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight">Senang</p>
                          </td>
                          <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <span class="text-xs font-semibold leading-tight text-slate-400">1</span>
                            <p class="mb-0 text-xs leading-tight text-slate-400">Catatan</p>
                          </td>
                          <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <a href="javascript:;" class="px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white bg-gradient-to-tl from-green-600 to-lime-400"> Buka catatan </a>
                          </td>
                        </tr>
                        <tr>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 pl-4 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-xs leading-tight">13 Januari 2025</h6>
                              </div>
                            </div>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight">Kamis</p>
                          </td>
                          <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight">Senang</p>
                          </td>
                          <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <span class="text-xs font-semibold leading-tight text-slate-400">2</span>
                            <p class="mb-0 text-xs leading-tight text-slate-400">Catatan</p>
                          </td>
                          <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <a href="javascript:;" class="px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white bg-gradient-to-tl from-green-600 to-lime-400"> Buka catatan </a>
                          </td>
                        </tr>
                        <tr>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 pl-4 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-xs leading-tight">14 Januari 2025</h6>
                              </div>
                            </div>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight">Jum'at</p>
                          </td>
                          <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight">Senang</p>
                          </td>
                          <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <span class="text-xs font-semibold leading-tight text-slate-400">5</span>
                            <p class="mb-0 text-xs leading-tight text-slate-400">Catatan</p>
                          </td>
                          <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <a href="javascript:;" class="px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white bg-gradient-to-tl from-green-600 to-lime-400"> Buka catatan </a>
                          </td>
                        </tr>
                        <tr>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 pl-4 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-xs leading-tight">15 Januari 2025</h6>
                              </div>
                            </div>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight">Sabtu</p>
                          </td>
                          <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight">Senang</p>
                          </td>
                          <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <span class="text-xs font-semibold leading-tight text-slate-400">1</span>
                            <p class="mb-0 text-xs leading-tight text-slate-400">Catatan</p>
                          </td>
                          <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <a href="javascript:;" class="px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white bg-gradient-to-tl from-green-600 to-lime-400"> Buka catatan </a>
                          </td>
                        </tr>
                        <tr>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 pl-4 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-xs leading-tight">16 Januari 2025</h6>
                              </div>
                            </div>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight">Minggu</p>
                          </td>
                          <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 text-xs font-semibold leading-tight">Senang</p>
                          </td>
                          <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <span class="text-xs font-semibold leading-tight text-slate-400">2</span>
                            <p class="mb-0 text-xs leading-tight text-slate-400">Catatan</p>
                          </td>
                          <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <a href="javascript:;" class="px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white bg-gradient-to-tl from-green-600 to-lime-400"> Buka catatan </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </main>
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
