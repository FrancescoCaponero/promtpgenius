jQuery(document).ready(function($) {
    $('#site-navigation .menu-item:last-child a').on('click', function() {
        $('.secondary-navigation').toggleClass('active-secondary');
        $('.main-navigation').toggleClass('active-main');
    });    
    $('.secondary-navigation .menu-item:first-child a').on('click', function() {
        $('.secondary-navigation').toggleClass('active-secondary');
        $('.main-navigation').toggleClass('active-main');
    });    
    $('.ham-menu-mobile').on('click', function() {
        $('.main-navigation').toggleClass('active-mobile');
        $('.site-branding').toggleClass('active-mobile-header');
    });    

    $('#main-menu .search-bar a').on('click', function(event) {
        event.preventDefault(); 
        $('#search-bar').toggleClass('flex');
    });

    $(' #closex-search').on('click', function(event) {
        event.preventDefault(); 
        $('#search-bar').toggleClass('flex');
    });

    $(document).mousemove(function(e) {
        var scrollTop = $(window).scrollTop(); 
        $('#custom-cursor').css({
          left: e.clientX + 'px',
          top: (e.clientY + scrollTop) + 'px' 
        });
      });

      $('a').hover(
        function() {
          $('#custom-cursor').css({
            'transform': 'translate(-50%, -50%) scale(1)',
            'width': '25px', 
            'height': '25px'
          });
        }, 
        function() {
          $('#custom-cursor').css({
            'transform': 'translate(-50%, -50%) scale(1)',
            'width': '10px',
            'height': '10px'
          });
        }
      );

});
