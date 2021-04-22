<?php

require 'models/entities/Gallery.php';

class GalleryDao extends BaseDao {

    protected $_gallery;

    public function __construct() {
        $this->_gallery = new Gallery;
    }

    public function getGalleries() {
        $db = $this->dbConnect();
        $req = $db->query("SELECT g.id AS gallery_id, g.title AS gallery_title, g.photo AS gallery_photo, DATE_FORMAT(g.creation_date, 'Le %d/%m/%Y à %Hh%i') AS creation_date_fr, 
        g.id_pseudo AS gallery_id_user, g.id_categories AS gallery_id_categories, 
        u.id AS id_users, u.pseudo AS pseudo_user, c.id AS id_categories, c.name AS name_categories 
        FROM gallery AS g 
        INNER JOIN users AS u ON u.id = g.id_pseudo 
        INNER JOIN categories AS c ON c.id = g.id_categories ");
        $res = $req->fetchAll();
        return $res;
    }

    public function createPhotoObject($galleryDatas) {
        $this->_gallery->setTitle($galleryDatas['title']);
        $this->_gallery->setPhoto($galleryDatas['photo']);
        $this->_gallery->setCreationDate($galleryDatas['creation_date']);
        $this->_gallery->setIdCategories($galleryDatas['id_categories']);
        $this->_gallery->setIdUsers($galleryDatas['id_pseudo']);
        return $this->_gallery;
    }

    public function saveGalleryInDb($gallery) {
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO gallery(id, title, photo, id_pseudo, creation_date, id_categories) VALUES(NULL, :title, :photo, :id_pseudo, :creation_date, :id_categories)");
        $res = $req->execute([
            ':title' => $gallery->getTitle(),
            ':photo' => $gallery->getPhoto(),
            ':id_pseudo' => $gallery->getIdUsers(),
            ':creation_date' => $gallery->getCreationDate(),
            ':id_categories' => $gallery->getIdCategories()
        ]);
    }

    public function getOnePhoto($idPhoto) {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT g.id AS id_gallery, g.title AS title_gallery, g.photo AS photo_gallery, DATE_FORMAT(g.creation_date, 'le %d/%m/%Y à %Hh%i') AS creation_date_fr, 
        g.id_pseudo AS id_user_gallery, g.id_categories AS id_category_gallery, 
        u.id AS id_user, u.pseudo AS pseudo_user, 
        c.id AS id_category, c.name AS name_category 
        FROM gallery AS g  
        LEFT JOIN categories AS c  
        ON g.id_categories = c.id 
        LEFT JOIN users AS u  
        ON g.id_pseudo = u.id  
        WHERE g.id = :id");
        $req->execute([
        ':id' => $idPhoto
        ]);
        $result = $req->fetch();
        return $result;
    }
}