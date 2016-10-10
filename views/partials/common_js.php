<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script>

"use strict";

    var totalPost = $('#totalPost').val();
    var totalUserPosts = $('#totalUserPosts').val();
 
    function animationInClick(clicker, element, animation, opacity) {
        clicker = $(clicker)
        element = $(element);
        clicker.click(
            function() {
                element.addClass('animated ' + animation); 
                element.css('display', 'block');       
                element.css('opacity', opacity);
                window.setTimeout(function(){
                    element.removeClass('animated ' + animation);
                }, 1400);         
            });
    }

    function animationOutClick(clicker, element, animation) {
        clicker = $(clicker)
        element = $(element);
        clicker.click(
            function() {
                element.addClass('animated ' + animation);        
                window.setTimeout(function(){
                    element.css('opacity', '0');
                    element.css('display', 'none');
                    element.removeClass('animated ' + animation);
                }, 1400);         
            });
    }

    function animationHover(element, animation){
        element = $(element);
        element.hover(
            function() {
                element.addClass('animated ' + animation);        
            },
            function(){
                //wait for animation to finish before removing classes
                window.setTimeout( function(){
                    element.removeClass('animated ' + animation);
                }, 1800);         
            });
    }

    $(".itemsImg").hover(function() {
        for (var i = 0; i < totalPost; i++) {
            if ($(this).attr('id') == 'image' + i && $(window).width() > 700) {
                // $('#title' + i).stop().animate({
                //     opacity: '0.8',
                //     bottom: '300px'
                // }, 400);
                $('#description' + i).stop().animate({
                    opacity: '0.8',
                    bottom: '0px'
                }, 400);
                // $('#price' + i).stop().animate({
                //     opacity: '0.8',
                //     right: '-1'
                // }, 400);
            }
        }
    }, function() {
        for (var i = 0; i < totalPost; i++) {
            if ($(this).attr('id') == 'image' + i) {
                // $('#title' + i).stop().animate({
                //     opacity: '0',
                //     bottom: '-10px'
                // }, 300);
                $('#description' + i).stop().animate({
                    opacity: '0',
                    bottom: '-10px'
                }, 300);
                // $('#price' + i).stop().animate({
                //     opacity: '0',
                //     right: '-11'
                // }, 300);
            }
        }
    });


    $(".itemsImg").click(function() {
        $('.closeShowPhotos').css('display', 'block');
        $('.openMessage').css('display', 'block');
        $('.over').css('z-index', '1');
        $('.cover').css('display', 'block');
        $('.cover').stop().animate({
            opacity: '0.7'
        }, 300);
        $('.showImage').stop().animate({
            top: '100px'
        }, 300);
        for (var i = 0; i < totalPost; i++) {
            if ($(this).attr('id') == 'image' + i) {
                $('#messageShow' + i).css('display', 'block');
                $('#imagePhoto' + i).css('display', 'block');
                $('#imagePhoto' + i).stop().animate({
                    opacity: '1'
                }, 300);
                $('.closeShowPhotos').stop().animate({
                    opacity: '1'
                }, 300);
                $('.openMessage').stop().animate({
                    opacity: '1'
                }, 300);
            }
        }
    });

    $('.closeShowPhotos').click(function() {
        $('.closeShowPhotos').animate({
                opacity: '0'
            }, 300);
        $('.openMessage').animate({
                opacity: '0'
            }, 300);
        for (var i = 0; i < totalPost; i++) {
            $('#imagePhoto' + i).stop().animate({
                opacity: '0'
                }, 300);
            $('#messageShow' + i).stop().animate({
                opacity: '0'
                }, 300);
            $('.cover').stop().animate({
                opacity: '0'
            }, 300);
            $('.showImage').stop().animate({
            top: '120px'
        }, 300);
        setTimeout(function() {
            $('#imagePhoto' + i).css('display', 'none');
            $('.message').css('display', 'none');
            $('.messageForm').css('display', 'none');
            $('.closeShowPhotos').css('display', 'none');
            $('.openMessage').css('display', 'none');
            $('.cover').css('display', 'none');
            $('.over').css('z-index', '-1');
            $('.messageTextArea').val('');
        }, 300);
        }
    });

    $('.openMessage').click(function() {
        $('.messageForm').css('display', 'block');
        $('.message').stop().animate({
            opacity: '1'
        }, 300);
    });

    $('.messageForm').submit(function(ev) { 
        $('.message').animate({
            opacity: '0'
        }, 500);
    });

    $(".tdParent").click(function() {
        for (var i = 0; i < totalUserPosts; i++) {
            if ($(this).attr('id') == 'cell' + i) {
                $('.userPhotos').css('display', 'none');
                $('.userPhotos').css('opacity', '0');
                $('.profileBack').css('display', 'block');
                $('.profileEdit').css('display', 'none');
                $('#editUserPhoto' + i).css('display', 'block');
                $('#editUserPhoto' + i).animate({
                    opacity: '1'
                }, 500);
            }
        }
    });

    $('.logInShow').click(function() {
        $('.signUp').css('display', 'none');
        $('.signUpShow').css('color', '#ddd');
        $('.logInShow').css('color', '#336699');
        $('.logIn').css('display', 'block');
        $('.logIn').animate({
            opacity: '1'
        }, 500);
        $('.signUp').animate({
            opacity: '0'
        }, 500);
    });

    $('.signUpShow').click(function() {
        $('.logIn').css('display', 'none');
        $('.signUpShow').css('color', '#336699');
        $('.logInShow').css('color', '#ddd');
        $('.signUp').css('display', 'block');
        $('.signUp').animate({
            opacity: '1'
        }, 500);
        $('.logIn').animate({
            opacity: '0'
        }, 500);
    });

    $('.profileEdit').click(function() {
        $('.userPhotos').css('display', 'none');
        $('.profileEdit').css('display', 'none');
        $('.profileBack').css('display', 'block');
        $('.editAcc').css('display', 'block');
        $('.editAcc').animate({
            opacity: '1'
        }, 500);
        $('.userPhotos').animate({
            opacity: '0'
        }, 500);
    });

    $('.profileBack').click(function() {
        $('.profileBack').css('display', 'none');
        $('.userPhotos').css('display', 'block');
        $('.profileEdit').css('display', 'block');
        $('.editAcc').css('display', 'none');
        $('.editUserPhotos').css('display', 'none');
        $('.editAcc').animate({
            opacity: '0'
        }, 500);
        $('.editUserPhotos').animate({
            opacity: '0'
        }, 500);
        $('.userPhotos').animate({
            opacity: '1'
        }, 500);
        setTimeout(function() {

        })
    });


    animationInClick('.hamburger', '.sideNav', 'fadeInLeft', '0.8');
    animationOutClick('.logInExit', '.sideNav', 'fadeOutLeft');
    animationInClick('.hamburger', '.sideText', 'slideInLeft', '1');
    animationOutClick('.logInExit', '.sideText', 'fadeOutLeft');
    animationHover('.hamburger', 'rubberBand');
    animationHover('.logInExit', 'rubberBand');

</script>