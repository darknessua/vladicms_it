<?php

/*
 * barabash97@gmail.com
 */
require_once ROOT . '/lib/bootstrap.class.php';

class Core {

    protected $config;
    protected $database;
    protected $check;
    protected $method_allow = array();

    protected function __construct($table_name = null) {
        session_start();
        $this->config = new Config();
        $this->check = new Check();
        if ($table_name != null) {
            $this->database = new Database($table_name);
        }
        if ($this->searchMethodAllow(METHOD, $this->method_allow) == false) {
            $this->errorPage();
        }
    }

    public function searchMethodAllow($method, $method_all) {
        $flag = false;
        for ($i = 0; $i < count($method_all); $i++) {
            if ($method == $method_all[$i]) {
                $flag = true;
            }
        }
        if ($flag == true)
            return true;
        else
            return false;
    }

    protected function getTemplate($name) {
        $url_tmpl = ROOT . '/tmpl/' . $this->config->name_tmpl . $name . '.tpl';
        return $file = file_get_contents($url_tmpl);
    }

    protected function getContent($file) {
        $sr["%tmpl_dir%"] = $this->config->dir_tmpl;
        $sr["%title%"] = $this->getTitle();
        $sr["%banner%"] = $this->getBanner();
        $sr["%category%"] = $this->getCategory();
        $sr["%recent_post%"] = $this->getRecentArticles();
        $sr["%title%"] = $this->getTitle();
        $sr["%meta_key%"] = $this->getMetaKey();
        $sr["%meta_desc%"] = $this->getDescription();
        $sr["%auth_user%"] = $this->getAuthUser();
        $sr["%year%"] = $this->getTime(time());
        return $this->getReplaceContent($sr, $file);
    }

    protected function getReplaceContent($sr, $content) {
        $search = array();
        $replace = array();
        $i = 0;
        foreach ($sr as $key => $value) {
            $search[$i] = $key;
            $replace[$i] = $value;
            $i++;
        }
        return str_replace($search, $replace, $content);
    }

    protected function getBanner() {
        $story = "";
        $result_set = $this->database->selectAllTable("banners");
        while ($row = $result_set->fetch_assoc()) {
            $array["%id%"] = $row["id"];
            $array["%link%"] = $row["link"];
            $array["%image%"] = $row["image"];
            $story .= $this->getReplaceContent($array, $this->getTemplate("banner"));
        }
        $result_set->close();
        return $story;
    }

    protected function getCategory() {
        $story = "";
        $result_set = $this->database->selectAllTable("categories");
        while ($row = $result_set->fetch_assoc()) {
            $array["%category_link%"] = "/category/id/" . $row["id"];
            $array["%category_name%"] = $row["name"];
            $story .= $this->getReplaceContent($array, $this->getTemplate("categories"));
        }
        $result_set->close();
        return $story;
    }

    protected function getRecentArticles() {
        $result_set = $this->database->selectRecentArticles('articles', 6);
        $story = "";
        while ($row = $result_set->fetch_assoc()) {
            $array["%link%"] = "/article/view/" . $row["id"];
            $array["%title%"] = $row["title"];
            $story .= $this->getReplaceContent($array, $this->getTemplate("recent_post"));
        }
        $result_set->close();
        return $story;
    }

    protected function getTitle() {
            return $this->config->title_site;
    }

    protected function getMetaKey() {
        return $this->config->meta_key;
    }

    protected function getDescription() {
        return $this->config->meta_key;
    }

    protected function defaultClass() {
        $story = 'Page not exists';
        $file_tmpl_final = str_replace("%content%", $this->getTemplate('error_404'), $this->getTemplate("main"));

        echo $this->getContent($file_tmpl_final);
    }

    protected function getAuthUser() {
        if ($this->check->statsSessionLogin() == true) {
            $file = $this->getTemplate("short_user_info");
            $arr["%login%"] = $_SESSION["login"];
            $file = $this->getReplaceContent($arr, $file);
            return $file;
        } else {
            $text = "<a href='/user/login/'>Login</a><br />";
            return $text .= "<a href='/user/registration'>Registrazione</a>";
        }
    }

    protected function isExistsId($id) {
        $row = $this->database->selectField("id", $id);
        if (empty($row))
            return false;
        else
            return true;
    }

    protected function getTime($time) {
        return date("d-m-Y H:i", $time);
    }

    protected function linkCategory($id_category) {
        $table = $this->config->db_prefix . "categories";
        $query = "SELECT * FROM `$table` WHERE `id` IN ($id_category)";
        $result = $this->database->query($query);
        $name = array();
        while (($row = $result->fetch_assoc()) != false) {
            $name[] = $row;
        }
        $result->close();
        if (count($name) < 1) {
            return "<a href='/category/id/$id_category/'>" . $name[0]["name"] . "</a>";
        } else {
            $link = "";
            for ($i = 0; $i < count($name); $i++) {
                $link .= "<a href='/category/id/" . $name[$i]["id"] . "/'>" . $name[$i]["name"] . "</a> ,";
            }
            return $final = substr($link, 0, -2);
        }
    }

    public function errorPage() {
        $file_tmpl_final = str_replace("%content%", "La pagina non esiste", $this->getTemplate("main"));
        echo $this->getContent($file_tmpl_final);
        exit;
    }

    /* END */
}

//FINE CLASS
?>