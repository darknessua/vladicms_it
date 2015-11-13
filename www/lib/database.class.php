<?php

/*
 * barabash97@gmail.com
 */

class Database {

    protected $mysqli;
    protected $config;
    protected $table_name;

    public function __construct($table_name = null) { //public
        $this->config = new Config();
        $this->mysqli = new mysqli($this->config->db_host, $this->config->db_user, $this->config->db_password, $this->config->db_name);
        $this->mysqli->query("SET NAMES utf8");
        if ($table_name != null) {
            $this->table_name = "xyz_" . $table_name;
            return true;
        } else {
            return false;
        }
    }

    public function insert($new_values) {
        $table_name = $this->table_name;
        $query = "INSERT INTO `$table_name` (";
        foreach ($new_values as $field => $value) {
            $query .= "`" . $field . "`,";
        }
        $query = substr($query, 0, -1);
        $query .= ") VALUES (";
        foreach ($new_values as $field => $value) {
            $query .= "'" . addslashes($value) . "',";
        }
        $query = substr($query, 0, -1);
        $query .= ")";
        return $query;
    }

    public function selectAllTable($table) {
        $table = $this->config->db_prefix . $table;
        return $this->mysqli->query("SELECT * FROM `$table`");
    }

    public function selectRecentArticles($table, $limit) {
        $table = $this->config->db_prefix . $table;
        return $this->mysqli->query("SELECT * FROM `$table` LIMIT $limit");
    }

    public function selectAll() {
        $query = "SELECT * FROM `" . $this->table_name . "` ORDER by `date` DESC";
        return $this->mysqli->query($query);
    }

    public function selectId($id) {
        $query = "SELECT * FROM `" . $this->table_name . "` WHERE `id` = $id";
        return $this->mysqli->query($query);
    }

    public function selectField($field, $value) {
        $query = "SELECT * FROM `" . $this->table_name . "` WHERE `$field` = '$value'";
        $result_set = $this->mysqli->query($query);
        $row = $result_set->fetch_assoc();
        $result_set->close();
        return $row;
    }

    public function selectArticleById($id) {
        $query = "SELECT * FROM `xyz_articles` WHERE `category` = $id ORDER by `id` DESC";
        return $this->mysqli->query($query);
    }

    public function convertToArray($result_set) {
        $array = array();
        while (($row = $result_set->fetch_assoc()) != false) {
            $array[] = $row;
        }
        return $array;
    }

    public function selectLoginPassword($login, $password) {
        $query = "SELECT * FROM `" . $this->table_name . "` WHERE `login` = '$login' AND `password` = '$password'";
        $result_set = $this->mysqli->query($query);
        $row = $result_set->fetch_assoc();
        $result_set->close();
        return $row;
    }

    public function selectAllFromTableWhereFieldValue($table, $field, $value) {
        $query = "SELECT * FROM `$table` WHERE `$field` = '$value' ORDER by `id` DESC";
        return $result_set = $this->mysqli->query($query);
        //$row = $result_set->fetch_assoc();
        //$result_set->close();
        //return $row;
    }

    public function insertUser($login, $password, $email) {
        $query = "INSERT INTO `" . $this->table_name . "` (`id`, `login`, `password`, `email`) VALUES (NULL, '$login', '$password', '$email')";
        return $this->mysqli->query($query);
    }

    public function query($query) {
        return $this->mysqli->query($query);
    }

    public function __destruct() { //public
        $this->mysqli->close();
    }

}
?>

