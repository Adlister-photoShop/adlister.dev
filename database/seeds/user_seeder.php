<?php

require_once __DIR__ . '/../../models/User.php';



$user = new User;
$user->name = 'Nicolas Alvarez';
$user->email = 'nico@codeup.com';
$user->username = "nicogranuja";
$user->password = "codeup";
$user->save();

$user = new User;
$user->name = 'Michael Truong';
$user->email = 'michael.d.truong@icloud.com';
$user->username = "michael";
$user->password = "codeup";
$user->save();