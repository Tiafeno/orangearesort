(function ($) {
    setLoading(true);
	$.fn.organizeHeaderPosition = function () {
        var width = $(this).innerWidth();
        var imgHeight = 80;

        // Permet de corriger la forme wave des sections (en haut)
        $('.section-header-top').find('img').each(function (index, el) {
            var imgWidth = $(el).innerWidth();
            if (width > imgWidth) {
                var finalHeight = (width * imgHeight) / imgWidth;
                $(el).css({
                    'width': width,
                    'height': parseInt(finalHeight, 10) + 1,
                    'top': -(parseInt(finalHeight, 10) - 1) + 'px'
                });
            }
        });

        /**
         * Permet de corriger la forme wave des sections (en bas)
         */
        $('.section-header-bottom').find('img').each(function (index, el) {
            var imgWidth = $(el).innerWidth();
            if (width > imgWidth) {
                var finalHeight = (width * imgHeight) / imgWidth;
                $(el).css({
                    'width': width,
                    'height': parseInt(finalHeight, 10) + 1,
                    'bottom': -(parseInt(finalHeight, 10) - 1) + 'px'
                });
            }
        });
	}
	
    $(document).ready(function () {

        // responsive nav
        var responsiveNav = $('#toggle-nav');
        var navBar = $('.nav-bar');

        responsiveNav.on('click', function (e) {
            e.preventDefault();
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

        var loop = setInterval(function () {
            // the img to watch
            var $img = $("img.preloading");
            if (!!$img.length && $img[0].complete) {
				$('#content').organizeHeaderPosition();
                setLoading(false);
				clearInterval(loop);
            }

        }, 30);
    });

    $(window).resize(function () {
        $('#content').organizeHeaderPosition();
    });
	
	
    function setLoading(value) {
        var preload = $('.preload-backdrop');
        if (value) {
            $('body').addClass('preload-body');
            preload.css({
                display: 'block'
            });
        } else {
            $('body').removeClass('preload-body');
            preload.css({
                display: 'none'
            });
        }
    }


})(jQuery);

hljs.configure({
    tabReplace: '  '
});
hljs.initHighlightingOnLoad();