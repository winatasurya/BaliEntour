<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $perusahaan->user->name }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        function updateLocation() {
            var lat = document.getElementById('latitude').value;
            var lng = document.getElementById('longitude').value;
            document.getElementById('mapEmbed').src = `https://maps.google.com/maps?q=${lat},${lng}&hl=es;z=14&output=embed`;
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateLocation(); // Update map on page load
        });
    </script>
</head>

<body>
    @include('landing.nav')

    <div class="container mx-auto mt-8 p-4">
        <!-- Image Slider -->
        <div class="container mx-auto mt-16 px-4">
            <div class="flex space-x-4 overflow-x-auto scrollable-container">
                <!-- Images -->
                @if ($perusahaan->logo)
                    <img class="w-1/1 h-64 object-cover rounded-lg" src="{{ asset('img/' . $perusahaan->logo) }}" alt="Image 1">
                @else
                    <img class="w-1/1 h-64 object-cover rounded-lg" src="{{ asset('img/gambar_perusahaan/plain_profile.jpg') }}" alt="Image 1">
                @endif

                @foreach ($perusahaan->penawaran as $penawaran)
                    @if ($penawaran->foto)
                        <img class="w-1/1 h-64 object-cover rounded-lg" src="{{ asset('img/' . $penawaran->foto) }}" alt="Image 1">
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Title and Details -->
        <div class="mt-4">
            <h1 class="text-2xl font-bold">{{ $perusahaan->user->name }}</h1>
        </div>

        <!-- Description -->
        <div class="mt-4">
            <p class="text-gray-600">{{ $perusahaan->deskripsi }}</p>
        </div>

        <!-- Reviews Section -->
        <div class="mt-8">
            <h2 class="text-3xl font-bold">Rating</h2>
            @if ($ratings->isEmpty())
                <p class="text-gray-600">Belum ada review.</p>
            @else
                <div class="flex items-center">
                    <span class="text-2xl font-bold">{{ $rate }}/5</span>
                    <div class="ml-2 flex">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= floor($rate))
                                <i class="fas fa-star text-yellow-500"></i>
                            @elseif ($i == ceil($rate) && $rate - floor($rate) >= 0.5)
                                <i class="fas fa-star-half-alt text-yellow-500"></i>
                            @else
                                <i class="fas fa-star text-gray-300"></i>
                            @endif
                        @endfor
                    </div>
                </div>
                <div class="mt-4 flex space-x-4 overflow-x-auto scrollable-container">
                    @foreach ($ratings as $rating)
                        <div class="p-4 border rounded-lg shadow flex-none w-80">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <span class="text-lg font-bold">Rate: {{ $rating->nilai }}/5</span>
                                    <div class="ml-2 flex">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= floor($rating->nilai))
                                                <i class="fas fa-star text-yellow-500"></i>
                                            @elseif ($i == ceil($rating->nilai) && $rating->nilai - floor($rating->nilai) >= 0.5)
                                                <i class="fas fa-star-half-alt text-yellow-500"></i>
                                            @else
                                                <i class="fas fa-star text-gray-300"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <span class="text-gray-500">{{ $rating->created_at->format('d M Y') }}</span>
                            </div>
                            <p class="text-gray-600 mt-2">{{ $rating->komentar }}</p>
                            <p class="text-gray-500 mt-1">By {{ $rating->wisatawan->user->name }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Button to Open Modal -->
        <div class="mt-4">
            <button id="openModalButton" class="bg-purple-500 text-white px-4 py-2 rounded-lg">Tambah Review</button>
        </div>

        <!-- Google Maps Embed -->
        <div class="mt-8">
            <h2 class="text-xl font-bold">Lokasi</h2>
            @if ($perusahaan->latitude && $perusahaan->longitude)
                <div class="mt-4 relative">
                    <div class="overflow-hidden rounded-lg shadow" style="max-width: 100%; max-height: 300px;">
                        <iframe id="mapEmbed"
                            width="100%" height="300" frameborder="0" style="border:0" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <input type="hidden" id="latitude" value="{{ $perusahaan->latitude }}">
                    <input type="hidden" id="longitude" value="{{ $perusahaan->longitude }}">
                    <div class="mt-2 flex items-center">
                        <span class="text-gray-600">{{ $perusahaan->alamat }}</span>
                    </div>
                    <div class="mt-2 flex space-x-4">
                        <a href="#" class="text-blue-500 hover:underline">Lihat Peta</a>
                        <a href="#" class="text-blue-500 hover:underline">Panduan ke Lokasi</a>
                    </div>
                </div>
            @else
                <div class="mt-4 text-gray-600">Lokasi tidak tersedia</
            @endif
        </div>

        <!-- Booking Info -->
        @foreach ($perusahaan->penawaran as $penawaran)
            <div class="mt-8 p-4 border rounded-lg shadow">
                <h3 class="text-lg font-semibold">{{ $penawaran->nama_penawaran }}</h3>
                <p class="mt-2 text-gray-600">Mulai dari
                    <span class="text-red-500 font-bold">{{ $penawaran->harga }}</span>
                </p>
                <a href="{{ route('reservasi', $penawaran->id) }}"><button
                        class="mt-4 w-full bg-blue-500 text-white px-4 py-2 rounded-lg">Lihat Paket</button></a>
            </div>
        @endforeach
    </div>
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
                            <button
                                class="bg-white text-lightBlue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                type="button">
                                <i class="fab fa-instagram"></i>
                            </button>
                        </a>
                        <a href="https://www.facebook.com/PoltekBali" target="_blank">
                            <button
                                class="bg-white text-lightBlue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                type="button">
                                <i class="fab fa-facebook-square"></i>
                            </button>
                        </a>
                        <a href="https://www.youtube.com/@PoliteknikNegeriBaliOfficial" target="_blank">
                            <button
                                class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                type="button">
                                <i class="fab fa-youtube"></i>
                            </button>
                        </a>
                        <a href="https://www.pnb.ac.id/" target="_blank">
                            <button
                                class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                type="button">
                                <i class="fab fa-google"></i>
                            </button>
                        </a>
                    </div>
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
                        <a href="https://www.creative-tim.com/product/notus-js"
                            class="text-blueGray-500 hover:text-gray-800" target="_blank"> PNB by
                            <a href="https://www.creative-tim.com?ref=njs-profile"
                                class="text-blueGray-500 hover:text-blueGray-800"> Bali EnTour</a>.
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal for Adding a Review -->
    <div id="reviewModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Tambahkan Review</h3>
                    <form class="mt-4" method="POST" action="{{ route('rating.store') }}">
                        @csrf
                        <input type="hidden" name="id_perusahaan" value="{{ $perusahaan->id }}">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="rating">Rating</label>
                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="nilai" id="rating">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="review">Review</label>
                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="komentar" id="review" placeholder="Tulis review Anda di sini..." rows="4"></textarea>
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Submit
                            </button>
                            <button id="closeModalButton"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="button">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const openModalButton = document.getElementById('openModalButton');
        const closeModalButton = document.getElementById('closeModalButton');
        const reviewModal = document.getElementById('reviewModal');

        openModalButton.addEventListener('click', () => {
            reviewModal.classList.remove('hidden');
        });

        closeModalButton.addEventListener('click', () => {
            reviewModal.classList.add('hidden');
        });

        // Close the modal if the user clicks outside of it
        window.addEventListener('click', (event) => {
            if (event.target == reviewModal) {
                reviewModal.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
