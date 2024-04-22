
'use strict';
$(document).ready(function(){

	var toDate = $('[data-pages-countdown-date]').attr('data-pages-countdown-date');

	$(".hour").countdown(toDate, function(event) {
		$(this).text(event.strftime('%H'))
	});
	$(".minutes").countdown(toDate, function(event) {
		$(this).text(event.strftime('%M'))
	});
	$(".seconds").countdown(toDate, function(event) {
		$(this).text(event.strftime('%S'))
	});
});