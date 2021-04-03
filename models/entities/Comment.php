<?php

class Comment {
    private $_comment;
    private $_dateComment;
    private $_idUsers;
    private $_idPosts;

    public function getComment() {
        return $this->_comment;
    }

    public function setComment($comment) {
        $this->_comment = $comment;
        return $this;
    }

    public function getDateComment() {
        return $this->_dateComment;
    }

    public function setDateComment($dateComment) {
        $this->_dateComment = $dateComment;
        return $this;
    }

    public function getIdUsers() {
        return $this->_idUsers;
    }

    public function setIdUsers($idUsers) {
        $this->_idUsers = $idUsers;
        return $this;
    }

    public function getIdPosts() {
        return $this->_idPosts;
    }

    public function setIdPosts($idPosts) {
        $this->_idPosts = $idPosts;
        return $this;
    }


}