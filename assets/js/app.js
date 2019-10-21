(function ($) {
    setLoading(true);
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

        var loop = setInterval(function () {
            // the img to watch
            var $img = $("img.preloading");
            if (!!$img.length && $img[0].complete) {
                // clear the timer
                clearInterval(loop);
                setLoading(false);
            }

        }, 30);
    });

    $(window).resize(function () {
        _fixSectionHeader();
    });
    _fixSectionHeader();

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

    function _fixSectionHeader() {
        var container = $('#content');
        var width = container.innerWidth();

        // Permet de corriger la forme wave des sections (en haut)
        $('.section-header-top').find('img').each(function (index, el) {
            var imgHeight = $(el).innerHeight();
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
            var imgHeight = $(el).innerHeight();
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


})(jQuery);

hljs.configure({
    tabReplace: '  '
});
hljs.initHighlightingOnLoad();