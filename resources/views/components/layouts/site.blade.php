<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Geradores Manaus' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html { scroll-behavior: smooth; }
        .header-sticky { position: sticky; top: 0; z-index: 50; transition: all 0.3s ease; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border-bottom: 1px solid rgba(255, 255, 255, 0.2); }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">

    <header class="header-sticky glass">
        <!-- Primeira barra: Contato e redes sociais -->
        <div class="bg-black/90 backdrop-blur-sm text-white px-8 py-2 flex justify-between items-center text-xs md:text-sm">
            <div class="flex gap-4 items-center flex-wrap">
                <a href="tel:+5592993914237" class="hover:text-pink-400 flex items-center gap-1 transition-colors">
                    <i class="fas fa-phone"></i> (92) 99391-4237
                </a>
                <a href="https://wa.me/5592993914237" class="hover:text-green-400 flex items-center gap-1 font-bold transition-colors">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
            </div>
            <div class="flex gap-4 items-center">
                <a href="https://www.instagram.com/geradoresmanaus_/" target="_blank" class="hover:text-pink-600 transition"><i class="fab fa-instagram text-base"></i></a>
                <a href="https://www.facebook.com/profile.php?id=61569206324847" target="_blank" class="hover:text-blue-600 transition"><i class="fab fa-facebook text-base"></i></a>
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-red-400 transition ml-2" title="Sair">
                            <i class="fas fa-sign-out-alt text-xs opacity-50"></i>
                        </button>
                    </form>
                @else
                    <a href="{{ route('financeiro') }}" class="hover:text-gray-400 transition ml-2" title="Financeiro">
                        <i class="fas fa-lock text-xs opacity-50"></i>
                    </a>
                @endauth
            </div>
        </div>

        <nav class="px-4 md:px-8 py-4 flex justify-between items-center relative">
            <div>
                <a href="/" class="block hover:scale-105 transition-transform">
                    <img src="{{ asset('images/LOGO.svg') }}" alt="Logo" class="h-10 md:h-12">
                </a>
            </div>
            <ul class="hidden md:flex gap-8 items-center text-gray-800 font-semibold uppercase tracking-tight text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-[#e60084] transition-colors">Home</a></li>
                @auth
                    <li><a href="{{ route('financeiro') }}" class="text-[#e60084] transition-colors">Financeiro</a></li>
                @endauth
                <li><a href="{{ route('home') }}#contact" class="bg-[#e60084] text-white px-6 py-2.5 rounded-full hover:bg-pink-700 transition-all">Contato</a></li>
            </ul>
        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-black text-white py-12">
        <div class="container mx-auto px-4 grid md:grid-cols-3 gap-10 text-center md:text-left">
            <div>
                <img src="{{ asset('images/LOGO.svg') }}" alt="Logo" class="h-10 mb-6 brightness-0 invert mx-auto md:mx-0">
                <p class="text-gray-400 text-sm leading-relaxed">
                    Referência em soluções energéticas em Manaus.
                </p>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-lg">Links Rápidos</h4>
                <ul class="text-gray-400 text-sm space-y-3">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                    <li><a href="{{ route('financeiro') }}" class="hover:text-white transition">Financeiro</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-lg">Contato</h4>
                <ul class="text-gray-400 text-sm space-y-3">
                    <li><i class="fas fa-phone mr-2"></i> (92) 99391-4237</li>
                    <li><i class="fas fa-map-marker-alt mr-2"></i> Manaus, Amazonas</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500 text-xs">
            © {{ date('Y') }} Grupo Tesla Eventos. Todos os direitos reservados.
        </div>
    </footer>

    @fluxScripts
</body>
</html>
