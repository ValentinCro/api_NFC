<?php

namespace NFC\Domain;

class User {
    /**
     * User id
     *
     * @var integer L'identifiant numérique unique de l'utilisateur
     */
    public $userId;

    /**
     * User name
     *
     * @var string L'identifiant pseudonyme unique de l'utilisateur
     */
    public $userName;

    public $userIsHere;

    /**
     * Getter de l'identifiant numérique unique de l'utilisateur
     *
     * @return int L'identifiant numérique unique de l'utilisateur
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * Setter de l'attribut userId
     *
     * @param $userId L'identifiant numérique unique de l'utilisateur
     */
    public function setUserId($userId) {
        $this->userId = $userId;
    }

    /**
     * Getter de l'identifiant pseudonyme unique de l'utilisateur
     *
     * @return string L'identifiant pseudonyme unique de l'utilisateur
     */
    public function getUserName() {
        return $this->userName;
    }

    /**
     * Setter de l'identifiant pseudonyme unique de l'utilisateur
     *
     * @param $userLogin L'identifiant pseudonyme unique de l'utilisateur
     */
    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function isHere() {
        return $this->userIsHere;
    }

    public function setHere($isHere) {
        $this->userIsHere = $isHere;
    }
}