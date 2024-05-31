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
