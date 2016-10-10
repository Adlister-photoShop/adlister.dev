<?php 
if(Auth::check()){
	require '../views/partials/sidebar.php';
} else{
	require '../views/partials/sidebar_login.php';
}	
 
?>


<!-- messages printed out error or notification -->
<?php
	//notifications for posts
	if(!empty($noErrorEditPost)){
		echo "<div class='alert alert-success text-center'>".$noErrorEditPost."</div>";
	}else if(!empty($noErrorDeletePost)){
		echo "<div class='alert alert-success text-center'>".$noErrorDeletePost."</div>";
	}

	//notifications for edit user
	if(!empty($noErrorEdit) && empty($errorMessageUserEdit)){
		echo "<div class='alert alert-success text-center'>".$noErrorEdit."</div>";
	}

	//error messages
	if(!empty($errorMessageSignUp)){
		echo "<div class='alert alert-danger text-center'>".$errorMessageSignUp."</div>";
	}
	else if (!empty($errorMessageLogIn)){
		echo "<div class='alert alert-danger text-center'>".$errorMessageLogIn."</div>";
	}
	else if(!empty($errorMessageUserEdit)){
		echo "<div class='alert alert-danger text-center'>".$errorMessageUserEdit."</div>";
	}
	
?>

<?php require '../views/ads/index.php'; ?>
<?php require '../views/users/account.php'; ?>
<?php require '../views/ads/create.php'; ?>
<iframe name="frame" style="display:none;"></iframe>
<div class='cover'>cover here</div>
