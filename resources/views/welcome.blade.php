<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Landing Page</title>
  @vite('resources/css/app.css')
  <style>
    .navbar-transparent {
      background: transparent;
      color: white;
    }
    .navbar-transparent a {
      color: white;
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
    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Travel Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap">Bali EnTour</span>
    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-600">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent">
        <li>
          <a href="#" class="block py-2 px-3 rounded md:bg-transparent md:p-0">Home</a>
        </li>
        <li>
          <a href="#services" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Services</a>
        </li>
        <li>
          <a href="#pricing" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Pricing</a>
        </li>
        <li>
          <a href="#gallery" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Gallery</a>
        </li>
        <li>
          <a href="#testimonials" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Testimonials</a>
        </li>
        <li>
          <a href="#contact" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero-bg">
  <div class="flex items-center justify-center h-full bg-gray-900 bg-opacity-50">
    <div class="text-center text-white">
      <h1 class="text-5xl font-bold">Discover Your Next Adventure</h1>
      <p class="mt-4 text-lg">Explore the world with us</p>
      <a href="#services" class="mt-8 px-6 py-3 bg-blue-600 rounded hover:bg-blue-700">Get Started</a>
    </div>
  </div>
</section>

<!-- Services Section -->
<section id="services" class="py-16 bg-white">
  <div class="max-w-screen-xl mx-auto text-center">
    <h2 class="text-4xl font-bold">Our Services</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
      <div class="p-6 bg-gray-100 rounded">
        <h3 class="text-2xl font-semibold">Guided Tours</h3>
        <p class="mt-4">Experience the best guided tours with our experienced guides.</p>
      </div>
      <div class="p-6 bg-gray-100 rounded">
        <h3 class="text-2xl font-semibold">Travel Packages</h3>
        <p class="mt-4">Get exclusive travel packages tailored to your needs.</p>
      </div>
      <div class="p-6 bg-gray-100 rounded">
        <h3 class="text-2xl font-semibold">Custom Itineraries</h3>
        <p class="mt-4">Plan your trip with custom itineraries designed just for you.</p>
      </div>
    </div>
  </div>
</section>

<!-- Pricing Section -->
<section id="pricing" class="py-16 bg-gray-50">
  <div class="max-w-screen-xl mx-auto text-center">
    <h2 class="text-4xl font-bold">Pricing</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
      <div class="p-6 bg-white rounded shadow">
        <h3 class="text-2xl font-semibold">Basic</h3>
        <p class="mt-4 text-gray-600">$99 / trip</p>
        <ul class="mt-4">
          <li>Guided Tours</li>
          <li>Basic Travel Packages</li>
        </ul>
        <a href="#" class="mt-8 inline-block px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700">Choose Plan</a>
      </div>
      <div class="p-6 bg-white rounded shadow">
        <h3 class="text-2xl font-semibold">Standard</h3>
        <p class="mt-4 text-gray-600">$199 / trip</p>
        <ul class="mt-4">
          <li>All Basic Features</li>
          <li>Custom Itineraries</li>
        </ul>
        <a href="#" class="mt-8 inline-block px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700">Choose Plan</a>
      </div>
      <div class="p-6 bg-white rounded shadow">
        <h3 class="text-2xl font-semibold">Premium</h3>
        <p class="mt-4 text-gray-600">$299 / trip</p>
        <ul class="mt-4">
          <li>All Standard Features</li>
          <li>Exclusive Travel Packages</li>
        </ul>
        <a href="#" class="mt-8 inline-block px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700">Choose Plan</a>
      </div>
    </div>
  </div>
</section>

<!-- tst -->
<main class="py-6 px-4 sm:p-6 md:py-10 md:px-8">
  <div class="max-w-4xl mx-auto grid grid-cols-1 lg:max-w-5xl lg:gap-x-20 lg:grid-cols-2">
    <div class="relative p-3 col-start-1 row-start-1 flex flex-col-reverse rounded-lg bg-gradient-to-t from-black/75 via-black/0 sm:bg-none sm:row-start-2 sm:p-0 lg:row-start-1">
      <h1 class="mt-1 text-lg font-semibold text-white sm:text-slate-900 md:text-2xl dark:sm:text-white">Beach House in Collingwood</h1>
      <p class="text-sm leading-4 font-medium text-white sm:text-slate-500 dark:sm:text-slate-400">Entire house</p>
    </div>
    <div class="grid gap-4 col-start-1 col-end-3 row-start-1 sm:mb-6 sm:grid-cols-4 lg:gap-6 lg:col-start-2 lg:row-end-6 lg:row-span-6 lg:mb-0">
      <img src="/beach-house.jpg" alt="" class="w-full h-60 object-cover rounded-lg sm:h-52 sm:col-span-2 lg:col-span-full" loading="lazy">
      <img src="/beach-house-interior-1.jpg" alt="" class="hidden w-full h-52 object-cover rounded-lg sm:block sm:col-span-2 md:col-span-1 lg:row-start-2 lg:col-span-2 lg:h-32" loading="lazy">
      <img src="/beach-house-interior-2.jpg" alt="" class="hidden w-full h-52 object-cover rounded-lg md:block lg:row-start-2 lg:col-span-2 lg:h-32" loading="lazy">
    </div>
    <dl class="mt-4 text-xs font-medium flex items-center row-start-2 sm:mt-1 sm:row-start-3 md:mt-2.5 lg:row-start-2">
      <dt class="sr-only">Reviews</dt>
      <dd class="text-indigo-600 flex items-center dark:text-indigo-400">
        <svg width="24" height="24" fill="none" aria-hidden="true" class="mr-1 stroke-current dark:stroke-indigo-500">
          <path d="m12 5 2 5h5l-4 4 2.103 5L12 16l-5.103 3L9 14l-4-4h5l2-5Z"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <span>4.89 <span class="text-slate-400 font-normal">(128)</span></span>
      </dd>
      <dt class="sr-only">Location</dt>
      <dd class="flex items-center">
        <svg width="2" height="2" aria-hidden="true" fill="currentColor" class="mx-3 text-slate-300">
          <circle cx="1" cy="1" r="1" />
        </svg>
        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1 text-slate-400 dark:text-slate-500" aria-hidden="true">
          <path d="M18 11.034C18 14.897 12 19 12 19s-6-4.103-6-7.966C6 7.655 8.819 5 12 5s6 2.655 6 6.034Z" />
          <path d="M14 11a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
        </svg>
        Collingwood, Ontario
      </dd>
    </dl>
    <div class="mt-4 col-start-1 row-start-3 self-center sm:mt-0 sm:col-start-2 sm:row-start-2 sm:row-span-2 lg:mt-6 lg:col-start-1 lg:row-start-3 lg:row-end-4">
      <button type="button" class="bg-indigo-600 text-white text-sm leading-6 font-medium py-2 px-3 rounded-lg">Check availability</button>
    </div>
    <p class="mt-4 text-sm leading-6 col-start-1 sm:col-span-2 lg:mt-6 lg:row-start-4 lg:col-span-1 dark:text-slate-400">
      This sunny and spacious room is for those traveling light and looking for a comfy and cosy place to lay their head for a night or two. This beach house sits in a vibrant neighborhood littered with cafes, pubs, restaurants and supermarkets and is close to all the major attractions such as Edinburgh Castle and Arthur's Seat.
    </p>
  </div>
</main>

<!-- Gallery Section -->
<section id="gallery" class="py-16 bg-white">
  <div class="max-w-screen-xl mx-auto text-center">
    <h2 class="text-4xl font-bold">Gallery</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
      <img src="https://example.com/gallery1.jpg" alt="Gallery 1" class="w-full h-64 object-cover rounded">
      <img src="https://example.com/gallery2.jpg" alt="Gallery 2" class="w-full h-64 object-cover rounded">
      <img src="https://example.com/gallery3.jpg" alt="Gallery 3" class="w-full h-64 object-cover rounded">
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-16 bg-gray-50">
  <div class="max-w-screen-xl mx-auto text-center">
    <h2 class="text-4xl font-bold">Testimonials</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
      <div class="p-6 bg-white rounded shadow">
        <p class="text-gray-600">"Amazing experience! Highly recommend TravelCo for your next adventure."</p>
        <p class="mt-4 font-semibold">- John Doe</p>
      </div>
      <div class="p-6 bg-white rounded shadow">
        <p class="text-gray-600">"The custom itineraries were perfect. We had the best trip ever!"</p>
        <p class="mt-4 font-semibold">- Jane Smith</p>
      </div>
      <div class="p-6 bg-white rounded shadow">
        <p class="text-gray-600">"TravelCo made everything so easy and enjoyable. Fantastic service!"</p>
        <p class="mt-4 font-semibold">- Emily Johnson</p>
      </div>
    </div>
  </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-16 bg-white">
  <div class="max-w-screen-xl mx-auto text-center">
    <h2 class="text-4xl font-bold">Contact Us</h2>
    <form class="mt-8 max-w-lg mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <input type="text" placeholder="Name" class="p-4 border rounded">
        <input type="email" placeholder="Email" class="p-4 border rounded">
      </div>
      <textarea placeholder="Message" class="p-4 border rounded mt-4 w-full"></textarea>
      <button type="submit" class="mt-8 px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700">Send Message</button>
    </form>
  </div>
</section>

</body>
</html>
