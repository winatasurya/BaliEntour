<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bali Entertainment Tourism</title>
  <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
  <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <!-- JavaScript for Carousel -->

  @vite(['resources/css/app.css','resources/js/app.js'])
<script>

  
document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.getElementById('controls-carousel');
    const items = carousel.querySelectorAll('[data-carousel-item]');
    const prevButton = carousel.querySelector('[data-carousel-prev]');
    const nextButton = carousel.querySelector('[data-carousel-next]');
    
    let activeIndex = 0;

    const updateCarousel = () => {
        items.forEach((item, index) => {
            if (index === activeIndex) {
                item.classList.remove('hidden');
                item.classList.add('block');
            } else {
                item.classList.remove('block');
                item.classList.add('hidden');
            }
        });
    };

    prevButton.addEventListener('click', () => {
        activeIndex = (activeIndex === 0) ? items.length - 1 : activeIndex - 1;
        updateCarousel();
    });

    nextButton.addEventListener('click', () => {
        activeIndex = (activeIndex === items.length - 1) ? 0 : activeIndex + 1;
        updateCarousel();
    });

    updateCarousel(); // Initialize carousel
});
</script>

  @vite('resources/css/app.css')
  <style>
   .scrollable-container {
            overflow-x: auto;
            white-space: nowrap;
        }

 #map {
      height: 300px; /* Adjust height as needed */
      width: 100%;
    }

  
    .navbar-transparent {
      background: transparent;
      color: black;
      z-index: 1000;
    }
    .navbar-transparent a {
      color: white;
    }
    .navbar-dropdown {
      display: block; 
    }
    .navbar-transparent a:hover {
      color: #4A90E2; /* Change color on hover */
    }
    .hero-bg {
      background-image: url('https://example.com/hero.jpg');
      background-size: cover;
      background-position: center;
      height: 100vh;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar-transparent fixed w-full z-10">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="{{url('/welcome')}}"  class="flex items-center space-x-3 rtl:space-x-reverse">
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

  <!-- Hero Section -->
  <section class="hero-bg bg-cover bg-center relative" style="background-image: url('{{ asset('img/ewdf.jpg') }}');">
    <div class="absolute inset-0 bg-gray-400 bg-opacity-10 z-10"></div> <!-- Background overlay -->
    <div class="flex items-center justify-between h-full relative z-20">
      
    <!-- Left Content -->
    <div class="text-white z-30 px-8 md:px-16 lg:px-24 xl:px-32">
      <h1 class="text-5xl md:text-6xl font-bold leading-tight mb-6">Discover Your Next Holidays In Bali</h1>
      <p class="text-lg leading-relaxed mb-8">Explore the world with us. Find the best destinations, guides, and experiences.</p>
      <a href="{{url('/login')}}" class="px-8 py-4 bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-300 ease-in-out inline-block">Get Started</a>
    </div>

    <!-- Right Content (Carousel) -->
    <div id="controls-carousel" class="relative w-full z-20 md:w-2/3 hidden md:block ml-auto mr-8">
      <!-- Carousel wrapper -->
      <div class="relative h-64 md:h-96 overflow-hidden rounded-lg" data-carousel="slide">
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{ asset('img/14.jpg') }}" class="absolute block w-full h-full object-cover" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="duration-700 ease-in-out" data-carousel-item="active">
          <img src="{{ asset('img/12.jpg') }}" class="absolute block w-full h-full object-cover" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{ asset('img/spa.jpg') }}" class="absolute block w-full h-full object-cover" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{ asset('img/res1.jpg') }}" class="absolute block w-full h-full object-cover" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{ asset('img/bar.jpg') }}" class="absolute block w-full h-full object-cover" alt="...">
        </div>
      </div>
      <!-- Slider controls -->
      <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
          </svg>
          <span class="sr-only">Previous</span>
        </span>
      </button>
      <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="sr-only">Next</span>
        </span>
      </button>
    </div>
  </div>
