
(function($) {

  function selectorsArray() {
    return [
      {
        parent: '.inner-post-entry',
        child: '.tb-fullwidth',
      },
      {
        parent: '.single .container-single',
        child: '.post-image',
      },
      {
        parent: 'article.post',
        child: '.post-pagination',
        width: $('#widget-area .container').width(),
      },
      {
        parent: 'article.post',
        child: '.post-related',
        width: $('#widget-area .container').width(),
      },
    ];
  }

  $(document).ready(function() {
    setElementWidths(selectorsArray());
  });

  $(window).resize(function() {
    setElementWidths(selectorsArray());
  });


  function setElementWidths( selectorsArray ) {

    for(i=0; i < selectorsArray.length; i++) {

      if( ! selectorsArray[i].width ) {
        setFullWidth( selectorsArray[i].parent, selectorsArray[i].child );
        continue;
      }

      setWidth( selectorsArray[i].parent, selectorsArray[i].child, selectorsArray[i].width);
    }
  }


  function setFullWidth( parentFixedWidthSelector, childSelector ) {

    setWidth( parentFixedWidthSelector, childSelector, window.innerWidth );
  }


  function setWidth( parentFixedWidthSelector, childSelector, finalWidth ) {

    var parent = $(parentFixedWidthSelector);

    parent.each(function() {

      var marginSize = ((finalWidth-$(this).width())/2);

      $(this).find(childSelector).each(function() {
        $(this).css({
        "margin-left": -Math.abs(marginSize),
        "margin-right": -Math.abs(marginSize)
        });
      });
    });
  }

})(jQuery);
