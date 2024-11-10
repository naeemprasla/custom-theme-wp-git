(function ($) {
  "use strict";
  //Check OS
  if (navigator.userAgent.indexOf("Mac OS X") != -1) {
    $("body").addClass("mac");
  } else {
    $("body").addClass("pc");
  }

  /* Scrool top */
  $("a.scroll_top").click(function (e) {
    //e.preventDefault();
    $("html,body").scrollTop();
  });

  $(window).on("load", function () {
    $(".loader").fadeOut();
  });

  // Jquery COunter
  var a = false;
  $(window).scroll(function () {
    if (a == false) {
      $(".count").each(function () {
        $(this)
          .prop("Counter", 0)
          .animate(
            {
              Counter: $(this).text(),
            },
            {
              duration: 4000,
              easing: "swing",
              step: function (now) {
                now = Number(Math.ceil(now)).toLocaleString("en");
                $(this).text(now);
              },
            }
          );
      });
      a = true;
    }
  });

  //Fixed Header On Scroll
  $(window).scroll(function () {
    var sticky = $(".site-header"),
      scroll = $(window).scrollTop();
    if (scroll > 150) sticky.addClass("fixed");
    else sticky.removeClass("fixed");
  });

  //Rellax
  var rellax = new Rellax(".rellax", {
    speed: 0.5,
  });

  SmoothScroll({
    // Scrolling Core
    frameRate: 300, // [Hz]
    animationTime: 1000, // [ms]
    stepSize: 70, // [px]

    // Pulse (less tweakable)
    // ratio of "tail" to "acceleration"
    pulseAlgorithm: true,
    pulseScale: 4,
    pulseNormalize: 1,

    // Acceleration
    accelerationDelta: 50, // 50
    accelerationMax: 3, // 3

    // Keyboard Settings
    keyboardSupport: true, // option
    arrowScroll: 50, // [px]

    // Other
    fixedBackground: true,
    excluded: "",
  });
})(jQuery);
