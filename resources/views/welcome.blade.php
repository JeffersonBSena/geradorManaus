<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TE Geradores Manaus</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon-32x32.png" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black-100 text-black-800 ">
    <!-- Primeira barra: Contato e redes sociais (visível em desktop) -->
    <div class="hidden md:flex bg-black text-white px-8 py-2 justify-between items-center text-sm">
        <div class="flex gap-4 items-center">
            <a href="https://wa.me/5592993914237?text=TE%20Geradores%20Manaus,%20Bom%20dia.%20Gostaria%20de%20iniciar%20um%20atendimento" class="hover:underline" aria-label="WhatsApp">
                📞(92) 99391-4237
            </a>
            <a href="https://maps.app.goo.gl/9GRMWWw2C3GaxuLy6" class="hover:underline" aria-label="Localização">
                📍 Rua Rio Eiru, 95, sala 20/2º Pav, CD SPACE CENTER - N.
                Senhora das Graças, Manaus
            </a>
        </div>
        <div class="flex gap-4 items-center">
            <a href="https://www.instagram.com/teslaeventos_/" target="_blank" aria-label="Instagram">
                <i class="fab fa-instagram text-white text-base"></i>
            </a>
            <a href="https://www.facebook.com/profile.php?id=61569206324847" target="_blank" aria-label="Facebook">
                <i class="fab fa-facebook text-white text-base"></i>
            </a>
        </div>
    </div>

    <!-- Segunda barra: Ícones (visível somente em mobile) -->
    <div class="flex md:hidden bg-black text-white px-6 py-2 justify-between items-center text-sm">
        <div class="flex gap-3 items-center">
            <a href="https://wa.me/5592993914237?text=TE%20Geradores%20Manaus,%20Bom%20dia.%20Gostaria%20de%20iniciar%20um%20atendimento" aria-label="WhatsApp">
                📞
            </a>
            <a href="https://maps.app.goo.gl/vPeG345SqwQ9pcfW7" aria-label="Localização">
                📍
            </a>
        </div>
        <div class="flex gap-3 items-center">
            <a href="https://www.instagram.com/teslaeventos_/" target="_blank" aria-label="Instagram">
                <i class="fab fa-instagram text-white text-base"></i>
            </a>
            <a href="https://www.facebook.com/profile.php?id=61569206324847" target="_blank" aria-label="Facebook">
                <i class="fab fa-facebook text-white text-base"></i>
            </a>
        </div>
    </div>

    <!-- Segunda Navbar com responsividade -->
    <nav style="background-color: white; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div>
            <a href="/">
                <img src="{{ asset('images/LOGO.svg') }}" alt="Logo" style="height: 40px;">
            </a>
        </div>

        <!-- Menu Desktop -->
        <div class="menu-desktop" style="display: flex; gap: 2rem;">
            <a href="/" style="text-decoration: none; color: #24242c; font-weight: bold;">Home</a>
            <a href="/quem-somos" style="text-decoration: none; color: #24242c; font-weight: bold;">Quem Somos</a>
            <a href="/contato" style="text-decoration: none; color: #24242c; font-weight: bold;">Contato</a>
        </div>

        <!-- Menu Mobile -->
        <div class="iconlist-mobile" style="display: none;">
            <button onclick="toggleMenu()" aria-label="Abrir menu" style="background: none; border: none;">
                <i class="fas fa-bars" style="font-size: 22px; color: #24242c;"></i>
            </button>
        </div>
    </nav>

    <!-- Menu dropdown responsivo -->
    <div id="menu-mobile" style="display: none; flex-direction: column; gap: 1rem; padding: 1rem 2rem; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <a href="/" style="text-decoration: none; color: #24242c; font-weight: bold;">Home</a>
        <a href="/quem-somos" style="text-decoration: none; color: #24242c; font-weight: bold;">Quem Somos</a>
        <a href="/contato" style="text-decoration: none; color: #24242c; font-weight: bold;">Contato</a>
    </div>

    <!-- Script de Toggle -->
    <script>
        function toggleMenu() {
            const menu = document.getElementById('menu-mobile');
            menu.style.display = (menu.style.display === 'none' || menu.style.display === '') ? 'flex' : 'none';
        }

        // Responsivo: mostra menu hamburguer abaixo de 768px
        window.addEventListener('resize', () => {
            const iconlist = document.querySelector('.iconlist-mobile');
            const menuDesktop = document.querySelector('.menu-desktop');
            if (window.innerWidth < 768) {
                iconlist.style.display = 'block';
                menuDesktop.style.display = 'none';
            } else {
                iconlist.style.display = 'none';
                menuDesktop.style.display = 'flex';
                document.getElementById('menu-mobile').style.display = 'none';
            }
        });

        // Aciona ao carregar
        window.dispatchEvent(new Event('resize'));
    </script>

    <!-- Hero section -->
    <section class="relative bg-pink-600 text-white overflow-hidden">
        <!-- Vídeo de fundo -->
        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover z-0">
            <source src="{{ asset('videos/background3.mp4') }}" type="video/mp4">
            Seu navegador não suporta vídeo em HTML5.
        </video>

        <!-- Sobreposição escura (opcional para legibilidade) -->
        <div class="absolute inset-0 bg-pink-900 bg-opacity-50 z-10"></div>

        <!-- Conteúdo principal -->
        <div class="container mx-auto px-4 py-20 text-center relative z-20">
            <h1 class="text-4xl font-bold mb-4">Soluções Inteligentes em Energia com Geradores</h1>
            <p class="mb-8">Consultoria técnica especializada, venda e locação de geradores de alta performance para empresas, eventos e projetos em Manaus e região. Energia confiável com suporte completo.</p>
            <a href="https://wa.me/5592993914237?text=TE%20Geradores%20Manaus,%20Bom%20dia.%20Gostaria%20de%20iniciar%20um%20atendimento"
                class="inline-block bg-black text-white font-bold px-6 py-3 rounded shadow hover:bg-yellow-600 transition">
                Solicite seu orçamento
            </a>
        </div>
    </section>

    <!-- Serviços -->
    <section class="container mx-auto px-4 py-16 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded shadow flex items-start gap-4">
            <!-- Coluna da Esquerda: Ícone -->
            <div class="text-pink-600 text-3xl">
                <img src="{{ asset('images/gerador_icon.svg') }}"> <!-- ou troque o ícone -->
            </div>

            <!-- Coluna da Direita: Texto -->
            <div>
                <h3 class="font-semibold text-xl mb-2">Geradores Elétricos</h3>
                <p>Locação, instalação e manutenção de geradores de 15 kVA a 500 kVA.</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded shadow flex items-start gap-4">
            <!-- Coluna da Esquerda: Ícone -->
            <div class="text-pink-600 text-3xl">
                <img src="{{ asset('images/tecnica.svg') }}"> <!-- ou troque o ícone -->
            </div>

            <!-- Texto à direita -->
            <div>
                <h3 class="font-semibold text-xl mb-2">Equipe Técnica Especializada</h3>
                <p>Profissionais prontos para oferecer soluções elétricas com agilidade, segurança e expertise técnica.</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded shadow flex items-start gap-4">
    <!-- Coluna da Esquerda: Ícone -->
    <div class="text-pink-600 text-3xl">
        <img src="{{ asset('images/consultoria.svg') }}"> <!-- Ícone de projeto ou lâmpada -->
    </div>

    <!-- Texto à direita -->
    <div>
        <h3 class="font-semibold text-xl mb-2">Consultoria Técnica</h3>
        <p>Planejamento personalizado para instalação de geradores, com análise de carga, layout e otimização de recursos.</p>
    </div>
