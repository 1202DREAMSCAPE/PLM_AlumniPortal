<!-- resources/views/filament/alumni/widgets/faq-widget.blade.php -->

<x-filament-widgets::widget>
    <x-filament::section>
        <h2 class="text-xl font-bold mb-4 text-amber-600 text-center">Welcome to the Alumni Portal!</h2>
        <div x-data="{ open: null }">
            @foreach ($faqs as $index => $faq)
                <div class="mb-4">
                    <button 
                        @click="open === {{ $index }} ? open = null : open = {{ $index }}"
                        class="w-full text-left flex justify-between items-center p-4 border  hover:bg-primary-600 hover:bg-opacity-10 focus:outline-none text-black font-medium rounded-lg"
                    >
                        <span>{{ $faq['question'] }}</span>
                        <span x-show="open !== {{ $index }}">&#9654;</span>
                        <span x-show="open === {{ $index }}">&#9660;</span>
                    </button>
                    <div x-show="open === {{ $index }}" x-collapse class="p-4 bg-opacity-80 border-l-4 border-primary-400 text-black rounded-lg mt-2">
                        {!! $faq['answer'] !!}
                    </div>
                </div>
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
