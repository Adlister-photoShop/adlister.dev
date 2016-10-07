<?php

require_once __DIR__ . '/../utils/helper_functions.php';

function pageController()
{

    // defines array to be returned and extracted for view
    $data = [];

    // finds position for ? in url so we can look at the url minus the get variables
    $get_pos = strpos($_SERVER['REQUEST_URI'], '?');

    // if a ? was found, cuts off get variables if not just gives full url
    if ($get_pos !== false)
    {

        $request = substr($_SERVER['REQUEST_URI'], 0, $get_pos);
    }
    else
    {

        $request = $_SERVER['REQUEST_URI'];
    }

    // switch that will run functions and setup variables dependent on what route was accessed
    switch ($request) {
        case '/':
            $data['login'] = logInFunction();
            $data['signUp'] = signUpFunction();
            if(Auth::check()){
                $main_view = '../views/adlister.php';
            }
            else{
                $main_view = '../views/ps_login.php';
            }
            break;

        case '/adlister':
            if(Auth::check()){
                $main_view = '../views/adlister.php';
            }else{
                $main_view = '../views/ps_login.php';
            }
            break;

        case '/logout':
            Auth::logout();
            $main_view = '../views/ps_login.php';
            break;

        case '/userEdit':
            if(Auth::check()){
                $data['updateUser'] = updateUser();
                var_dump($data['updateUser']);
                $main_view = '../views/adlister.php';
            }
            else{
                $main_view = '../views/ps_login.php';
            }
            break;

        default:    // displays 404 if route not specified above
            $main_view = '../views/404.php';
            break;
    }




    

    
    
    // get the table for the photos
    $data['tablePhotos'] = getPhotos();

    $data['email'] = isset($_SESSION['email']) ? $_SESSION['email']: "";

    $data['name'] = isset($_SESSION['name']) ? $_SESSION['name']: "Unknown";

    $data['main_view'] = $main_view;
    

    return $data;
}

extract(pageController());