</div>
    </section>

    <!-- Sobre Nós com duas colunas -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            
            <!-- Coluna da Esquerda: Imagem -->
            <div>
                <img src="{{ asset('images/foto1.jpeg') }}" alt="Sobre a TE Geradores Manaus" class="rounded shadow max-w-md w-full mx-auto">
            </div>

            <!-- Coluna da Direita: Texto -->
            <div>
                <h2 class="text-3xl font-bold mb-4 text-[#e60084]">Quem Somos</h2>
                <p class="text-gray-700 leading-relaxed">
                    Referência em soluções energéticas e logísticas em Manaus. Boutique de locação com foco em qualidade, respeito ao cliente e inovação constante.
                    <br><br>
                    A <strong>TE Geradores Manaus</strong> atua desde 2018 no fornecimento, venda e manutenção de geradores de energia com potências de 15 kVA a 500 kVA, garantindo confiabilidade e performance em qualquer situação.
                    <br><br>
                    Nossa missão é fornecer soluções eficientes e seguras para nossos clientes, atendendo tanto demandas emergenciais quanto projetos planejados.
                </p>
            </div>

        </div>
    </section>

    <!-- Contato (call-to-action) -->
    <section style="background-color: #e60084; color: white; padding: 16px;">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold mb-4">Pronto para potencializar seu projeto?</h2>
            <p class="mb-6">Entre em contato e descubra a solução ideal para sua operação.</p>
            <a href="https://wa.me/5592993914237?text=TE%20Geradores%20Manaus:%20Bom%20dia.%20Gostaria%20de%20um%20suporte">
                <button class="bg-green-500 hover:bg-green-600 text-white font-bold px-6 py-3 rounded transition">
                    Solicitar Orçamento via WhatsApp
                </button>
            </a>
        </div>
    </section>
    <div style="
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        z-index: 999;
            ">
        <a href="https://wa.me/5592993914237?text=TE%20Geradores%20Manaus:%20Bom%20dia.%20Gostaria%20de%20um%20suporte" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('images/whatsapp.png') }}" alt="whatsapp-tesla" style="width: 100%; height: 100%;" />
        </a>
    </div>
    <footer style="padding:1rem; background-color: #000000; color:#ffffff; text-align:center;">
        © 2025 Grupo Tesla Eventos. Todos os direitos reservados.
    </footer>

</body>

</html>