<?php
session_start();
// echo session_id();
require_once __DIR__ . '/../bootstrap.php';
// echo "Session id:". session_id(). "Global:". $_SESSION['LOGGED_IN_ID'];    
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <?php require "../views/ps_head.php";  ?>

    </head>
    <body>
        
        <div class="container front">
            <div class="banner">
                <img src="/img/placeholder.png" class="bannerImg">
            </div>
        </div>
        <?php require $main_view; ?>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="/js/ps_animations.js"></script>

    </body>
</html>