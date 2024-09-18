<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
}
require("Connection.php");
$con = new Connection();
$con->executeQuery('UPDATE contacts SET contact_first_name="'. $_POST['name'] . '" WHERE contact_email="'.$_GET['id'].'"');
$con->executeQuery('UPDATE contacts SET contact_last_name="'. $_POST['surname'] . '" WHERE contact_email="'.$_GET['id'].'"');
header("location:student.php?id=".$_GET['id']);