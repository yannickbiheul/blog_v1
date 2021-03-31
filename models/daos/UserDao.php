<?php

require 'models/daos/BaseDao.php';
require 'models/entities/User.php';

class UserDao extends BaseDao {

    public function checkMail($email) {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM users WHERE email = :email");
        $res = $req->execute([
            ':email' => $email
        ]);
        $result = $req->fetch();
        return $result;
    }

    public function checkPseudo($pseudo) {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
        $res = $req->execute([
            ':pseudo' => $pseudo
        ]);
        $result = $req->fetch();
        return $result;
    }

    public function createObjectUser($userDatas): User {
        $today = date("Y-m-d");
        $user = new User;
        $user->setFirstname($userDatas['firstname']);
        $user->setlastname($userDatas['lastname']);
        $user->setPseudo($userDatas['pseudo']);
        $user->setEmail($userDatas['email']);
        $user->setPassword($userDatas['password']);
        $user->setSignupDate($today);
        $_SESSION['firstname'] = $user->getFirstname();
        $_SESSION['lastname'] = $user->getLastname();
        $_SESSION['pseudo'] = $user->getPseudo();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['signup_date'] = $user->getSignupDate();
        return $user;
    }

    public function saveMemberinDb(USER $user) {
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO users(id, firstname, lastname, pseudo, email, password, signup_date) VALUES(NULL, :firstname, :lastname, :pseudo, :email, :password, :signupDate)");
        $res = $req->execute([
            ':firstname' => $user->getFirstname(),
            ':lastname' => $user->getLastname(),
            ':pseudo' => $user->getPseudo(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword(),
            ':signupDate' => $user->getSignupDate()
        ]);
    }

    public function updateMemberinDb(USER $user) {
        $db = $this->dbConnect();
        $req = $db->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, pseudo = :pseudo, email = :email, password = :password WHERE email = :email");
        $res = $req->execute([
            ':firstname' => $user->getFirstname(),
            ':lastname' => $user->getLastname(),
            ':pseudo' => $user->getPseudo(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword()
        ]);
    }

}