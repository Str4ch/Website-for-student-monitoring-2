<?php
require_once 'Connection.php';
class User
{
    public static function login(string $name, string $password):?int{
        $query= "SELECT * FROM users WHERE username='$name' AND password='$password'";
        $con = new Connection();
        $user = $con->getData($query, true);
        if(empty($user)){
            return -1;
        }else{
            $_SESSION['user_id']=$user['id'];
            return $user['id'];
        }
    }
    public static function logout(){
        session_start ();
        session_destroy();
    }

}