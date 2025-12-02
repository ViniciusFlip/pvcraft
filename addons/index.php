<?php
// Início da sessão para armazenar a URL de retorno
session_start();

// Armazenar a URL atual antes do redirecionamento para login
if (!isset($_GET['login_success'])) {
    $_SESSION['return_url'] = $_SERVER['REQUEST_URI'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-98NKC0R6NN"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-98NKC0R6NN');
    </script>
    <script src="/seo-generator.js"></script>
    <!-- Charset & Responsiveness -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title & SEO Meta (dinâmico via JS) -->
    <title id="pageTitle">PVCRAFT - Addon Details</title>
    <meta name="description" content="View detailed information about this Minecraft Bedrock addon on PVCRAFT. Download MCPE addons, textures, and maps created by the community." id="pageDescription">
    <meta name="keywords" content="Minecraft PE addon, MCPE addon, Bedrock addon, Minecraft map, Minecraft texture, PVCRAFT addon, download MCPE addon">

    <!-- Canonical -->
    <link rel="canonical" href="https://pvcraft.net/addons/index.php" id="canonicalLink">

    <!-- Robots -->
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook (dinâmico via JS) -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://pvcraft.net/addons/index.php" id="ogUrl">
    <meta property="og:title" content="PVCRAFT - Addon Details" id="ogTitle">
    <meta property="og:description" content="View detailed information about this Minecraft Bedrock addon. Download community-made MCPE addons, textures, and maps." id="ogDescription">
    <meta property="og:image" content="https://www.pvcraft.net/home/imgs/home.jpg" id="ogImage">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://pvcraft.net/addons/index.php" id="twitterUrl">
    <meta property="twitter:title" content="PVCRAFT - Addon Details" id="twitterTitle">
    <meta property="twitter:description" content="View detailed information about this Minecraft Bedrock addon. Download community-made MCPE addons, textures, and maps." id="twitterDescription">
    <meta property="twitter:image" content="https://www.pvcraft.net/home/imgs/home.jpg" id="twitterImage">

    <!-- Fonts & CSS -->
   <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/home/global.css">
    <link rel="stylesheet" href="/home/ads.css">

    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/home/imgs/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/home/imgs/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/home/imgs/favicon-16x16.png">
    <link rel="manifest" href="/home/imgs/site.webmanifest">

    <!-- Google AdSense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8023784976492432"
        crossorigin="anonymous"></script>

    <!-- reCAPTCHA API -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Script para atualizar SEO dinamicamente -->
    <script>
        function updateSEO(title, description, image, url) {
            // Atualizar título da página
            document.title = `PVCRAFT - ${title}`;
            document.getElementById('pageTitle').innerText = `PVCRAFT - ${title}`;
            
            // Atualizar meta description
            document.getElementById('pageDescription').setAttribute('content', description);
            
            // Atualizar canonical URL
            document.getElementById('canonicalLink').setAttribute('href', url);

            // Atualizar Open Graph
            document.getElementById('ogTitle').setAttribute('content', `PVCRAFT - ${title}`);
            document.getElementById('ogDescription').setAttribute('content', description);
            document.getElementById('ogUrl').setAttribute('content', url);
            document.getElementById('ogImage').setAttribute('content', image);

            // Atualizar Twitter Cards
            document.getElementById('twitterTitle').setAttribute('content', `PVCRAFT - ${title}`);
            document.getElementById('twitterDescription').setAttribute('content', description);
            document.getElementById('twitterUrl').setAttribute('content', url);
            document.getElementById('twitterImage').setAttribute('content', image);

            console.log('SEO atualizado:', { title, description, image, url });
        }

        // Função para gerar data aleatória entre 01/01/2021 e 11/03/2025
        function generateRandomDate() {
            const startDate = new Date('2021-01-01');
            const endDate = new Date('2025-03-11');
            const randomTime = startDate.getTime() + Math.random() * (endDate.getTime() - startDate.getTime());
            const randomDate = new Date(randomTime);
            
            // Formatar como MM/DD/YYYY
            const month = String(randomDate.getMonth() + 1).padStart(2, '0');
            const day = String(randomDate.getDate()).padStart(2, '0');
            const year = randomDate.getFullYear();
            
            return `${month}/${day}/${year}`;
        }

        // Função para gerar views aleatórias entre 0 e 30000
        function generateRandomViews() {
            return Math.floor(Math.random() * 30001); // 0 a 30000
        }

        // Função para formatar números com separadores de milhar
        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        // Função global para scroll até o download - CORRIGIDA E AJUSTADA MAIS PARA CIMA
        function scrollToDownload() {
            const downloadButton = document.getElementById('download-button');
            if (downloadButton) {
                // Obter a posição exata do botão
                const elementPosition = downloadButton.getBoundingClientRect().top + window.pageYOffset;
                
                // CALCULO CORRIGIDO - AINDA MAIS PARA CIMA
                // Mobile: -200px, Desktop: -180px (antes era -150 e -120)
                const offset = window.innerWidth <= 768 ? -200 : -180;
                
                // Scroll suave para a posição exata (mais para cima)
                window.scrollTo({
                    top: elementPosition + offset,
                    behavior: 'smooth'
                });
                
                // Adicionar efeito visual de destaque no botão
                setTimeout(() => {
                    downloadButton.style.boxShadow = '0 0 0 3px rgba(76, 175, 80, 0.5)';
                    setTimeout(() => {
                        downloadButton.style.boxShadow = '';
                    }, 2000);
                }, 800); // Delay para sincronizar com o scroll
            }
            return false; // Prevenir comportamento padrão do link
        }

        // Variável global para armazenar o link de download
        let downloadLink = '';

        // Função para abrir o popup de download
        function openDownloadPopup(link) {
            downloadLink = link;
            document.getElementById('download-popup').style.display = 'flex';
            // Resetar o estado do popup
            document.getElementById('captcha-step').style.display = 'block';
            document.getElementById('ad-step').style.display = 'none';
            document.getElementById('download-step').style.display = 'none';
            document.getElementById('loading-bar').style.width = '0%';
        }

        // Função para fechar o popup
        function closeDownloadPopup() {
            document.getElementById('download-popup').style.display = 'none';
        }

        // Função chamada quando o captcha é verificado
        function onCaptchaSuccess() {
            document.getElementById('captcha-step').style.display = 'none';
            document.getElementById('ad-step').style.display = 'block';
            
            document.querySelector('.popup-content').innerHTML+=`
                <div class="ad-container horizontal-ad" style="grid-column: 1 / -1;">
                    <div class="box-ads mob">
                        <!-- horizontal -->
                        <ins class="adsbygoogle"
                            style="display:block"
                            data-ad-client="ca-pub-8023784976492432"
                            data-ad-slot="1339601043"
                            data-ad-format="auto"
                            data-full-width-responsive="true">
                        </ins>
                    </div>
                </div>
            `

            setTimeout(() => {
                try {
                    (window.adsbygoogle = window.adsbygoogle || []).push({});
                } catch (e) {
                    console.warn(" Err:", e);
                }
            }, 500);

            // Iniciar barra de carregamento
            const loadingBar = document.getElementById('loading-bar');
            let width = 0;
            const interval = setInterval(() => {
                if (width >= 100) {
                    clearInterval(interval);
                    document.getElementById('ad-step').style.display = 'none';
                    document.getElementById('download-step').style.display = 'block';
                } else {
                    width++;
                    loadingBar.style.width = width + '%';
                }
            }, 50); // 5 segundos para completar (100 * 50ms = 5000ms)
        }

        // Função para redirecionar para o download
        function proceedToDownload() {
            // Exibir popup de redirecionamento
            const redirectPopup = document.getElementById('redirect-popup');
            redirectPopup.style.display = 'flex';
            
            // Redirecionar após 2 segundos
            setTimeout(() => {
                window.location.href = downloadLink;
            }, 2000);
        }

        // Função para compartilhar conteúdo
        function shareContent() {
            const shareUrl = window.location.href;
            const shareTitle = document.title;
            
            if (navigator.share) {
                // Usar Web Share API se disponível (principalmente em dispositivos móveis)
                navigator.share({
                    title: shareTitle,
                    url: shareUrl
                })
                .catch(error => console.log('Erro ao compartilhar:', error));
            } else {
                // Fallback para copiar para a área de transferência
                navigator.clipboard.writeText(shareUrl)
                    .then(() => {
                        alert('Link copiado para a área de transferência!');
                    })
                    .catch(err => {
                        console.error('Erro ao copiar link: ', err);
                        // Fallback alternativo
                        const tempInput = document.createElement('input');
                        tempInput.value = shareUrl;
                        document.body.appendChild(tempInput);
                        tempInput.select();
                        document.execCommand('copy');
                        document.body.removeChild(tempInput);
                        alert('Link copiado para a área de transferência!');
                    });
            }
        }

        // Verificar se é um redirecionamento após login bem-sucedido
        function checkLoginRedirect() {
            const urlParams = new URLSearchParams(window.location.search);
            const loginSuccess = urlParams.get('login_success');
            
            if (loginSuccess === 'true') {
                // Mostrar mensagem de sucesso
                console.log('✅ Login successful! Welcome back.');
                
                // Remover parâmetro da URL sem recarregar a página
                const newUrl = window.location.pathname + window.location.search.replace(/[?&]login_success=true/, '');
                window.history.replaceState({}, document.title, newUrl);
            }
        }

        // Executar quando a página carregar
        document.addEventListener('DOMContentLoaded', checkLoginRedirect);
    </script>

    <!-- Script do menu hambúrguer - DEVE vir ANTES do Firebase -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // ========== NAVBAR E SCROLL EFFECT ==========
            const navbar = document.querySelector('.navbar');
            const hamburger = document.getElementById('hamburger');
            const navMenu = document.getElementById('navMenu');
            const searchContainer = document.querySelector('.search-container');
            const inputPesquisa = document.getElementById('pesquisa');
            const searchButton = document.getElementById('searchButton');

            // Efeito de transparência na navbar ao scrollar
            if (navbar) {
                navbar.style.backgroundColor = 'rgba(38, 36, 35, 1)';

                window.addEventListener('scroll', function () {
                    if (window.scrollY === 0) {
                        navbar.style.backgroundColor = 'rgba(38, 36, 35, 1)';
                    } else {
                        navbar.style.backgroundColor = 'rgba(38, 36, 35, 0.9)';
                    }
                });
            }

            // ========== MENU HAMBURGUER MOBILE ==========
            if (hamburger && navMenu) {
                hamburger.addEventListener('click', function () {
                    this.classList.toggle('active');
                    navMenu.classList.toggle('active');

                    // Em mobile, alterna a visibilidade da barra de pesquisa
                    if (window.innerWidth <= 768 && searchContainer) {
                        searchContainer.style.display = searchContainer.style.display === 'none' ? 'flex' : 'none';
                    }
                });

                // Fechar menu ao clicar em um item
                document.querySelectorAll('.nav-menu a').forEach(item => {
                    item.addEventListener('click', () => {
                        if (hamburger && navMenu) {
                            hamburger.classList.remove('active');
                            navMenu.classList.remove('active');
                        }

                        // Em mobile, mostra a barra de pesquisa novamente
                        if (window.innerWidth <= 768 && searchContainer) {
                            searchContainer.style.display = 'flex';
                        }
                    });
                });
            }

            // ========== SISTEMA DE BUSCA ==========
            function pesquisar() {
                const termo = inputPesquisa.value.trim();
                if (termo) {
                    window.location.href = `/search.html?q=${encodeURIComponent(termo)}`;
                }
            }

            // Eventos de busca
            if (searchButton) {
                searchButton.addEventListener('click', pesquisar);
            }

            if (inputPesquisa) {
                inputPesquisa.addEventListener('keypress', function (e) {
                    if (e.key === 'Enter') {
                        pesquisar();
                    }
                });
            }

            // ========== AJUSTE INICIAL PARA MOBILE ==========
            function ajustarLayoutMobile() {
                if (window.innerWidth <= 768) {
                    // Garante que a barra de pesquisa está visível inicialmente
                    if (searchContainer) {
                        searchContainer.style.display = 'flex';
                    }
                    // Esconde o menu inicialmente em mobile
                    if (navMenu && hamburger) {
                        navMenu.classList.remove('active');
                        hamburger.classList.remove('active');
                    }
                } else {
                    // Garante que tudo está visível em desktop
                    if (searchContainer) {
                        searchContainer.style.display = 'flex';
                    }
                    if (navMenu && hamburger) {
                        navMenu.classList.remove('active');
                        hamburger.classList.remove('active');
                    }
                }
            }

            // Executa no carregamento e em redimensionamentos
            ajustarLayoutMobile();
            window.addEventListener('resize', ajustarLayoutMobile);
        });

        // Sistema de alertas
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status');

            if (status === 'success') {
                alert('Mensagem enviada com sucesso!');
            } else if (status === 'error') {
                alert('Ocorreu um erro ao enviar a mensagem. Por favor, tente novamente.');
            }
        });
    </script>

    <script type="module">
        // Import Firebase functions
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.0/firebase-app.js";
        import { getFirestore, doc, getDoc, collection, query, where, getDocs, limit, orderBy } from "https://www.gstatic.com/firebasejs/9.6.0/firebase-firestore.js";

        // Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyA_9XH-WhFFvs4F9YtBkDnMMS6vvc49wtg",
            authDomain: "pvcraftsite.firebaseapp.com",
            projectId: "pvcraftsite",
            storageBucket: "pvcraftsite.appspot.com",
            messagingSenderId: "172479486134",
            appId: "1:172479486134:web:dfd3248b4be5de5748ae17"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const db = getFirestore(app);

        // Get content ID from URL
        const urlParams = new URLSearchParams(window.location.search);
        const contentId = urlParams.get('id');

        // Atualizar URLs dinâmicas imediatamente
        const currentUrl = window.location.href;
        document.getElementById('ogUrl').setAttribute('content', currentUrl);
        document.getElementById('twitterUrl').setAttribute('content', currentUrl);
        document.getElementById('canonicalLink').setAttribute('href', currentUrl);

        async function loadContent() {
            if (!contentId) {
                window.location.href = "/addons/index.html";
                return;
            }

            try {
                // Get main content
                const docRef = doc(db, "addons", contentId);
                const docSnap = await getDoc(docRef);

                if (docSnap.exists()) {
                    const data = docSnap.data();
                    console.log('Dados carregados do Firebase:', data);

                    // Coletar todas as imagens disponíveis
                    const images = [];
                    for (let i = 1; i <= 5; i++) {
                        const imgField = i === 1 ? 'imagem' : `imagem${i}`;
                        if (data[imgField]) {
                            images.push(data[imgField]);
                        }
                    }

                    // Definir valores padrão para os novos campos
                    const aboutContent = data.about || "A Minecraft Pocket Edition content.";
                    const installationContent = data.instalar || 'Click the link, go to download button, click in file "open with minecraft" and have fun!';
                    const versionContent = data.versao || "1.21";

                    // Processar data e views
                    const contentDate = data.data || generateRandomDate();
                    const contentViews = data.views !== undefined ? data.views : generateRandomViews();
                    const formattedViews = formatNumber(contentViews);

                    // Atualizar SEO com dados do Firebase - INCLUINDO A IMAGEM 1
                    const ogImage = images.length > 0 ? images[0] : "https://www.pvcraft.net/home/imgs/home.jpg";
                    const currentUrl = window.location.href;
                    
                    // Chamar a função updateSEO para atualizar as meta tags IMEDIATAMENTE
                    updateSEO(data.titulo, data.descricaoCurta, ogImage, currentUrl);

                    // Criar o HTML do carrossel com estilo Minecraft
                    let carouselHTML = `
                    <div class="carousel-container">
                        <div class="carousel-slides">
                            ${images.map((img, index) => `
                                <div class="carousel-slide ${index === 0 ? 'active' : ''}">
                                    <img src="${img}" alt="Imagem ${index + 1}" class="carousel-image">
                                </div>
                            `).join('')}
                        </div>
                        
                        ${images.length > 1 ? `
                            <div class="carousel-controls">
                                <button class="carousel-button prev" aria-label="Anterior">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="carousel-button next" aria-label="Próximo">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                            <div class="carousel-dots">
                                ${images.map((_, index) => `
                                    <button class="carousel-dot ${index === 0 ? 'active' : ''}" data-index="${index}" aria-label="Ir para imagem ${index + 1}">
                                        <span class="dot-icon"></span>
                                    </button>
                                `).join('')}
                            </div>
                        ` : ''}
                    </div>
                `;

                    // Update main content
                    document.querySelector('.page').innerHTML = `
                    ${carouselHTML}
                   
                    
                    <h2 class="titulo">${data.titulo}</h2>
                    
                    <!-- Data e Views -->
                    <div class="content-meta">
                        <div class="content-date">
                            <span class="meta-label">Publication date:</span> ${contentDate}
                        </div>
                        <div class="content-views">
                            <span class="meta-label">Views:</span> ${formattedViews}
                        </div>
                    </div>
                    
                    <div class="skip-download-container">
                        <a href="javascript:void(0)" class="skip-download-link" onclick="scrollToDownload()">
                            <i class="fas fa-arrow-down"></i> SKIP TO DOWNLOAD
                        </a>
                    </div>
                    
                    <p class="descricao">${data.descricaoCurta}</p>
                    <p class="autor">CREATED BY: ${data.autor}</p>
                  
                    <div class="content-description">
                        <h3 class="description-title">DESCRIPTION</h3>
                        <p class="description">${data.descricaoLonga}</p>
                    </div>
                    
                    <!-- Anúncio após a descrição -->
                    <div class="ad-container ad-middle">
                       <div class="box-ads">
                                <!-- side-vertical -->
                                <ins class="adsbygoogle"
                                style="display:block"
                                data-ad-client="ca-pub-8023784976492432"
                                data-ad-slot="6872905425"
                                data-ad-format="auto"
                                data-full-width-responsive="true">
                                </ins>
                        </div>
                    </div>
                    
                    <div class="additional-info">
                        <div class="info-section">
                            <h3 class="info-title">About the content</h3>
                            <p class="info-content">${aboutContent}</p>
                        </div>
                        
                        <div class="info-section">
                            <h3 class="info-title">Installation</h3>
                            <p class="info-content">${installationContent}</p>
                        </div>
                        
                        <div class="info-section">
                            <h3 class="info-title">Supported Minecraft versions</h3>
                            <p class="info-content">${versionContent}</p>
                        </div>
                    </div>
                      
                    <div class="download-container">
                        <a href="javascript:void(0)" class="download" id="download-button" onclick="openDownloadPopup('${data.downloadLink}')">
                            <i class="fas fa-download"></i> DOWNLOAD
                        </a>
                        <a href="javascript:void(0)" class="download share-button" onclick="shareContent()">
                            <i class="fas fa-share-alt"></i> SHARE
                        </a>
                    </div>
                `;

                    // Update page title
                    document.title = `PVCRAFT - ${data.titulo}`;

                    // Initialize carousel if multiple images
                    if (images.length > 1) {
                        initCarousel();
                    }

                    // Load ads after content is loaded
                    setTimeout(() => {
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    }, 1000);

                    // Load related content - NOVA IMPLEMENTAÇÃO
                    loadRelatedContent(data, contentId);
                } else {
                    window.location.href = "/addons/index.html";
                }
            } catch (error) {
                console.error("Error loading content:", error);
                window.location.href = "/addons/index.html";
            }
        }

        function initCarousel() {
            const slides = document.querySelectorAll('.carousel-slide');
            const dots = document.querySelectorAll('.carousel-dot');
            let currentIndex = 0;
            const totalSlides = slides.length;

            function showSlide(index) {
                // Update slides
                slides.forEach(slide => slide.classList.remove('active'));
                slides[index].classList.add('active');

                // Update dots
                dots.forEach(dot => dot.classList.remove('active'));
                dots[index].classList.add('active');

                currentIndex = index;
            }

            // Next button
            document.querySelector('.carousel-button.next').addEventListener('click', () => {
                showSlide((currentIndex + 1) % totalSlides);
            });

            // Previous button
            document.querySelector('.carousel-button.prev').addEventListener('click', () => {
                showSlide((currentIndex - 1 + totalSlides) % totalSlides);
            });

            // Dot navigation
            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    showSlide(parseInt(dot.dataset.index));
                });
            });
        }

        // Função para calcular similaridade entre textos
        function calculateSimilarity(text1, text2) {
            if (!text1 || !text2) return 0;
            
            // Converter para minúsculas para comparação case-insensitive
            const str1 = text1.toLowerCase();
            const str2 = text2.toLowerCase();
            
            // Dividir em palavras
            const words1 = str1.split(/\s+/);
            const words2 = str2.split(/\s+/);
            
            // Calcular palavras em comum
            const commonWords = words1.filter(word => 
                words2.includes(word) && word.length > 3 // Ignorar palavras muito curtas
            );
            
            // Calcular similaridade baseada na quantidade de palavras em comum
            const similarity = commonWords.length / Math.max(words1.length, words2.length);
            
            return similarity;
        }

        // Função para extrair palavras-chave do conteúdo
        function extractKeywords(content) {
            if (!content) return [];
            
            // Remover caracteres especiais e converter para minúsculas
            const cleanText = content.toLowerCase().replace(/[^\w\s]/g, '');
            
            // Dividir em palavras
            const words = cleanText.split(/\s+/);
            
            // Filtrar palavras comuns e palavras muito curtas
            const commonWords = ['the', 'and', 'for', 'with', 'this', 'that', 'are', 'from', 'you', 'your', 'minecraft', 'addon', 'addons', 'pe', 'mcpe', 'bedrock', 'map', 'maps', 'texture', 'textures'];
            
            const keywords = words.filter(word => 
                word.length > 3 && 
                !commonWords.includes(word) &&
                !/^\d+$/.test(word) // Ignorar números puros
            );
            
            // Retornar palavras únicas
            return [...new Set(keywords)];
        }

        // Função para buscar conteúdo relacionado
        async function loadRelatedContent(currentContent, currentId) {
            try {
                // Buscar todos os conteúdos (excluindo o atual)
                const allContentQuery = query(
                    collection(db, "addons"),
                    where("__name__", "!=", currentId), // Excluir o conteúdo atual
                    orderBy("__name__"), // Necessário para usar !=
                    limit(50) // Limitar para performance
                );
                
                const querySnapshot = await getDocs(allContentQuery);
                const sideCards = document.querySelector('.side-cards');
                
                // Converter resultados em array
                let allContent = [];
                querySnapshot.forEach((doc) => {
                    allContent.push({ id: doc.id, data: doc.data() });
                });
                
                // Extrair palavras-chave do conteúdo atual
                const currentTitle = currentContent.titulo || '';
                const currentDescription = currentContent.descricaoCurta || '';
                const currentLongDescription = currentContent.descricaoLonga || '';
                
                const titleKeywords = extractKeywords(currentTitle);
                const descriptionKeywords = extractKeywords(currentDescription);
                const longDescriptionKeywords = extractKeywords(currentLongDescription);
                
                // Combinar todas as palavras-chave
                const allKeywords = [...titleKeywords, ...descriptionKeywords, ...longDescriptionKeywords];
                
                console.log('Palavras-chave extraídas:', allKeywords);
                
                // Calcular pontuação de similaridade para cada conteúdo
                const scoredContent = allContent.map(item => {
                    const itemTitle = item.data.titulo || '';
                    const itemDescription = item.data.descricaoCurta || '';
                    
                    // Calcular similaridade baseada em palavras-chave
                    let keywordScore = 0;
                    allKeywords.forEach(keyword => {
                        if (itemTitle.toLowerCase().includes(keyword) || 
                            itemDescription.toLowerCase().includes(keyword)) {
                            keywordScore += 1;
                        }
                    });
                    
                    // Normalizar pontuação baseada em palavras-chave
                    keywordScore = keywordScore / Math.max(allKeywords.length, 1);
                    
                    // Calcular similaridade textual
                    const titleSimilarity = calculateSimilarity(currentTitle, itemTitle);
                    const descriptionSimilarity = calculateSimilarity(currentDescription, itemDescription);
                    
                    // Pontuação final (pesos: título 40%, descrição 30%, palavras-chave 30%)
                    const finalScore = 
                        (titleSimilarity * 0.4) + 
                        (descriptionSimilarity * 0.3) + 
                        (keywordScore * 0.3);
                    
                    return {
                        ...item,
                        score: finalScore
                    };
                });
                
                // Ordenar por pontuação (maior primeiro)
                scoredContent.sort((a, b) => b.score - a.score);
                
                console.log('Conteúdo relacionado ordenado:', scoredContent.slice(0, 5));
                
                // Selecionar os 5 conteúdos mais relevantes
                const selectedContent = scoredContent.slice(0, 5);
                
                let html = '';
                
                // Card bônus para detectar anúncios (primeiro card) - COR da mesma do fundo
                html += `
                <div class="side-card bonus-ad-card">
                    <div class="bonus-ad-content">
                        <div class="box-ads mob">
                            <!-- horizontal -->
                            <ins class="adsbygoogle"
                                style="display:block"
                                data-ad-client="ca-pub-8023784976492432"
                                data-ad-slot="1339601043"
                                data-ad-format="auto"
                                data-full-width-responsive="true">
                            </ins>
                        </div>
                    </div>
                </div>
                `; 
           
                setTimeout(() => {
                    try {
                        (window.adsbygoogle = window.adsbygoogle || []).push({});
                    } catch (e) {
                        console.warn(" Err:", e);
                    }
                }, 1500);

                
                // Gerar HTML para os cards selecionados
                if (selectedContent.length > 0) {
                    selectedContent.forEach(item => {
                        const data = item.data;
                        // Processar data e views para os cards relacionados
                        const itemDate = data.data || generateRandomDate();
                        const itemViews = data.views !== undefined ? data.views : generateRandomViews();
                        const formattedItemViews = formatNumber(itemViews);
                        
                        html += `
                        <div class="side-card">
                            <a href="/addons/index.php?id=${item.id}">
                                <img src="${data.imagem}" alt="${data.titulo}" class="side-image">
                                <h3 class="side-title">${data.titulo}</h3>
                                <div class="side-meta">
                                    <span class="side-date">${itemDate}</span>
                                    <span class="side-views">${formattedItemViews} views</span>
                                </div>
                                <p class="side-description">${data.descricaoCurta}</p>
                                <p class="side-author">By: ${data.autor}</p>
                            </a>
                        </div>
                        `;
                    });
                } else {
                    // Fallback: conteúdo aleatório se não houver conteúdo relacionado
                    console.log('Nenhum conteúdo relacionado encontrado, usando fallback aleatório');
                    const shuffledContent = shuffleArray(allContent).slice(0, 5);
                    shuffledContent.forEach(item => {
                        const data = item.data;
                        // Processar data e views para os cards relacionados
                        const itemDate = data.data || generateRandomDate();
                        const itemViews = data.views !== undefined ? data.views : generateRandomViews();
                        const formattedItemViews = formatNumber(itemViews);
                        
                        html += `
                        <div class="side-card">
                            <a href="/addons/index.php?id=${item.id}">
                                <img src="${data.imagem}" alt="${data.titulo}" class="side-image">
                                <h3 class="side-title">${data.titulo}</h3>
                                <div class="side-meta">
                                    <span class="side-date">${itemDate}</span>
                                    <span class="side-views">${formattedItemViews} views</span>
                                </div>
                                <p class="side-description">${data.descricaoCurta}</p>
                                <p class="side-author">By: ${data.autor}</p>
                            </a>
                        </div>
                        `;
                    });
                }

                // Add view more link
                html += `
                <div class="view-more">
                    <a href="/addons/index.html">
                        <i class="fas fa-ellipsis-h"></i> SEE MORE ADDONS
                    </a>
                </div>
                `;

                sideCards.innerHTML = html;
                
                // Carregar anúncios nos side cards
                setTimeout(() => {
                    (adsbygoogle = window.adsbygoogle || []).push({});
                }, 1500);
            } catch (error) {
                console.error("Error loading related content:", error);
                
                // Fallback: mostrar mensagem de erro
                document.querySelector('.side-cards').innerHTML = `
                    <div class="error-message">
                        <p>Unable to load related content at this time.</p>
                        <div class="view-more">
                            <a href="/addons/index.html">
                                <i class="fas fa-ellipsis-h"></i> BROWSE ALL ADDONS
                            </a>
                        </div>
                    </div>
                `;
            }
        }

        // Função para embaralhar array (Fisher-Yates algorithm)
        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        // Load content when page is ready
        document.addEventListener('DOMContentLoaded', loadContent);
    </script>
    
    <style>
        /* ===== ESTILOS DO MENU HAMBÚRGUER IDÊNTICOS AO SEU CSS ===== */
        
        /* Menu mobile - IDÊNTICO ao seu CSS */
        @media (max-width: 768px) {
            .navbar-container {
                flex-wrap: wrap;
                padding: 10px 15px;
            }

            .logo {
                order: 0;
                width: 150px;
            }

            .search-container {
                order: 1;
                width: 100%;
                margin: 10px 0;
            }

            .hamburger {
                display: flex;
                order: 2;
                position: absolute;
                right: 15px;
                top: 15px;
                cursor: pointer;
                flex-direction: column;
                justify-content: space-between;
                width: 30px;
                height: 21px;
                z-index: 1001;
            }

            .hamburger.active .bar:nth-child(1) {
                transform: translateY(9px) rotate(45deg);
            }

            .hamburger.active .bar:nth-child(2) {
                opacity: 0;
            }

            .hamburger.active .bar:nth-child(3) {
                transform: translateY(-9px) rotate(-45deg);
            }

            .bar {
                height: 3px;
                width: 100%;
                background-color: #6cc349;
                border-radius: 3px;
                transition: all 0.3s ease;
            }

            .nav-menu {
                order: 3;
                width: 100%;
                flex-direction: column;
                display: none;
                list-style: none;
            }

            .nav-menu.active {
                display: flex;
            }

            .nav-menu li {
                margin: 15px 0;
            }

            .nav-menu a {
                color: #6cc349;
                text-decoration: none;
                font-size: 16px;
                transition: color 0.3s;
            }

            .nav-menu a:hover {
                color: #eaeaea;
            }
        }

        /* Desktop - menu normal - IDÊNTICO ao seu CSS */
        @media (min-width: 769px) {
            .hamburger {
                display: none;
            }

            .nav-menu {
                display: flex;
                align-items: center;
                gap: 20px;
                list-style: none;
            }

            .nav-menu li {
                margin-left: 30px;
            }

            .nav-menu a {
                color: #6cc349;
                text-decoration: none;
                font-size: 16px;
                transition: color 0.3s;
            }

            .nav-menu a:hover {
                color: #eaeaea;
            }
        }

        /* ===== ESTILOS EXISTENTES (MANTIDOS) ===== */

        /* Estilos para o link Skip to Download */
        .skip-download-container {
            text-align: center;
            margin: 15px 0;
        }
        
        .skip-download-link {
            display: inline-block;
            color: #000;
            text-decoration: underline;
            padding: 5px 10px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            cursor: pointer;
        }
        
        .skip-download-link:hover {
            color: #555;
        }
        
        .skip-download-link i {
            margin-right: 5px;
        }
        
        /* Garantir que o scroll seja suave */
        html {
            scroll-behavior: smooth;
        }
        
        /* Estilos para data e views */
        .content-meta {
            margin: 10px 0;
            text-align: left;
        }
        
        .content-date, .content-views {
            color: #262423; /* Cinza escuro - mesma cor do título */
            font-size: 16px; /* Aumentado de 14px para 16px */
            margin-bottom: 6px;
            font-family: Arial, sans-serif;
            font-weight: 500;
        }
        
        .meta-label {
            font-weight: 600;
            color: #262423;
        }
        
        /* Estilos para data e views nos cards laterais */
        .side-meta {
            display: flex;
            justify-content: space-between;
            margin: 8px 0; /* Aumentado de 5px para 8px */
            font-size: 13px; /* Aumentado de 12px para 13px */
        }
        
        .side-date, .side-views {
            color: #262423; /* Cinza escuro */
            font-weight: 500;
        }
        
        /* Estilos para as novas seções de informação */
        .additional-info {
            margin: 15px 0;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        
        .info-section {
            margin-bottom: 12px;
        }
        
        .info-title {
            font-family: 'Minecrafter Alt', sans-serif;
            color: #262423;
            font-size: 18px;
            margin-bottom: 6px;
            text-transform: uppercase;
        }
        
        .info-content {
            color: #fff; 
            line-height: 1.4;
            font-size: 14px;
            margin: 0;
        }
        
        /* Estilos para descrição do conteúdo */
        .content-description {
            margin: 15px 0;
        }
        
        .description-title {
            margin-bottom: 8px;
        }
        
        .description {
            line-height: 1.4;
            margin: 0;
        }
        
        /* Estilos para os containers de anúncio - ESPAÇAMENTOS REMOVIDOS */
        .ad-container {
            margin: 0;
            text-align: center;
            border: none;
            background: transparent;
        }
        
        /* Labels escondidos para usuários, mas visíveis para Google */
        .ad-label {
            position: absolute !important;
            height: 1px !important;
            width: 1px !important;
            overflow: hidden !important;
            clip: rect(1px, 1px, 1px, 1px) !important;
            white-space: nowrap !important;
            font-size: 1px !important;
            color: transparent !important;
            background: transparent !important;
            border: none !important;
            padding: 0 !important;
            margin: -1px !important;
        }
        
        .ad-top, .ad-middle, .ad-bottom, .ad-extra {
            min-height: 90px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        
        /* Card bônus para anúncios nos side cards - MESMA COR DO FUNDO */
        .bonus-ad-card {
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            min-height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 !important;
            padding: 0 !important;
        }
        
        .bonus-ad-content {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent !important;
        }
        
        /* Estilos para elementos do conteúdo principal */
        .titulo {
            margin: 10px 0;
        }
        
        .descricao {
            margin: 8px 0;
            line-height: 1.4;
        }
        
        .autor {
            margin: 6px 0;
        }
        
        .download-container {
            margin: 15px 0;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }
        
        /* Estilos para o botão de compartilhamento - COM HOVER */
        .share-button {
            color: white;
           background-color: #0b7dda !important;
            transition: all 0.3s ease !important;
        }
        
        .share-button:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 4px 8px rgba(33, 150, 243, 0.3) !important;
        }
        
        /* Estilos para o popup de download */
        .download-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            min-height:100% !important;
        }
        
        .popup-content {
            background-color: white;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        
        .popup-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .popup-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        
        .close-popup {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #666;
        }
        
        .popup-step {
            margin: 20px 0;
        }
        
        .loading-container {
            margin: 20px 0;
        }
        
        .loading-bar {
            width: 100%;
            height: 10px;
            background-color: #e0e0e0;
            border-radius: 5px;
            overflow: hidden;
            margin: 15px 0;
        }
        
        .loading-progress {
            height: 100%;
            background-color: #4caf50;
            width: 0%;
            transition: width 0.05s linear;
        }
        
        .loading-text {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }
        
        .ad-container-popup {
            margin: 20px 0;
            min-height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
            border-radius: 4px;
        }
        
        .ad-placeholder {
            color: #999;
            font-size: 14px;
        }
        
        /* Estilos para o popup de redirecionamento */
        .redirect-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1001;
            justify-content: center;
            align-items: center;
        }
        
        .redirect-content {
            background-color: white;
            border-radius: 8px;
            width: 90%;
            max-width: 400px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        
        .redirect-icon {
            font-size: 40px;
            color: #4caf50;
            margin-bottom: 15px;
        }
        
        .redirect-text {
            font-size: 16px;
            color: #333;
            margin-bottom: 20px;
        }
        
        /* ===== ESTILOS PARA LOGIN COM GOOGLE ===== */
        .login-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }

        .login-modal.active {
            display: flex;
        }

        .login-box {
            background-color: #5ca83e;
            border: 3px solid #82d461;
            border-top: 5px solid #52a535;
            border-bottom: 5px solid #2a641c;
            padding: 30px;
            width: 90%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .close-login {
            position: absolute;
            top: 10px;
            right: 15px;
            background: none;
            border: none;
            color: #262423;
            font-size: 24px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .close-login:hover {
            color: #6cc349;
        }

        .login-title {
            color: #262423;
            font-size: 24px;
            margin-bottom: 20px;
            font-family: "Rajdhani", sans-serif;
            font-weight: 700;
        }

        /* ===== PERFIL DO USUÁRIO E DROPDOWN ===== */
        .user-profile {
            display: none;
            align-items: center;
            gap: 10px;
            color: #6cc349;
            position: relative;
            margin-left: 10px;
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 2px solid #6cc349;
            background-color: #6cc349;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #262423;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }

        .user-avatar:hover {
            transform: scale(1.1);
        }

        .user-avatar.has-photo {
            background-color: transparent;
            color: transparent;
            background-size: cover;
            background-position: center;
        }

        .user-name {
            font-family: "Rajdhani", sans-serif;
            font-weight: 600;
        }

        .user-name.desktop {
            display: none;
        }

        .user-name.mobile {
            display: none; /* OCULTAR NOME DO USUÁRIO */
        }

        /* Dropdown Menu - CORRIGIDO PARA NÃO DESAPARECER */
        .user-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #5ca83e;
            border: 3px solid #82d461;
            border-top: 5px solid #52a535;
            border-bottom: 5px solid #2a641c;
            min-width: 180px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            margin-top: 10px;
        }

        .user-dropdown.active {
            display: block;
        }

        .dropdown-header {
            padding: 12px 15px;
            border-bottom: 2px solid #82d461;
            background-color: #4a9e2d;
        }

        .dropdown-header .user-name {
            color: #262423;
            font-weight: 700;
            font-size: 14px;
        }

        .user-dropdown .dropdown-item {
            color: #eaeaea !important;
            font-size: 16px !important;
            font-weight: 600 !important;
        }

        .dropdown-item {
            display: block;
            width: 100%;
            padding: 12px 15px;
            background: none;
            border: none;
            color: #eaeaea;
            font-family: "Rajdhani", sans-serif;
            font-size: 16px;
            text-align: left;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            font-weight: 600;
        }

        .dropdown-item:hover {
            background-color: #6cc349;
            color: #262423;
        }

        .dropdown-item i {
            margin-right: 8px;
            width: 16px;
            text-align: center;
        }
        
        /* Ajustes específicos para mobile */
        @media (max-width: 768px) {
            .skip-download-link {
                font-size: 13px;
                padding: 8px 12px;
            }
            
            .content-date, .content-views {
                font-size: 14px; /* Aumentado de 13px para 14px no mobile */
            }
            
            .side-meta {
                font-size: 12px; /* Aumentado de 11px para 12px no mobile */
            }
            
            .info-title {
                font-size: 16px;
            }
            
            .info-content {
                font-size: 13px;
            }
            
            .popup-content {
                width: 95%;
                padding: 15px;
            }
            
            .ad-top, .ad-middle, .ad-bottom, .ad-extra {
                min-height: 70px;
            }
            
            .bonus-ad-card {
                min-height: 200px;
            }
            
            /* Espaçamentos ainda menores no mobile */
            .additional-info {
                margin: 12px 0;
                padding-top: 8px;
            }
            
            .info-section {
                margin-bottom: 10px;
            }
            
            .content-description {
                margin: 12px 0;
            }
            
            .ad-container {
                margin: 0;
            }
            
            .download-container {
                flex-direction: column;
                align-items: center;
                gap: 8px;
            }
            
            .titulo {
                margin: 8px 0;
            }
            
            .descricao {
                margin: 6px 0;
            }
            
            .autor {
                margin: 4px 0;
            }
        }
    </style>
</head>

<body>
    <!-- Modal de Login (REMOVIDO - AGORA REDIRECIONA PARA PÁGINA DE LOGIN) -->

    <nav class="navbar">
        <div class="navbar-container">
            <a href="/index.html" class="logo">
               <img src="https://i.imghippo.com/files/mxP2154az.png" width="150px" alt="PVCRAFT Logo" draggable="false"></a>

            <div class="search-container">
                <form id="searchForm" action="/home/index.html" method="get">
                    <input type="text" id="pesquisa" name="q" placeholder="Search addons, maps, textures...">
                    <button type="submit" id="searchButton"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <div class="hamburger" id="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

            <ul class="nav-menu" id="navMenu">
                <li><a href="/index.html">HOME</a></li>
                <li><a href="/addons/index.html">ADDONS</a></li>
                <li><a href="/maps/index.html">MAPS</a></li>
                <li><a href="/textures/index.html">TEXTURES</a></li>
                <!-- BOTÃO DE LOGIN - SERÁ OCULTADO QUANDO USUÁRIO ESTIVER LOGADO -->
                <li><a href="/login/index.html" class="login-nav-link" id="loginLink">LOGIN</a></li>
                <li class="user-profile" id="userProfile">
                    <div class="user-avatar" id="userAvatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="user-name desktop" id="userNameDesktop"></span>
                    <span class="user-name mobile" id="userNameMobile"></span>
                    
                    <!-- Dropdown Menu -->
                    <div class="user-dropdown" id="userDropdown">
                        <div class="dropdown-header">
                            <span class="user-name" id="dropdownUserName"></span>
                        </div>
                        <a href="/submission/index.html" class="dropdown-item">
                            <i class="fas fa-upload"></i>SUBMISSION
                        </a>
                        <button class="dropdown-item" id="dropdownLogoutBtn">
                            <i class="fas fa-sign-out-alt"></i>LOGOUT
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
<br>
 
   <div class="content-container">
          <div class="flx-container">

            <div class="" style="display:flex;flex-direction: column;justify-content: space-between;">
                <div class="box-ads">
                    <!-- side-vertical -->
                    <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-8023784976492432"
                    data-ad-slot="6872905425"
                    data-ad-format="auto"
                    data-full-width-responsive="true">
                    </ins>
                </div>
                <div class="box-ads">
                    <!-- side-vertical -->
                    <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-8023784976492432"
                    data-ad-slot="6872905425"
                    data-ad-format="auto"
                    data-full-width-responsive="true">
                    </ins>
                </div>
            </div>

            <div class="content">
                <div class="page">
                    <!-- Content will be loaded here dynamically -->
                    <div class="loading" style="text-align: center; padding: 50px;">
                        <i class="fas fa-spinner fa-spin"></i> Loading map details...
                    </div>
                </div>
                <div class="side-cards">
                    <!-- Related content will be loaded here dynamically -->
                    <div class="loading" style="text-align: center; padding: 20px;">
                        <i class="fas fa-spinner fa-spin"></i> Loading related maps...
                    </div>
                </div>
            </div>

            <div class="" style="display:flex;flex-direction: column;justify-content: space-between;">
                <div class="box-ads">
                    <!-- side-vertical -->
                    <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-8023784976492432"
                    data-ad-slot="6872905425"
                    data-ad-format="auto"
                    data-full-width-responsive="true">
                    </ins>
                </div>
                <div class="box-ads">
                    <!-- side-vertical -->
                    <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-8023784976492432"
                    data-ad-slot="6872905425"
                    data-ad-format="auto"
                    data-full-width-responsive="true">
                    </ins>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup de Download -->
    <div class="download-popup" id="download-popup">
        <div class="popup-content">
            <div class="popup-header">
                <div class="popup-title">Download Verification</div>
                <button class="close-popup" onclick="closeDownloadPopup()">&times;</button>
            </div>
            
            <!-- Primeira etapa: Captcha -->
            <div class="popup-step" id="captcha-step">
                <p>Please verify that you are not a robot to continue with the download.</p>
                <div class="g-recaptcha" data-sitekey="6LeqGfIrAAAAAIxvBaUAynyWYPVUxCJodGzgeJbo" data-callback="onCaptchaSuccess"></div>
            </div>
            
            <!-- Segunda etapa: Anúncio e carregamento -->
            <div class="popup-step" id="ad-step" style="display: none;">
                <p>Your download is being prepared...</p>
                <div class="loading-container">
                    <div class="loading-text">Processing your request</div>
                    <div class="loading-bar">
                        <div class="loading-progress" id="loading-bar"></div>
                    </div>
                </div>
            </div>
            
            <!-- Terceira etapa: Botão de download -->
            <div class="popup-step" id="download-step" style="display: none;">
                <p>Your download is ready!</p>
                <button class="download" onclick="proceedToDownload()" style="margin-top: 15px;">
                    <i class="fas fa-download"></i> DOWNLOAD NOW
                </button>
            </div>
        </div>
    </div>
    
    <!-- Popup de Redirecionamento -->
    <div class="redirect-popup" id="redirect-popup">
        <div class="redirect-content">
            <div class="redirect-icon">
                <i class="fas fa-external-link-alt"></i>
            </div>
            <div class="redirect-text">
                You are being redirected to the download page...
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-links">
            <a href="/terms/index.html">Terms of use</a>
            <a href="/privacy/index.html">Privacy</a>
            <a href="/contact/index.html">Contact us</a>
        </div>

       <div class="social-icons">
            <a href="https://discord.com/invite/CNDkVUp5wX" class="social-icon">
                <i class="fab fa-discord"></i>
            </a>
            <a href="https://www.youtube.com/@pedrovisquicreations" class="social-icon">
                <i class="fab fa-youtube"></i>
            </a>
        </div>

        <div class="footer-info">
            <p>©2025 PVCRAFT.net. All rights reserved.</p>
            <p class="disclaimer">Not affiliated with Mojang or Microsoft. Minecraft is a trademark of Mojang Studios.  
Community creations shared with permission.</p>
        </div>
    </footer>

    <!-- Scripts de anúncios -->
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        (adsbygoogle = window.adsbygoogle || []).push({});
        (adsbygoogle = window.adsbygoogle || []).push({});
        (adsbygoogle = window.adsbygoogle || []).push({});
        (adsbygoogle = window.adsbygoogle || []).push({});
        (adsbygoogle = window.adsbygoogle || []).push({});
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</body>
</html>