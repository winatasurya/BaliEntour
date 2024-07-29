<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $perusahaan->user->name }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            <div class="mt-4 relative">
                <div class="overflow-hidden rounded-lg shadow" style="max-width: 100%; max-height: 300px;">
                    <iframe id="mapEmbed"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.274252759748!2d115.1384535!3d-8.665447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2477f04748e85%3A0x65b83481caecd509!2sAtlas%20Beach%20Club!5e0!3m2!1sid!2sid!4v1720359560772!5m2!1sid!2sid"
                        width="100%" height="100%" style="border: 0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="mt-2 flex items-center">
                    <span class="text-gray-600">Jalan Kapten Harun Kabir, Cibeureum, Bogor Regency, West Java,
                        Indonesia, Cisarua, Bogor, Jawa Barat, Indonesia</span>
                </div>
                <div class="mt-2 flex space-x-4">
                    <a href="#" class="text-blue-500 hover:underline">Lihat Peta</a>
                    <a href="#" class="text-blue-500 hover:underline">Panduan ke Lokasi</a>
                </div>
            </div>
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

    @include('landing.footer')

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