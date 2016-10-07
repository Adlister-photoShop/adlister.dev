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
	$content ="";
	$content = '<table>';
	$content .= "<tr>";
	foreach ($arrayOfPosts as $posts) {
		
		if($i % 3 == 0 && $i != 0){
			$content .= "</tr>";
			$content .= "<tr>";
		}
		$content .= "<td><div class='tdParent'><div class='titles' id='title" . $i . "'>". $posts['name'] ."</div> ";
		$content .= "<img src='" . $posts['image_url'] . "' class='itemsImg' id='image" . $i ."'>" . " ";
		$content .= "<div class='descriptions' id='description" . $i . "'>" . $posts['description'] . "</div> ";
		$content .= "<div class='prices' id='price" . $i . "'>$" . $posts['price'] ."</div></div></td>";

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
	$post->image_url = saveUploadedImage('img_url');
	$post->user_id = $_SESSION['LOGGED_IN_ID'];
	$post->name = Input::get('name');
	$post->price = Input::get('price');
	$post->description = Input::get('description');
	$post->category = Input::get('category');
	$post->date_posted = $date;

	$post->save();



}


function tableUserPosts(){
	$session = isset($_SESSION['LOGGED_IN_ID']) ? $_SESSION['LOGGED_IN_ID']: 0;
	$array = Post::getPostsForUser($session);
	$i=0;
	$posts = new Post();
	
	$content ="";
	$content = '<table>';
	$content .= "<tr>";
	foreach ($array as $posts) {
		
		if($i % 3 == 0 && $i != 0){
			$content .= "</tr>";
			$content .= "<tr>";
		}
		$content .= "<td><div class='tdParent'><div class='titles' id='title" . $i . "'>". $posts['name'] ."</div> ";
		$content .= "<img src='" . $posts['image_url'] . "' class='itemsImg' id='image" . $i ."'>" . " ";
		$content .= "<div class='descriptions' id='description" . $i . "'>" . $posts['description'] . "</div> ";
		$content .= "<div class='prices' id='price" . $i . "'>$" . $posts['price'] ."</div></div></td>";

		$i++;
	
	}

	$content .= '</table>';
	return $content;
}
















?>