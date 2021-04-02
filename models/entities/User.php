<?php

class User {

    private $_firstname;
    private $_lastname;
    private $_pseudo;
    private $_email;
    private $_password;
    private $_signup_date;

    public function getFirstname() : String {
        return $this->_firstname;
    }

    public function setFirstname($firstname) : User {
        $this->_firstname = $firstname;
        return $this;
    }

    public function getLastname() {
        return $this->_lastname;
    }

    public function setLastname($lastname) {
        $this->_lastname = $lastname;
        return $this;
    }

    public function getPseudo() {
        return $this->_pseudo;
    }

    public function setPseudo($pseudo) {
        $this->_pseudo = $pseudo;
        return $this;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function setEmail($email) {
        $this->_email = $email;
        return $this;
    }

    public function getPassword() {
        return $this->_password;
    }

    public function setPassword($password) {
        $this->_password = $password;
        return $this;
    }

    public function getSignupDate() {
        return $this->_signup_date;
    }

    public function setSignupDate($signupDate) {
        $this->_signup_date = $signupDate;
        return $this;
    }
}