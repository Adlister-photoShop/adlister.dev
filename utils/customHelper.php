<?php
//function that will sign up the user and add it to the database
function signUpFunction(){
	if($_POST){
		if(!empty(Input::get('name')) && !empty(Input::get('email')) && !empty(Input::get('password'))
			&& !empty(Input::get('conPassword'))){

			if(Input::get('password') == Input::get('conPassword')){
				//register the user
				$user = new User();
				//hashing the password before saving it
				$user->name = Input::get('name');
				$user->email = Input::get('email');
				$user->username = Input::get('email');
				$user->password = Input::get('password');
				//check for duplicates....
				//if the email doesn't exist in the database save
				if(checkDuplicateEmail($user))
					$user->save();
				else
					return "email already in use.";

				if(Auth::attempt($user->username, Input::get('password'))){
					header("Location:/adlister");
					die();
				}
			}
			else{
				return "Passowrds do not match.";
			}
		}
		else{
			return "Check for empty inputs below.";
		}
	}
}
//function that checks for the user log in
function logInFunction(){
	$username = Input::get('email');	
	$password = Input::get('password');
	
	if(Auth::attempt($username, $password)){
		if(Auth::check()){
			header("Location:/adlister");
			die();
		}
	}
	else if(Input::has('username') || Input::has('password')){
		return  "Email and password combination not found.";
	}
}


function getPhotos(){
	$i=0;
	$posts = new Post();
	$arrayOfPosts = $posts->getAllPosts();
	
	$content = '<table class="table">';
	$content .= "<tr>";
	foreach ($arrayOfPosts as $posts) {
		
		if($i % 3 == 0 && $i != 0){
			$content .= "</tr>";
			$content .= "<tr>";
		}
		$content .= "<td>". $posts['name'] ." ";
		$content .=  $posts['image_url'] ." ";
		$content .= $posts['description'];
		$content .= $posts['price'] ."</td>";

		$i++;
	
	}

	$content .= '</table>';
	return $content;
}

//function returns false if user match is found
function checkDuplicateEmail($userObject){
	$arrayOfUsers = $userObject->getArrayUsers();
	foreach ($arrayOfUsers as $user) {
		//if email is equal
		if($user['email'] == $userObject->email)
			return false;
	}
	//if no match was found
	return true;
}

//function for updating/editing the user
function updateUser(){

	if($_POST){
		if(!empty(Input::get('name')) && !empty(Input::get('email')) && !empty(Input::get('password'))
			&& !empty(Input::get('newPassword')) && !empty(Input::get('conPassword'))){
			//if new passwords match
			if(Input::get('newPassword') == Input::get('conPassword')){
				//if old password matches with the one in the database
				$oldPass = User::getUserPassword(Input::get('email'));
				if( password_verify(Input::get('password'), $oldPass)) {
					//register the user
					$user = new User();
					//hashing the password before saving it
					$user->name = Input::get('name');
					$user->email = Input::get('email');
					$user->username = Input::get('email');
					$user->password = Input::get('newPassword');
					$user->id = $_SESSION['LOGGED_IN_ID'];
					//use session id?
					
					$user->save();
					
					
					
				}
				else{
					return "Current password not found.";
				}
			}
			else{
				return "Passwords do not match.";
			}

		}
		else{
			return "Check for empty inputs below.";
		}
	}
}


function imageUploader(){
	$date = date('Y-m-d');
	$post = new Post();
	$imgUrl = Input::get('img_url');
	var_dump($imgUrl);
	var_dump($imgUrl);
	var_dump($imgUrl);var_dump($imgUrl);
	if(saveUploadedImage($imgUrl)){
		$post->user_id = $_SESSION['LOGGED_IN_ID'];
		$post->name = Input::get('name');
		$post->price = Input::get('price');
		$post->description = Input::get('description');
		$post->category = Input::get('category');
		$post->imgage_url = $imgUrl;
		$post->date_posted = $date;
	}
	else{
		return "Error uploading the image";
	}



}
















?>