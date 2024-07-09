<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bali Entertainment Tourism</title>
  <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
  <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  @vite(['resources/css/app.css','resources/js/app.js'])
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
      color: #543310; /* Change color on hover */
    }
    .hero-bg {
      background-image: url('https://example.com/hero.jpg');
      background-size: cover;
      background-position: center;
      height: 100vh;
    }
    .px-8 a{
      background-color: #74512D;
    }
    .px-8 a:hover{
      background-color: #543310;
    }
  </style>
</head>
<body>
@include('landing.navbar')
@include('landing.hero')
@include('landing.categori')
@include('landing.about')
@include('landing.testi')
@include('landing.place')
@include('landing.footer')
</body>
</html>
