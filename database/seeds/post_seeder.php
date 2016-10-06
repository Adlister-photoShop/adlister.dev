<?php

require_once __DIR__ . '/../../models/Post.php';
//ads array
$ads = [
		[
        'user_id' => 1,
        'name' => 'Picture 1',
        'image_url' => '/img/placeholder-small.png',
        'description' => 'Plays like new! Includes mario kart.', 
        'price' => 150.00,
        'date_posted'=>'1999-12-12',
        'category'=> 'cars'
    	],
    	
    ];

//for each to set the values from ads
foreach ($ads as $ad) {
	$post = new Post;
	foreach ($ad as $name => $value) {
		$post->$name = $value;
	}
	$post->save();
}



