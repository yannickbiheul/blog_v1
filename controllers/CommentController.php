<?php

require 'models/services/CommentService.php';

class CommentController {

    private $_commentService;
    private $_userService;
    private $_postController;

    public function __construct() {
        $this->_commentService = new CommentService;
        $this->_userService = new UserService;
        $this->_postController = new PostController;
    }

    public function getCommentDatas($id_post) {
        if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])
        && isset($_POST['comment']) && !empty($_POST['comment'])) {
            $datas = $_POST;
            $datas['id_post'] = $id_post;
            $datas['id_user'] = $this->_userService->askIdUser($datas['pseudo']);
            $datas['date_comment'] = date("Y-m-d H:i:s");
            $this->_commentService->cleanCommentDatas($datas);
            $this->_postController->post($id_post);
        } else {
            $errors = 'Tous les champs sont requis !';
            $this->_postController->post($id_post);
        }
    }

}