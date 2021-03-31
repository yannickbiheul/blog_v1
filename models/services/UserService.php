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

    public function setUser($newDatas) {
        $newDatas['firstname'] = htmlspecialchars($newDatas['firstname']);
        $newDatas['lastname'] = htmlspecialchars($newDatas['lastname']);
        $newDatas['pseudo'] = htmlspecialchars($newDatas['pseudo']);
        $newDatas['email'] = htmlspecialchars($newDatas['email']);
        $newDatas['password'] = password_hash($newDatas['password'], PASSWORD_BCRYPT);

        $this->_user = $this->_userDao->createObjectUser($newDatas);
        $this->_userDao->updateMemberinDb($this->_user);
        return $this->_user;
    }
}