</section>


<!-- Categori Section -->
<section class="bg-[#f4f0f0]">
  <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
      <div class="max-w-screen-md mb-8 lg:mb-16">
          <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our Services</h2>
          <p class="text-gray-500 sm:text-xl dark:text-gray-400">Explore the variety of services we offer to cater to your business needs.</p>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
          <div class="service-item text-center bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
              <div class="flex justify-center items-center mx-auto mb-4 w-12 h-12 rounded-full bg-blue-500 text-white">
                  <img src="img/landingpage/barr.png" alt="Beach Club & Bar" class="w-6 h-6">
              </div>
              <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Beach Club & Bar</h3>
          </div>
          <div class="service-item text-center bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
              <div class="flex justify-center items-center mx-auto mb-4 w-12 h-12 rounded-full bg-green-500 text-white">
                  <img src="img/landingpage/karaoke.png" alt="Karaoke" class="w-6 h-6">
              </div>
              <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Karaoke</h3>
          </div>
          <div class="service-item text-center bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
              <div class="flex justify-center items-center mx-auto mb-4 w-12 h-12 rounded-full bg-purple-500 text-white">
                  <img src="img/landingpage/spa.png" alt="Spa" class="w-6 h-6">
              </div>
              <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Spa</h3>
          </div>
          <div class="service-item text-center bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
              <div class="flex justify-center items-center mx-auto mb-4 w-12 h-12 rounded-full bg-yellow-500 text-white">
                  <img src="img/landingpage/villa.png" alt="Villa & Suites" class="w-6 h-6">
              </div>
              <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Villa & Suites</h3>
          </div>
          <div class="service-item text-center bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
              <div class="flex justify-center items-center mx-auto mb-4 w-12 h-12 rounded-full bg-red-500 text-white">
                  <img src="img/landingpage/restaurant.png" alt="Restaurant" class="w-6 h-6">
              </div>
              <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Restaurant</h3>
          </div>
          <div class="service-item text-center bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
              <div class="flex justify-center items-center mx-auto mb-4 w-12 h-12 rounded-full bg-indigo-500 text-white">
                  <img src="img/landingpage/call.png" alt="24/7 Support" class="w-6 h-6">
              </div>
              <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">24/7 Support</h3>
          </div>
      </div>
  </div>
</section>




<!-- About Us Section -->
<section class="relative bg-cover bg-center bg-no-repeat " style="background-image: url('img/paja.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="container mx-auto py-10 md:py-14">
        <div class="flex justify-center items-center py-12 md:py-20">
            <div class="w-full md:flex md:items-center md:justify-center">

            </div>
        </div>
    </div>
</section>

