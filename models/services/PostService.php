<?php

require 'models/daos/PostDao.php';

class PostService {

    private $_post;
    private $_postDao;

    public function __construct() {
        $this->_postDao = new PostDao;
    }

    public function sendPost($postDatas) {
        $this->_post = $this->_postDao->createPostObject($postDatas);
        $this->_postDao->savePostInDb($this->_post);
        return $this->_post;
    }
}