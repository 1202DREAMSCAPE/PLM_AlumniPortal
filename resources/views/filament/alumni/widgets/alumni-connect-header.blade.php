
<!-- resources/views/filament/alumni/widgets/alumni-connect-header.blade.php -->

<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center space-x-2">
            <h2 class="text-xl font-bold">Connect with Other Alumni</h2>
            <div x-data="{ open: false }" class="relative">
                <button @mouseover="open = true" @mouseleave="open = false" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a7 7 0 100 14A7 7 0 109 2zm0 12a5 5 0 110-10 5 5 0 010 10zm.75-9a.75.75 0 00-1.5 0v4a.75.75 0 001.5 0V7.5h2a.75.75 0 000-1.5h-2V5z" />
                    </svg>
                </button>
                <div x-show="open" class="absolute z-10 p-2 text-sm text-gray-700 bg-white border border-gray-300 rounded shadow-md">
                    <p>Connect with other alumni and expand your network!</p>
                    <p>You can click on the email address to send an email or copy the contact number to call or text the alumni.</p>
                </div>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
