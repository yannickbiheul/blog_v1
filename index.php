<?php

session_start();

require('controllers/UserController.php');
require('controllers/PostController.php');
$userController = new UserController;
$postController = new PostController;

if (isset($_GET['action']) && isset($_GET['params'])) {

    $action = $_GET['action'];

    if (method_exists($userController, $action)) {
        $userController->$action($_GET['params']);
    } else {
        if (method_exists($postController, $action)) {
            $postController->$action($_GET['params']);
        } else {
            $userController->home();
        }
    }
} else if (isset($_GET['action'])) {

    $action = $_GET['action'];

    if (method_exists($userController, $action)) {
        $userController->$action();
    } else {
        if (method_exists($postController, $action)) {
            $postController->$action();
        } else {
            $userController->home();
        }
    }
    
} else {

    $userController->home();
}



