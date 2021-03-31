<?php

require 'models/daos/UserDao.php';

class UserService {

    private $_userDao;
    private $_user;

    public function __construct() {
        $this->_userDao = new UserDao;
    }

    public function isMailExists($email) {
        $result = $this->_userDao->checkMail($email);
        return $result;
    }

    public function saveUser($userDatas) {
        $userDatas['firstname'] = htmlspecialchars($userDatas['firstname']);
        $userDatas['lastname'] = htmlspecialchars($userDatas['lastname']);
        $userDatas['pseudo'] = htmlspecialchars($userDatas['pseudo']);
        $userDatas['email'] = htmlspecialchars($userDatas['email']);
        $userDatas['password'] = password_hash($userDatas['password'], PASSWORD_BCRYPT);

        $this->_user = $this->_userDao->createObjectUser($userDatas);
        $this->_userDao->saveMemberinDb($this->_user);
        return $this->_user;
    }
}