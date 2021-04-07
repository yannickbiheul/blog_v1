<?php

// require 'models/daos/BaseDao.php';
require 'models/entities/Post.php';

class PostDao extends BaseDao {

    private $_post;

    public function __construct() {
        $this->_post = new Post;
    }

    public function getLastPosts() {
        $db = $this->dbConnect();
        $req = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3");
        $result = $req->fetchAll();
        return $result;
    }

    public function getIdUser($userMail) {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT id from users WHERE email = :email");
        $res = $req->execute([
            ':email' => $userMail
        ]);
        $result = $req->fetch();
        return $result['id'];
    }

    public function createPostObject($postDatas) {
        $this->_post->setTitle($postDatas['title']);
        $this->_post->setResume($postDatas['resume']);
        $this->_post->setImage($postDatas[0]);
        $this->_post->setContent($postDatas['content']);
        $this->_post->setCreationDate(date("Y-m-d"));
        $this->_post->setIdUser($this->getIdUser($_SESSION['email']));
        $this->_post->setIdCategory($postDatas['id_category']);
        return $this->_post;
    }

    public function savePostInDb(Post $post) {
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO posts(id, title, resume, image, content, creation_date, id_user, id_category) VALUES(NULL, :title, :resume, :image, :content, :creation_date, :id_user, :id_category)");
        $res = $req->execute([
            ':title' => $post->getTitle(),
            ':resume' => $post->getResume(),
            ':image' => $post->getImage(),
            ':content' => $post->getContent(),
            ':creation_date' => $post->getCreationDate(),
            ':id_users' => $post->getIdUser(),
            ':id_categories' => $post->getIdCategory()
        ]);
    }

    public function getPosts() {
        $db = $this->dbConnect();
        $req = $db->query("SELECT * FROM posts ORDER BY id DESC");
        $result = $req->fetchAll();
        return $result;
    }

    public function getOnePost($idPost) {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM posts WHERE id = :id");
        $res = $req->execute([
            ':id' => $idPost
        ]);
        $result = $req->fetch();
        return $result;
    }
}