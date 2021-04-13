<?php

session_start();

require('controllers/UserController.php');
require('controllers/PostController.php');
require('controllers/CommentController.php');
$userController = new UserController;
$postController = new PostController;
$commentController = new CommentController;

if (isset($_GET['action']) && isset($_GET['params'])) {

    $action = $_GET['action'];
    $params = $_GET['params'];

    if (method_exists($userController, $action)) {
        $userController->$action($params);
    } else if (method_exists($postController, $action)) {
            $postController->$action($params);
    } else if (method_exists($commentController, $action)){
            $commentController->$action($params);
    } else {
        $postController->home();
    }
    
} else if (isset($_GET['action']) && !isset($_GET['params'])) {

    $action = $_GET['action'];

    if (method_exists($userController, $action)) {
        $userController->$action();
    } else if (method_exists($postController, $action)) {
            $postController->$action();
    } else if (method_exists($commentController, $action)){
            $commentController->$action();
    } else {
        $postController->home();
    }
    
} else {

    $postController->home();
}



