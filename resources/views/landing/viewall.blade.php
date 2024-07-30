<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @include('layout.header')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Tambahkan gaya CSS sesuai kebutuhan Anda */
    </style>
</head>

<body class="bg-gray-100">
    @include('landing.nav')

    <!-- Main Content -->
    <div class="container mx-auto py-8 mt-20">
        {{-- Search and Filter bar --}}
        <div class="mb-4 flex justify-center">
            <form action="{{ route('allplace') }}" method="GET" class="flex w-1/2">
                <input type="text" name="search" placeholder="Search..." value="{{ $search ?? '' }}"
                    class="border border-gray-300 px-4 py-2 rounded-full w-full mr-2">
                <select name="bidang" class="border border-gray-300 px-4 py-2 rounded-full mr-2">
                    <option value="">All Fields</option>
                    @foreach ($bidangs as $bidangItem)
                        <option value="{{ $bidangItem->bidang }}"
                            {{ $bidang == $bidangItem->bidang ? 'selected' : '' }}>{{ $bidangItem->bidang }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-full">Cari</button>
            </form>
        </div>
        <!-- Card Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($perusahaan as $perusahaanItem)
                <div class="w-full p-4">
                    <a href="{{ route('lihat.perusahaan', $perusahaanItem->perusahaan->id) }}"
                        class="card bg-white border border-gray-200 rounded-lg shadow-md no-underline block">
                        @if ($perusahaanItem->perusahaan->logo)
                            <img class="w-full h-32 object-cover rounded-t-lg"
                                src="{{ asset('img/' . $perusahaanItem->perusahaan->logo) }}" alt="Image 2">
                        @else
                            <img class="w-full h-32 object-cover rounded-t-lg"
                                src="{{ asset('img/gambar_perusahaan/plain_profile.jpg') }}" alt="Image 2">
                        @endif
                        <div class="p-4">
                            <h5 class="text-lg font-semibold">{{ $perusahaanItem->name }}</h5>
                            <p class="text-gray-600 truncate">{{ $perusahaanItem->perusahaan->deskripsi }}</p>
                        </div>
                        <div class="px-4 pb-4">
                            @php
                                $rating = $perusahaanItem->perusahaan->rating;
                                $rate = $rating->count() > 0 ? $rating->avg('nilai') : 0;
                            @endphp
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
                    </a>
                </div>
            @endforeach
        </div>
        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            @if ($perusahaan->hasPages())
                {{-- Previous Page Link --}}
                @if ($perusahaan->onFirstPage())
                    <span class="px-3 py-1 bg-gray-300 text-white rounded-md">Previous</span>
                @else
                    <a href="{{ $perusahaan->previousPageUrl() }}"
                        class="px-3 py-1 bg-blue-500 text-white rounded-md">Previous</a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($perusahaan->getUrlRange(1, $perusahaan->lastPage()) as $page => $url)
                    @if ($page == $perusahaan->currentPage())
                        <span class="px-3 py-1 bg-blue-500 text-white rounded-md ml-2">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}"
                            class="px-3 py-1 bg-blue-500 text-white rounded-md ml-2">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($perusahaan->hasMorePages())
                    <a href="{{ $perusahaan->nextPageUrl() }}"
                        class="px-3 py-1 bg-blue-500 text-white rounded-md ml-2">Next</a>
                @else
                    <span class="px-3 py-1 bg-gray-300 text-white rounded-md ml-2">Next</span>
                @endif
            @endif
        </div>
    </div>
</body>

</html>
