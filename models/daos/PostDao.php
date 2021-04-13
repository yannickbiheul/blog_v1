<?php

// require 'models/daos/BaseDao.php';
require 'models/entities/Post.php';

class PostDao extends BaseDao {

    private $_post;

    public function __construct() {
        $this->_post = new Post;
    }

                                                            /* RECUPERER LES 3 DERNIERS ARTICLES */
    public function getLastPosts() {
        $db = $this->dbConnect();
        $req = $db->query("SELECT p.id AS id_post, p.title AS title_post, p.resume AS resume_post, p.image AS image_post, 
        c.id AS id_category, c.name AS name_category 
        FROM posts AS p
        LEFT JOIN categories AS c  
        ON p.id_categories = c.id 
        ORDER BY p.creation_date DESC LIMIT 3");
        $result = $req->fetchAll();
        return $result;
    }

                                                            /* RECUPERER ID UTILISATEUR */
    public function getIdUsers($userMail) {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT id from users WHERE email = :email");
        $res = $req->execute([
            ':email' => $userMail
        ]);
        $result = $req->fetch();
        return $result['id'];
    }

                                                            /* CREER OBJET ARTICLE */
    public function createPostObject($postDatas) {
        $this->_post->setTitle($postDatas['title']);
        $this->_post->setResume($postDatas['resume']);
        $this->_post->setImage($postDatas[0]);
        $this->_post->setContent($postDatas['content']);
        $this->_post->setCreationDate(date("Y-m-d"));
        $this->_post->setIdUsers($this->getIdUsers($_SESSION['email']));
        $this->_post->setIdCategories($postDatas['id_categories']);
        $this->_post->setIdUsers($postDatas['id_users']);
        return $this->_post;
    }

                                                            /* ENREGISTRER ARTICLE DANS BDD */
    public function savePostInDb(Post $post) {
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO posts(id, title, resume, image, content, creation_date, id_users, id_categories) VALUES(NULL, :title, :resume, :image, :content, :creation_date, :id_users, :id_categories)");
        $res = $req->execute([
            ':title' => $post->getTitle(),
            ':resume' => $post->getResume(),
            ':image' => $post->getImage(),
            ':content' => $post->getContent(),
            ':creation_date' => $post->getCreationDate(),
            ':id_users' => $post->getIdUsers(),
            ':id_categories' => $post->getIdCategories()
        ]);
    }

                                                            /* RECUPERER TOUS LES ARTICLES */
    public function getPosts() {
        $db = $this->dbConnect();
        $req = $db->query("SELECT * FROM posts AS p
        LEFT JOIN categories AS c  
        ON p.id_categories = c.id 
        ORDER BY p.creation_date DESC");
        $result = $req->fetch();
        return $result;
    }

                                                            /* RECUPERER 1 ARTICLE */
    public function getOnePost($idPost) {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT p.id AS id_post, p.title AS title_post, p.resume AS resume_post, p.image AS image_post, p.content AS content_post, DATE_FORMAT(p.creation_date, 'le %d/%m/%Y à %Hh%i') AS creation_date_fr, p.id_users AS id_post_user, p.id_categories AS id_post_category, 
        u.id AS id_user, u.firstname AS firstname_user, u.lastname AS lastname_user, 
        c.id AS id_category, c.name AS name_category 
        FROM posts AS p 
        LEFT JOIN categories as c 
        ON p.id_categories = c.id
        LEFT JOIN users AS u 
        ON p.id_users = u.id 
        WHERE p.id = :id");
        $req->execute([
        ':id' => $idPost
        ]);
        $result = $req->fetch();
        return $result;
    }

                                                            /* ENREGISTRER COMMENTAIRE DANS BDD */
    public function saveComment($commentDatas) {
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO comments (comment, date_comment, id_posts, id_users) VALUES (:comment, :date_comment, :id_posts, :id_users)");
        $res = $req->execute([
            ':comment' => $commentDatas['comment'],
            ':date_comment' => $commentDatas['date'],
            ':id_posts' => $commentDatas['idPost'],
            ':id_users' => $commentDatas['idUser']
        ]);
    }

                                                            /* RECUPERER LES COMMENTAIRES */
    public function getComments($id_post) {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT c.comment, DATE_FORMAT(c.date_comment, 'le %d/%m/%Y à %Hh%i') AS date_comment_fr, u.pseudo 
        FROM comments AS c 
        LEFT JOIN users AS u 
        ON c.id_users = u.id
        WHERE id_posts = :id_posts");
        $req->execute([
            ':id_posts' => $id_post
        ]);
        $result = $req->fetchAll();
        return $result;
    }
}