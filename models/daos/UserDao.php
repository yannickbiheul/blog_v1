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
        $user = new User;
        $user->setFirstname($userDatas['firstname']);
        $user->setlastname($userDatas['lastname']);
        $user->setPseudo($userDatas['pseudo']);
        $user->setEmail($userDatas['email']);
        $user->setPassword($userDatas['password']);
        $user->setSignupDate(date("Y-m-d H:i:s"));
        $_SESSION['firstname'] = $user->getFirstname();
        $_SESSION['lastname'] = $user->getLastname();
        $_SESSION['pseudo'] = $user->getPseudo();
        $_SESSION['email'] = $user->getEmail();
        $date = new DateTime($user->getSignupDate());
        $dateFR = $date->format('d-m-Y \à Hhi');
        $_SESSION['signup_date'] = $dateFR;
        if ($user->getEmail() == 'yannickbiheul@outlook.fr') {
            $_SESSION['admin'] = true;
        } else {
            $_SESSION['admin'] = false;
        }
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

    public function createObjectConnectUser($datas): User {
        $user = new User;
        $user->setFirstname($datas['firstname']);
        $user->setlastname($datas['lastname']);
        $user->setPseudo($datas['pseudo']);
        $user->setEmail($datas['email']);
        $user->setPassword($datas['password']);
        $user->setSignupDate($datas['signup_date']);
        $_SESSION['firstname'] = $user->getFirstname();
        $_SESSION['lastname'] = $user->getLastname();
        $_SESSION['pseudo'] = $user->getPseudo();
        $_SESSION['email'] = $user->getEmail();
        $date = new DateTime($user->getSignupDate());
        $dateFR = $date->format('d m Y \à H\hi');
        $_SESSION['signup_date'] = $dateFR;
        if ($user->getEmail() == 'yannickbiheul@outlook.fr') {
            $_SESSION['admin'] = true;
        } else {
            $_SESSION['admin'] = false;
        }
        return $user;
    }

}