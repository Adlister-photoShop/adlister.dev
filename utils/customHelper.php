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
			return;
			// return "Check for empty inputs below.";
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

	$content = getTableFormatTwo($arrayOfPosts);
	
	return $content;
}


function getShowPhoto($case='normal'){
	$i=0;
	$posts = new Post();

	switch ($case) {
		case 'sort':
			//getting special array for sort
			$arrayOfPosts = getArraySort(Input::get('sort'));
			// var_dump($arrayOfPosts);
			break;
		case 'category':
			//getting special array for category
			$arrayOfPosts = getCategory();
			// var_dump($arrayOfPosts);
			break;
		case 'normal':
			$arrayOfPosts = $posts->getAllPosts();
			break;

		case 'search':
			$word = Input::get('searchText');
			
			$array = Post::getFilteredResults($word);

			$arrayOfPosts = getSingleArrayForSearch($array);
			
			break;
		default:
			$arrayOfPosts = $posts->getAllPosts();
			break;
	}
	
	$content = "";
	foreach ($arrayOfPosts as $posts) {
		$content .= "<div class='showImage' id='showImageId" . $i . "'><div class='openMessage'>M</div><div class='closeShowPhotos'>X</div><img src='" . $posts['image_url'] . "' class='showImagePhoto' id='imagePhoto" . $i ."'></div>";

		$i++;
	}
	return $content;
}

function getShowMessage(){
	$i=0;
	$posts = new Post();
	$arrayOfPosts = $posts->getAllPosts();
	$content = "";
	foreach ($arrayOfPosts as $posts) {
		$content .= "<div class='message' id='messageShow" . $i . "'><form method='POST' class='messageForm' target='frame' action='https://formspree.io/".User::getUserEmail($posts['user_id'])."'>";
		$content .= "<input type='hidden' name='name' placeholder='Your Contact Info' class='inputs'>";
		$content .= "<textarea name='formMessage' placeholder='Your Message' class='inputs messageTextArea'></textarea><br><button type='submit' class='logInBtn'>Send</button></form></div>";

		$i++;
	}
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
					return "Current password does not match.";
				}
			}
			else{
				return "New passwords do not match.";
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
 		$content .= "<td><div class='tdParent' id='cell" . $i . "'>";
 		$content .= "<img src='" . $posts['image_url'] . "' class='itemsImgTwo showEditPost' id='userImage" . $i ."'></div></td>";
 
 		$i++;
  	
 	}
 
 	$content .= '</table>';
	
	return $content;
}


function userPostsEdit(){
	$session = isset($_SESSION['LOGGED_IN_ID']) ? $_SESSION['LOGGED_IN_ID']: 0;
	$array = Post::getPostsForUser($session);
	$i=0;
	$posts = new Post();
	
	$content ="";
	foreach ($array as $posts) {
		
		$content .= "<div class='editUserPhotos' id='editUserPhoto" . $i . "'><img src='" . $posts['image_url'] . "' class='editPhoto'><form method='POST' class='editForm' action='editPost'>";
		$content .= "<input type='hidden' name='id' value='" . $posts['id'] . "'><input type='text' name='name' placeholder='Title' value='".$posts['name']."'' class='inputs' required='true'><input type='number' name='price' value=".$posts['price']. " placeholder='Asking Price' class='inputs' required='true'>";
		$content .= "<textarea name='description'  placeholder='Description' class='inputs'>".$posts['description']."</textarea><label for='catagories'>What is the Genre of your photo?</label>";
		$content .= "<select class='catagories' name='category'><option value='animals'>Animals</option><option value='architectural' selected>Architectural</option><option value='cars'>Cars</option>";
		$content .= "<option value='nature' selected>Nature</option><option value='portraits'>Portraits</option><option value='sports' selected>Sports</option><option value='other' selected>Other</option></select><br><button type='submit' class='logInBtn'>Edit</button></form><br><br>";
		$content .= "<form method='POST' action='editDelete'><input type='hidden' name='id' value='" . $posts['id'] . "'><button type='submit' class='logInBtn deleteBtn'>Delete</button></form></div>";

		$i++;
	
	}

	return $content;
}


