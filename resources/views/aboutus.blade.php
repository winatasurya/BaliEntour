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

@include('landing.navbar')

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
                    <a href="https://wa.me/6285738959574?text=Hello%20Bali%20Entertainment%20Tourism" class="article-link" target="_blank">Contact Us</a>
                </div>
      </div>
    </div>
    <!-- Article 2 -->
    <div class="article">
      <img src="{{ asset('img/poltek.jpg') }}" alt="Descriptive Alt Text" class="article-img">
    </div>
  </div>
</section>

<!-- Cards Section -->
<section class="cards-section">
<h2 class="section-title">Meet Our Team</h2>
  <div class="cards-container">
    <!-- Card 1 -->
    <div class="card">
      <img src="{{ asset('img/formal3.jpg') }}" alt="Image 1" class="card-img">
      <div class="card-content">
        <h3 class="card-title">Listya</h3>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="card">
      <img src="{{ asset('img/formal2.jpg') }}" alt="Image 2" class="card-img">
      <div class="card-content">
        <h3 class="card-title">Agung Dwitya</h3>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="card">
      <img src="{{ asset('img/formal.jpeg') }}" alt="Image 3" class="card-img">
      <div class="card-content">
        <h3 class="card-title">Fernando</h3>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="card">
      <img src="{{ asset('img/formal1.jpeg') }}" alt="Image 4" class="card-img">
      <div class="card-content">
        <h3 class="card-title">Surya</h3>
      </div>
    </div>
  </div>
</section>



</body>
</html>