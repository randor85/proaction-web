(function () {
    'use strict';

    document.documentElement.classList.add('js');
    var reducir = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // Barra superior: se oscurece al desplazar
    var barra = document.getElementById('barra');
    function alDesplazar() { barra.classList.toggle('scroll', window.scrollY > 20); }
    window.addEventListener('scroll', alDesplazar, { passive: true });
    alDesplazar();

    // Menú móvil
    var boton = document.getElementById('menuBoton');
    var menu = document.getElementById('menu');
    boton.addEventListener('click', function () {
        var abierto = menu.classList.toggle('abierto');
        boton.setAttribute('aria-expanded', abierto ? 'true' : 'false');
    });
    menu.addEventListener('click', function (e) {
        if (e.target.tagName === 'A') {
            menu.classList.remove('abierto');
            boton.setAttribute('aria-expanded', 'false');
        }
    });

    // Aparición al desplazar
    var revelar = document.querySelectorAll('.revelar');
    if ('IntersectionObserver' in window && !reducir) {
        var obsRevelar = new IntersectionObserver(function (items) {
            items.forEach(function (it) {
                if (it.isIntersecting) { it.target.classList.add('visible'); obsRevelar.unobserve(it.target); }
            });
        }, { threshold: 0.15 });
        revelar.forEach(function (el) { obsRevelar.observe(el); });
    } else {
        revelar.forEach(function (el) { el.classList.add('visible'); });
    }

    // Contadores animados
    function contar(el) {
        var meta = parseInt(el.getAttribute('data-contar'), 10);
        var duracion = 1600, inicio = null;
        function paso(t) {
            if (inicio === null) inicio = t;
            var p = Math.min((t - inicio) / duracion, 1);
            var suave = 1 - Math.pow(1 - p, 3);
            el.textContent = Math.round(meta * suave).toLocaleString('es-CL');
            if (p < 1) requestAnimationFrame(paso);
        }
        requestAnimationFrame(paso);
    }
    var contadores = document.querySelectorAll('[data-contar]');
    if ('IntersectionObserver' in window && !reducir) {
        contadores.forEach(function (el) { el.textContent = '0'; });
        var obsContar = new IntersectionObserver(function (items) {
            items.forEach(function (it) {
                if (it.isIntersecting) { contar(it.target); obsContar.unobserve(it.target); }
            });
        }, { threshold: 0.6 });
        contadores.forEach(function (el) { obsContar.observe(el); });
    }
})();
