<?php

require 'models/daos/GalleryDao.php';

class GalleryService {

    protected $_gallery;
    protected $_galleryDao;

    public function __construct() {
        $this->_galleryDao = new GalleryDao;
    }

    public function askGalleries() {
        $galleries = $this->_galleryDao->getGalleries();
        return $galleries;
    }

    
    public function checkPhoto($files) {
        if (isset($files['image'])) {
        
            $dossier = 'assets/images/';
            $extensions = array('.png', '.jpg', '.jpeg');
            $extension = strrchr($files['image']['name'], '.');
            $nomSeul = explode('.', $files['image']['name'])[0];
            $nomComplet = $dossier . basename($files['image']['name']);
            $fichier = basename($files['image']['name']);
            $taille_max = 5000000;
            $taille = filesize($files['image']['tmp_name']);
            $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            $errors = array();

            if ($taille > $taille_max) {
                array_push($errors, 'Le fichier est trop volumineux !');
            }

            if (!in_array($extension, $extensions)) {
                array_push($errors, 'Le fichier doit être de type png, jpg ou jpeg, ou alors le nom est incorrect !');
            }

            while (file_exists($dossier . $fichier)) {
                $fichier = rand(1, 100).$fichier;
            }

            if (empty($errors)) {

                if (move_uploaded_file($files['image']['tmp_name'], $dossier . $fichier)) {
                    return $files['image']['name'];
                } else {
                    array_push($errors, "Echec de l'upload !");
                    require('views/viewFormGallery.php');
                }
            } else {
                require('views/viewFormGallery.php');
            }
        }
    }

    public function sendPhoto($galleryDatas) {
        $this->_gallery = $this->_galleryDao->createPhotoObject($galleryDatas);
        $this->_galleryDao->saveGalleryInDb($this->_gallery);
        return $this->_gallery;
    }
    
}