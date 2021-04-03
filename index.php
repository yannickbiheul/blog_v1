<?php

session_start();

require('controllers/UserController.php');
require('controllers/PostController.php');
$userController = new UserController;
$postController = new PostController;

if (isset($_GET['action']) && isset($_GET['params'])) {

    $action = $_GET['action'];
    $params = $_GET['params'];

    if (method_exists($userController, $action)) {
        $userController->$action($params);
    } else {
        if (method_exists($postController, $action)) {
            $postController->$action($params);
        } else {
            $postController->home();
        }
    }
} else if (isset($_GET['action']) && !isset($_GET['params'])) {

    $action = $_GET['action'];

    if (method_exists($userController, $action)) {
        $userController->$action();
    } else {
        if (method_exists($postController, $action)) {
            $postController->$action();
        } else {
            $postController->home();
        }
    }
    
} else {

    $postController->home();
}



