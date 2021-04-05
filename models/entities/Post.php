<?php

class Post {

    protected $_title;
    protected $_resume;
    protected $_image;
    protected $_content;
    protected $_creationDate;
    protected $_idUser;
    protected $_idCategory;

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
        $this->_creationDate = $date;
        return $this;
    }

    public function getIdUser() {
        return $this->_idUsers;
    }

    public function setIdUsers($idUser) {
        $this->_idUser = $idUser;
        return $this;
    }

    public function getIdCategory() {
        return $this->_idCategory;
    }

    public function setIdCategory($idCategory) {
        $this->_idCategory = $idCategory;
        return $this;
    }
}