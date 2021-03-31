<?php

session_start();

require('controllers/UserController.php');
$userController = new UserController;

if (isset($_GET['action'])) {

    $action = $_GET['action'];

    if ($_GET['action'] == $action) {
        $userController->$action();
    }

} else {

    $userController->home();
}

