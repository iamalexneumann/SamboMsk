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

    window.addEventListener('scroll', function() {
        const headerCallbackBtn = document.querySelector('.page-header__callback .btn');
        if (window.scrollY >= 300) {
            headerCallbackBtn.style.position = 'fixed';
            headerCallbackBtn.style.transform = 'translateX(-50%)';
        } else {
            headerCallbackBtn.style.position = 'static';
            headerCallbackBtn.style.transform = 'none';
        }
    });

    const arrInputsTel = document.querySelectorAll('input[type=tel]');

    arrInputsTel.forEach(input => {
        Inputmask({
            'mask': '9 (999) 999-99-99',
        }).mask(input);
    })

    const forms = document.querySelectorAll('form');

    forms.forEach(function(form) {
        const requiredInputs = form.querySelectorAll('[required]');
        const submitBtn = form.querySelector('.btn');
        submitBtn.setAttribute('disabled', 'disabled');

        form.addEventListener('input', function() {
            let formValid = true;

            requiredInputs.forEach(function(input) {
                if (!input.value) {
                    formValid = false;
                }
            });

            if (formValid) {
                submitBtn.removeAttribute('disabled');
            } else {
                submitBtn.setAttribute('disabled', 'disabled');
            }
        });
    });
});