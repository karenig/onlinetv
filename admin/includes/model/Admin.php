<?php

/*
 * class for working with users
 */
class Admin{
    public $data;
    private $loggedin;
    
    public function __construct() {
        if(isset($_SESSION['admin'])){
            $this->data = $_SESSION['admin'];
            $this->loggedin = true;
        }else{
            $this->data = false;
            $this->loggedin = false;
        }
    }
    
    public function loggedIn(){
        return $this->loggedin;
    }
    
    public function login($login,$pass){
        $db = new Db();
        $pass = md5($pass);
        $admin = $db->fetchOne("SELECT * FROM users WHERE name='$login' AND pass='$pass'");
        if(is_array($admin)){
            $_SESSION['admin'] = $admin;
            return true;
        }else{
            return false;
        }
    }
    
    public function logout(){
        unset($_SESSION['admin']);
    }
    
    public static function is_home() {
        if(!isset($_GET["part"])) {
            return true;
        }
        return false;
    }
    
}
?>