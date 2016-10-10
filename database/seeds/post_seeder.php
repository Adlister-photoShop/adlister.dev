<?php

require_once __DIR__ . '/../../models/Post.php';
//ads array
$ads = [
		[
        'user_id' => 1,
        'name' => 'Cool Looking Animal',
        'image_url' => '/img/uploads/animal1.jpg',
        'description' => 'I saw this thing on my way to work, I got a nice shot then started running away.', 
        'price' => 150.00,
        'date_posted'=>'2007-12-12',
        'category'=> 'animals'
    	],

        [
        'user_id' => 2,
        'name' => 'Landscape',
        'image_url' => '/img/uploads/nature1.jpg',
        'description' => 'I took this picture while traveling through the world.', 
        'price' => 450.00,
        'date_posted'=>'2009-10-03',
        'category'=> 'nature'
        ],

        [
        'user_id' => 1,
        'name' => 'Sweet Car',
        'image_url' => '/img/uploads/car1.jpg',
        'description' => 'Can not say that it is mine but it was me that took this photo.', 
        'price' => 150.00,
        'date_posted'=>'2010-10-03',
        'category'=> 'cars'
        ],

        [
        'user_id' => 2,
        'name' => 'Action!',
        'image_url' => '/img/uploads/sport1.jpg',
        'description' => 'This looks fairly hard, taking this picture I mean.', 
        'price' => 90.00,
        'date_posted'=>'2011-10-03',
        'category'=> 'sports'
        ],

        [
        'user_id' => 2,
        'name' => 'Beautiful Girl',
        'image_url' => '/img/uploads/port1.jpg',
        'description' => 'I was lucky enough get a picture of her.', 
        'price' => 500.00,
        'date_posted'=>'2010-10-03',
        'category'=> 'portraits'
        ],

        [
        'user_id' => 2,
        'name' => 'Human Creation',
        'image_url' => '/img/uploads/arch1.jpg',
        'description' => 'I was traveling around the world, few things caught me like this one', 
        'price' => 345.00,
        'date_posted'=>'2015-10-03',
        'category'=> 'architectural'
        ],

        [
        'user_id' => 1,
        'name' => 'Cool Shot',
        'image_url' => '/img/uploads/other1.jpg',
        'description' => 'I thought this would be pretty creative.', 
        'price' => 145.00,
        'date_posted'=>'2015-11-03',
        'category'=> 'other'
        ],

        [
        'user_id' => 1,
        'name' => 'Cool Looking Animal',
        'image_url' => '/img/uploads/animal2.jpg',
        'description' => 'I saw this thing on my way to work, I got a nice shot then started running away.', 
        'price' => 150.00,
        'date_posted'=>'2007-12-12',
        'category'=> 'animals'
        ],

        [
        'user_id' => 2,
        'name' => 'Landscape',
        'image_url' => '/img/uploads/nature2.jpg',
        'description' => 'I took this picture while traveling through the world.', 
        'price' => 450.00,
        'date_posted'=>'2009-10-03',
        'category'=> 'nature'
        ],

        [
        'user_id' => 1,
        'name' => 'Sweet Car',
        'image_url' => '/img/uploads/car2.jpg',
        'description' => 'Can not say that it is mine but it was me that took this photo.', 
        'price' => 150.00,
        'date_posted'=>'2010-10-03',
        'category'=> 'cars'
        ],

        [
        'user_id' => 2,
        'name' => 'Action!',
        'image_url' => '/img/uploads/sport2.jpg',
        'description' => 'This looks fairly hard, taking this picture I mean.', 
        'price' => 90.00,
        'date_posted'=>'2011-10-03',
        'category'=> 'sports'
        ],

        [
        'user_id' => 2,
        'name' => 'Beautiful Girl',
        'image_url' => '/img/uploads/port2.jpg',
        'description' => 'I was lucky enough get a picture of her.', 
        'price' => 500.00,
        'date_posted'=>'2010-10-03',
        'category'=> 'portraits'
        ],

        [
        'user_id' => 2,
        'name' => 'Human Creation',
        'image_url' => '/img/uploads/arch2.jpg',
        'description' => 'I was traveling around the world, few things caught me like this one', 
        'price' => 345.00,
        'date_posted'=>'2015-10-03',
        'category'=> 'architectural'
        ],

        [
        'user_id' => 1,
        'name' => 'Cool Shot',
        'image_url' => '/img/uploads/other2.jpg',
        'description' => 'I thought this would be pretty creative.', 
        'price' => 145.00,
        'date_posted'=>'2015-11-03',
        'category'=> 'other'
        ],

        [
        'user_id' => 1,
        'name' => 'Cool Looking Animal',
        'image_url' => '/img/uploads/animal3.jpg',
        'description' => 'I saw this thing on my way to work, I got a nice shot then started running away.', 
        'price' => 150.00,
        'date_posted'=>'2007-12-12',
        'category'=> 'animals'
        ],

        [
        'user_id' => 2,
        'name' => 'Landscape',
        'image_url' => '/img/uploads/nature3.jpg',
        'description' => 'I took this picture while traveling through the world.', 
        'price' => 450.00,
        'date_posted'=>'2009-10-03',
        'category'=> 'nature'
        ],

        [
        'user_id' => 1,
        'name' => 'Sweet Car',
        'image_url' => '/img/uploads/car3.jpg',
        'description' => 'Can not say that it is mine but it was me that took this photo.', 
        'price' => 150.00,
        'date_posted'=>'2010-10-03',
        'category'=> 'cars'
        ],

        [
        'user_id' => 2,
        'name' => 'Action!',
        'image_url' => '/img/uploads/sport3.jpg',
        'description' => 'This looks fairly hard, taking this picture I mean.', 
        'price' => 90.00,
        'date_posted'=>'2011-10-03',
        'category'=> 'sports'
        ],

        [
        'user_id' => 2,
        'name' => 'Beautiful Girl',
        'image_url' => '/img/uploads/port3.jpg',
        'description' => 'I was lucky enough get a picture of her.', 
        'price' => 500.00,
        'date_posted'=>'2010-10-03',
        'category'=> 'portraits'
        ],

        [
        'user_id' => 2,
        'name' => 'Human Creation',
        'image_url' => '/img/uploads/arch3.jpg',
        'description' => 'I was traveling around the world, few things caught me like this one', 
        'price' => 345.00,
        'date_posted'=>'2015-10-03',
        'category'=> 'architectural'
        ],

        [
        'user_id' => 1,
        'name' => 'Cool Shot',
        'image_url' => '/img/uploads/other3.jpg',
        'description' => 'I thought this would be pretty creative.', 
        'price' => 145.00,
        'date_posted'=>'2015-11-03',
        'category'=> 'other'
        ],

        [
        'user_id' => 1,
        'name' => 'Cool Looking Animal',
        'image_url' => '/img/uploads/animal4.jpg',
        'description' => 'I saw this thing on my way to work, I got a nice shot then started running away.', 
        'price' => 150.00,
        'date_posted'=>'2007-12-12',
        'category'=> 'animals'
        ],

        [
        'user_id' => 2,
        'name' => 'Landscape',
        'image_url' => '/img/uploads/nature4.jpg',
        'description' => 'I took this picture while traveling through the world.', 
        'price' => 450.00,
        'date_posted'=>'2009-10-03',
        'category'=> 'nature'
        ],

        [
        'user_id' => 1,
        'name' => 'Sweet Car',
        'image_url' => '/img/uploads/car4.jpg',
        'description' => 'Can not say that it is mine but it was me that took this photo.', 
        'price' => 150.00,
        'date_posted'=>'2010-10-03',
        'category'=> 'cars'
        ],

        [
        'user_id' => 2,
        'name' => 'Action!',
        'image_url' => '/img/uploads/sport4.jpg',
        'description' => 'This looks fairly hard, taking this picture I mean.', 
        'price' => 90.00,
        'date_posted'=>'2011-10-03',
        'category'=> 'sports'
        ],

        [
        'user_id' => 2,
        'name' => 'Beautiful Girl',
        'image_url' => '/img/uploads/port4.jpg',
        'description' => 'I was lucky enough get a picture of her.', 
        'price' => 500.00,
        'date_posted'=>'2010-10-03',
        'category'=> 'portraits'
        ],

        [
        'user_id' => 2,
        'name' => 'Human Creation',
        'image_url' => '/img/uploads/arch4.jpg',
        'description' => 'I was traveling around the world, few things caught me like this one', 
        'price' => 345.00,
        'date_posted'=>'2015-10-03',
        'category'=> 'architectural'
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



