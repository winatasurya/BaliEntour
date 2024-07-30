<div class="container mx-auto mt-8" id="place">
    <div class="relative">
        <h1 class="text-center text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
            Place
        </h1>
        <div class="absolute top-0 right-0 mt-2 mr-2">
            <a href="{{ route('place') }}" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
    <div class="scrollable-container flex space-x-4 p-4 bg-white rounded-lg shadow-md overflow-x-auto">
        @foreach ($perusahaan as $perusahaan)
            <a href="{{ route('lihat.perusahaan', $perusahaan->perusahaan->id) }}" class="card w-64 bg-white border border-gray-200 rounded-lg shadow-md mb-8 no-underline">
                @if ($perusahaan->perusahaan->logo)
                    <img class="w-full h-32 object-cover rounded-t-lg" src="{{ asset('img/' . $perusahaan->perusahaan->logo) }}" alt="Image 1">
                @else
                    <img class="w-full h-32 object-cover rounded-t-lg" src="{{ asset('img/gambar_perusahaan/plain_profile.jpg') }}" alt="Image 1">
                @endif
                <div class="p-4">
                    <h5 class="text-lg font-semibold">{{ $perusahaan->name }}</h5>
                    <p class="text-gray-600 truncate">{{ $perusahaan->perusahaan->deskripsi }}</p>
                </div>
                <div class="px-4 pb-4">
                    @php
                        $rating = $perusahaan->perusahaan->rating;
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
        @endforeach
    </div>
</div>
