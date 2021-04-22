<?php

require 'models/services/GalleryService.php';

class GalleryController {

    protected $_galleryService;
    private $_postService;
    private $_galleryDatas;
    private $_errors = array();

    public function __construct() {
        $this->_galleryService = new GalleryService;
        $this->_postService = new PostService;
    }

    public function showGallery() {
        $galleries = $this->_galleryService->askGalleries();
        require('views/viewGallery.php');
    }

    public function formGallery() {
        $dataCategories = $this->_postService->askCategories();
        require('views/viewFormGallery.php');
    }

    public function createPhotoDatas() {
        $this->_galleryDatas = $_POST;
        $this->_galleryDatas['photo'] = $this->_galleryService->checkPhoto($_FILES);
        $this->_galleryDatas['creation_date'] = date("Y-m-d H:i:s");
        $this->_galleryDatas['id_pseudo'] = $this->_postService->askIdUser($_SESSION['email']);

        if (isset($this->_galleryDatas['id_categories']) && isset($this->_galleryDatas['title'])) {
            
            $this->_galleryService->sendPhoto($this->_galleryDatas);
            $successSend = 'Photo enregistrée !';
            require('views/viewFormGallery.php');

        } else {
            array_push($this->_errors, 'Tous les champs sont requis');
            $errors = $this->_errors;
            require('views/viewFormGallery.php');
        }
    }

    public function viewPhoto($idPhoto) {
        $photo = $this->_galleryService->askOnePhoto($idPhoto);
        // $commentDatas = $this->displayComments($idPhoto);
        require('views/viewPhoto.php');
    }

}