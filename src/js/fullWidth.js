
(function($) {

  var selectorsArray = [
    {
      parent: '.inner-post-entry',
      child: '.tb-fullwidth',
    },
    {
      parent: '.single .container-single',
      child: '.post-image',
    },
  ];

  $(document).ready(function() {
    makeElementsFullWidth(selectorsArray)
  });

  $(window).resize(function() {
    makeElementsFullWidth(selectorsArray)
  });


  function makeElementsFullWidth( selectorsArray ) {

    for(i=0; i < selectorsArray.length; i++) {

      setFullWidth( selectorsArray[i].parent, selectorsArray[i].child );
    }
  }

  function setFullWidth( parentFixedWidthSelector, childSelector ) {

    var parent = $(parentFixedWidthSelector);

    parent.each(function() {

      var marginSize = ((window.innerWidth-$(this).width())/2);

      $(this).find(childSelector).each(function() {
        $(this).css({
        "margin-left": -Math.abs(marginSize),
        "margin-right": -Math.abs(marginSize)
        });
      });
    });
  }

})(jQuery);
