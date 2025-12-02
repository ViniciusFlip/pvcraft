document.addEventListener('DOMContentLoaded', function () {
    // ========== NAVBAR E SCROLL EFFECT ==========
    const navbar = document.querySelector('.navbar');
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('navMenu');
    const searchContainer = document.querySelector('.search-container');
    const inputPesquisa = document.getElementById('pesquisa');
    const searchButton = document.getElementById('searchButton');

    // Efeito de transparência na navbar ao scrollar
    navbar.style.backgroundColor = 'rgba(38, 36, 35, 1)';

    window.addEventListener('scroll', function () {
        if (window.scrollY === 0) {
            navbar.style.backgroundColor = 'rgba(38, 36, 35, 1)';
        } else {
            navbar.style.backgroundColor = 'rgba(38, 36, 35, 0.9)';
        }
    });

    // ========== MENU HAMBURGUER MOBILE ==========
    hamburger.addEventListener('click', function () {
        this.classList.toggle('active');
        navMenu.classList.toggle('active');

        // Em mobile, alterna a visibilidade da barra de pesquisa
        if (window.innerWidth <= 768) {
            searchContainer.style.display = searchContainer.style.display === 'none' ? 'flex' : 'none';
        }
    });

    // Fechar menu ao clicar em um item
    document.querySelectorAll('.nav-menu a').forEach(item => {
        item.addEventListener('click', () => {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');

            // Em mobile, mostra a barra de pesquisa novamente
            if (window.innerWidth <= 768) {
                searchContainer.style.display = 'flex';
            }
        });
    });

    // ========== SISTEMA DE BUSCA ==========
    function pesquisar() {
        const termo = inputPesquisa.value.trim();
        if (termo) {
            window.location.href = `/search.html?q=${encodeURIComponent(termo)}`;
        }
    }


    // ========== AJUSTE INICIAL PARA MOBILE ==========
    function ajustarLayoutMobile() {
        if (window.innerWidth <= 768) {
            // Garante que a barra de pesquisa está visível inicialmente
            searchContainer.style.display = 'flex';
            // Esconde o menu inicialmente em mobile
            navMenu.classList.remove('active');
            hamburger.classList.remove('active');
        } else {
            // Garante que tudo está visível em desktop
            searchContainer.style.display = 'flex';
            navMenu.classList.remove('active');
            hamburger.classList.remove('active');
        }
    }

    // Executa no carregamento e em redimensionamentos
    ajustarLayoutMobile();
    window.addEventListener('resize', ajustarLayoutMobile);
});
document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    if (status === 'success') {
        alert('Mensagem enviada com sucesso!');
    } else if (status === 'error') {
        alert('Ocorreu um erro ao enviar a mensagem. Por favor, tente novamente.');
    }
});