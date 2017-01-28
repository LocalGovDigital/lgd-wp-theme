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
    $('.has-dropdown > a').on("click", function (e) {
        e.stopPropagation();
        e.preventDefault();
        var $this = $(this).next('ul');
        $('.dropdown').not($this).slideUp();
        $this.slideToggle('1500', 'swing');
        //console.log('1');
    });

    // close menu dropdown
    $(document).click(function (e) {
        e.stopPropagation();
        var container = $(".has-dropdown");
        //check if the clicked area is dropDown or not
        if (container.has(e.target).length === 0) {
            $('.dropdown').slideUp();
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

    // Consultation questions notes show / hide for all devices
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
    });

    // COOKIE MANAGEMENT FUNCTIONS

    // checks if the active_consultations_notice_cookie cookie is set using the readCookie function, if not display .callout box
    // sets spacing between .callout box and the page intro .home-content
    // on resize of screen also change the spacing depending on the height of .callout
    var active_consultations_notice = readCookie('active_consultations_notice_cookie');
    var calloutbox = $('.home-intro .callout');
    //console.log(active_consultations_notice);
    //console.log(calloutbox);
    if(active_consultations_notice == null) {
        calloutbox.css({'height':'auto', 'overflow':'visible'});
        var calloutheight = calloutbox.height();
        //console.log('callouthight:'+calloutheight);
        if(calloutheight >= 350) {
            $('.home-intro .home-content').css({'margin-top':'2.5rem'});
        } else {
            $('.home-intro .home-content').css({'margin-top':'6rem'});
        }
        $(window).resize(function() {
            var checkcalloutheight = calloutbox.height();
            //console.log('checkcallouthight:'+checkcalloutheight);
            if(checkcalloutheight >= 350) {
                $('.home-intro .home-content').css({'margin-top':'2.5rem'});
            } else {
                $('.home-intro .home-content').css({'margin-top':'6rem'});
            }
        });
    }

    // creates the 'active_consultations_notice_cookie' using the 'createCookie' function and gives it a value of 'close' when the .close-callout button is clicked
    $(document).on('click', ".home-intro .callout .close-callout", function(e) {
        e.preventDefault();
        createCookie("active_consultations_notice_cookie", "close", 5);
        $('.home-intro .callout').slideToggle();
        $('.home-intro .home-content').css({'margin-top':'0'});
    });

    // Create a cookie function
    function createCookie(name,value,days) {
        var expires;
        if (days) {
            var date = new Date();
            date.setTime(date.getTime()+(days*24*60*60*1000));
            expires = "; expires="+date.toGMTString();
        }
        else {
            expires = "";
        }
        document.cookie = name+"="+value+expires+"; path=/";
    }

    // Read a cookie function
    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }

    /*function eraseCookie(name) {
        createCookie(name,"",-1);
    }*/

});

