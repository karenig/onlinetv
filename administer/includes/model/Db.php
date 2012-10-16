<?php
require_once 'MySQL.php';

class Db{
    
    public function __construct() {
        $this->db = MySQL::getInstance();
    }

    public function fetchOne($sql){
        $list = $this->db->query($sql);
        return current($list);
    }


    public function fetchAll($sql){
        $list = $this->db->query($sql);
        return $list;
    }
    

    public function getCount($table,$where) {
        $sql = "SELECT COUNT(*) AS ct FROM $table WHERE $where "; // echo $sql;
        $result = $this->fetchOne($sql);
        return $result['ct'];
    }

    public function delete($table,$where){
        $sql = "DELETE FROM $table WHERE $where"; // echo $sql; exit;
        return $this->db->execute($sql);
    }

    public function insert($table,$row){
        foreach ($row as $k=>$v){
            $keys[] = "`$k`";
            //$v = addslashes($v);
            $values[] = "'$v'";
        }
        $keys = implode(', ', $keys);
        $values = implode(', ', $values);
        $sql = "INSERT INTO $table ($keys) VALUES($values)";
        return $this->db->execute($sql);
    }

    public function update($table,$row,$where){
        $set = array();
        foreach ($row as $k=>$v){
            //$v = addslashes($v);
            //echo "$k='$v'";
            $set[] = "$k='$v'";
        }
        $set = implode(', ', $set);
        $sql = "UPDATE $table SET $set WHERE $where";   //echo $sql;//exit;
        return $this->db->execute($sql);
    }

    public function showErrors(){
        var_dump($this->db->errors);
    }
    
    public function lastInsertID(){
        return mysql_insert_id();
    }

}

?>