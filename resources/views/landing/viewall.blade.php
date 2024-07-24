<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    @include('landing.nav')

    <!-- Main Content -->
    <div class="container mx-auto py-8 mt-20">
        <!-- Search Bar -->
        <div class="mb-4 flex justify-center">
            <input type="text" placeholder="Search..."
                class="border border-gray-300 px-4 py-2 rounded-full w-1/2 mr-2">
            <button class="bg-teal-500 text-white px-4 py-2 rounded-full">Cari</button>
        </div>

        <!-- Card Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <!-- Example Card -->
            @foreach ($perusahaan as $perusahaan)
                <div class="w-full p-4">
                    <a href="{{ route('lihat.perusahaan', $perusahaan->perusahaan->id) }}"
                        class="card bg-white border border-gray-200 rounded-lg shadow-md no-underline block">
                        @if ($perusahaan->logo)
                            <img class="w-full h-32 object-cover rounded-t-lg" src="{{ asset('img/'. $perusahaan->logo) }}" alt="Image 2">
                        @else
                            <img class="w-full h-32 object-cover rounded-t-lg" src="{{ asset('img/gambar_perusahaan/plain_profile.jpg') }}" alt="Image 2">
                        @endif
                        <div class="p-4">
                            <h5 class="text-lg font-semibold">{{ $perusahaan->name }}</h5>
                            <p class="text-gray-600 truncate">{{ $perusahaan->deskripsi }}</p>
                        </div>
                        <div class="px-4 pb-4">
                            <span class="text-yellow-500">★★★★☆</span>
                        </div>
                    </a>
                </div>
            @endforeach

            <!-- Duplicate the card structure for other cards -->
            <!-- ... -->

        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            <a href="#" class="px-3 py-1 bg-blue-500 text-white rounded-md">Previous</a>
            <a href="#" class="px-3 py-1 bg-blue-500 text-white rounded-md ml-2">1</a>
            <a href="#" class="px-3 py-1 bg-blue-500 text-white rounded-md ml-2">2</a>
            <a href="#" class="px-3 py-1 bg-blue-500 text-white rounded-md ml-2">Next</a>
        </div>
    </div>
</body>

</html>
