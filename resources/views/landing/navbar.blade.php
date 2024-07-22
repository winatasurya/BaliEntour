<!-- Navbar -->
<nav class="navbar-transparent fixed w-full z-10">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="{{ route('welcome')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="img/2.png" class="h-12" alt="Travel Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap">Bali EnTour</span>
    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-600">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5 text-[#000000]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 mt-4 border border-gray-100 rounded-lg bg-gray-900 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent">
        <li>
          <a href="{{ route('welcome')}}" class="block py-2 px-3 rounded md:bg-transparent md:p-0">Home</a>
        </li>
        <li>
          <a href="#place" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Event</a>
        </li>
        <li>
          <a href="{{ route('about')}}" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">About Us</a>
        </li>
        <li>
          <a href="#testi" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Testimonials</a>
        </li>
        <!-- Conditional Dashboard Link -->
        @auth
          @if (Auth::user()->role == 'admin')
            <li>
              <a href="{{ route('admin')}}" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0"> Dashboard</a>
            </li>
          @elseif (Auth::user()->role == 'perusahaan')
            <li>
              <a href="{{ route('db_perusahaan')}}" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0"> Dashboard</a>
            </li>
          @elseif (Auth::user()->role == 'wisatawan')
            <li>
              <a href="{{ route('wisawatan')}}" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0"> Dashboard</a>
            </li>
          @endif
        @endauth
        <li>
          @guest
            <a href="{{ route('login')}}" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Login</a>
          @else
            <a href="{{ route('logout')}}" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>
            <form action="{{ route('logout')}}" method="post" style="display: none" id="logout-form">
              @csrf
            </form>
          @endguest
        </li>
      </ul>
    </div>
  </div>
</nav>
