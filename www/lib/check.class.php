<?php

/*
 * barabash97@gmail.com
 * Insieme di metodi neccessari per verificare qualche dato o variabile
 */

class Check {
    /* public function isInteger($date){
      if(is_integer($date)) return true;
      else return false;
      } */

    public function validID($id) {
        if (!$this->isIntNumber($id)) {
            return false;
        }
        if ($id <= 0) {
            return false;
        } else {
            return true;
        }
    }

    private function IsIntNumber($number) {
        if (!is_int($number) && !is_string($number)){
        return false;} else {
            return true;
        }
        if (!preg_match("/^-?(([1-9][0-9]*|0))$/", $number)){
        return false;} else {
            return true;
        }
    }

    public function statsSessionLogin() { //Controlla se utente è entrato con la password
        if (empty($_SESSION["stats_login"])) {
            return false;
        } else if ($_SESSION["stats_login"] == false) {
            return false;
        } else {
            return true;
        }
    }

    public function secureDataRegistration($data) { //Serve per la sicurezza dei dati inseriti dalla tastiera, es. script php
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        return $data;
    }

    public function validEmail($email) { //Controlla se e-mail è valida
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public function isIntegerId($id) {
        if (is_int($id)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function secureMethodPost($post){
        $post = htmlspecialchars($post);
        $post = stripcslashes($post);
        return $post;
    }

    public function validPasswordLenght($password) { //La lunghezza minima e massima della password
        if (strlen($password) >= 6 && strlen($password) <= 32)
            return true;
        else
            return false;
    }

}

?>