<?php

require 'models/daos/PostDao.php';

class PostService {

    private $_post;
    private $_postDao;

    public function __construct() {
        $this->_postDao = new PostDao;
    }

                                                            /* DEMANDER LES 4 DERNIERS ARTCLES */
    public function askLasPosts() {
        $lastPosts = $this->_postDao->getLastPosts();
        return $lastPosts;
    }

                                                            /* VERIFIER IMAGE ARTICLE */
    public function checkImage($files) {
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
                array_push($errors, 'Le fichier doit être de type png, jpg ou jpeg !');
            }

            while (file_exists($dossier . $fichier)) {
                $fichier = rand(1, 100).$fichier;
            }

            if (empty($errors)) {

                if (move_uploaded_file($files['image']['tmp_name'], $dossier . $fichier)) {
                    return $files['image']['name'];
                } else {
                    array_push($errors, "Echec de l'upload !");
                    require('views/viewFormAddPost.php');
                }
            } else {
                require('views/viewFormAddPost.php');
            }
        }
    }


    public function askIdUser($email) {
        $idUser = $this->_postDao->getIdUsers($email);
        return $idUser;
    }

                                                            /* ENVOYER ARTICLE DANS BDD */
    public function sendPost($postDatas) {
        $this->_post = $this->_postDao->createPostObject($postDatas);
        $this->_postDao->savePostInDb($this->_post);
        return $this->_post;
    }

                                                            /* DEMANDER TOUS LES ARTICLES */
    public function askPosts() {
        $posts = $this->_postDao->getPosts();
        return $posts;
    }

                                                            /* DEMANDER UN ARTICLE */
    public function askOnePost($idPost) {
        $post = $this->_postDao->getOnePost($idPost);
        return $post;
    }

                                                            /* DEMANDER LES COMMENTAIRES */
    public function askComments($id_post) {
        $commentDatas = $this->_postDao->getComments($id_post);
        return $commentDatas;
    }

}