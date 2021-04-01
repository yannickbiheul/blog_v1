<?php

require 'models/daos/PostDao.php';

class PostController {

    private $_postDatas;
    private $_errors = array();
    private $_postDao;

    public function __construct() {
        $this->_postDao = new PostDao;
    }

    public function formAddPost() {
        require('views/viewFormAddPost.php');
    }

    public function pullPost() {
        $this->_postDatas = $_POST;

        if (isset($this->_postDatas['id_categories']) && isset($this->_postDatas['title']) 
            && isset($this->_postDatas['resume']) && isset($this->_postDatas['image'])
            && isset($this->_postDatas['content'])) {
            
            $this->postService->sendPost($this->_postDatas);

        } else {
            array_push($this->_errors, 'Tous les champs sont requis');
            $errors = $this->_errors;
            require('views/viewFormAddPost.php');
        }
    }
}