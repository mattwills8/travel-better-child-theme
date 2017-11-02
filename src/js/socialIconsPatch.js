(function($) {

  $(document).ready(fixSocialIconsToRight);

  $(window).resize(fixSocialIconsToRight);


  function fixSocialIconsToRight() {

    var socialIcons = $('.header-social-icons');
    var socialIconsWidth = socialIcons.width();
    var containerWidth = $('.container.container-single').width()

    var right = ((window.innerWidth - containerWidth)/2) - 20;

    var paddingRight = 0;

    if( right < socialIconsWidth ) {

      paddingRight = socialIconsWidth - right + 10;
      $('.header-wrapper').css({'padding-right':paddingRight});
    }

    socialIcons.each(function() {
      $(this).css({'right':-Math.abs(right)});
    });

  }

})(jQuery)
