<?php

class Gallery {

    protected $_id;
    protected $_title;
    protected $_photo;
    protected $_idUsers;
    protected $_creationDate;
    protected $_idCategories;

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function setTitle($title) {
        $this->_title = $title;
        return $this;
    }

    public function getPhoto() {
        return $this->_photo;
    }

    public function setPhoto($photo) {
        $this->_photo = $photo;
        return $this;
    }

    public function getIdUsers() {
        return $this->_idUsers;
    }

    public function setIdUsers($idUsers) {
        $this->_idUsers = $idUsers;
        return $this;
    }

    public function getCreationDate() {
        return $this->_creationDate;
    }

    public function setCreationDate($date) {
        $this->_creationDate = $date;
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