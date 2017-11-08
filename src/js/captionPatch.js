(function($){

  $(document).ready(function() {

    // need to set the font size of the media gallery captions dynamically
    $('.wp-caption-text strong').css({
      'font-size': $('.wp-caption-text').css('font-size'),
    });

    // we need to remove the margin under the featured image if the first elmnt in the article is a caption
    var firstElmntInArticle = $( $('.inner-post-entry').children()[0] );

    if( firstElmntInArticle.hasClass('tb-caption') ) {

      $('.post-image').css({
        'margin-bottom': 17,
      });

      $('article.post').css({
        'margin-top': 0,
      });
    }

  });

})(jQuery);
