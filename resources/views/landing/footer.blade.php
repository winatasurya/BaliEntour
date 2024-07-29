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
            width: 100%;
        }

        .popup-image {
            display: none;
            width: 100%;
            height: 100px;
            object-fit: cover;
        }

        .popup-content {
            text-align: center;
        }

        .popup-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            position: center;
            top: -200px;
        }

        .prev-btn {
            position: absolute;
            left: 10px;
        }

        .next-btn {
            position: absolute;
            right: 10px;
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
        document.addEventListener('DOMContentLoaded', function() {
        var map = L.map('map').setView([-8.6329018857139, 115.20324658598935], 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var perusahaanData = {!! json_encode($perusahaans) !!};
        console.log(perusahaanData);

        perusahaanData.forEach(function(user) {
            var company = user.perusahaan;
            if (company.latitude && company.longitude) {
                // Gunakan URL gambar yang sudah dibangun di Laravel
                var logoUrl = company.logo_url;
                var popupContent = "<div class='popup-content'>" +
                                   "<div class='leaflet-popup-slideshow'>" +
                                   "<img " + logoUrl + " class='popup-image' alt='Logo Perusahaan'>" +
                                   "<div class='popup-navigation'>" +
                                   "<button class='prev-btn'>←</button>" +
                                   "<button class='next-btn'>→</button>" +
                                   "</div>" +
                                   "</div>" +
                                   "<b>" + user.name + "</b><br>" +
                                   "Tel: " + company.wa_perusahaan + "<br>";

                var marker = L.marker([company.latitude, company.longitude]).addTo(map);
                marker.bindPopup(popupContent);
            } else {
                console.error(`Missing coordinates for user: ${user.name}`);
            }
        });

            // Fungsi untuk menangani lokasi yang ditemukan
            function onLocationFound(e) {
                var radius = e.accuracy / 2;

                // Tambahkan marker untuk lokasi pengguna
                L.marker(e.latlng).addTo(map)
                    .bindPopup("You are here").openPopup();

                // Tambahkan lingkaran untuk menunjukkan akurasi lokasi
                L.circle(e.latlng, radius).addTo(map);
            }

            // Fungsi untuk menangani kesalahan lokasi
            function onLocationError(e) {
                alert(e.message);
            }

            // Event listener untuk event lokasi ditemukan
            map.on('locationfound', onLocationFound);

            // Event listener untuk event kesalahan lokasi
            map.on('locationerror', onLocationError);

            // Meminta lokasi pengguna
            map.locate({
                setView: true,
                maxZoom: 16
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
