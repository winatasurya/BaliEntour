<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Map with Popups</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-popup-slideshow/dist/leaflet-popup-slideshow.css">
  <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
  <style>
    #map {
      height: 400px;
    }
    .popup-image {
      display: none;
      width: 100%;
      height: 100px; /* Set a fixed height */
      object-fit: cover; /* Ensure the image covers the area without distortion */
    }
    .popup-content {
      text-align: center;
    }
    .popup-navigation {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 10px;
      position:center ;
      top: -200px; /* Adjust this value as needed */
    }
    .prev-btn {
      position: absolute;
      left: 10px;
    }
    .next-btn {
      position: absolute;
      right: 10px;
      
    }

    #map {
      height: 300px; /* Adjust height as needed */
      width: 100%;
    }
  </style>
</head>
<body>
  <footer class="relative bg-blueGray-200 pt-8 pb-6">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap text-left lg:text-left">
        <div class="w-full lg:w-6/12 px-4">
          <h4 class="text-3xl font-semibold text-blueGray-700">Let's keep in Bali Entertainment Tourism!</h4>
          <h5 class="text-lg mt-0 mb-2 text-blueGray-600">
            Find us on any of these platforms, we respond 1-2 business days.
          </h5>
          <div class="mt-6 lg:mb-0 mb-6">
            <a href="https://www.instagram.com/politeknik_negeri_bali" target="_blank">
              <button class="bg-white text-lightBlue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                <i class="fab fa-instagram"></i>
              </button>
            </a>
            <a href="https://www.facebook.com/PoltekBali" target="_blank">
              <button class="bg-white text-lightBlue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                <i class="fab fa-facebook-square"></i>
              </button>
            </a>
            <a href="https://www.youtube.com/@PoliteknikNegeriBaliOfficial" target="_blank">
              <button class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                <i class="fab fa-youtube"></i>
              </button>
            </a>
            <a href="https://www.pnb.ac.id/" target="_blank">
              <button class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                <i class="fab fa-google"></i>
              </button>
            </a>
          </div>
        </div>
        
        <div class="w-full lg:w-6/12 px-4">
          <div id="map" style="height: 400px;"></div>
        </div>
      </div>

 <!-- Contact Us -->
<div class="flex flex-col sm:flex-row items-center justify-start mt-4">
    <div class="flex items-center mb-2 sm:mb-0">
        <i class="fas fa-map-marker-alt text-blueGray-600 text-lg mr-2"></i>
        <span class="text-sm text-blueGray-600">Location: Kampus Bukit, Jimbaran, Badung, Bali 80364</span>
    </div>
    <div class="flex items-center mb-2 sm:mb-0 ml-0 sm:ml-4">
        <i class="fas fa-phone-alt text-blueGray-600 text-lg mr-2"></i>
        <span class="text-sm text-blueGray-600">Phone: 082147351926</span>
    </div>
    <div class="flex items-center mb-2 sm:mb-0 ml-0 sm:ml-4">
        <i class="fas fa-envelope text-blueGray-600 text-lg mr-2"></i>
        <span class="text-sm text-blueGray-600">Email: balientour@gmail.com</span>
    </div>
