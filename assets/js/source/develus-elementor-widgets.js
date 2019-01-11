jQuery(function ($) {
  var mobile_pages_navigation_toggler = $(".mobile-pages-navigation-toggler");
  var bsa_pages_navigation = $(".widget_bsa_pages_navigation");

  mobile_pages_navigation_toggler.click(function(e) {
    $(this).children("i").toggleClass("fa-caret-down");
    $(this).children("i").toggleClass("fa-caret-up");
    $(this).next(".menu").stop(true).slideToggle("fast");
  });

  $(window).scroll(function() {
    if ($(window).scrollTop() > bsa_pages_navigation.offset().top) {
      if (!bsa_pages_navigation.hasClass("sticky")) {
        bsa_pages_navigation.addClass("sticky");
      }
    }
    else {
      if (bsa_pages_navigation.hasClass("sticky")) {
        bsa_pages_navigation.removeClass("sticky");
      }
    }
  });
});
