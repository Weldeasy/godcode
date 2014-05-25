$(document).ready(function() {
	$("#user").click(function() {
		var estat = $("#user_nav").css("display");
		if (estat == "none") {
			$("#user_nav").show();
			$("#user_nav").animate({
				height:"120px"
			}, 500, function() {
				var w = $("#user").css('width').substring(0, $("#user").css('width').length-2);
				w -= 39;
				w += "px";
				$("#user_nav").width(w);
				$("#user_nav").children().css('display', 'block');
			});
		} else {
			$("#user_nav").children().hide();
			$("#user_nav").animate({
				height:"0px"
			}, 500, function() {
				$("#user_nav").hide();
			});
		}
	});
	$('html').click(function (e) {
		var estat = $("#user_nav").css("display");
		if ( (e.target.id == 'sidebar') || (e.target.id == 'page-wrapper') ) {
			$("#user_nav").children().hide();
			$("#user_nav").animate({
				height:"0px"
			}, 500, function() {
				$("#user_nav").hide();
			});
		}
	});
});