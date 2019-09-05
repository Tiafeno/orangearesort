(function ($) {
	$(document).ready(function () {

		// responsive nav
		var responsiveNav = $('#toggle-nav');
		var navBar = $('.nav-bar');

		responsiveNav.on('click', function (e) {
			e.preventDefault();
			console.log(navBar);
			navBar.toggleClass('active')
		});

		// pseudo active
		if ($('#docs').length) {
			var sidenav = $('ul.side-nav').find('a');
			var url = window.location.pathname.split('/');
			var url = url[url.length - 1];

			sidenav.each(function (i, e) {
				var active = $(e).attr('href');

				if (active === url) {
					$(e).parent('li').addClass('active');
					return false;
				}
			});
		}

		var imgs = document.images,
			len = imgs.length,
			counter = 0;

		[].forEach.call( imgs, function( img ) {
			img.addEventListener( 'load', function () {
				counter++;
				if ( counter === len ) {
					console.log( 'All images loaded!' );
				}
			}, false );
		} );

		$(window).bind("load", function() {
			// code here
			console.log('Image bin load');
		 });


	});
})(jQuery);

hljs.configure({
	tabReplace: '  '
});
hljs.initHighlightingOnLoad();