<?php

require 'models/services/PostService.php';

class PostController {

    private $_postDatas;
    private $_errors = array();
    private $_postService;

    public function __construct() {
        $this->_postService = new PostService;
    }

                                                            /* ACCUEIL */
    public function home() {
        $lastPosts = $this->_postService->askLasPosts();
        require('views/viewHome.php');
    }

                                                            /* FORMULAIRE AJOUT ARTICLE */
    public function formAddPost() {
        require('views/viewFormAddPost.php');
    }

                                                            /* AJOUT ARTICLE */
    public function createPostDatas() {
        $this->_postDatas = $_POST;
        $title1 = '<h3>' . $this->_postDatas['title1'] . '</h3>';
        $paragraph1 = '<p>' . $this->_postDatas['paragraph1'] . '</p>';
        $this->_postDatas['content'] = $title1 . $paragraph1;
        $this->_postDatas['image'] = $this->_postService->checkImage($_FILES);
        $this->_postDatas['creation_date'] = date("Y-m-d H:i:s");
        $this->_postDatas['id_users'] = $this->_postService->askIdUser($_SESSION['email']);

        if (isset($this->_postDatas['id_categories']) && isset($this->_postDatas['title']) && isset($this->_postDatas['resume'])) {
            
            $this->_postService->sendPost($this->_postDatas);
            $successSend = 'Article enregistré !';
            require('views/viewFormAddPost.php');

        } else {
            array_push($this->_errors, 'Tous les champs sont requis');
            $errors = $this->_errors;
            require('views/viewFormAddPost.php');
        }
    }

                                                            /* AFFICHER TOUS LES ARTICLES */
    public function posts() {
        $posts = $this->_postService->askPosts();
        require('views/viewPosts.php');
    }

                                                            /* AFFICHER 1 ARTICLE */
    public function post($idPost) {
        $post = $this->_postService->askOnePost($idPost);
        $commentDatas = $this->displayComments($idPost);
        require('views/viewPost.php');
    }

                                                            /* AFFICHER LES COMMENTAIRES */
    public function displayComments($id_post) {
        $commentDatas = $this->_postService->askComments($id_post);
        return $commentDatas;
    }

                                                            /* AFFICHER LA METEO */
    public function meteo() {
        require('views/viewMeteo.php');
    }
}