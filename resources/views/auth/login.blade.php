<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Webpage Title -->
        <title>MyDiary - Login</title>

        <!-- Styles -->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet" />
        <link href="landingpage/css/fontawesome-all.css" rel="stylesheet" />
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
        <link href="landingpage/css/styles.css" rel="stylesheet" />

        <!-- Favicon  -->
        <link rel="icon" href="logo/logo.png" />
    </head>
    <body class="font-inter overflow-hidden">
        <section class="flex justify-center relative">
            <!-- Background -->
            <img src="img/background_login.png" alt="gradient background image" class="w-full h-full object-cover fixed">

            <div class="mx-auto max-w-lg px-6 lg:px-8 absolute py-20">
                <div class="rounded-2xl bg-white shadow-xl relative">

                    <!-- Tombol Back -->
                    <div class="absolute top-4 left-4">
                        <a href="/" class="flex items-center text-gray-600 hover:text-indigo-600 transition">
                            <!-- Icon Panah -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Back
                        </a>
                    </div>

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <p>{{ $errors->first() }}</p>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST" class="lg:p-11 p-7 mx-auto">
                        @csrf

                        <div class="mb-11">
                            <h1 class="text-gray-900 text-center font-manrope text-3xl font-bold leading-10 mb-2">Welcome Back</h1>
                            <p class="text-gray-500 text-center text-base font-medium leading-6">Let’s get started with your 30 days free trial</p>
                        </div>

                        <!-- EMAIL -->
                        <input
                            type="email"
                            name="email"
                            class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-6"
                            placeholder="Email"
                            required
                        >

                        <!-- PASSWORD -->
                        <input
                            type="password"
                            name="password"
                            class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-1"
                            placeholder="Password"
                            required
                        >

                        <a href="#" class="flex justify-end mb-2">
                            <span class="text-indigo-600 text-right text-base font-normal leading-6">Forgot Password?</span>
                        </a>

                        <!-- LOGIN BUTTON -->
                        <button
                            type="submit"
                            class="w-full h-12 text-white text-center text-base font-semibold leading-6 rounded-full hover:bg-indigo-800 transition-all duration-700 bg-indigo-600 shadow-sm mb-2">
                            Login
                        </button>

                        <!-- OR separator -->
                        <div class="flex items-center justify-center mb-2">
                            <span class="text-gray-400 text-sm">or</span>
                        </div>

                        <!-- Google Login Button -->
                        <a href="/auth/google"
                            class="w-full flex items-center justify-center h-12 text-gray-700 text-base font-medium rounded-full border border-gray-300 hover:bg-gray-100 transition-all duration-300 mb-6 bg-white shadow-sm">
                            <svg class="w-5 h-5 mr-2" viewBox="0 0 533.5 544.3"><path fill="#4285F4" d="M533.5 278.4c0-17.4-1.5-34-4.3-50.2H272v95h147.3c-6.3 34-25.1 62.8-53.6 82v68h86.6c50.7-46.7 81.2-115.5 81.2-194.8z"/><path fill="#34A853" d="M272 544.3c72.6 0 133.6-23.9 178.2-64.8l-86.6-68c-23.8 16-54.4 25.5-91.6 25.5-70.4 0-130.1-47.6-151.5-111.4H31.7v69.8c44.6 88.1 137 149 240.3 149z"/><path fill="#FBBC05" d="M120.5 325.6c-10.2-30.5-10.2-63.4 0-93.8v-69.8H31.7c-37.9 75.9-37.9 165.7 0 241.6l88.8-69.8z"/><path fill="#EA4335" d="M272 107.7c39.5-.6 77.5 14 106.5 41.2l79.5-79.5C414.8 24.8 344.5-1.5 272 0 169.6 0 77.2 60.9 31.7 149l88.8 69.8c21.4-63.8 81.1-111.4 151.5-111.4z"/></svg>
                            Sign up with Google
                        </a>

                        <a href="/register" class="flex justify-center text-gray-900 text-base font-medium leading-6">
                            Don’t have an account? <span class="text-indigo-600 font-semibold pl-3"> Register</span>
                        </a>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>
