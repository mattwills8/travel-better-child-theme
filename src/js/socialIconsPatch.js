(function($) {

  $(document).ready(fixSocialIconsToRight);

  $(window).resize(fixSocialIconsToRight);


  function fixSocialIconsToRight() {

    var socialIcons = $('.header-social-icons');
    var socialIconsWidth = socialIcons.width();
    var containerWidth = $('.container.container-single').width()

    var right = ((window.innerWidth - containerWidth)/2) - 20;
    var headerRight = ((window.innerWidth - 750)/2) - 20;

    var paddingRight = 0;

    if( headerRight < socialIconsWidth ) {

      paddingRight = socialIconsWidth - headerRight + 10;
      paddingRightFloor = paddingRight < 0 ? 0 : paddingRight;

      $('.header-standard').css({'padding-right':paddingRightFloor});
    }

    socialIcons.each(function() {
      $(this).css({'right':-Math.abs(right)});
    });

  }

})(jQuery)
