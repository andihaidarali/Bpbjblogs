$(document).ready(function () {
	$('.img_slides').bxSlider({
		auto: true,
		minSlides: 1,
		maxSlides: 1,
		controls: true,
		mode: 'fade',
		speed: 1000,
		autoStart: true,
		/*pagerCustom: '#img_control'*/
	});

	$('ul#list_produk').bxSlider({
		mode: 'vertical',
		auto: false,
		controls: true,
		mode: 'fade',
		speed: 1000,
		autoStart: true,
		/*pagerCustom: '#img_control'*/
	});

	$('ul#list_agenda').bxSlider({
		mode: 'vertical',
		auto: false,
		controls: true,
		mode: 'fade',
		speed: 1000,
		autoStart: true,
		/*pagerCustom: '#img_control'*/
	});
});