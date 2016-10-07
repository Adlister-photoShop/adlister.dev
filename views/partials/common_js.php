<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<script>

"use strict";

    function animationInClick(clicker, element, animation, opacity){
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

    function animationOutClick(clicker, element, animation){
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

    $('.logInShow').click(function() {
        $('.signUp').css('display', 'none');
        $('.signUpShow').css('backgroundColor', '#eee');
        $('.logInShow').css('backgroundColor', '#336699');
        $('.logIn').css('display', 'block');
        $('.logIn').animate({
            opacity: '1'
        }, 600);
        $('.signUp').animate({
            opacity: '0'
        }, 600);
    });

    $('.signUpShow').click(function() {
        $('.logIn').css('display', 'none');
        $('.signUpShow').css('backgroundColor', '#336699');
        $('.logInShow').css('backgroundColor', '#eee');
        $('.signUp').css('display', 'block');
        $('.signUp').animate({
            opacity: '1'
        }, 600);
        $('.logIn').animate({
            opacity: '0'
        }, 600);
    });

    $('.profileEdit').click(function() {
        $('.userPhotos').css('display', 'none');
        $('.editAcc').css('display', 'block');
        $('.editAcc').animate({
            opacity: '1'
        }, 600);
        $('.userPhotos').animate({
            opacity: '0'
        }, 600);
    });

    animationInClick('.hamburger', '.sideNav', 'fadeInLeft', '0.8');
    animationOutClick('.logInExit', '.sideNav', 'fadeOutLeft');
    animationInClick('.hamburger', '.sideText', 'slideInLeft', '1');
    animationOutClick('.logInExit', '.sideText', 'fadeOutLeft');

</script>