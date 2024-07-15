<div class="container mx-auto mt-8">
<div class="relative">
        <h1 class="text-center text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
            Place
        </h1>
        <div class="absolute top-0 right-0 mt-2 mr-2">
            <a href="{{route('all')}}"  class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
    <div class="scrollable-container flex space-x-4 p-4 bg-white rounded-lg shadow-md overflow-x-auto">
        @foreach ($penawaran as $penawaran)
            <a href="{{route('ada')}}" class="card w-64 bg-white border border-gray-200 rounded-lg shadow-md mb-8 no-underline">
                <img class="w-full h-32 object-cover rounded-t-lg" src="img/1.png" alt="Image 1">
                <div class="p-4">
                    <h5 class="text-lg font-semibold">{{ $penawaran->nama_penawaran }}</h5>
                    <p class="text-gray-600 truncate">{{ $penawaran->deskripsi }}</p>
                </div>
                <div class="px-4 pb-4">
                    <span class="text-yellow-500">★★★★☆</span>
                </div>
            </a>
        @endforeach
    </div>
</div>
