$(document).ready(function() {
	$("#user").click(function() {
		var estat = $("#user_nav").css("display");
		if (estat == "none") {
			$("#user_nav").show();
			$("#user_nav").animate({
				height:"120px"
			}, 500, function() {
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