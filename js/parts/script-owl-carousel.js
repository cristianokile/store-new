$(document).ready(function() {
	var owl = $('.owl-carousel');
	owl.owlCarousel({
		navigation : true,
		loop: true,
		autoplay: true,
		autoplayTimeout: 4000,
		autoplayHoverPause: true,
		lazyLoad:true,
		margin:15,
		responsive: {
			0: {
				items: 1,
				nav: true
			},
			600: {
				items: 3,
				nav: false
			},
			1000: {
				items: 3,
				nav: false,
				margin: 20
			}
		}
	});
})