function userPostsCount(){
	$session = isset($_SESSION['LOGGED_IN_ID']) ? $_SESSION['LOGGED_IN_ID']: 0;
	$array = Post::getPostsForUser($session);
	return count($array);
}


function getCategory(){
	$content="";
	if($_POST){

		if(Input::get('animals') == 'animals'){
			$content = Post::getPostsFiltered('animals');
			return $content;
			
		}
		

		if(Input::get('architectural') == 'architectural'){
			$content = Post::getPostsFiltered('architectural');
			return $content;
		}
		

		if(Input::get('cars') == 'cars'){
			$content = Post::getPostsFiltered('cars');
			return $content;
		}
		

		if(Input::get('nature') == 'nature'){
			$content = Post::getPostsFiltered('nature');
			return $content;
		}
		

		if(Input::get('portraits') == 'portraits'){
			$content = Post::getPostsFiltered('portraits');
			return $content;
		}
		

		if(Input::get('sports') == 'sports'){
			$content = Post::getPostsFiltered('sports');
			return $content;
		}
		

		if(Input::get('other') == 'other'){
			$content = Post::getPostsFiltered('other');
			return $content;
		}

		else{
			$content ="Error in the default";
			return $content;
		}

		
	}	
}


function showCategory($array){
	$posts = new Post();

	$content = getTableFormatTwo($array);
	
	return $content;
}


function deletePost(){
	if($_POST){
		Post::deletePost(Input::get('id'));
		return "User deleted";
	}
	return;
}

function editPost(){
	if($_POST){
		$post = new Post();
		$date = date('Y-m-d');

		$post->name = Input::get('name');
		$post->price = Input::get('price');
		$post->description = Input::get('description');
		$post->category = Input::get('category');
		$post->date_posted = $date;


		$post->id = Input::get('id');
		//should update since id is defined
		$post->save();
	}
}

function getSingleArrayForSearch($arrays){
	$result=[];
	$id=[];
	foreach ($arrays as $array) {
		foreach ($array as $posts) {

			for ($i=0; $i < count($id); $i++) {
					if($id[$i] == $posts['id']){
						$i++;
						continue 2;
					}
				}
				//if we didn't have that id in the array now we do
				$id []= $posts['id'];//save in the array of id's
				$result[] = $posts;

			}	
	}
	return $result;
}

function getFilteredPhotos(){
	if($_POST){
		$content = [];
		$i =0;
		$result="";

		$word = Input::get('searchText');

		$content = Post::getFilteredResults($word);
		


		$result = "<table class='mainTable'>";
		$result .= "<tr>";


		$id=[];
		foreach ($content as $arrays) {

			foreach ($arrays as $posts) {
					
				if($i % 3 == 0 && $i != 0){
					$result .= "</tr>";
					$result .= "<tr>";
				}
				//runs through the id's
				for ($i=0; $i < count($id); $i++) {
					//if the id has already been saved in the array
					//means repeated id
					if($id[$i] == $posts['id']){
						$i++;
						continue 2;
					}
					//get out of this for loop and skil one iteration of the inner for each
				}
				//if we didn't have that id in the array now we do
				$id []= $posts['id'];//save in the array of id's


				// $result .= "<td><img src='" . $posts['image_url'] . "' class='itemsImg item' id='image" . $i ."'>" . " ";
				// $result .= "<div class='tdParent'><div class='titles' id='title" . $i . "'>". $posts['name'] ."</div> ";
				// $result .= "<div class='descriptions' id='description" . $i . "'>" . $posts['description'] . "</div> ";
				// $result .= "<div class='prices' id='price" . $i . "'>$" . $posts['price'] ."</div></div></td>";

				// $i++;

				$result .= "<td><img src='" . $posts['image_url'] . "' class='itemsImg item' id='image" . $i ."'>";
				$result .= "<div class='tdParent' id='tcell" . $i . "'><div class='titles' id='title" . $i . "'>". $posts['name'] ."</div> ";
				$result .= "<div class='descriptions' id='description" . $i . "'><span class='thePrice'>$" . $posts['price'] . "</span><br>" . $posts['name'] . "<br>" . "<br>" . $posts['description'] . "</div> ";
				$result .= "<div class='prices' id='price" . $i . "'>$" . $posts['price'] ."</div></div></td>";

				$i++;
				
			}
		}
		$result .= "</table>";
		return $result;
	}
}

