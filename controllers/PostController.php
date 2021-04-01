<?php

require 'models/services/PostService.php';

class PostController {

    private $_postDatas;
    private $_errors = array();
    private $_postService;

    public function __construct() {
        $this->_postService = new PostService;
    }

    public function formAddPost() {
        require('views/viewFormAddPost.php');
    }

    public function pullPost() {
        $this->_postDatas = $_POST;

        if (isset($this->_postDatas['id_categories']) && isset($this->_postDatas['title']) 
            && isset($this->_postDatas['resume']) && isset($this->_postDatas['image'])
            && isset($this->_postDatas['content'])) {
            
            $this->_postService->sendPost($this->_postDatas);
            $successSend = 'Article enregistré !';
            require('views/viewFormAddPost.php');

        } else {
            array_push($this->_errors, 'Tous les champs sont requis');
            $errors = $this->_errors;
            require('views/viewFormAddPost.php');
        }
    }
}