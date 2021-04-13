<?php

require 'models/daos/CommentDao.php';

class CommentService {

    private $_commentDao;

    public function __construct() {
        $this->_commentDao = new CommentDao;
    }

    public function cleanCommentDatas($datas) {
        $datas['pseudo'] = htmlspecialchars($datas['pseudo']);
        $datas['comment'] = htmlspecialchars($datas['comment']);
        $this->_commentDao->saveComment($datas);
    }

}