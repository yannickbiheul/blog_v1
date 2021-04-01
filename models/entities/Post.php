<?php

class Post {

    protected $_title;
    protected $_resume;
    protected $_image;
    protected $_content;
    protected $_creationDate;
    protected $_idUsers;
    protected $_idCategories;

    public function getTitle() {
        return $this->_title;
    }

    public function setTitle($title) {
        $this->_title = $title;
        return $this;
    }

    public function getResume() {
        return $this->_resume;
    }

    public function setResume($resume) {
        $this->_resume = $resume;
        return $this;
    }

    public function getImage() {
        return $this->_image;
    }

    public function setImage($image) {
        $this->_image = $image;
        return $this;
    }

    public function getContent() {
        return $this->_content;
    }

    public function setContent($content) {
        $this->_content = $content;
        return $this;
    }

    public function getCreationDate() {
        return $this->_creationDate;
    }

    public function setCreationDate($date) {
        $this->_creationDate = date('d-m-Y', strtotime($date));
        return $this;
    }

    public function getIdUsers() {
        return $this->_idUsers;
    }

    public function setIdUsers($idUsers) {
        $this->_idUsers = $idUsers;
        return $this;
    }

    public function getIdCategories() {
        return $this->_idCategories;
    }

    public function setIdCategories($idCategories) {
        $this->_idCategories = $idCategories;
        return $this;
    }
}