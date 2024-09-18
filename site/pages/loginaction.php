<?php
require_once 'User.php';

$user_id=User::login($_POST['Uinput'], $_POST['Pinput']);
if($user_id!=-1){
    session_start();
    $_SESSION['user_id']=$user_id;
    $_SESSION['username']=$_POST['Uinput'];
    header('location: welcome.php');
    exit;
}
else{
    header('location: index.php?Err=1');
}