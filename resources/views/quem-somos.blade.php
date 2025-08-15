{{-- resources/views/quem-somos.blade.php --}}
<x-guest-layout>
    @section('content') <!-- Hero section com fundo colorido -->
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
                <a href="https://wa.me/5592993914237?text=TE%20Geradores%20Manaus,%20Bom%20dia.%20Gostaria%20de%20iniciar%20um%20atendimento"
                    class="hover:underline" aria-label="WhatsApp">
                    📞(92) 99391-4237
                </a>
                <a href="https://maps.app.goo.gl/vPeG345SqwQ9pcfW7" class="hover:underline" aria-label="Localização">
                    📍 R. 188, 23 - Nova Cidade, Manaus - AM
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
                <a href="https://wa.me/5592993914237?text=TE%20Geradores%20Manaus,%20Bom%20dia.%20Gostaria%20de%20iniciar%20um%20atendimento"
                    aria-label="WhatsApp">
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
        <nav
            style="background-color: white; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <div>
                <a href="/">
                    <img src="{{ asset('images/LOGO.svg') }}" alt="Logo" style="height: 40px;">
                </a>
            </div>
    
            <!-- Menu Desktop -->
            <div class="menu-desktop" style="display: flex; gap: 2rem;">
                <a href="/" style="text-decoration: none; color: #24242c; font-weight: bold;">Home</a>
                <a href="/quem-somos" style="text-decoration: none; color: #24242c; font-weight: bold;">Quem Somos</a>
                <a href="https://wa.me/5592993914237?text=TE%20Geradores%20Manaus,%20Bom%20dia.%20Gostaria%20de%20iniciar%20um%20atendimento" style="text-decoration: none; color: #24242c; font-weight: bold;">Contato</a>
            </div>
    
            <!-- Menu Mobile -->
            <div class="iconlist-mobile" style="display: none;">
                <button onclick="toggleMenu()" aria-label="Abrir menu" style="background: none; border: none;">
                    <i class="fas fa-bars" style="font-size: 22px; color: #24242c;"></i>
                </button>
            </div>
        </nav>
    
        <!-- Menu dropdown responsivo -->
        <div id="menu-mobile"
            style="display: none; flex-direction: column; gap: 1rem; padding: 1rem 2rem; background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <a href="/" style="text-decoration: none; color: #24242c; font-weight: bold;">Home</a>
            <a href="/quem-somos" style="text-decoration: none; color: #24242c; font-weight: bold;">Quem Somos</a>
            <a href="https://wa.me/5592993914237?text=TE%20Geradores%20Manaus,%20Bom%20dia.%20Gostaria%20de%20iniciar%20um%20atendimento" style="text-decoration: none; color: #24242c; font-weight: bold;">Contato</a>
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

    <section style="background-color: #e60084; color: white; padding: 4rem 2rem;">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Sobre a Geradores Manaus</h1>
            <p class="text-lg max-w-2xl mx-auto"> Especialistas em soluções energéticas: Venda, locação e consultoria de
                geradores a diesel de 15 a 500kVA.
            </p>
        </div>
    </section>
    <!-- Seção de texto com imagem -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4 grid md:grid-cols-2 gap-8 items-center">
            <div> <img src="{{ asset('images/foto4.jpeg') }}" alt="Equipe Técnica" class="rounded shadow"> </div>
            <div>
                <h2 class="text-2xl font-semibold mb-4 text-[#e60084]">Energia confiável para seus projetos</h2>
                <p class="mb-4 text-gray-700"> A Geradores Manaus nasceu com o propósito de oferecer soluções
                    energéticas robustas e acessíveis para todo o Amazonas. Nossa equipe é formada por técnicos
                    especializados, preparados para atender desde pequenas empresas até grandes operações industriais e
                    eventos. </p>
                <p class="text-gray-700"> Trabalhamos com equipamentos modernos, manutenção preventiva e suporte
                    dedicado 24h. Estamos prontos para garantir que seu projeto nunca fique no escuro. </p>
            </div>
        </div>
    </section> <!-- Valores e diferenciais -->
    <section class="py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-10 text-[#e60084]">Nossos Diferenciais</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded shadow"> <img src="{{ asset('images/experiencia.svg') }}"
                        class="h-12 mx-auto mb-4" alt="Experiência">
                    <h3 class="font-semibold text-xl mb-2">Experiência Local</h3>
                    <p>Mais de 5 anos atuando no fornecimento de energia no Amazonas, com amplo conhecimento técnico e
                        logístico.</p>
                </div>
                <div class="bg-white p-6 rounded shadow"> <img src="{{ asset('images/suporte.svg') }}"
                        class="h-12 mx-auto mb-4" alt="Suporte 24h">
                    <h3 class="font-semibold text-xl mb-2">Atendimento 24h</h3>
                    <p>Suporte técnico em tempo real para emergências, com atendimento ágil e presencial sempre que
                        necessário.</p>
                </div>
                <div class="bg-white p-6 rounded shadow"> <img src="{{ asset('images/compromisso.svg') }}"
                        class="h-12 mx-auto mb-4" alt="Compromisso">
                    <h3 class="font-semibold text-xl mb-2">Compromisso com o Cliente</h3>
                    <p>Transparência, agilidade e soluções sob medida para garantir a melhor experiência em fornecimento
                        de energia.</p>
                </div>
            </div>
        </div>
    </section> <!-- Chamada para ação -->
    <section class="py-12 bg-[#e60084] text-white text-center">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4">Pronto para alugar ou comprar um gerador?</h2>
            <p class="mb-6">Fale com nossa equipe técnica e receba uma proposta em minutos.</p> <a href="https://wa.me/5592993914237?text=TE%20Geradores%20Manaus,%20Bom%20dia.%20Gostaria%20de%20iniciar%20um%20atendimento"
                class="bg-white text-[#e60084] font-bold px-6 py-3 rounded shadow hover:bg-gray-100 transition"> Fale
                conosco </a>
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
</x-guest-layout>