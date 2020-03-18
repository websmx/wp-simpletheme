console.log("scripts.js file loaded");

// Anonymous function for JQuery
(function($) {
	
  $('.hideable').on('click', function() {
    $(this).hide();
  })
	
})( jQuery );