<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <style>
    #map {
      height: 300px; /* Adjust height as needed */
      width: 100%;
    }
    .navbar-transparent {
      background: transparent;
      color: white;
      z-index: 1000;
    }
    .navbar-transparent a {
      color: white;
    }
    .navbar-transparent a:hover {
      color: #543310; /* Change color on hover */
    }
    .hero-bg {
      display: flex;
      align-items: center;
      justify-content: center;
      background-size: cover;
      background-position: center;
      height: 50vh;
      position: relative;
    }
    .hero-bg .overlay {
      position: absolute;
      inset: 0;
      background-color: rgba(0, 0, 0, 0.5); /* Warna hitam dengan opasitas 50% */
      z-index: 10;
    }
    .container-text {
      height: 200px;
      width: 500px;
      display: flex;
      align-items: center;
      justify-content: center;
      /* border-radius: 20px;
      backdrop-filter: blur(3px);
      background: rgba(255, 255, 255, .1); */
    }
    .container-text h1 {
      font-size: 50px;
      font-weight: bold;
      color: white;
    }
    .article-section {
  background-color: #f7fafc;
  padding: 2.5rem 1rem;
}

.container {
  max-width: 1280px;
  margin: 0 auto;
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
}

.article {
  flex: 1 1 calc(50% - 2rem);
  background-color: #fff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  border-radius: 0.5rem;
  overflow: hidden;
}

.article-content {
  padding: 1.5rem;
}

.article-title {
  font-size: 1.5rem;
  font-weight: bold;
  margin-bottom: 1rem;
}

.article-text {
  font-size: 1rem;
  color: #4a5568;
  margin-bottom: 1.5rem;
}

.article-link {
  font-size: 1rem;
  color: white;
  text-decoration: none;
  background-color: #74512D;
  border-radius: 20px;
  padding: 0.5rem 1rem;
}
.button-container {
  display: flex;
  justify-content: center; /* Untuk menempatkan tombol di tengah secara horizontal */
  margin-top: 1.5rem; /* Jarak antara teks dan tombol */
}
.article-link:hover {
  text-decoration: none;
  background-color: #543310;
}
.article-img {
      width: 100%;
      height: auto;
      display: block;
}
.cards-section {
      background-color: #f7fafc;
      padding: 2.5rem 1rem;
    }

    .cards-container {
      max-width: 1280px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
    }


    .card {
      background-color: #fff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 0.5rem;
      overflow: hidden;
      text-align: center;
    }

    .card-img {
      width: 100%;
      height: auto;
    }

    .card-content {
      padding: 1.5rem;
    }

    .card-title {
      font-size: 1.25rem;
      font-weight: bold;
      margin-bottom: 1rem;
    }
    .section-title {
      text-align: center;
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 2rem;
    }
  </style>
</head>
<body>

   <!-- Navbar -->
   <section>
<nav class="navbar-transparent fixed w-full z-10">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="img/2.png" class="h-12" alt="Travel Logo" />
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
          <a href="#services" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Event</a>
        </li>
        <li>
          <a href="#pricing" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Accommodation</a>
        </li>
        <li>
          <a href="#gallery" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Whistlist</a>
        </li>
        <li>
          <a href="#testimonials" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Testimonials</a>
        </li>
        <li>
          <a href="#contact" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0">Contact us</a>
        </li>
      </ul>
    </div>
  </div>
</nav> 
</section>

<!-- Hero Section -->
<section class="hero-bg bg-cover bg-center" style="background-image: url('{{ asset('img/drone.jpg') }}');">
  <div class="overlay"></div> <!-- Background overlay -->
  <div class="container-text relative z-20">
    <h1>About us</h1>
  </div>
</section>

<!-- Article Section -->
<section class="article-section">
  <div class="container">
    <!-- Article 1 -->
    <div class="article">
      <div class="article-content">
        <h2 class="article-title">About Us</h2>
        <p class="article-text">
        <p>"Bali Entertainment Tourism" adalah sebuah infrastruktur yang terintegrasi secara komprehensif, yang dirancang untuk mengumpulkan, mengolah, mengolah, dan menyebarkan informasi yang berkaitan dengan industri pariwisata di suatu daerah khususnya di daerah Bali atau destinasi tertentu. Fungsi utama sistem ini adalah untuk mendukung pengembangan, pengelolaan, dan promosi sektor pariwisata dengan lebih efektif
        </p>
        <div class="button-container">
        <a href="#" class="article-link">Contact Us</a>
        </div>
      </div>
    </div>
    <!-- Article 2 -->
    <div class="article">
      <img src="{{ asset('img/jabapura.jpg') }}" alt="Descriptive Alt Text" class="article-img">
    </div>
  </div>
</section>

<!-- Cards Section -->
<section class="cards-section">
<h2 class="section-title">Meet Our Team</h2>
  <div class="cards-container">
    <!-- Card 1 -->
    <div class="card">
      <img src="{{ asset('img/spa.jpg') }}" alt="Image 1" class="card-img">
      <div class="card-content">
        <h3 class="card-title">Listya</h3>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="card">
      <img src="{{ asset('img/spa.jpg') }}" alt="Image 2" class="card-img">
      <div class="card-content">
        <h3 class="card-title">Agung Dwitya</h3>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="card">
      <img src="{{ asset('img/spa.jpg') }}" alt="Image 3" class="card-img">
      <div class="card-content">
        <h3 class="card-title">Fernando</h3>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="card">
      <img src="{{ asset('img/spa.jpg') }}" alt="Image 4" class="card-img">
      <div class="card-content">
        <h3 class="card-title">Surya</h3>
      </div>
    </div>
  </div>
</section>

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