$(document).ready(function(){
    $('.navbar-toggler').click(function() {
        if ($('.navbar-toggler .navbar-toggler__icon .fa-bars').length > 0) {
            $('.navbar-toggler .navbar-toggler__icon .fa-solid').removeClass('fa-bars').addClass('fa-xmark');
            console.log(1);
        } else {
            $('.navbar-toggler .navbar-toggler__icon .fa-solid').removeClass('fa-xmark').addClass('fa-bars')
        }
    });
});