<section class="py-5 md:pt-12 relative -top-28">
    <div class="container mx-auto">
        <div class="flex flex-wrap items-center">
            <!-- Column for Image -->
            <div class="w-full md:w-1/2">
                <!-- Container for Image with Frame -->
                <div class="border border-gray-300 p-0.5"> <!-- Tambahkan kelas Tailwind CSS untuk bingkai -->
                    <div class="bg-cover bg-center h-96" style="background-image: url('img/ul.jpg');">
                    </div>
                </div>
            </div>
            <!-- Column for Text -->
            <div class="w-full md:w-1/2 md:pl-8 py-15 md:py-0">
                <div class="flex justify-start pb-3 mt-5 md:mt-10"> <!-- Tambahkan margin atas -->
                    <div class="w-full">
                        <span class="text-sm font-semibold uppercase">About Us</span>
                        <h2 class="text-3xl font-bold mb-4">Make Your Tour Memorable and Safe With Us</h2>
                        <p>" Bali Entertainment Tourism " adalah sebuah infrastruktur yang terintegrasi secara komprehensif, yang dirancang untuk mengumpulkan, mengolah, mengolah, dan menyebarkan informasi yang berkaitan dengan industri pariwisata di suatu daerah khususnya di daerah Bali atau destinasi tertentu. Fungsi utama sistem ini adalah untuk mendukung pengembangan, pengelolaan, dan promosi sektor pariwisata dengan lebih efektif </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="block max-h-full bg-[#f6eeee]" id="testi">
  <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
    <h2 class="text-center text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
      Testimonials
    </h2>
    <div class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-8">
      <blockquote class="rounded-lg bg-gray-50 p-6 shadow-sm sm:p-8">
        <div class="flex items-center gap-4">
          <img
            alt=""
            src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80"
            class="size-14 rounded-full object-cover"
          />
          <div>
            <div class="flex justify-center gap-0.5 text-green-500">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
            </div>

            <p class="mt-0.5 text-lg font-medium text-gray-900">Angga Prayoga</p>
          </div>
        </div>

        <p class="mt-4 text-gray-700">
          Bali Entour adalah pilihan tepat untuk pengalaman wisata yang luar biasa di Pulau Dewata. Saya sangat terkesan dengan profesionalisme tim mereka dalam mengatur tur saya. Panduan wisata yang ramah dan informatif 
        </p>
      </blockquote>

      <blockquote class="rounded-lg bg-gray-50 p-6 shadow-sm sm:p-8">
        <div class="flex items-center gap-4">
          <img
            alt=""
            src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80"
            class="size-14 rounded-full object-cover"
          />

          <div>
            <div class="flex justify-center gap-0.5 text-green-500">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
            </div>

            <p class="mt-0.5 text-lg font-medium text-gray-900">Stefanus</p>
          </div>
        </div>

        <p class="mt-4 text-gray-700">
        Bali Entour menawarkan pelayanan yang ramah dan informatif serta destinasi wisata yang memukau. Semua berjalan sempurna dan saya menikmati setiap momen. Lima bintang untuk Bali Entour!
        </p>
      </blockquote>

      <blockquote class="rounded-lg bg-gray-50 p-6 shadow-sm sm:p-8">
        <div class="flex items-center gap-4">
          <img
            alt=""
            src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80"
            class="size-14 rounded-full object-cover"
          />

          <div>
            <div class="flex justify-center gap-0.5 text-green-500">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
            </div>

            <p class="mt-0.5 text-lg font-medium text-gray-900">Oka Wiyana</p>
          </div>
        </div>

        <p class="mt-4 text-gray-700">
        Liburan saya di Bali bersama Bali Entour sangat terorganisir dan menyenangkan. Panduan wisata yang berpengetahuan luas dan ramah membuat perjalanan saya berkesan. Sangat direkomendasikan!
        </p>
      </blockquote>
    </div>
  </div>
</section>




<h1 class="text-center text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl my-12">
  Place
