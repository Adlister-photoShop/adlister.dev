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

    //variable that will spit out the errors
    $data['errorMessage'] = "";

    // switch that will run functions and setup variables dependent on what route was accessed
    switch ($request) {
        case '/':
            $data['login'] = logInFunction();
            //error for log in
            $data['errorMessageLogIn'] = !empty($data['login'])? $data['login']:"";
            // var_dump($data['login']);
            $data['signUp'] = signUpFunction();
            //error signup
            $data['errorMessageSignUp'] = !empty($data['signUp'])? $data['signUp']:"";

            $data['tablePhotos'] = getPhotos();
            $main_view = '../views/adlister.php';
            //
            $data['arraySort'] = getShowPhoto();
            //
            // if(Auth::check()){
               
            // }
            // else{
            //     $main_view = '../views/ps_login.php';
            // }
            break;

        case '/adlister':
            if(Auth::check()){
                
                // $data['tableUserPosts'] = tableUserPosts();
                $data['tablePhotos'] = getPhotos();
                $main_view = '../views/adlister.php';
                //
                $data['arraySort'] = getShowPhoto();
                //
                
            }else{

                $main_view = '../views/ps_login.php';
            }
            break;

        case '/imgUpload':
            if(Auth::check()){
                imageUploader();
                $data['tablePhotos'] = getPhotos();
                $main_view = '../views/adlister.php';
                //
                $data['arraySort'] = getShowPhoto();
                //
               
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
                //error message
                $data['errorMessageUserEdit'] = !empty($data['updateUser'])? $data['updateUser']:"";
                //success message
                if(empty($data['updateUser']))
                    $data['noErrorEdit'] = "User successfully edited.";

                $data['tablePhotos'] = getPhotos();
                $main_view = '../views/adlister.php';
                //
                $data['arraySort'] = getShowPhoto();
                //
            
            }
            else{
                $main_view = '../views/ps_login.php';
            }
            break;
        case '/category':
            // if(Auth::check()){
                $data['tablePhotos'] = getPhotos();
                $arrayCategory = getCategory();

                $data['category'] = showCategory($arrayCategory);
                $main_view = '../views/ads/category.php';

                //
                $data['arraySort'] = getShowPhoto('category');
                //

            // }
            // else{
            //     $main_view = '../views/ps_login.php';
            // }
            break;

        case '/editPost':
            if(Auth::check()){
                $data['editPost'] = editPost();//make

                $data['tablePhotos'] = getPhotos();
                //
                $data['arraySort'] = getShowPhoto();
                //
                $data['noErrorEditPost'] ="Your post was successfully edited.";
               

                $main_view = '../views/adlister.php';
            }
            else{
                $main_view = '../views/ps_login.php';
            }
            break;
        case '/editDelete':
            if(Auth::check()){
                $data['deletePost'] = deletePost();//make

                $data['tablePhotos'] = getPhotos();

                //
                $data['arraySort'] = getShowPhoto();
                //

                $data['noErrorDeletePost'] = "Your post was successfully deleted.";

                $main_view = '../views/adlister.php';
            }
            else{
                $main_view = '../views/ps_login.php';
            }
            break;

        case '/searchBar':
            // if(Auth::check()){
                //get the filtered results
                $data['tablePhotos'] = getFilteredPhotos();

                //
                $data['arraySort'] = getShowPhoto('search');
                //
                // var_dump($data['arraySort']);

                //
                $data['arrayCount'] = Post::getNumberOfPosts();
                //

                //we know that the search gave no results
                if(strlen($data['tablePhotos']) <= 40){
                    //we reassign to get the main view instead
                    //send a message to infor user.
                    $data['tablePhotos'] = getPhotos();
                }
                //refresh the tables for users posts
                // $data['tableUserPosts'] = tableUserPosts();
                $main_view = '../views/adlister.php';
            // }
            // else{
            //     $main_view = '../views/ps_login.php';
            // }
            break;

        case '/sort':
            // if(Auth::check()){
                //get the filtered results
                
                $data['tablePhotos'] = getSortedPhotos(Input::get('sort'));

                //sending the special case where our array changes
                $data['arraySort'] = getShowPhoto('sort');
                //

                // //
                // $data['arrayCount'] = count($data['arraySort']);
                // //


                // var_dump($data['arraySort']);

                $main_view = '../views/adlister.php';
            // }
            // else{
            //     $main_view = '../views/ps_login.php';
            // }
            break;

        default:    // displays 404 if route not specified above
            $main_view = '../views/404.php';
            break;
    }


    

    //function takes user_id and returns the email of the user that posted the picture
    // var_dump(User::getUserEmail(2));
    
    //load the info for the table that has the user's posts every time
    $data['tableUserPosts'] = tableUserPosts();
    

    $data['email'] = isset($_SESSION['email']) ? $_SESSION['email']: "";

    $data['name'] = isset($_SESSION['name']) ? $_SESSION['name']: "Unknown";

    $data['main_view'] = $main_view;
    

    return $data;
}

extract(pageController());