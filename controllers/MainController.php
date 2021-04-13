<?php

require 'models/services/MainService.php';

class MainController {

    private $_mainService;

    public function __construct() {
        $this->_mainService = new MainService;
    }

    public function about() {
        require('views/viewAbout.php');
    }

}