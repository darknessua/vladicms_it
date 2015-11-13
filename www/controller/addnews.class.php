<?php

require_once ROOT . '/lib/core.class.php';

class AddNews extends Core {

    private $post_field = array();
    private $error = array();
    protected $method_allow = array("post");

    public function __construct() {
        parent::__construct("articles");
        $this->post_field["full_story"] = "";
        $this->post_field["short_story"] = "";
    }

    public function post() {
        if (isset($_POST["add_article"])) {
            $this->getPostField();
            $this->checkPostMethod($this->post_field);
            if (empty($this->error)) {
                $query = $this->database->insert($this->post_field);
                $result = $this->database->query($query);
                if ($result){
                    header("Location: /");
                    exit;
                }
            }
        }
        if ($this->check->statsSessionLogin() && $this->getGroupUser($_SESSION["login"]) == $this->config->add_news_group) {
            $file = $this->getTemplate("addnews");
            $file = str_replace("%category%", $this->getCategorySelect(), $file);
            $file = str_replace("%error%", $this->textErrorReplace($this->error), $file);
            $file = $this->replaceValueMethodPost($file);
            $file_tmpl_final = str_replace("%content%", $file, $this->getTemplate("main"));
        } else {
            $file_tmpl_final = str_replace("%content%", "Non è possibile pubblicare articoli", $this->getTemplate("main"));
        }
        echo $this->getContent($file_tmpl_final);
    }

    public function getPostField() {
        $this->post_field["id"] = NULL;
        $this->post_field["category"] = $_POST["cat_id"];
        $this->post_field["title"] = $this->check->secureMethodPost($_POST["title"]);
        $this->post_field["meta_key"] = $this->check->secureMethodPost(substr($_POST["meta_key"],0,-254));
        $this->post_field["meta_desc"] = $this->check->secureMethodPost($_POST["meta_desc"]);
        $this->post_field["short_story"] = $_POST["short_story"];
        $this->post_field["full_story"] = $_POST["full_story"];
        $this->post_field["users"] = $_SESSION["login"];
        $this->post_field["date"] = time();
        return $this->post_field;
    }

    public function getCategorySelect() {
        $result_set = $this->database->selectAllTable("categories");
        $id = array();
        $cat_name = array();
        $i = 0;
        while (($row = $result_set->fetch_assoc()) != false) {
            $id[$i] = $row["id"];
            $cat_name[$i] = $row["name"];
            $i++;
        }
        $result_set->close();
        $text = "<fieldset>";
        for ($i = 0; $i < count($id); $i++) {
            if ($i == 0) {
                $text .= "<input type='radio' name='cat_id' value='" . $id[$i] . "' checked='checked'>" . $cat_name[$i] . "<br />";
            } else {
                $text .= "<input type='radio' name='cat_id' value='" . $id[$i] . "'>" . $cat_name[$i] . "<br />";
            }
        }
        $text .= "</fieldset>";
        return $text;
    }

    public function checkPostMethod($data) {
        if (empty($data["title"]) || strlen($data["title"]) < 5) {
            $this->error["title"] = "Inserisci titolo";
        }
        if (empty($data["meta_key"]) || strlen($data["meta_key"]) < 5) {
            $this->error["meta_key"] = "Inserisci keywords";
        }
        if (empty($data["meta_desc"]) || strlen($data["meta_desc"]) < 5) {
            $this->error["meta_desc"] = "Inserisci descrizione";
        }
        if (empty($data["short_story"]) || strlen($data["short_story"]) < 30) {
            $this->error["short_story"] = "Inserisci descrizione corta dell'articolo";
        }
        if (empty($data["full_story"]) || strlen($data["full_story"]) < 100) {
            $this->error["full_story"] = "Inserisci il testo dell'articolo";
        }
    }

    private function getGroupUser($user) {
        $table = $this->config->db_prefix . "users";
        $query = "SELECT `group` FROM `$table` WHERE `login` = '$user'";
        $result_set = $this->database->query($query);
        $row = $result_set->fetch_assoc();
        $result_set->close();
        return $row["group"];
    }

    private function textErrorReplace($error_array) { //Stringa di testo che indica errori
        $text_error = "";
        if (!empty($error_array)) {
            foreach ($error_array as $value) {
                $text_error .= "•" . $value . "<br />";
            }
        }
        return $text_error;
    }

    private function replaceValueMethodPost($file) {
        $search = array();
        $replace = array();
        $sr["%value_short%"] = $this->post_field["short_story"];
        $sr["%value_full%"] = $this->post_field["full_story"];
        $i = 0;
        
            foreach ($sr as $key => $value) {
                $search[$i] = $key;
                $replace[$i] = $value;
                $i++;
            }

        return str_replace($search, $replace, $file);
    }

//END Post Field
}

//END Class
?>