function getArraySort($sortBy){
	$content ="";
	if(Input::has('sortA')){
		$content = Post::sortBy(Input::get('sortA'), 'ASC');
	}
	else if(Input::has('sortD')){
		$content = Post::sortBy(Input::get('sortD'), 'DESC');
	}
	else{
		return "Error in sort";
	}
	return $content;
}

function getSortedPhotos($sortBy){
	$content ="";
	if(Input::has('sortA')){
		$content = Post::sortBy(Input::get('sortA'), 'ASC');
	}
	else if(Input::has('sortD')){
		$content = Post::sortBy(Input::get('sortD'), 'DESC');
	}
	else{
		return "Error in sort";
	}

	$result = getTableFormatTwo($content);



	return $result;

}

//function takes an array and returns the table formated with html
function getTableFormat($array){
	$i=0;
	$content ="";
	$content = "<table class='mainTable'>";
	$content .= "<tr>";
	foreach ($array as $posts) {
		
		if($i % 3 == 0 && $i != 0){
			$content .= "</tr>";
			$content .= "<tr>";
		}
		$content .= "<td><img src='" . $posts['image_url'] . "' class='itemsImg item' id='image" . $i ."'>";
		$content .= "<div class='tdParent' id='tcell" . $i . "'><div class='titles' id='title" . $i . "'>". $posts['name'] ."</div> ";
		$content .= "<div class='descriptions' id='description" . $i . "'><span class='thePrice'>$" . $posts['price'] . "</span><br>" . $posts['name'] . "<br>" . "<br>" . $posts['description'] . "</div> ";
		$content .= "<div class='prices' id='price" . $i . "'>$" . $posts['price'] ."</div></div></td>";

		$i++;
	
	}

	$content .= '</table>';
	return $content;
}

function getTableFormatTwo($array){
	$i=0;
	$content ="";
	$content = "<table class='mainTable'>";
	$content .= "<tr>";
	foreach ($array as $posts) {
		
		if($i % 3 == 0 && $i != 0){
			$content .= "</tr>";
			$content .= "<tr>";
		}
		$content .= "<td><img src='" . $posts['image_url'] . "' class='itemsImg item' id='image" . $i ."'>";
		$content .= "<div class='tdParent' id='tcell" . $i . "'><div class='titles' id='title" . $i . "'>". $posts['name'] ."</div> ";
		$content .= "<div class='descriptions' id='description" . $i . "'><span class='thePrice'>$" . $posts['price'] . "</span><br>" . $posts['name'] . "<br>" . "<br>" . $posts['description'] . "</div> ";
		$content .= "<div class='prices' id='price" . $i . "'>$" . $posts['price'] ."</div></div></td>";

		$i++;
	
	}

	$content .= '</table>';
	return $content;
}

// function getTableFormat($array){
// 	$i=0;
// 	$content ="";
// 	$content = "<table class='mainTable'>";
// 	$content .= "<tr>";
// 	foreach ($array as $posts) {
		
// 		if($i % 3 == 0 && $i != 0){
// 			$content .= "</tr>";
// 			$content .= "<tr>";
// 		}
// 		$content .= "<td><img src='" . $posts['image_url'] . "' class='itemsImg item' id='image" . $i ."'>";
// 		$content .= "<div class='tdParent' id='tcell" . $i . "'><div class='titles' id='title" . $i . "'>". $posts['name'] ."</div> ";
// 		$content .= "<div class='descriptions' id='description" . $i . "'>" . $posts['description'] . "</div> ";
// 		$content .= "<div class='prices' id='price" . $i . "'>$" . $posts['price'] ."</div></div></td>";

// 		$i++;
	
// 	}

// 	$content .= '</table>';
// 	return $content;
// }





?>