</div>



      <hr class="my-6 border-blueGray-300">
      <div class="flex flex-wrap items-center md:justify-between justify-center">
        <div class="w-full md:w-4/12 px-4 mx-auto text-center">
          <div class="text-sm text-blueGray-500 font-semibold py-1">
            Copyright © <span id="get-current-year">2024</span>
            <a href="https://www.creative-tim.com/product/notus-js" class="text-blueGray-500 hover:text-gray-800" target="_blank"> PNB by
              <a href="https://www.creative-tim.com?ref=njs-profile" class="text-blueGray-500 hover:text-blueGray-800"> Bali EnTour</a>.
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/leaflet-popup-slideshow/dist/leaflet-popup-slideshow.js"></script>

  <script>
    // Initialize map
    var map = L.map('map').setView([-8.6329018857139, 115.20324658598935], 10); // Centered on Bali, adjust as needed

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);



 // Custom icon for user's location
 var userIcon = L.icon({
      iconUrl: 'https://img.icons8.com/material-rounded/24/000000/map-pin.png',
      iconSize: [24, 24],
      iconAnchor: [12, 24],
      popupAnchor: [0, -20]
    });

    function onLocationFound(e) {
      var radius = e.accuracy / 2;

      L.marker(e.latlng, { icon: userIcon }).addTo(map)
        .bindPopup("You are here").openPopup();

      L.circle(e.latlng, radius).addTo(map);
    }

    function onLocationError(e) {
      alert(e.message);
    }

    map.on('locationfound', onLocationFound);
    map.on('locationerror', onLocationError);

    map.locate({ setView: true, maxZoom: 16 });


    // Add markers with detailed popup
    var locations = [
      {
        coords: [-8.588920380786469, 115.26502859375154],
        name: "Sanctoo Suites & Villas",
        rating: 4.1,
        address: "867Q+FP3, Jalan Ulun Suwi II, Singapadu, Kec. Sukawati, Kabupaten Gianyar, Bali 80582",
        phone: "03614711222",
        hours: "Waktu checkin: 14.00, Waktu checkout: 12.00",
        images: ["https://lh5.googleusercontent.com/p/AF1QipMwvhKnavymHXdtHV-OvoT9_6jMJ2yR1ENk5aMO=w408-h408-k-no",
                 "https://lh5.googleusercontent.com/p/AF1QipP3K8AElyL6i9tckGMAsiOGRXZREH3DfkWMqFoX=w328-h130-p-k-no"]
      },
      {
        coords: [-8.666667732428268, 115.13940534992246],
        name: "Finns Beach Club",
        rating: 4.4,
        address: "Jl. Pantai Berawa No.99, Canggu, Kec. Kuta Utara, Kabupaten Badung, Bali 80361",
        phone: "03618446327",
        hours: " Waktu check in: 14.00,Waktu check out: 23.00",
        images: ["https://lh5.googleusercontent.com/p/AF1QipNRfHMeiAXfeeuoFgcVhrmdTOUi_QWZgpNZXZL5=w328-h130-p-k-no",
                 "https://lh5.googleusercontent.com/p/AF1QipOh2jchDXP-CztLEz6C1L3QLRDImRiyNg1DIVez=w408-h271-k-no" ], // Replace with actual image URL
      },
      {
        coords: [-8.683352059452536, 115.15657586710671],
        name: "Essential Health Spa", 
        rating: 4.8,
        address: "Seminyak Square, 1st Jl. Kayu Aya, Seminyak, Kec. Kuta, Kabupaten Badung, Bali 80361",
        phone: "08113851224",
        hours: " Buka: 10.00, Tutup: 20.00 ",
        images: ["https://lh5.googleusercontent.com/p/AF1QipPFISdmyA7FMDF7my81Qa5T858hzvdYCJ_I0XU_=w426-h240-k-no", 
                 "https://lh5.googleusercontent.com/p/AF1QipNJifan2ytns7jVYHFkPf4ZB_YJiQLu4qKWvkos=w328-h130-p-k-no" ]// Replace with actual image URL
      },
      {
        coords: [-8.694739719758116, 115.17076940102574],
        name: "Le Petit Chef",
        rating: 4.4,
        address: "TS Suites, Seminyak, Jl. Nakula No.18, Legian, Kec. Kuta, Kabupaten Badung, Bali 80361",
        phone: "082340202621",
        hours: " Buka: 10.00, Tutup: 22.00",
        images: ["https://lh5.googleusercontent.com/p/AF1QipPMl1sdEEXTXCayl1V_zRqjGHG93UKpI6Z5q3RW=w408-h611-k-no",
                 "https://lh5.googleusercontent.com/p/AF1QipO3sxtUPc7Y1EVpm20ZOXuPyJmU9_aw8CiI55Un=w328-h130-p-k-no"] // Replace with actual image URL
      },
      {
        coords: [-8.683474649279185, 115.16279835664274],
        name: "Natys Restaurant Seminyak",
        rating: 4.8,
        address: "Jalan Kayu Aya No.53 Seminyak Kuta, Kerobokan Kelod, Kec. Kuta Utara, Kabupaten Badung, Bali 80361",
        phone: "03618446327",
        hours: " Buka: 15.00, Tutup: 03.00",
        images: ["https://lh5.googleusercontent.com/p/AF1QipPXPQss2I1ZjqPE8ISO_rgpu50GPco-gfY1Q4WO=w408-h306-k-no", 
                 "https://lh5.googleusercontent.com/p/AF1QipOEotEKwVIGcs5lqkYarEI80YTYhPg3y7xUUxW2=w328-h130-p-k-no " ]// Replace with actual image URL
      },
      {
        coords: [-8.67186753658129, 115.20308043536103],
        name: "Happy Puppy",
        rating: 4.4,
        address: "Jl. Pantai Berawa No.99, Canggu, Kec. Kuta Utara, Kabupaten Badung, Bali 80361",
        phone: "03618446327",
        hours: " Waktu check in: 14.00,Waktu check out: 11.00",
        images: ["https://lh5.googleusercontent.com/p/AF1QipOh2jchDXP-CztLEz6C1L3QLRDImRiyNg1DIVez=w408-h271-k-no" ,
                 " https://lh5.googleusercontent.com/p/AF1QipMyucqs26YvsSp50hEkQdoZwrnhH9x8z2xeOYlU=w328-h130-p-k-no"]// Replace with actual image URL
      },
      {
        coords: [-8.665273212915764, 115.1384390781049],
        name: "Atlas Beach Club",
        rating: 4.7,
        address: "Jl. Pantai Berawa No.88, Canggu, Bali, Kabupaten Badung, Bali 80361",
        phone: "03613007222",
        hours: "Buka · Tutup pukul 21.00",
        images: ["https://lh5.googleusercontent.com/p/AF1QipNrSdDmmbvwR8nWUKzQG83WVfEvboy543sV3f8R=w408-h724-k-no", 
                 " https://lh5.googleusercontent.com/p/AF1QipPhdL1P3bBWHiN88f6KrA0k2AkiyJVRml-s0VXk=w328-h130-p-k-no" ]// Replace with actual image URL
      },
      {
        coords: [-8.52183172870867, 115.2627823962398],
        name: "MediaFUN — Karaoke/Cinema Rooms",
        rating: 4.8,
        address: "Jl. Raya Pengosekan Ubud No.108, Ubud, Kecamatan Ubud, Kabupaten Gianyar, Bali 80571",
        phone: "081703791917",
        hours: "Buka 10.00 · Tutup pukul 21.00",
        images: ["https://lh5.googleusercontent.com/p/AF1QipPXYTlWL-JJdMF2NUo_0cdDP-bYARBVfzZBIi-a=w328-h130-p-k-no", 
                 "https://lh5.googleusercontent.com/p/AF1QipMGLTg7r1-fLyAAamUPnbGilhecvBuxK6gTW1xS=w328-h130-p-k-no" ]// Replace with actual image URL
      },
      {
        coords: [-8.842721855100363, 115.14071701918009],
        name: "Savaya Bali",
        rating: 4.1,
        address: "Jl. Belimbing Sari, Banjar Tambiyak, Pecatu, Uluwatu, Kabupaten Badung, Bali 80364",
        phone: "081130990900",
        hours: "Buka 13.00 · Tutup pukul 21.00",
        images: ["https://lh5.googleusercontent.com/p/AF1QipMbPUbzzIUgIsOkc-mnk4WtX7fGQmREVWn3oXNp=w328-h130-p-k-no", 
                 "https://lh5.googleusercontent.com/p/AF1QipO3vqXgaaZa3v5zmMuk89JmTmPiVQeu4gCyJX5g=w328-h130-p-k-no" ]// Replace with actual image URL
      },
      {
        coords: [-8.798352690180286, 115.131437852614],
        name: "Cafe La Pasion",
        rating: 4.6,
        address: "Uluwatu, Jl. Pantai Balangan, Badung Regency, Bali 80363",
        phone: "081238109228",
        hours: "Buka 08.00 · Tutup pukul 21.00",
        images: ["https://lh5.googleusercontent.com/p/AF1QipO7GsbGvnvO6-MUMopwViy49hWByWHLErazJ198=w328-h130-p-k-no", 
                 "https://lh5.googleusercontent.com/p/AF1QipPrNYUSO9mmqZ9rGw5T9XM8WxbCq2jNUuI8hJMR=w328-h130-p-k-no" ]// Replace with actual image URL
      },
      {
        coords: [-8.764853729082384, 115.22267442686254],
        name: "Grand Mirage Resort & Thalasso Bali",
        rating: 4.6,
        address: "Jl. Pratama No.74, Tanjung, Benoa, Kec. Kuta Sel., Kabupaten Badung, Bali 80363",
        phone: "0361771888",
        hours: "Waktu check in: 14.00, Waktu check out: 12.00",
        images: ["https://lh5.googleusercontent.com/p/AF1QipO22sM7CspdXLHyr06zAt6sZUQN8FueyyePnYPJ=w328-h130-p-k-no", 
                 "https://lh5.googleusercontent.com/p/AF1QipPvsRfzM-8IcxUv-3Am2ArI42022TQgxR5M2I-E=w328-h130-p-k-no" ]// Replace with actual image URL
      },
      {
        coords: [-8.540128933171118, 115.13311366406752],
        name: "Dapurdede & biZakaya sushi",
        rating: 4.4,
        address: "Jl. Sugriwa No.2, Delod Peken, Kec. Tabanan, Kabupaten Tabanan, Bali 82121",
        phone: "081999492224",
        hours: "Buka 11.00 · Tutup pukul 19.00",
        images: ["https://lh5.googleusercontent.com/p/AF1QipPP8ZJr0QrYUpex3dheBDaZjkaMA1NyGGS59MdU=w328-h130-p-k-no", 
                 "https://lh5.googleusercontent.com/p/AF1QipP4GquxQ21f6G75XDiycULqI-JvOo_odm4YsNIv=w328-h130-p-k-no" ]// Replace with actual image URL
      },
      {
        coords: [-8.693725171068108, 115.26359845225369],
        name: "Camelia SPA",
        rating: 4.7,
        address: "Jl. Danau Tamblingan No.78, Sanur, Denpasar Selatan, Kota Denpasar, Bali 80228",
        phone: "085100886922",
        hours: "Buka 09.00 · Tutup pukul 20.00",
        images: ["https://lh5.googleusercontent.com/p/AF1QipOIDd2dasnK30NfREeewV5G-zWdg84bz4QufvFS=w328-h130-p-k-no", 
                 "https://lh5.googleusercontent.com/p/AF1QipNgmYda4N-p2Vcep80f97MeNbnMg7iotpONBiTi=w328-h130-p-k-no" ]// Replace with actual image URL
      }
    ];

    locations.forEach(function(location) {
      var starRating = '★'.repeat(Math.floor(location.rating)) + '☆'.repeat(5 - Math.floor(location.rating));
      var imagesHtml = location.images.map((image, index) => `<img src="${image}" class="popup-image" style="${index === 0 ? 'display:block;' : ''}">`).join('');
      var popupContent = "<div class='popup-content'>" +
                         "<div class='leaflet-popup-slideshow'>" + imagesHtml + 
                         "<div class='popup-navigation'>" +
                         "<button class='prev-btn'>←</button>" +
                         "<button class='next-btn'>→</button>" +
                         "</div>" +
                         "</div>" +
                         "<b>" + location.name + "</b><br>" +
                         "<span style='color: gold;'>" + starRating + "</span> <span style='color: black;'>(" + location.rating + ")</span><br>" +
                         location.address + "<br>" +
                         "Tel: " + location.phone + "<br>" +
                         "Hours: " + location.hours + "</div>";

      var marker = L.marker(location.coords).addTo(map).bindPopup(popupContent);

      marker.on('popupopen', function() {
        var currentIndex = 0;
        var popup = marker.getPopup().getElement();
        var images = popup.querySelectorAll('.popup-image');
        var prevBtn = popup.querySelector('.prev-btn');
        var nextBtn = popup.querySelector('.next-btn');

        function showImage(index) {
          images.forEach((img, i) => {
            img.style.display = i === index ? 'block' : 'none';
          });
        }

        prevBtn.addEventListener('click', function() {
          currentIndex = (currentIndex === 0) ? images.length - 1 : currentIndex - 1;
          showImage(currentIndex);
        });

        nextBtn.addEventListener('click', function() {
          currentIndex = (currentIndex === images.length - 1) ? 0 : currentIndex + 1;
          showImage(currentIndex);
        });
      });
    });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
