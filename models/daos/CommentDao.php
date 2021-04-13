<?php

// require 'models/daos/BaseDao.php';
require 'models/entities/Comment.php';

class CommentDao extends BaseDao {

    public function saveComment($datas) {
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO comments (comment, date_comment, id_posts, id_users) VALUES (:comment, :date_comment, :id_posts, :id_users)");
        $res = $req->execute([
            ':comment' => $datas['comment'],
            ':date_comment' => $datas['date_comment'],
            ':id_posts' => $datas['id_post'],
            ':id_users' => $datas['id_user']
        ]);
    }


}