<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- SEO Otimizado -->
    <title>TE Geradores Manaus | Locação e Venda de Geradores em Manaus - AM</title>
    <meta name="description" content="Locação e venda de geradores de energia em Manaus. De 15 a 500 kVA para eventos, empresas e indústrias. Atendimento 24h. Solicite seu orçamento!">
    <meta name="keywords" content="geradores em manaus, locação de geradores, aluguel de gerador, gerador para eventos, gerador industrial manaus, TE geradores">
    <meta name="author" content="TE Geradores Manaus">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="TE Geradores Manaus | Locação e Venda de Geradores">
    <meta property="og:description" content="Especialistas em soluções energéticas: Venda, locação e consultoria de geradores a diesel de 15 a 500kVA em Manaus e região.">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    
    <!-- Favicon -->
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon-32x32.png" type="image/png">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    
    <!-- Canonical -->
    <link rel="canonical" href="{{ url('/') }}">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Swiper.js Carousel -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand': '#e60084',
                        'brand-dark': '#c70073',
                    },
                    fontFamily: {
                        'sans': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WNDK9HNN');</script>
    
    <!-- Schema.org LocalBusiness -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "LocalBusiness",
        "name": "TE Geradores Manaus",
        "image": "{{ asset('images/LOGO.svg') }}",
        "telephone": "+55-92-99391-4237",
        "email": "contato@@geradormanaus.com.br",
        "address": {
            "@@type": "PostalAddress",
            "streetAddress": "Rua Rio Eiru, 95, sala 20/2º Pav, CD SPACE CENTER",
            "addressLocality": "Manaus",
            "addressRegion": "AM",
            "postalCode": "69053-000",
            "addressCountry": "BR"
        },
        "geo": {
            "@@type": "GeoCoordinates",
            "latitude": -3.1190275,
            "longitude": -60.0217314
        },
        "url": "{{ url('/') }}",
        "priceRange": "$$",
        "openingHours": "Mo-Sa 08:00-18:00",
        "sameAs": [
            "https://www.instagram.com/teslaeventos_/",
            "https://www.facebook.com/profile.php?id=61569206324847"
        ]
    }
    </script>
    
    <style>
        html { scroll-behavior: smooth; }
        .gradient-brand { background: linear-gradient(135deg, #e60084 0%, #ff4da6 100%); }
        .text-gradient { background: linear-gradient(135deg, #e60084 0%, #ff4da6 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .glass { background: rgba(255,255,255,0.9); backdrop-filter: blur(10px); }
        .hero-gradient { background: linear-gradient(135deg, rgba(230,0,132,0.9) 0%, rgba(200,0,100,0.95) 100%); }
        
        /* Portfolio Cards - Menos visíveis por vez */
        .portfolio-swiper {
            padding-bottom: 100px !important;
            overflow: hidden !important;
        }
        .portfolio-swiper .swiper-slide {
            width: 320px;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 0.4;
            filter: blur(2px);
        }
        @media (min-width: 768px) {
            .portfolio-swiper .swiper-slide {
                width: 450px;
            }
        }
        .portfolio-swiper .swiper-slide-active {
            opacity: 1;
            filter: blur(0);
            transform: scale(1.05);
        }
        .portfolio-swiper .swiper-slide-prev,
        .portfolio-swiper .swiper-slide-next {
            opacity: 0.7;
            filter: blur(0);
        }
        
        /* Card com Reflexo/Espelhamento */
        .card-reflect {
            position: relative;
            border-radius: 1.25rem;
            overflow: visible;
        }
        .card-reflect::after {
            content: '';
            position: absolute;
            bottom: -70px;
            left: 10%;
            right: 10%;
            height: 60px;
            background: linear-gradient(to bottom, rgba(230,0,132,0.3), transparent);
            filter: blur(12px);
            border-radius: 50%;
            transform: scaleY(0.25);
        }
        .card-inner {
            border-radius: 1.25rem;
            overflow: hidden;
            box-shadow: 0 30px 60px -15px rgba(230, 0, 132, 0.3), 0 15px 30px -10px rgba(0,0,0,0.15);
            transition: all 0.4s ease;
        }
        .card-inner:hover {
            box-shadow: 0 40px 80px -20px rgba(230, 0, 132, 0.4), 0 20px 40px -15px rgba(0,0,0,0.2);
        }
        
        /* Sombras 3D mais dramáticas */
        .swiper-slide-shadow-left,
        .swiper-slide-shadow-right {
            background: linear-gradient(to left, rgba(0,0,0,0.4), transparent) !important;
            border-radius: 1.25rem;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans antialiased">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WNDK9HNN" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <!-- ========== HEADER FIXO ========== -->
    <header id="header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <!-- Barra Superior - Contato Rápido -->
        <div class="bg-gray-900 text-white text-sm py-2 hidden md:block">
            <div class="container mx-auto px-4 flex justify-between items-center">
                <div class="flex items-center gap-6">
                    <a href="https://wa.me/5592993914237?text=Olá!%20Vim%20do%20site%20e%20gostaria%20de%20mais%20informações." class="flex items-center gap-2 hover:text-brand transition-colors">
                        <i class="fab fa-whatsapp text-green-400"></i>
                        <span class="font-semibold">(92) 99391-4237</span>
                    </a>
                    <a href="https://maps.app.goo.gl/9GRMWWw2C3GaxuLy6" class="flex items-center gap-2 hover:text-brand transition-colors">
                        <i class="fas fa-map-marker-alt text-brand"></i>
                        <span>Manaus - AM</span>
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    <a href="https://www.instagram.com/teslaeventos_/" target="_blank" class="hover:text-brand transition-colors"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=61569206324847" target="_blank" class="hover:text-brand transition-colors"><i class="fab fa-facebook"></i></a>
                    <a href="{{ route('filament.admin.auth.login') }}" class="opacity-30 hover:opacity-100 transition-opacity" title="Acesso Administrativo"><i class="fas fa-lock text-xs"></i></a>
                </div>
            </div>
        </div>
        
        <!-- Navbar Principal -->
        <nav id="navbar" class="bg-white shadow-md transition-all duration-300">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center h-16 md:h-20">
                    <!-- Logo -->
                    <a href="/" class="flex items-center">
                        <img src="{{ asset('images/LOGO.svg') }}" alt="TE Geradores Manaus" class="h-10 md:h-12">
                    </a>

                    <!-- Menu Desktop -->
                    <div class="hidden md:flex items-center gap-8">
                        <a href="#servicos" class="text-gray-700 hover:text-brand font-semibold transition-colors">Serviços</a>
                        <a href="#sobre" class="text-gray-700 hover:text-brand font-semibold transition-colors">Sobre Nós</a>
                        <a href="#portfolio" class="text-gray-700 hover:text-brand font-semibold transition-colors">Portfólio</a>
                        <a href="#diferenciais" class="text-gray-700 hover:text-brand font-semibold transition-colors">Diferenciais</a>
                        <a href="#depoimentos" class="text-gray-700 hover:text-brand font-semibold transition-colors">Depoimentos</a>
                        <a href="https://wa.me/5592993914237?text=Olá!%20Vim%20do%20site%20e%20gostaria%20de%20um%20orçamento." 
                           class="bg-brand hover:bg-brand-dark text-white font-bold px-6 py-3 rounded-full transition-all transform hover:scale-105 shadow-lg shadow-pink-500/30 flex items-center gap-2">
                            <i class="fab fa-whatsapp"></i> Orçamento Grátis
                        </a>
                    </div>

                    <!-- Menu Mobile Toggle -->
                    <button id="mobile-menu-btn" class="md:hidden p-2 text-gray-700">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Menu Mobile -->
            <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
                <div class="container mx-auto px-4 py-4 flex flex-col gap-4">
                    <a href="#servicos" class="text-gray-700 font-semibold py-2 border-b border-gray-100">Serviços</a>
                    <a href="#sobre" class="text-gray-700 font-semibold py-2 border-b border-gray-100">Sobre Nós</a>
                    <a href="#portfolio" class="text-gray-700 font-semibold py-2 border-b border-gray-100">Portfólio</a>
                    <a href="#diferenciais" class="text-gray-700 font-semibold py-2 border-b border-gray-100">Diferenciais</a>
                    <a href="#depoimentos" class="text-gray-700 font-semibold py-2 border-b border-gray-100">Depoimentos</a>
                    <a href="https://wa.me/5592993914237?text=Olá!%20Vim%20do%20site%20e%20gostaria%20de%20um%20orçamento." 
                       class="bg-brand text-white font-bold px-6 py-4 rounded-xl text-center flex items-center justify-center gap-2">
                        <i class="fab fa-whatsapp"></i> Solicitar Orçamento
                    </a>
                    <!-- Contato Mobile -->
                    <div class="flex items-center justify-center gap-4 pt-4 border-t border-gray-100">
                        <a href="tel:+5592993914237" class="text-brand font-bold"><i class="fas fa-phone mr-2"></i>(92) 99391-4237</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Spacer para Header Fixo -->
    <div class="h-16 md:h-28"></div>

    <!-- ========== HERO SECTION ========== -->
    <section class="relative min-h-[90vh] md:min-h-[80vh] flex items-center overflow-hidden">
        <!-- Vídeo de Fundo -->
        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
            <source src="{{ asset('videos/background3.mp4') }}" type="video/mp4">
        </video>
        
        <!-- Overlay Gradiente -->
        <div class="absolute inset-0 hero-gradient"></div>
        
        <!-- Conteúdo -->
        <div class="container mx-auto px-4 relative z-10 py-16">
            <div class="max-w-3xl" data-aos="fade-up">
                <span class="inline-block bg-white/20 backdrop-blur-sm text-white text-sm font-bold px-4 py-2 rounded-full mb-6">
                    🏆 +5 anos de experiência em Manaus
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white leading-tight mb-6">
                    Soluções em <span class="text-yellow-300">Energia</span> para sua Empresa ou Evento
                </h1>
                <p class="text-lg md:text-xl text-white/90 mb-8 leading-relaxed">
                    Locação, venda e manutenção de geradores de <strong>15 a 500 kVA</strong>. 
                    Atendimento 24h em toda Manaus e região metropolitana.
                </p>
                
                <!-- CTAs -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="https://wa.me/5592993914237?text=Olá!%20Vim%20do%20site%20e%20preciso%20de%20um%20orçamento%20urgente!" 
                       class="bg-green-500 hover:bg-green-600 text-white font-bold px-8 py-4 rounded-full transition-all transform hover:scale-105 shadow-2xl flex items-center justify-center gap-3 text-lg">
                        <i class="fab fa-whatsapp text-2xl"></i> Orçamento pelo WhatsApp
                    </a>
                    <a href="tel:+5592993914237" 
                       class="bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white font-bold px-8 py-4 rounded-full transition-all border-2 border-white/40 flex items-center justify-center gap-3">
                        <i class="fas fa-phone"></i> Ligar Agora
                    </a>
                </div>
                
                <!-- Trust Badges -->
                <div class="flex flex-wrap items-center gap-6 mt-10 text-white/80 text-sm">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-check-circle text-green-400"></i>
                        <span>Entrega Imediata</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-check-circle text-green-400"></i>
                        <span>Suporte 24h</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-check-circle text-green-400"></i>
                        <span>Técnicos Especializados</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== SERVIÇOS ========== -->
    <section id="servicos" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-brand font-bold uppercase tracking-widest text-sm">O que fazemos</span>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mt-2">Nossos Serviços</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Serviço 1 -->
                <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-brand hover:shadow-2xl transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-brand/10 group-hover:bg-white/20 rounded-2xl flex items-center justify-center mb-6 transition-all">
                        <img src="{{ asset('images/gerador_icon.svg') }}" alt="Geradores" class="h-8">
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-white mb-3 transition-colors">Geradores Elétricos</h3>
                    <p class="text-gray-600 group-hover:text-white/80 transition-colors">
                        Locação, venda e manutenção de geradores de 15 kVA a 500 kVA para eventos, empresas e indústrias.
                    </p>
                </div>
                
                <!-- Serviço 2 -->
                <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-brand hover:shadow-2xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-brand/10 group-hover:bg-white/20 rounded-2xl flex items-center justify-center mb-6 transition-all">
                        <img src="{{ asset('images/tecnica.svg') }}" alt="Equipe Técnica" class="h-8">
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-white mb-3 transition-colors">Equipe Especializada</h3>
                    <p class="text-gray-600 group-hover:text-white/80 transition-colors">
                        Profissionais experientes prontos para instalação, operação e suporte técnico em tempo real.
                    </p>
                </div>
                
                <!-- Serviço 3 -->
                <div class="group p-8 bg-gray-50 rounded-2xl hover:bg-brand hover:shadow-2xl transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-brand/10 group-hover:bg-white/20 rounded-2xl flex items-center justify-center mb-6 transition-all">
                        <img src="{{ asset('images/consultoria.svg') }}" alt="Consultoria" class="h-8">
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-white mb-3 transition-colors">Consultoria Técnica</h3>
                    <p class="text-gray-600 group-hover:text-white/80 transition-colors">
                        Análise de carga, dimensionamento e planejamento personalizado para seu projeto.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== SOBRE NÓS ========== -->
    <section id="sobre" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <img src="{{ asset('images/foto1.jpeg') }}" alt="Equipe TE Geradores Manaus" class="rounded-2xl shadow-2xl w-full">
                </div>
                <div data-aos="fade-left">
                    <span class="text-brand font-bold uppercase tracking-widest text-sm">Sobre a empresa</span>
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 mt-2 mb-6">Quem Somos</h2>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        A <strong class="text-brand">TE Geradores Manaus</strong> atua desde 2018 como referência em soluções 
                        energéticas no Amazonas. Oferecemos locação, venda e manutenção de geradores com potências de 
                        <strong>15 kVA a 500 kVA</strong>.
                    </p>
                    <p class="text-gray-600 leading-relaxed mb-8">
                        Nossa missão é garantir que seu projeto, evento ou empresa nunca fique no escuro. 
                        Contamos com equipamentos modernos, manutenção preventiva e suporte técnico 24 horas.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-brand/10 rounded-xl flex items-center justify-center">
                                <i class="fas fa-award text-brand text-xl"></i>
                            </div>
                            <div>
                                <span class="block text-2xl font-black text-gray-900">+5</span>
                                <span class="text-sm text-gray-500">Anos de Experiência</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-brand/10 rounded-xl flex items-center justify-center">
                                <i class="fas fa-users text-brand text-xl"></i>
                            </div>
                            <div>
                                <span class="block text-2xl font-black text-gray-900">+500</span>
                                <span class="text-sm text-gray-500">Clientes Atendidos</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== CTA BANNER ========== -->
    <section class="gradient-brand py-16">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Energia Confiável para Seus Projetos</h2>
                    <p class="text-white/90 text-lg leading-relaxed mb-6">
                        Trabalhamos com equipamentos modernos e suporte dedicado 24h. 
                        Estamos prontos para garantir que seu projeto nunca fique no escuro.
                    </p>
                    <a href="https://wa.me/5592993914237?text=Olá!%20Preciso%20de%20um%20gerador%20para%20meu%20projeto." 
                       class="inline-flex items-center gap-3 bg-white text-brand font-bold px-8 py-4 rounded-full hover:bg-gray-100 transition-all shadow-xl">
                        <i class="fab fa-whatsapp text-xl"></i> Fale com um Especialista
                    </a>
                </div>
                <div data-aos="fade-left">
                    <img src="{{ asset('images/foto4.jpeg') }}" alt="Gerador em operação" class="rounded-2xl shadow-2xl w-full max-w-md mx-auto">
                </div>
            </div>
        </div>
    </section>

    <!-- ========== DIFERENCIAIS ========== -->
    <section id="diferenciais" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-brand font-bold uppercase tracking-widest text-sm">Por que nos escolher</span>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mt-2">Nossos Diferenciais</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-20 h-20 bg-brand/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <img src="{{ asset('images/experiencia.svg') }}" alt="Experiência" class="h-10">
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Experiência Local</h3>
                    <p class="text-gray-600">Mais de 5 anos atuando no Amazonas com amplo conhecimento técnico e logístico da região.</p>
                </div>
                
                <div class="text-center p-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-20 h-20 bg-brand/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <img src="{{ asset('images/suporte.svg') }}" alt="Suporte 24h" class="h-10">
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Atendimento 24h</h3>
                    <p class="text-gray-600">Suporte técnico em tempo real para emergências, com atendimento ágil e presencial.</p>
                </div>
                
                <div class="text-center p-8" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-20 h-20 bg-brand/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <img src="{{ asset('images/compromisso.svg') }}" alt="Compromisso" class="h-10">
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Compromisso Total</h3>
                    <p class="text-gray-600">Transparência, agilidade e soluções sob medida para a melhor experiência do cliente.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== DEPOIMENTOS ========== -->
    <section id="depoimentos" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-brand font-bold uppercase tracking-widest text-sm">Prova social</span>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mt-2">O que Nossos Clientes Dizem</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Depoimento 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center gap-1 mb-4">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6">"Excelente atendimento! O gerador chegou no prazo e a equipe técnica foi super profissional. Recomendo para qualquer evento."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-brand/10 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-brand"></i>
                        </div>
                        <div>
                            <span class="block font-bold text-gray-900">Carlos Eduardo</span>
                            <span class="text-sm text-gray-500">Produtor de Eventos</span>
                        </div>
                    </div>
                </div>
                
                <!-- Depoimento 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center gap-1 mb-4">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6">"Salvaram nossa empresa em uma emergência. O suporte 24h realmente funciona. Agora somos clientes fixos!"</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-brand/10 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-brand"></i>
                        </div>
                        <div>
                            <span class="block font-bold text-gray-900">Marina Santos</span>
                            <span class="text-sm text-gray-500">Gerente Industrial</span>
                        </div>
                    </div>
                </div>
                
                <!-- Depoimento 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center gap-1 mb-4">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6">"Preço justo, equipamento de qualidade e profissionais competentes. A melhor empresa de geradores de Manaus!"</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-brand/10 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-brand"></i>
                        </div>
                        <div>
                            <span class="block font-bold text-gray-900">Roberto Lima</span>
                            <span class="text-sm text-gray-500">Construtor Civil</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== PORTFÓLIO PREMIUM ========== -->
    <section id="portfolio" class="py-24 bg-gradient-to-b from-gray-50 via-white to-gray-100 overflow-visible">
        <div class="container mx-auto px-4">
            <div class="text-center mb-20" data-aos="fade-up">
                <span class="text-brand font-bold uppercase tracking-widest text-sm">Nosso Trabalho</span>
                <h2 class="text-3xl md:text-5xl font-black text-gray-900 mt-3">Portfólio de Projetos</h2>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto text-lg">
                    Confira alguns dos nossos projetos em eventos, indústrias e obras por toda a região de Manaus
                </p>
            </div>
        </div>
        
        <!-- Swiper Carousel Full Width -->
        <div class="swiper portfolio-swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                <!-- Fotos do Portfólio -->
                @php
                    $portfolioItems = [
                        ['type' => 'image', 'src' => 'foto1.jpeg', 'title' => 'Gerador em Evento Corporativo'],
                        ['type' => 'image', 'src' => 'foto2.jpeg', 'title' => 'Instalação Industrial'],
                        ['type' => 'image', 'src' => 'foto3.jpeg', 'title' => 'Suporte Técnico 24h'],
                        ['type' => 'video', 'src' => 'video200.mp4', 'title' => 'Operação em Campo'],
                        ['type' => 'image', 'src' => 'foto4.jpeg', 'title' => 'Equipe Especializada'],
                        ['type' => 'image', 'src' => 'foto5.jpeg', 'title' => 'Gerador 150kVA'],
                        ['type' => 'image', 'src' => 'foto6.jpeg', 'title' => 'Instalação em Obra'],
                        ['type' => 'video', 'src' => 'video201.mp4', 'title' => 'Transporte e Logística'],
                        ['type' => 'image', 'src' => 'foto7.jpeg', 'title' => 'Manutenção Preventiva'],
                        ['type' => 'image', 'src' => 'foto8.jpeg', 'title' => 'Evento ao Ar Livre'],
                        ['type' => 'image', 'src' => 'foto9.jpeg', 'title' => 'Estrutura Completa'],
                        ['type' => 'image', 'src' => 'foto10.jpeg', 'title' => 'Atendimento VIP'],
                        ['type' => 'image', 'src' => 'foto11.jpeg', 'title' => 'Gerador de Alta Potência'],
                        ['type' => 'image', 'src' => 'foto12.jpeg', 'title' => 'Instalação Rápida'],
                        ['type' => 'image', 'src' => 'foto13.jpeg', 'title' => 'Suporte Técnico'],
                        ['type' => 'image', 'src' => 'foto14.jpeg', 'title' => 'Monitoramento Remoto'],
                        ['type' => 'image', 'src' => 'foto15.jpeg', 'title' => 'Evento Cultural'],
                        ['type' => 'image', 'src' => 'foto16.jpeg', 'title' => 'Parceria Industrial'],
                    ];
                @endphp
                
                @foreach($portfolioItems as $item)
                <div class="swiper-slide">
                    <div class="card-reflect">
                        <div class="card-inner group cursor-pointer"
                             @if($item['type'] === 'image')
                             onclick="openLightbox('{{ asset('images/' . $item['src']) }}', 'image', '{{ $item['title'] }}')"
                             @else
                             onclick="openLightbox('{{ asset('videos/' . $item['src']) }}', 'video', '{{ $item['title'] }}')"
                             @endif
                        >
                        @if($item['type'] === 'image')
                        <img src="{{ asset('images/' . $item['src']) }}" 
                             alt="{{ $item['title'] }}" 
                             class="w-full h-72 md:h-80 object-cover transition-transform duration-500 group-hover:scale-110">
                        @else
                        <div class="relative">
                            <video class="w-full h-72 md:h-80 object-cover" muted>
                                <source src="{{ asset('videos/' . $item['src']) }}" type="video/mp4">
                            </video>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-16 h-16 bg-brand/90 rounded-full flex items-center justify-center shadow-2xl group-hover:scale-110 transition-transform">
                                    <i class="fas fa-play text-white text-xl ml-1"></i>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <!-- Title -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <h4 class="text-white font-bold text-lg">{{ $item['title'] }}</h4>
                            <span class="text-brand text-sm flex items-center gap-2 mt-1">
                                @if($item['type'] === 'video')
                                <i class="fas fa-video"></i> Ver Vídeo
                                @else
                                <i class="fas fa-expand"></i> Ampliar
                                @endif
                            </span>
                        </div>
                        
                        <!-- Type Badge -->
                        @if($item['type'] === 'video')
                        <div class="absolute top-4 right-4 bg-brand text-white text-xs font-bold px-3 py-1 rounded-full">
                            <i class="fas fa-video mr-1"></i> VÍDEO
                        </div>
                        @endif
                        </div> <!-- /card-inner -->
                    </div> <!-- /card-reflect -->
                </div>
                @endforeach
            </div>
            
            <!-- Navigation Arrows -->
            <div class="swiper-button-prev !text-white !bg-brand/80 !w-12 !h-12 !rounded-full after:!text-sm hover:!bg-brand transition-colors"></div>
            <div class="swiper-button-next !text-white !bg-brand/80 !w-12 !h-12 !rounded-full after:!text-sm hover:!bg-brand transition-colors"></div>
        </div>
        
        <!-- Pagination -->
        <div class="swiper-pagination-portfolio mt-8"></div>
        
        <!-- CTA dentro do Portfólio -->
        <div class="container mx-auto px-4 mt-12 text-center" data-aos="fade-up" data-aos-delay="200">
            <a href="https://wa.me/5592993914237?text=Olá!%20Vi%20o%20portfólio%20e%20gostaria%20de%20um%20orçamento." 
               class="inline-flex items-center gap-3 bg-brand hover:bg-brand-dark text-white font-bold px-8 py-4 rounded-full transition-all shadow-lg shadow-pink-500/30">
                <i class="fab fa-whatsapp text-xl"></i> Solicitar Orçamento
            </a>
        </div>
    </section>

    <!-- ========== LIGHTBOX MODAL ========== -->
    <div id="lightbox-modal" class="fixed inset-0 z-[100] hidden bg-black/95 backdrop-blur-sm" onclick="closeLightbox(event)">
        <button onclick="closeLightbox()" class="absolute top-4 right-4 z-10 w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center text-white transition-colors">
            <i class="fas fa-times text-2xl"></i>
        </button>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div id="lightbox-content" class="max-w-5xl max-h-[90vh] w-full" onclick="event.stopPropagation()">
                <!-- Content será inserido via JS -->
            </div>
        </div>
        <div id="lightbox-title" class="absolute bottom-8 left-0 right-0 text-center text-white font-bold text-xl"></div>
    </div>

    <!-- ========== CTA FINAL ========== -->
    <section class="gradient-brand py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-4" data-aos="fade-up">Pronto para Potencializar seu Projeto?</h2>
            <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Entre em contato agora e receba um orçamento personalizado em minutos. 
                Nossa equipe está pronta para atender você!
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="200">
                <a href="https://wa.me/5592993914237?text=Olá!%20Gostaria%20de%20solicitar%20um%20orçamento." 
                   class="bg-green-500 hover:bg-green-600 text-white font-bold px-10 py-5 rounded-full transition-all transform hover:scale-105 shadow-2xl flex items-center justify-center gap-3 text-lg">
                    <i class="fab fa-whatsapp text-2xl"></i> Orçamento via WhatsApp
                </a>
                <a href="tel:+5592993914237" 
                   class="bg-white/20 hover:bg-white/30 text-white font-bold px-10 py-5 rounded-full transition-all border-2 border-white/40 flex items-center justify-center gap-3">
                    <i class="fas fa-phone"></i> (92) 99391-4237
                </a>
            </div>
        </div>
    </section>

    <!-- ========== FOOTER ========== -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- Logo & Descrição -->
                <div class="md:col-span-2">
                    <img src="{{ asset('images/LOGO.svg') }}" alt="TE Geradores" class="h-10 mb-4 brightness-0 invert">
                    <p class="text-gray-400 leading-relaxed mb-4">
                        Especialistas em locação e venda de geradores de energia em Manaus. 
                        De 15 a 500 kVA para eventos, empresas e indústrias.
                    </p>
                    <div class="flex gap-4">
                        <a href="https://www.instagram.com/teslaeventos_/" target="_blank" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-brand transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com/profile.php?id=61569206324847" target="_blank" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-brand transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://wa.me/5592993914237" target="_blank" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-green-500 transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Links Rápidos -->
                <div>
                    <h4 class="font-bold text-lg mb-4">Links Rápidos</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#servicos" class="hover:text-brand transition-colors">Serviços</a></li>
                        <li><a href="#sobre" class="hover:text-brand transition-colors">Sobre Nós</a></li>
                        <li><a href="#diferenciais" class="hover:text-brand transition-colors">Diferenciais</a></li>
                        <li><a href="#depoimentos" class="hover:text-brand transition-colors">Depoimentos</a></li>
                    </ul>
                </div>
                
                <!-- Contato -->
                <div>
                    <h4 class="font-bold text-lg mb-4">Contato</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li class="flex items-start gap-3">
                            <i class="fab fa-whatsapp text-green-400 mt-1"></i>
                            <span>(92) 99391-4237</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-brand mt-1"></i>
                            <span>Rua Rio Eiru, 95, sala 20<br>CD SPACE CENTER - Manaus/AM</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-clock text-brand mt-1"></i>
                            <span>Seg-Sáb: 08h às 18h<br>Emergências: 24h</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 text-center text-gray-500 text-sm">
                <p>© {{ date('Y') }} TE Geradores Manaus (Grupo Tesla Eventos). Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- ========== WHATSAPP FLUTUANTE ========== -->
    <a href="https://wa.me/5592993914237?text=Olá!%20Vim%20do%20site%20e%20gostaria%20de%20mais%20informações." 
       target="_blank" 
       class="fixed bottom-6 right-6 z-50 bg-green-500 hover:bg-green-600 text-white w-16 h-16 rounded-full flex items-center justify-center shadow-2xl transition-all transform hover:scale-110 group"
       aria-label="Fale conosco pelo WhatsApp">
        <i class="fab fa-whatsapp text-3xl"></i>
        <span class="absolute right-full mr-4 bg-gray-900 text-white text-sm font-semibold px-4 py-2 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
            Fale Conosco!
        </span>
    </a>

    <!-- ========== SCRIPTS ========== -->
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });
        
        // Mobile Menu Toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
        
        // Close mobile menu on link click
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.add('hidden');
            });
        });
        
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('shadow-lg');
                navbar.classList.remove('shadow-md');
            } else {
                navbar.classList.remove('shadow-lg');
                navbar.classList.add('shadow-md');
            }
        });
    </script>
    
    <!-- Swiper.js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Portfolio Swiper Carousel - Efeito Cartas 3D Intenso
        const portfolioSwiper = new Swiper('.portfolio-swiper', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            coverflowEffect: {
                rotate: 45,
                stretch: 0,
                depth: 350,
                modifier: 1,
                scale: 0.85,
                slideShadows: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination-portfolio',
                clickable: true,
                dynamicBullets: true,
            },
        });
        
        // Lightbox Functions
        function openLightbox(src, type, title) {
            const modal = document.getElementById('lightbox-modal');
            const content = document.getElementById('lightbox-content');
            const titleEl = document.getElementById('lightbox-title');
            
            if (type === 'image') {
                content.innerHTML = `<img src="${src}" alt="${title}" class="w-full h-auto max-h-[85vh] object-contain rounded-lg">`;
            } else {
                content.innerHTML = `<video controls autoplay class="w-full max-h-[85vh] rounded-lg"><source src="${src}" type="video/mp4"></video>`;
            }
            
            titleEl.textContent = title;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        
        function closeLightbox(event) {
            if (event && event.target !== event.currentTarget) return;
            const modal = document.getElementById('lightbox-modal');
            const content = document.getElementById('lightbox-content');
            modal.classList.add('hidden');
            content.innerHTML = '';
            document.body.style.overflow = '';
        }
        
        // Close on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeLightbox();
        });
    </script>
</body>
</html>
