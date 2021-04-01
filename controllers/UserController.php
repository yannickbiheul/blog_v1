<?php

require 'models/services/UserService.php';

class UserController {

    private $_userDatas;
    private $_errors = array();
    private $_userService;
    private $_fields;
    private $_user;

    public function __construct() {
        $this->_userService = new UserService;
    }

    public function home() {
        require('views/viewHome.php');
    }

    public function formSignup() {
        require('views/viewFormSignup.php');
    }

    public function signup() {

        $this->_userDatas = $_POST;

        if (isset($this->_userDatas['firstname']) && !empty($this->_userDatas['firstname'])
            && isset($this->_userDatas['lastname']) && !empty($this->_userDatas['lastname'])
            && isset($this->_userDatas['pseudo']) && !empty($this->_userDatas['pseudo'])
            && isset($this->_userDatas['email']) && !empty($this->_userDatas['email'])
            && isset($this->_userDatas['password']) && !empty($this->_userDatas['password'])
            && isset($this->_userDatas['cpassword']) && !empty($this->_userDatas['cpassword'])) {

                // Vérification Prénom
                if ((preg_match('#[0-9]#', $this->_userDatas['firstname'])) || strlen($this->_userDatas['firstname']) < 3) {
                    array_push($this->_errors, "Prénom incorrect");
                }

                // Vérification Nom
                if ((preg_match('#[0-9]#', $this->_userDatas['lastname'])) || strlen($this->_userDatas['lastname']) < 3) {
                    array_push($this->_errors, "Nom incorrect");
                }

                // Vérification Pseudo
                if (strlen($this->_userDatas['pseudo']) < 3) {
                    array_push($this->_errors, "Pseudo incorrect");
                }

                $isPseudo = $this->_userService->isPseudoExists($this->_userDatas['pseudo']);

                if ($isPseudo) {
                    if ($isPseudo['pseudo'] == $this->_userDatas['pseudo']) {
                        array_push($this->_errors, "Pseudo déjà pris");
                    } 
                }

                // Vérification Email
                if (!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $this->_userDatas['email'])) {
                    array_push($this->_errors, "Email incorrect");
                }

                $mail = $this->_userService->isMailExists($this->_userDatas['email']);

                if ($mail) {
                    if ($mail['email'] == $this->_userDatas['email']) {
                        array_push($this->_errors, "Email déjà enregistré");
                    } 
                }

                // Vérification Mots de passe
                if ($this->_userDatas['password'] != $this->_userDatas['cpassword']) {
                    array_push($this->_errors, "Les mots de passe ne concordent pas");
                }

                if (empty($this->_errors)) {
                    $this->_user = $this->_userService->saveUser($this->_userDatas);
                    $datas = $this->_user;
                    require('views/viewMemberPage.php');
                } else {
                    $fails = $this->_errors;
                    require('views/viewFormSignup.php');
                }

            } else {
                $this->_fields = 'Veuillez remplir tous les champs';
                $fields = $this->_fields;
                require('views/viewFormSignup.php');
            }

    }

    public function memberPage() {
        require('views/viewMemberPage.php');
    }

    public function formSetUser() {
        require('views/viewFormSetUser.php');
    }

    public function update() {
        $this->_userDatas = $_POST;

        if (isset($this->_userDatas['firstname']) && !empty($this->_userDatas['firstname'])
            && isset($this->_userDatas['lastname']) && !empty($this->_userDatas['lastname'])
            && isset($this->_userDatas['pseudo']) && !empty($this->_userDatas['pseudo'])
            && isset($this->_userDatas['email']) && !empty($this->_userDatas['email'])
            && isset($this->_userDatas['password']) && !empty($this->_userDatas['password'])
            && isset($this->_userDatas['cpassword']) && !empty($this->_userDatas['cpassword'])) {

                if ((preg_match('#[0-9]#', $this->_userDatas['firstname'])) || strlen($this->_userDatas['firstname']) < 3) {
                    array_push($this->_errors, "Prénom incorrect");
                }

                if ((preg_match('#[0-9]#', $this->_userDatas['lastname'])) || strlen($this->_userDatas['lastname']) < 3) {
                    array_push($this->_errors, "Nom incorrect");
                }

                if (strlen($this->_userDatas['pseudo']) < 3) {
                    array_push($this->_errors, "Pseudo incorrect");
                }

                if (!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $this->_userDatas['email'])) {
                    array_push($this->_errors, "Email incorrect");
                }

                if ($_SESSION['email'] != $this->_userDatas['email']) {
                    $result = $this->_userService->isMailExists($this->_userDatas['email']);

                    if ($result) {
                        if ($result['email'] == $this->_userDatas['email']) {
                            array_push($this->_errors, "Email déjà enregistré");
                        } 
                    }
                }   

                if ($this->_userDatas['password'] != $this->_userDatas['cpassword']) {
                    array_push($this->_errors, "Les mots de passe ne concordent pas");
                }

                if (empty($this->_errors)) {
                    $this->_user = $this->_userService->setUser($this->_userDatas);
                    $datas = $this->_user;
                    require('views/viewMemberPage.php');
                } else {
                    $fails = $this->_errors;
                    require('views/viewFormSetUser.php');
                }

            } else {
                $this->_fields = 'Veuillez remplir tous les champs';
                $fields = $this->_fields;
                require('views/viewFormSetUser.php');
            }
    }

    public function formSignin() {
        require('views/viewFormSignin.php');
    }

    public function signin() {
        $this->_userDatas = $_POST;

        if (isset($this->_userDatas['email']) && !empty($this->_userDatas['email'])
            && isset($this->_userDatas['password']) && !empty($this->_userDatas['password'])) {

            $datas = $this->_userService->isMailExists($this->_userDatas['email']);

            if ($datas) {
                if (password_verify($this->_userDatas['password'], $datas['password'])) {
                    $this->_userService->connectUser($datas);
                } else {
                    array_push($this->_errors, 'Le mot de passe ne correspond pas');
                }
            } else {
                array_push($this->_errors, "Cet email n'existe pas");
            }

            if (empty($this->_errors)) {
                require('views/viewMemberPage.php');
            } else {
                $fails = $this->_errors;
                require('views/viewFormSignin.php');
            }

        } else {
            $this->_fields = 'Veuillez remplir tous les champs';
            $fields = $this->_fields;
            require('views/viewFormSignin.php');
        }
    }

    public function formContact() {
        require('views/viewFormContact.php');
    }

    public function contact() {
        $this->_messageDatas = $_POST;

        if (isset($this->_messageDatas['firstname']) && !empty($this->_messageDatas['firstname'])
            && isset($this->_messageDatas['lastname']) && !empty($this->_messageDatas['lastname'])
            && isset($this->_messageDatas['email']) && !empty($this->_messageDatas['email'])
            && isset($this->_messageDatas['cemail']) && !empty($this->_messageDatas['cemail'])
            && isset($this->_messageDatas['message']) && !empty($this->_messageDatas['message'])) {

            if ((preg_match('#[0-9]#', $this->_messageDatas['firstname'])) || strlen($this->_messageDatas['firstname']) < 3) {
                array_push($this->_errors, "Prénom incorrect");
            }

            if ((preg_match('#[0-9]#', $this->_messageDatas['lastname'])) || strlen($this->_messageDatas['lastname']) < 3) {
                array_push($this->_errors, "Nom incorrect");
            }

            if (!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $this->_messageDatas['email'])) {
                array_push($this->_errors, "Email incorrect");
            }

            if ($this->_messageDatas['email'] != $this->_messageDatas['cemail']) {
                array_push($this->_errors, "Les emails ne concordent pas");
            }

            if (empty($this->_errors)) {
                $this->_userService->sendMail($this->_messageDatas);
                $successSend = 'Votre message à bien été envoyé, merci !';
                require('views/viewFormContact.php');
            } else {
                $fails = $this->_errors;
                require('views/viewFormContact.php');
            }

        } else {
            $this->_fields = 'Veuillez remplir tous les champs';
            $fields = $this->_fields;
            require('views/viewFormContact.php');
        }
    }

    public function endSession() {
        session_destroy();
        header('Location: index.php?action=home');
    }
    
}