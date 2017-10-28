
(function($) {

  $(document).ready(makePenciSliderFullWidth);

  $(window).resize(makePenciSliderFullWidth);


  function makePenciSliderFullWidth() {

    var container = $('.container').has('.vc_row').each(function() {

      var marginSize = ((window.innerWidth-$(this).width())/2);
      console.log(marginSize);

      $(this).find('.tb-penci-slider-vc').each(function() {
        $(this).css({
          "margin-left": -marginSize,
          "margin-right": -marginSize
        });
      });

      $(this).find('.owl-nav').each(function() {
        $(this).width(window.innerWidth);
      });
    });
  }

})(jQuery);
