<?php

require 'models/daos/BaseDao.php';
require 'models/entities/Post.php';

class PostDao {

    private $_post;

    public function __construct() {
        $this->_post = new Post;
    }

    public function createPostObject($postDatas) {
        $this->_post->setTitle($postDatas['title']);
        $this->_post->setResume($postDatas['resume']);
        $this->_post->setImage($postDatas['image']);
        $this->_post->setContent($postDatas['content']);
        $today = date("Y-m-d");
        $this->_post->setCreationDate($today);
        $this->_post->setIdUsers($postDatas['id_users']);
        $this->_post->setIdCategories($postDatas['id_categories']);
    }
}