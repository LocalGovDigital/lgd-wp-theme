jQuery(document).ready(function($) {

    /*! modernizr 3.3.1 (Custom Build) | MIT *
     * http://modernizr.com/download/?-mq-setclasses !*/
    /*! modernizr 3.3.1 (Custom Build) | MIT *
     * http://modernizr.com/download/?-mediaqueries-svg-setclasses !*/

    // MAIN NAVIGATION
    // mobile menu toggle
    $('#mobile-menu').on("click", function (e) {
        e.preventDefault();
        $('.navbar > section').slideToggle('1500', 'swing');
    });

    // open desktop menu dropdown
    $('.navbar .has-dropdown > a').on("click", function (e) {
        e.stopPropagation();
        e.preventDefault();
        //console.log('yes');
        var distance_from_right = ($(window).width() - ($(this).offset().left + $(this).outerWidth()));
        if(distance_from_right < '300') {
            $(this).next('ul').addClass('drop-left');
        }
        var $this = $(this).next('ul');
        $('.navbar .dropdown').not($this).slideUp();
        $this.slideToggle('1500', 'swing');
        //console.log('1');
    });

    // close menu dropdown
    $(document).click(function (e) {
        e.stopPropagation();
        var container = $(".navbar .has-dropdown");
        //check if the clicked area is dropDown or not
        if (container.has(e.target).length === 0) {
            $('.navbar .dropdown').slideUp();
            //console.log('2');
        }
    });

    // restore desktop menu after mobile menu has been used
    // click events set above prevent desktop menu displaying
    $(window).resize(function() {
        var docWidth = $(document).width();
        //console.log(docWidth);
        if(docWidth > '768' ) {
            $('.navbar > section').removeAttr('style');
        }
    });



    // SITE FUNCTIONS
    // Latest news show / hide for mobile devices
    $('#home__whats-new .feature-news .open-news').on("click", function (e) {
        console.log('open');
        e.preventDefault();
        if($(this).hasClass('opened')){
            $(this).removeClass('opened');
        } else {
            $(this).addClass('opened');
        }
        $('.news-list').slideToggle('slow', 'swing');
    });

    $(window).resize(function() {
        var docWidth = $(document).width();
        //console.log(docWidth);
        if(docWidth > '768' ) {
            $('.news-list').removeAttr('style');
        }
    });

    /* Consultation questions notes show / hide for all devices
    $('.guidance-item a.open').on("click", function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(this).toggleClass('selected');
        $(this).nextAll('.guidance-answer').slideToggle('slow', 'swing');
    });

    // Creates a smooth scroll for anchors
    $(function () {
        $('.scroll-to-anchor a[href*="#"]:not([href="#"])').click(function () {
            //console.log('scroll');
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    }); */
});

