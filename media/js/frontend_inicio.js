$(function() {
	$("#datepicker1").datepicker({ dateFormat: 'yy-mm-dd' });
	$("#datepicker2").datepicker({ dateFormat: 'yy-mm-dd' });
});
/*RESPONSIVE */
$(function() {  
	var pull        = $('#pull');  
		menu        = $('#cssmenu ul');  
		menuHeight  = menu.height();  
  
	$(pull).on('click', function(e) {  
		e.preventDefault();  
		menu.slideToggle();  
	});  
});
$(window).resize(function(){  
	var w = $(window).width();  
	if(w > 320 && menu.is(':hidden')) {  
		menu.removeAttr('style');  
	}  
});
/*RESPONSIVE*/