<?php

require_once ROOT . '/lib/core.class.php';

class Category extends Core {
    protected $method_allow = array("id");
    public function __construct() {
        parent::__construct("articles");
    }
    
    public function id($id){
        if ($id == null) {
            header("Location: /article/all");
            exit;
        } else {
            $row = $this->database->convertToArray($result_set = $this->database->selectArticleById($id));
        }
        
        $this->title_article = $this->config->title_site;
        $this->meta_key = $this->config->meta_key;
        $this->meta_desc = $this->config->meta_desc;
        if(!is_numeric($id)) $this->errorPage();
        if (empty($_GET["page"]) || $_GET["page"] == 1) {
            $limit = $this->config->article_count;
            $page = 1;
        } else if ($_GET["page"] > 1 && is_numeric($_GET["page"])) {
            $page = $_GET["page"];
            $limit = $page * ($this->config->article_count);
        } else {
            $this->errorPage();
        }
 
        
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
        $page_type = "/category/id/$id/?page=";
        for ($i = 1; $i <= $total_page; $i++) {
            $array["%link_page%"] = $page_type . $i;
            $array["%num_page%"] = $i;
            $page_html .= $this->getReplaceContent($array, $this->getTemplate("pagination"));
        }
        if($total_page > 1)$story .= $page_html;
        $file_tmpl_final = str_replace("%content%", $story, $this->getTemplate("main"));

        echo $this->getContent($file_tmpl_final);

    }
    
    public function errorPage() {
        $file_tmpl_final = str_replace("%content%", "La pagina non esiste", $this->getTemplate("main"));
        echo $this->getContent($file_tmpl_final);
    }

}

?>