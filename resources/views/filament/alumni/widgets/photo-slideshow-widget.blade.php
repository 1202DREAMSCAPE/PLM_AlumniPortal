<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex justify-center items-center relative mb-4">
            <h2 class="text-xl font-bold text-amber-600">Alumni Gallery</h2>
            <div x-data="{ open: false, searchMonth: '', availableMonths: [] }" class="relative ml-2">
                <button @click="open = !open" class="text-primary-600 hover:text-primary-700 focus:outline-none">
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </button>
                <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg p-4 z-50">
                    <label for="search-month" class="block text-sm font-medium text-gray-700 mb-2">Select Month</label>
                    <select id="search-month" x-model="searchMonth" @change="filterPhotosByMonth" class="w-full px-4 py-2 border rounded-lg">
                        <option value="">All Months</option>
                        <template x-for="month in availableMonths" :key="month">
                            <option :value="month" x-text="month"></option>
                        </template>
                    </select>
                </div>
            </div>
        </div>
        <div x-data="{
                currentIndex: 0,
                photos: @js($photos),
                filteredPhotos: @js($photos),
                searchMonth: '',
                dragging: false,
                startX: 0,
                scrollLeft: 0,
                initPan(event) {
                    this.dragging = true;
                    this.startX = event.pageX - event.target.offsetLeft;
                    this.scrollLeft = event.target.scrollLeft;
                },
                pan(event) {
                    if (!this.dragging) return;
                    event.preventDefault();
                    const x = event.pageX - event.target.offsetLeft;
                    const walk = (x - this.startX) * 2; // Adjust scroll speed
                    event.target.scrollLeft = this.scrollLeft - walk;
                },
                endPan() {
                    this.dragging = false;
                },
                getAvailableMonths() {
                    console.log('Original photos:', this.photos);
                    const months = [...new Set(this.photos.map(photo => {
                        const date = new Date(photo.created_at);
                        const monthYear = `${date.toLocaleString('default', { month: 'long' })} ${date.getFullYear()}`;
                        console.log('Extracted month-year:', monthYear);
                        return monthYear;
                    }))];
                    console.log('Available months:', months);
                    this.availableMonths = months;
                },
                filterPhotosByMonth() {
                    console.log('Filtering photos by month:', this.searchMonth);
                    if (this.searchMonth) {
                        this.filteredPhotos = this.photos.filter(photo => {
                            const date = new Date(photo.created_at);
                            const monthYear = `${date.toLocaleString('default', { month: 'long' })} ${date.getFullYear()}`;
                            return monthYear === this.searchMonth;
                        });
                        this.currentIndex = 0;
                        if (this.filteredPhotos.length === 0) {
                            this.filteredPhotos = [{title: 'No Event', media_path: '', alt: 'No Event', created_at: 'No Photo to Show for this Month'}];
                        }
                    } else {
                        this.filteredPhotos = this.photos;
                    }
                    console.log('Filtered photos:', this.filteredPhotos);
                },
                startAutoSlide() {
                    setInterval(() => {
                        this.currentIndex = (this.currentIndex < this.filteredPhotos.length - 1) ? this.currentIndex + 1 : 0;
                    }, 3000); 
                }
            }" x-init="getAvailableMonths(); startAutoSlide()" class="relative w-full max-w-4xl mx-auto overflow-hidden rounded-lg h-80 z-10">
            <template x-for="(photo, index) in filteredPhotos" :key="index">
                <div x-show="currentIndex === index" class="absolute inset-0 w-full h-full flex items-center justify-center overflow-x-scroll" @mousedown="initPan" @mousemove="pan" @mouseup="endPan" @mouseleave="endPan">
                    <img x-show="photo.media_path" :src="photo.media_path" :alt="photo.alt" class="object-contain h-full w-full cursor-grab" :class="dragging ? 'cursor-grabbing' : ''">
                    <div x-show="!photo.media_path" class="flex items-center justify-center h-full w-full text-gray-700 text-lg">
                        No Photo to Show for this Month
                    </div>
                    <div class="absolute bottom-0 left-0 p-4 bg-opacity-50 bg-gray-800 text-white w-full">
                        <h3 x-text="photo.title" class="text-lg font-semibold"></h3>
                        <p x-text="photo.created_at" class="text-sm font-semibold text-center"></p>
                    </div>
                </div>
            </template>

            <button @click="currentIndex = (currentIndex > 0) ? currentIndex - 1 : filteredPhotos.length - 1"
                class="absolute left-0 top-1/2 transform -translate-y-1/2 text-primary-600 font-bold px-4 py-2 rounded-full hover:bg-gray-300 hover:bg-opacity-50 focus:outline-none">
                &larr;
            </button>
            <button @click="currentIndex = (currentIndex < filteredPhotos.length - 1) ? currentIndex + 1 : 0"
                class="absolute right-0 top-1/2 transform -translate-y-1/2 text-primary-600 font-bold px-4 py-2 rounded-full hover:bg-gray-300 hover:bg-opacity-50 focus:outline-none">
                &rarr;
            </button>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.2.3/dist/cdn.min.js" defer></script>
