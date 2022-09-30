document.addEventListener('DOMContentLoaded', function () {
    const navbarToggler = document.querySelector('.navbar-toggler');

    navbarToggler.addEventListener('click', function () {
        const navbarTogglerIcon = navbarToggler.querySelector('.navbar-toggler__icon .fa-solid');

        if (navbarTogglerIcon.classList.contains('fa-bars')) {
            navbarTogglerIcon.classList.remove('fa-bars');
            navbarTogglerIcon.classList.add('fa-xmark');
        } else {
            navbarTogglerIcon.classList.remove('fa-xmark');
            navbarTogglerIcon.classList.add('fa-bars');
        }
    })

    function trackScroll() {
        const scrolled = window.pageYOffset;
        const coords = document.documentElement.clientHeight;

        if (scrolled > coords) {
            goTopBtn.style.opacity = '1';
        }
        if (scrolled < coords) {
            goTopBtn.style.opacity = '0';
        }
    }

    function backToTop(evt) {
        evt.preventDefault();
        window.scroll(0, 0);
    }

    const goTopBtn = document.querySelector('.to-top-btn');

    window.addEventListener('scroll', trackScroll);
    goTopBtn.addEventListener('click', backToTop);
});