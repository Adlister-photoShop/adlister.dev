<?php

require_once __DIR__ . '/../../models/Post.php';
//ads array
$ads = [
		[
        'user_id' => 1,
        'name' => 'Dog in the Lake',
        'image_url' => 'https://www.hdwallpapers.net/previews/underwater-dog-868.jpg',
        'description' => 'Picture that I took of my dog at Canyon lake.', 
        'price' => 150.00,
        'date_posted'=>'2007-12-12',
        'category'=> 'animals'
    	],

        [
        'user_id' => 2,
        'name' => 'Landscape',
        'image_url' => 'https://static.pexels.com/photos/1562/italian-landscape-mountains-nature-large.jpg',
        'description' => 'I took this picture while traveling through Europe.', 
        'price' => 450.00,
        'date_posted'=>'2009-10-03',
        'category'=> 'nature'
        ],

        [
        'user_id' => 1,
        'name' => 'Lambo',
        'image_url' => 'https://www.hdwallpapers.net/previews/lamborghini-centenario-lp770-4-1000.jpg',
        'description' => 'The Lamborghini Centenario LPm 770-4 is the most fitting tribute to celebrate 100 years since founder\'s birth.', 
        'price' => 150.00,
        'date_posted'=>'2010-10-03',
        'category'=> 'cars'
        ],

        [
        'user_id' => 2,
        'name' => 'Leo Messi',
        'image_url' => 'https://www.hdwallpapers.net/previews/lionel-messi-adidas-commercial-741.jpg',
        'description' => 'Adidas Messi Mirosar10 Football Boots Advertisement.', 
        'price' => 90.00,
        'date_posted'=>'2011-10-03',
        'category'=> 'sports'
        ],

        [
        'user_id' => 2,
        'name' => 'Italy',
        'image_url' => 'https://www.hdwallpapers.net/previews/lake-prags-italy-1053.jpg',
        'description' => 'The Pragser Wildsee, or Lake Braies, Lake Prags (Italian: Lago di Braies) is a lake in the Prags Dolomites in South Tyrol, Italy.', 
        'price' => 500.00,
        'date_posted'=>'2010-10-03',
        'category'=> 'nature'
        ],

        [
        'user_id' => 2,
        'name' => 'Fenyr',
        'image_url' => 'https://www.hdwallpapers.net/previews/fenyr-supersport-938.jpg',
        'description' => 'The 2016 W Motors\' 900-HP Fenyr Supersport, produced by the Dubai-based and the exotic carmaker W Motors and limited to only 25 units per year.', 
        'price' => 345.00,
        'date_posted'=>'2015-10-03',
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



