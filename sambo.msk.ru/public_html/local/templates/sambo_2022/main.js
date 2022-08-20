document.addEventListener('DOMContentLoaded', function () {
    $('.navbar-toggler').click(function() {
        if ($('.navbar-toggler .navbar-toggler__icon .fa-bars').length > 0) {
            $('.navbar-toggler .navbar-toggler__icon .fa-solid').removeClass('fa-bars').addClass('fa-xmark');
        } else {
            $('.navbar-toggler .navbar-toggler__icon .fa-solid').removeClass('fa-xmark').addClass('fa-bars')
        }
    });

    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 100) {
            $('.to-top-btn').css({opacity : 1}).fadeIn('slow');
        } else {
            $('.to-top-btn').stop(true, false).fadeOut('fast');
        }
    });

    $('.to-top-btn').click(function(evt) {
        evt.preventDefault();
        $('html, body').animate({scrollTop: 0}, 1000);
    });
});