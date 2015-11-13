<?php
/*
 * barabash97@gmail.com
 * Router delle classi
 */
class Bootstrap {

    public function __construct() {
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_SPECIAL_CHARS);
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $file = ROOT . '/controller/' . $url[0] . '.class.php';
        define('METHOD', $url[1]);
        if (file_exists($file)) {
            require $file;
        } else if(empty($url[0])){
            header("Location: /article/all");
            exit;
        }else {
            require ROOT . '/controller/error.class.php';
            $controller = new Error();
            return false;
        }
        $controller = new $url[0];
        if (isset($url[2])) {
            $controller->$url[1]($url[2]);
        } else {
            if (isset($url[1])) {
                $controller->$url[1]();
            }
            else{
                $controller->defaultClass();
            }
        }
    }

}
?>  