</h1>
<div class="scrollable-container flex space-x-4 p-4 bg-white rounded-lg shadow-md mb-32 ">
  <div class="card w-64 bg-white border border-gray-200 rounded-lg shadow-md">
    <img class="w-full h-32 object-cover rounded-t-lg" src="https://via.placeholder.com/150" alt="Image 1">
    <div class="p-4 h-32 overflow-hidden">
      <h5 class="text-lg font-semibold">Card Title 1</h5>
      <p class="text-gray-600 text-ellipsis overflow-hidden">This is a description for card 1.locale_filter_matches Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis deserunt animi sit enim dolores voluptatem quidem eos molestias? Repudiandae eligendi a officiis cumque earum perspiciatis minima quis non corporis maxime.</p>
    </div>
  </div>
  <div class="card w-64 bg-white border border-gray-200 rounded-lg shadow-md">
    <img class="w-full h-32 object-cover rounded-t-lg" src="https://via.placeholder.com/150" alt="Image 2">
    <div class="p-4 h-32 overflow-hidden">
      <h5 class="text-lg font-semibold">Card Title 2</h5>
      <p class="text-gray-600 text-ellipsis overflow-hidden">This is a description for card 2.</p>
    </div>
  </div>
  <div class="card w-64 bg-white border border-gray-200 rounded-lg shadow-md">
    <img class="w-full h-32 object-cover rounded-t-lg" src="https://via.placeholder.com/150" alt="Image 3">
    <div class="p-4 h-32 overflow-hidden">
      <h5 class="text-lg font-semibold">Card Title 3</h5>
      <p class="text-gray-600 text-ellipsis overflow-hidden">This is a description for card 3.</p>
    </div>
  </div>
  <div class="card w-64 bg-white border border-gray-200 rounded-lg shadow-md">
    <img class="w-full h-32 object-cover rounded-t-lg" src="https://via.placeholder.com/150" alt="Image 4">
    <div class="p-4 h-32 overflow-hidden">
      <h5 class="text-lg font-semibold">Card Title 4</h5>
      <p class="text-gray-600 text-ellipsis overflow-hidden">This is a description for card 4.</p>
    </div>
  </div>
  <div class="card w-64 bg-white border border-gray-200 rounded-lg shadow-md">
    <img class="w-full h-32 object-cover rounded-t-lg" src="https://via.placeholder.com/150" alt="Image 5">
    <div class="p-4 h-32 overflow-hidden">
      <h5 class="text-lg font-semibold">Card Title 5</h5>
      <p class="text-gray-600 text-ellipsis overflow-hidden">This is a description for card 5.</p>
    </div>
  </div>
  <div class="card w-64 bg-white border border-gray-200 rounded-lg shadow-md">
    <img class="w-full h-32 object-cover rounded-t-lg" src="https://via.placeholder.com/150" alt="Image 6">
    <div class="p-4 h-32 overflow-hidden">
      <h5 class="text-lg font-semibold">Card Title 6</h5>
      <p class="text-gray-600 text-ellipsis overflow-hidden">This is a description for card 6.</p>
    </div>
  </div>
</div>








<footer class="relative bg-blueGray-200 pt-8 pb-6">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap text-left lg:text-left">
        <div class="w-full lg:w-6/12 px-4">
          <h4 class="text-3xl font-semibold text-blueGray-700">Let's keep in touch!</h4>
          <h5 class="text-lg mt-0 mb-2 text-blueGray-600">
            Find us on any of these platforms, we respond 1-2 business days.
          </h5>
          <div class="mt-6 lg:mb-0 mb-6">
            <button class="bg-white text-lightBlue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
              <i class="fab fa-twitter"></i></button><button class="bg-white text-lightBlue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
              <i class="fab fa-facebook-square"></i></button><button class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
              <i class="fab fa-dribbble"></i></button><button class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
              <i class="fab fa-github"></i>
            </button>
          </div>
        </div>
        <div class="w-full lg:w-6/12 px-4">
          <div id="map"></div>
        </div>
      </div>
      <hr class="my-6 border-blueGray-300">
      <div class="flex flex-wrap items-center md:justify-between justify-center">
        <div class="w-full md:w-4/12 px-4 mx-auto text-center">
          <div class="text-sm text-blueGray-500 font-semibold py-1">
            Copyright © <span id="get-current-year">2024</span><a href="https://www.creative-tim.com/product/notus-js" class="text-blueGray-500 hover:text-gray-800" target="_blank"> PNB by
            <a href="https://www.creative-tim.com?ref=njs-profile" class="text-blueGray-500 hover:text-blueGray-800"> Bali EnTour</a>.
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script>
    // Initialize map
    var map = L.map('map').setView([-8.409518, 115.188919], 10); // Centered on Bali, adjust as needed

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add markers
    var locations = [
      [-8.409518, 115.188919], // Example location 1
      [-8.650000, 115.216667], // Example location 2
      [-8.300000, 115.083333], // Example location 3
    ];

    locations.forEach(function(location) {
      L.marker(location).addTo(map);
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>
</html>
