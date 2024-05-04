import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/Alumni/**/*.php',
        './resources/views/filament/alumni/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
