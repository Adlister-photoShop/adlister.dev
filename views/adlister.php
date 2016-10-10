<?php 
if(Auth::check()){
	require '../views/partials/sidebar.php';
} else{
	require '../views/partials/sidebar_login.php';
}	
 
?>



    <?php var_dump($errorMessage);?>
    

    <?php require '../views/ads/index.php'; ?>
    <?php require '../views/users/account.php'; ?>
    <?php require '../views/ads/create.php'; ?>
    <iframe name="frame" style="display:none;"></iframe>
    <div class='cover'>cover here</div>
