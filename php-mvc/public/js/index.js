$(function() {
	$('.add').click(function() {
		$('.form').toggleClass('active1');
		$('.nenden').addClass('active');
	});


	$('.nenden').click(function() {
		$('.form').removeClass('active1');
		$('.nenden').removeClass('active');
	});

});