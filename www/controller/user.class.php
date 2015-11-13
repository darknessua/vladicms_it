<?php

/*
 * barabash97@gmail.com
 */

class User extends Core {

    protected $error = array(); //Array che stampa errori
    protected $array_post_field = array(); //Array con tutti i dati inseriti nella forma POST
    public $title_page = 'User';
    protected $method_allow = array("login", "registration", "logout");

    public function __construct() {
        parent::__construct("users");
    }

    public function login() {
        $this->title_page = 'Login sul sito';
        if (isset($_POST["send_auth"])) {
            $login = $this->secureDataRegistration($_POST["login_name"]);
            $password = $this->secureDataRegistration($_POST["login_password"]);
            if ($this->check->validPasswordLenght($password) == false) {
                $this->error["password_lenght"] = 'Inserisci la password minimo di 6 caratteri';
            } else {
                $password = md5($password);
            }

            if ($this->checkLoginPassword($login, $password) == true && empty($this->error)) {
                $_SESSION["stats_login"] = true;
                $_SESSION["login"] = $login;
                $_SESSION["password"] = $password;
            } else {
                $this->error["error_login_site"] = 'Username o password errati';
            }
        }

        /**
         * Stampa template completo
         */
        if (empty($_SESSION["stats_login"])) {
            $file = $this->getTemplate("auth_user");
            $text_error = $this->textErrorReplace($this->error); //Crea una stringa che indica quali campi sono sbagliati
            $file = str_replace("%error_auth%", $text_error, $file); //Sostituisce la stringa $text_error nel template
        } else if ($_SESSION["stats_login"] == false) {
            $file = $this->getTemplate("auth_user");
            $text_error = $this->textErrorReplace($this->error); //Crea una stringa che indica quali campi sono sbagliati
            $file = str_replace("%error_auth%", $text_error, $file); //Sostituisce la stringa $text_error nel template
        } else {
            $file = "Sei entrato sul sito! <br /><a href='/'>Home</a>";
        }
        $file_tmpl_final = str_replace("%content%", $file, $this->getTemplate("main"));
        echo $this->getContent($file_tmpl_final);
    }

    public function registration() {
        $this->allowRegistration(); //Controlla se è possibile registrarsi
        $this->title_page = 'Registrazione sul sito';
        if (isset($_POST["send_reg"])) {
            $this->arrayFieldsRegistration();
            unset($post);
            $post = $this->array_post_field; //Array con tutti i dati dal metodo post
            if ($this->check->validEmail($post['email']) == false) {
                //$error_stats = true;
                $this->error["email"] = 'Email non è corretta';
            }


            if ($this->isExistsLogin($post["login"]) == false && empty($this->error)) {
                $result_reg = $this->database->insertUser($post["login"], $post["password1"], $post["email"]);
                if ($result_reg) {
                    $_SESSION["stats_login"] = true;
                    $_SESSION["login"] = $post["login"];
                    $_SESSION["password"] = $post["password1"];
                    $_SESSION["email"] = $post["email"];
                } else {
                    $this->error["insert_user"] = 'Non è stato possibile registrarsi';
                }
            } else {
                $this->error["insert_user"] = 'Non è stato possibile registrarsi';
            }
        } //END ISSET "SEND_REG"

        /**
         * Stampa template completo
         */
        if ((empty($_SESSION["stats_login"])) || (!empty($_SESSION["stats_login"]) && $_SESSION["stats_login"] == false)) {
            $file = $this->getTemplate("registration");
            $text_error = $this->textErrorReplace($this->error); //Crea una stringa che indica quali campi sono sbagliati
            $file = str_replace("%error_reg%", $text_error, $file); //Sostituisce la stringa $text_error nel template
        } else {
            $file = "Sei registrato sul sito!<br /><a href='/'>Home</a>";
        }
        $file_tmpl_final = str_replace("%content%", $file, $this->getTemplate("main"));
        echo $this->getContent($file_tmpl_final);
    }

// END registration

    private function isExistsLogin($login) {
        $row = $this->database->selectField("login", $login);
        if (empty($row))
            return false;
        else
            return true;
    }

    private function checkLoginPassword($login, $password) {
        $row = $this->database->selectLoginPassword($login, $password);
        if (empty($row))
            return false;
        else
            return true;
    }

    private function secureDataRegistration($data) {
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        return $data;
    }

    private function arrayFieldsRegistration() { //Array con i dati del metodo "POST", durante la registrazione
        $array = array();
        unset($this->error);
        unset($this->array_post_field);
        $array["login"] = $this->secureDataRegistration($_POST["login"]);
        $array["email"] = $this->secureDataRegistration($_POST["email"]);
        $array["password1"] = $this->secureDataRegistration($_POST["password1"]);
        $array["password2"] = $this->secureDataRegistration($_POST["password2"]);
        if ($array["password1"] != $array["password2"]) {
            $this->error["password_diverso"] = 'Password non corrisponde';
        }
        if ($this->check->validPasswordLenght($array["password1"]) == false) {
            $this->error["password_lenght"] = 'Inserisci la password minimo di 6 caratteri';
        } else {
            $array["password1"] = md5($array["password1"]);
        }
        return $this->array_post_field = $array;
    }

    private function textErrorReplace($error_array) { //Stringa di testo che indica errori
        $text_error = "";
        foreach ($error_array as $value) {
            $text_error .= "•" . $value . "<br />";
        }
        return $text_error;
    }

    protected function getTitle() {
        return $this->title_page;
    }

    public function defaultClass() {
        header("Location: /registration/users/");
        exit;
    }

    private function allowRegistration() {
        if ($this->config->allow_reg == false) {
            $file_tmpl_final = str_replace("%content%", "Non è possibile registrarsi!", $this->getTemplate("main"));
            echo $this->getContent($file_tmpl_final);
            exit;
        }
    }

    public function logout() {
        session_destroy();
        header("Location: /");
        exit;
    }

}
?>

