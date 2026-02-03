import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        '/var/www/html/geradorManaus/app/Filament/**/*.php',
        '/var/www/html/geradorManaus/resources/views/filament/**/*.blade.php',
        '/var/www/html/geradorManaus/vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Instrument Sans', 'sans-serif'],
            },
        },
    },
}
