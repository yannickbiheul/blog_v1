<?php

require 'models/daos/UserDao.php';

class UserService {

    private $_userDao;
    private $_user;

    public function __construct() {
        $this->_userDao = new UserDao;
    }

    public function askIdUser($pseudo) {
        $idUser = $this->_userDao->getIdUser($pseudo);
        return $idUser;
    }

    public function isMailExists($email) {
        $result = $this->_userDao->getByMail($email);
        return $result;
    }

    public function isPseudoExists($pseudo) {
        $isPseudo = $this->_userDao->getByPseudo($pseudo);
        return $isPseudo;
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

    public function connectUser($datas) {
        $datas['firstname'] = htmlspecialchars($datas['firstname']);
        $datas['lastname'] = htmlspecialchars($datas['lastname']);
        $datas['pseudo'] = htmlspecialchars($datas['pseudo']);
        $datas['email'] = htmlspecialchars($datas['email']);
        $datas['password'] = password_hash($datas['password'], PASSWORD_BCRYPT);

        $this->_user = $this->_userDao->createObjectConnectUser($datas);
        return $this->_user;
    }

    public function sendMail($messageDatas) {
        $messageDatas['firstname'] = htmlspecialchars($messageDatas['firstname']);
        $messageDatas['lastname'] = htmlspecialchars($messageDatas['lastname']);
        $messageDatas['email'] = htmlspecialchars($messageDatas['email']);
        $messageDatas['message'] = htmlspecialchars($messageDatas['message']);

        $to = "yannickbiheul@gmail.com";
        $name = $messageDatas['firstname'] . " " . $messageDatas['lastname'];
        $subject = "Deskad | Message de " . $name . " !";
        $email = $messageDatas['email'];
        $message = $messageDatas['message'];
        $headers = array(
            'From' => 'yannickbiheul@outlook.fr',
            'Reply-To' => $email,
            'X-Mailer' => 'PHP/' . phpversion()
        );
        mail($to, $subject, $message, $headers);
    }
}