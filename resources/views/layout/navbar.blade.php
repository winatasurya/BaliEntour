
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        background-color: white;
    }
    .navbar-transparent {
      background: transparent;
      color: black;
      z-index: 1000;
    }
    .navbar-transparent a {
      color: #74512D;
    }
    .navbar-transparent img {
      background-color: #74512D;
      border-radius: 50px;
    }
    .navbar-dropdown {
      display: block; 
    }
    .navbar-transparent a:hover {
      color: #543310; /* Change color on hover */
    }
</style>
<body>
    
    </html>
    <!-- Navbar -->
    <nav class="navbar-transparent fixed w-full z-10">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{url('/main')}}"  class="flex items-center space-x-3 rtl:space-x-reverse">
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
              <a href="{{url('/welcome')}}" class="block py-2 px-3 rounded md:bg-transparent md:p-0">Home</a>
            </li>
            <li>
              <a href="#services" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Event</a>
            </li>
            <li>
              <a href="#pricing" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Accommodation</a>
            </li>
            <li>
              <a href="#testi" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Testimonials</a>
            </li>
            <li>
              <a href="{{url('/about')}}" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">About Us</a>
            </li>
            <li>
              <a href="{{url('/login')}}" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0"> Login </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</body>