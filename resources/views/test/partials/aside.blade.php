<aside class="hidden md:flex flex-col fixed left-6 top-1/2 -translate-y-1/2 bg-white/70 backdrop-blur-lg p-4 space-y-4 shadow-xl rounded-2xl z-50">
    <!-- Home -->
    <a href="{{ route('dashboard2', ['user' => $user]) }}"
       class="flex items-center gap-3 px-5 py-4 rounded-2xl font-medium transition
              {{ request()->routeIs('dashboard2') ? 'bg-blue-500 text-white shadow-md' : 'bg-white text-blue-700 hover:bg-blue-100 hover:shadow-md' }}">
      🏠 <span>Home</span>
    </a>

    <!-- Tambah Catatan -->
    <a href="{{ route('moodSelect', ['slug' => $user->slug, 'day_number' => $day->day_number]) }}"
       class="flex items-center gap-3 px-5 py-4 rounded-2xl font-medium transition
              {{ request()->routeIs('list') ? 'bg-blue-500 text-white shadow-md' : 'bg-white text-blue-700 hover:bg-blue-100 hover:shadow-md' }}">
      ➕ <span>Tambah Catatan</span>
    </a>

    <!-- Refleksi -->
    <a href="#"
       class="flex items-center gap-3 px-5 py-4 rounded-2xl font-medium transition
              {{ request()->routeIs('refleksi') ? 'bg-blue-500 text-white shadow-md' : 'bg-white text-blue-700 hover:bg-blue-100 hover:shadow-md' }}">
      🔮 <span>Refleksi Diri</span>
    </a>
</aside>
