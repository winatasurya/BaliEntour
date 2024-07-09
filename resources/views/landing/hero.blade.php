<!-- Hero Section -->
<section class="hero-bg bg-cover bg-center relative" style="background-image: url('{{ asset('img/ewdf.jpg') }}');">
    <div class="absolute inset-0 bg-gray-400 bg-opacity-10 z-10"></div> <!-- Background overlay -->
    <div class="flex items-center justify-between h-full relative z-20">
      
    <!-- Left Content -->
    <div class="text-white z-30 px-8 md:px-16 lg:px-24 xl:px-32">
      <h1 class="text-5xl md:text-6xl font-bold leading-tight mb-6">Discover Your Next Holidays In Bali</h1>
      <p class="text-lg leading-relaxed mb-8">Explore the world with us. Find the best destinations, guides, and experiences.</p>
      <a href="{{route('login')}}" class="px-8 py-4 bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-300 ease-in-out inline-block">Get Started</a>
    </div>

    <!-- Right Content (Carousel) -->
    <div id="controls-carousel" class="relative w-full z-20 md:w-2/3 hidden md:block ml-auto mr-8">
      <!-- Carousel wrapper -->
      <div class="relative h-64 md:h-96 overflow-hidden rounded-lg" data-carousel="slide">
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{ asset('img/14.jpg') }}" class="absolute block w-full h-full object-cover" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="duration-700 ease-in-out" data-carousel-item="active">
          <img src="{{ asset('img/12.jpg') }}" class="absolute block w-full h-full object-cover" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{ asset('img/spa.jpg') }}" class="absolute block w-full h-full object-cover" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{ asset('img/res1.jpg') }}" class="absolute block w-full h-full object-cover" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{ asset('img/bar.jpg') }}" class="absolute block w-full h-full object-cover" alt="...">
      </div>
      <!-- Slider controls -->
      <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
          </svg>
          <span class="sr-only">Previous</span>
        </span>
      </button>
      <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="sr-only">Next</span>
        </span>
      </button>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.getElementById('controls-carousel');
    const items = carousel.querySelectorAll('[data-carousel-item]');
    const prevButton = carousel.querySelector('[data-carousel-prev]');
    const nextButton = carousel.querySelector('[data-carousel-next]');
    
    let activeIndex = 0;

    const updateCarousel = () => {
        items.forEach((item, index) => {
            if (index === activeIndex) {
                item.classList.remove('hidden');
                item.classList.add('block');
            } else {
                item.classList.remove('block');
                item.classList.add('hidden');
            }
        });
    };

    prevButton.addEventListener('click', () => {
        activeIndex = (activeIndex === 0) ? items.length - 1 : activeIndex - 1;
        updateCarousel();
    });

    nextButton.addEventListener('click', () => {
        activeIndex = (activeIndex === items.length - 1) ? 0 : activeIndex + 1;
        updateCarousel();
    });

    updateCarousel(); // Initialize carousel
});
</script>