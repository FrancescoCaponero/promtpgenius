jQuery(document).ready(function($) {
    // ACTIVE FIRST ITEM MENU
    $('#site-navigation .menu-item:last-child a').on('click', function() {
        $('.secondary-navigation').toggleClass('active-secondary');
        $('.main-navigation').toggleClass('active-main');
    });    
    $('.secondary-navigation .menu-item:first-child a').on('click', function() {
        $('.secondary-navigation').toggleClass('active-secondary');
        $('.main-navigation').toggleClass('active-main');
    });    
    //MOBILE
    $('.ham-menu-mobile').on('click', function() {
        $('.main-navigation').toggleClass('active-mobile');
        $('.site-branding').toggleClass('active-mobile-header');

        if ($('.secondary-navigation').hasClass('active-secondary')) {
          $('.secondary-navigation').removeClass('active-secondary');
          $('.main-navigation').removeClass('active-main');
      }
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


    if (localStorage.getItem('darkMode') === 'true') {
      $('body').addClass('dark-mode');
    }
    $('#darkmodebtn').on('click', function(event) {
        event.preventDefault(); 
        $('body').toggleClass('dark-mode');
        localStorage.setItem('darkMode', $('body').hasClass('dark-mode'));
    });

    $('.copy-link-button').click(function() {
      var temp = $('<input>');
      $('body').append(temp);
      temp.val($(this).data('url')).select();
      document.execCommand('copy');
      temp.remove();
      $('.modal-copy').addClass('active-modal');
      setTimeout(() => {
          $('.modal-copy').fadeOut(500, function() {
              $(this).removeClass('active-modal').show();
          });
      }, 500);
  });


});
