<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex justify-center items-center relative mb-4">
            <h2 class="text-xl font-bold text-amber-600">Alumni Gallery</h2>
        </div>
        <div x-data="{
                currentIndex: 0,
                photos: @js($photos),
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
                startAutoSlide() {
                    setInterval(() => {
                        this.currentIndex = (this.currentIndex < this.photos.length - 1) ? this.currentIndex + 1 : 0;
                    }, 3000); 
                }
            }" x-init="startAutoSlide()" class="relative w-full max-w-4xl mx-auto overflow-hidden rounded-lg h-80 z-10">
            <template x-for="(photo, index) in photos" :key="index">
                <div x-show="currentIndex === index" class="absolute inset-0 w-full h-full flex items-center justify-center overflow-x-scroll" @mousedown="initPan" @mousemove="pan" @mouseup="endPan" @mouseleave="endPan">
                    <img x-show="photo.media_path" :src="photo.media_path" :alt="photo.alt" class="object-contain h-full w-full cursor-grab" :class="dragging ? 'cursor-grabbing' : ''">
                    <div class="absolute bottom-0 left-0 p-4 bg-opacity-50 bg-gray-800 text-white w-full">
                        <h3 x-text="photo.title" class="text-lg font-semibold"></h3>
                        <p x-text="photo.created_at" class="text-sm font-semibold text-center"></p>
                    </div>
                </div>
            </template>

            <button @click="currentIndex = (currentIndex > 0) ? currentIndex - 1 : photos.length - 1"
                class="absolute left-0 top-1/2 transform -translate-y-1/2 text-primary-600 font-bold px-4 py-2 rounded-full hover:bg-gray-300 hover:bg-opacity-50 focus:outline-none">
                &larr;
            </button>
            <button @click="currentIndex = (currentIndex < photos.length - 1) ? currentIndex + 1 : 0"
                class="absolute right-0 top-1/2 transform -translate-y-1/2 text-primary-600 font-bold px-4 py-2 rounded-full hover:bg-gray-300 hover:bg-opacity-50 focus:outline-none">
                &rarr;
            </button>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.2.3/dist/cdn.min.js" defer></script>
