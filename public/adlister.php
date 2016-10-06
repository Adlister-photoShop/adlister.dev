

<!DOCTYPE html>
<html lang="en">
    <head>

        <?php require "../views/ps_head.php";  ?>

    </head>
    <body>

        <?php require "../views/ps_navbar.php"; ?>
        <?php require "../views/ps_main.php"; ?>

        <div class="sideNav">
        </div>
        <div class="sideText">
            <button class="logInExit">X</button>
            <div class="showProfile">Hello Username</div>
            <br>
            <div class="showProfile">Edit Profile</div>
            <div class="showPost">Post Photo</div>
            <form class="search">
                <input type="text">
                <button type="submit">Search</button>
            </form>
            <hr>
            <div class="showPost">Catagories</div>
            <div class="list">
                <ul>
                    <li>Catagory</li>
                    <li>Catagory</li>
                    <li>Catagory</li>
                    <li>Catagory</li>
                    <li>Catagory</li>
                    <li>Catagory</li>
                </ul>
            </div>
        </div>
       
        
        <button class='test in'>in</button>
        <button class='test out'>out</button>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="/js/ps_animations.js"></script>


    </body>
</html>