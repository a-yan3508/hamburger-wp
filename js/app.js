jQuery(function($) {
  // メニュー開閉
  if ($('.l-menu').length > 0) {
    const headerMenuToggle = $('.l-header__menuToggle');
    const menu = $('.l-menu');
    const menuSlide = $('.l-menu__inner');
    const menuClose = $('.l-menu__close');
    const menuBg = $('.l-menu__bg');
    
    headerMenuToggle.on('click', function () {
      menu.addClass('is-active');
      menuSlide.addClass('is-active');
      $('body').addClass('u-ovh');
    });
  
    menuClose.on('click', function () {
      menu.removeClass('is-active');
      menuSlide.removeClass('is-active');
      $('body').removeClass('u-ovh');
    });
  
    menuBg.on('click', function () {
      $(this).removeClass('is-active');
      menu.removeClass('is-active');
      menuSlide.removeClass('is-active');
      $('body').removeClass('u-ovh');
    });
    
    $(window).on('load resize',function() {
      const w = $(window).width();
      if (w < 1280) {
        menu.addClass('u-transition');
        menuSlide.addClass('u-transition');
      } else {
        menu.removeClass('u-transition');
        menuSlide.removeClass('u-transition');
      }
    });
  }
});
