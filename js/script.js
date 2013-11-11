$(document).ready(function(){
	$("#navbar a").click(function(e){
		e.preventDefault();
		var n = $("#n ul");
		
		if(n.is(":visible")) {
			n.slideUp();
		} else {
			n.slideDown();
		}
	});
	
	$(window).resize(function() {
	  var n = $("#n > ul, #n > div > ul");
      if($(window).width() > 620) {
		n.show();
	  }
	});
});

