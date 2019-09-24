$(function() {
	$('.filter').click(function() {
		$('.form').toggleClass('active1');
	});

	$('.form').click(function() {
		$('.form').removeClass('active1');
	});


});