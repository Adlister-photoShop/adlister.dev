<?php
//function that checks for the user log in
function logInFunction(){
	echo "im running";
	$username = Input::get('email');	
	$password = Input::get('password');
	
	// $errorMessage="";
	$sessionId = session_id();
	
	if(Auth::attempt($username, $password)){
		if(Auth::check()){
			header("Location:/adlister");
		}
		// else{
		// 	header("Location:/");	
		// }
		// die;

	}
	else if(Input::has('username') || Input::has('password')){
		return  "Username/Email and password combination not found.";
	}
	// else if($sessionId != $_SESSION['LOGGED_IN_ID']){
 //        // session_regenerate_id();
 //        header("Location:/welcome.php");
 //    }
 //    echo "Session id: $sessionId". "Global:". $_SESSION['LOGGED_IN_ID'];    
	
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



?>