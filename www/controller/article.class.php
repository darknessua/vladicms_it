<?php

/*
 * barabash97@gmail.com
 */

require_once ROOT . '/lib/core.class.php';

class Article extends Core {

    public $title_article = "";
    public $meta_key = "";
    public $meta_desc = "";
    protected $method_allow = array("all", "view");

    public function __construct() {
        parent::__construct("articles");

    }

    public function view($id) { //Start View
        if (!is_numeric($id)) {
            $this->errorPage();
        } else {
            if ($this->isExistsId($id)) {
                $result_set = $this->database->selectId($id);
            } else {
                $this->errorPage();
            }
        }
        while ($row = $result_set->fetch_assoc()) { //Key e value ex. %user% => $row["user"]
            $array["%title%"] = $row["title"];
            $array["%date%"] = $this->getTime($row["date"]);
            $array["%category%"] = $this->linkCategory($row["category"]);
            $array["%users%"] = $row["users"];
            $array["%short_story%"] = $row["short_story"];
            $array["%full_story%"] = $row["full_story"];
            $array["%short_story%"] = $row["short_story"];
            $array["%id%"] = $row["id"];
            $this->title_article = $row["title"];
            $this->meta_key = $row["meta_key"];
            $this->meta_desc = $row["meta_desc"];
            $array["%comments%"] = $this->viewComments($id);
            $array["%add_comments%"] = $this->addComments($id);
        }
        $story = $this->getReplaceContent($array, $this->getTemplate("full_story")); //Generazione articolo 
        $file_tmpl_final = str_replace("%content%", $story, $this->getTemplate("main")); //Generazione file finale
        echo $this->getContent($file_tmpl_final);
    }

//END View





    public function all() { // START ALL
        $this->title_article = $this->config->title_site;
        $this->meta_key = $this->config->meta_key;
        $this->meta_desc = $this->config->meta_desc;
        if (empty($_GET["page"]) || $_GET["page"] == 1) {
            $limit = $this->config->article_count;
            $page = 1;
        } else if ($_GET["page"] > 1) {
            $page = $_GET["page"];
            $limit = $page * ($this->config->article_count);
        } else {
            $this->errorPage();
        }

        $row = $this->database->convertToArray($result_set = $this->database->selectAll());
        $count_row = count($row);
        $total_page = ceil($count_row / $this->config->article_count);
        if ($page > $total_page) {
            $this->errorPage();
        }

        $story = "";
        $start = ($limit - $this->config->article_count) + 1;
        for ($i = $start - 1; $i < $limit; $i++) {
            $array["%title%"] = $row[$i]["title"];
            $array["%date%"] = $this->getTime($row[$i]["date"]);
            $array["%category%"] = $this->linkCategory($row[$i]["category"]);
            $array["%users%"] = $row[$i]["users"];
            $array["%short_story%"] = $row[$i]["short_story"];
            $array["%full_story%"] = $row[$i]["full_story"];
            $array["%short_story%"] = $row[$i]["short_story"];
            $array["%id%"] = $row[$i]["id"];
            $story .= $this->getReplaceContent($array, $this->getTemplate("short_story"));
            if ($i == (count($row) - 1 ))
                break;
        }

        $page_html = "";
        $page_type = "/article/all/?page=";
        for ($i = 1; $i <= $total_page; $i++) {
            $array["%link_page%"] = $page_type . $i;
            $array["%num_page%"] = $i;
            $page_html .= $this->getReplaceContent($array, $this->getTemplate("pagination"));
        }
        if ($total_page > 1)
            $story .= $page_html;
        $file_tmpl_final = str_replace("%content%", $story, $this->getTemplate("main"));
        echo $this->getContent($file_tmpl_final);
    }

//END ALL


    public function viewComments($post_id) {
        $page_html = "";
        $page_type = "/article/view/$post_id/?com=";
        if (empty($_GET["com"]) || $_GET["com"] == 1) {
            $limit = $this->config->comments_count;
            $page = 1;
        } else if ($_GET["com"] > 1) {
            $page = $_GET["com"];
            $limit = $page * ($this->config->comments_count);
        } else {
            return $this->errorPageComments();
        }
        //
        $row = $this->database->convertToArray($this->allCommentsPost($post_id));
        if ($row == null) {
            return $this->errorPageComments();
        }
        $count_row = count($row);
        $total_page = ceil($count_row / $this->config->comments_count);
        if ($page > $total_page) {
            return $this->errorPageComments();
        }

        //Visualizzazione commenti

        $story = "";
        $start = ($limit - $this->config->comments_count) + 1;
        for ($i = $start - 1; $i < $limit; $i++) {
            $array["%user%"] = $row[$i]["user"];
            $array["%text%"] = $row[$i]["text_comment"];
            $array["%date%"] = $this->getTime($row[$i]["date"]);
            $story .= $this->getReplaceContent($array, $this->getTemplate("comments"));
            if ($i == (count($row) - 1 ))
                break;
        }

        //Visualizzazione pagination
        for ($i = 1; $i <= $total_page; $i++) {
            $array["%link_page%"] = $page_type . $i;
            $array["%num_page%"] = $i;
            $page_html .= $this->getReplaceContent($array, $this->getTemplate("pagination"));
        }
        if ($total_page > 1) {
            $story .= $page_html;
        }
        return $story;
    }

    public function allCommentsPost($post_id) { //Return array associativo con tutti i dati
        $table = $this->config->db_prefix . 'comments';
        return $this->database->selectAllFromTableWhereFieldValue($table, "article_id", $post_id);
    }

    public function addComments($id) {
        if ($this->check->statsSessionLogin()) {
            if (isset($_POST["send_comment"])) {
                $array = array();
                $array["user"] = $_SESSION["login"];
                $array["article_id"] = $id;
                $array["date"] = time();
                $array["text_comment"] = $this->check->secureMethodPost($_POST["text_comment"]);
                if(strlen( $array["text_comment"]) >= 6) {
                $table = $this->config->db_prefix . "comments";
                $query = "INSERT INTO `$table` (`id`, `article_id`, `user`, `date`, `text_comment`) VALUES (NULL, '$id', '".$array["user"]."', '".$array["date"]."', '".$array["text_comment"]."')";
                $result = $this->database->query($query);
                if ($result) {
                    $url = $_SERVER["REQUEST_URI"];
                    header("Location: $url");
                    exit;
                }
            } else {
                 print("<script>alert('La lunghezza del commento deve essere maggiore di 6!');</script>");
            }
     
            }
            return $this->getTemplate("add_comments");
        } else {
            return "Registrati sul sito per commentare l'articoli";
        }
    }

    public function defaultClass() {
        header("Location: /article/all/");
        exit;
    }

    public function getMetaKey() {
        return $this->meta_key;
    }

    public function getDescription() {
        return $this->meta_desc;
    }

    public function getTitle() {
        return $this->title_article;
    }


    
    public function addnews(){
        require_once ROOT . '/controller/addnews.class.php';
        $addnews = new AddNews();
    }

    public function errorPageComments() {
        return 'Non ci sono commenti';
        exit;
    }

}

?>