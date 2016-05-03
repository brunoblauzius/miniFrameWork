
jQuery(document).ready(function($){
  $('.abrir_menu').click(function(){
    $("body").toggleClass('no_scroll');
  });
});


jQuery(document).ready(function($){
  $(function() {
    initDropDowns($("#menu"));
  });

  function initDropDowns(allMenus) {
    allMenus.children(".abrir_menu").on("click", function() {
      var thisTrigger = jQuery(this),
          thisMenu = thisTrigger.parent(),
          thisPanel = thisTrigger.next();

      if(thisMenu.hasClass("open")){
        thisMenu.removeClass("open");
        jQuery(document).off("click");                                 
        thisPanel.off("click");
      }
      else{	
        allMenus.removeClass("open");	
        thisMenu.addClass("open");
        jQuery(document).on("click", function() {
          allMenus.removeClass("open");
        });
        thisPanel.on("click", function(e) {
          e.stopPropagation();
        });
      }				
      return false;
    });
  }
});

jQuery(document).ready(function($){
  $(document).ready(function() {
    $(".nav li a").each(function() {
      if ($(this).next().length > 0) {
        $(this).addClass("parent");
      };
    })
  })

  $(function(){
    $(".nav li").unbind('mouseenter mouseleave');
    $(".nav li a.parent").unbind('click').bind('click', function(e) {
      // must be attached to anchor element to prevent bubbling
      e.preventDefault();
      $(this).parent("li").toggleClass("hover");
    });
  });
});