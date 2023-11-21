jQuery(document).ready(function($) {
    $('#site-navigation .menu-item:last-child a').on('click', function() {
        $('.secondary-navigation').toggleClass('active-secondary');
        $('.main-navigation').toggleClass('active-main');
    });    
    $('.secondary-navigation .menu-item:first-child a').on('click', function() {
        $('.secondary-navigation').toggleClass('active-secondary');
        $('.main-navigation').toggleClass('active-main');
    });    
});
