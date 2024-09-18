<?php
session_start();

session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
}

require("Connection.php");
$con = new Connection();
$epita_email = $con->getData("SELECT student_epita_email FROM `students` where student_contact_ref='".$_GET['id']."'", true)['student_epita_email'];

$con->executeQuery("DELETE FROM `grades` WHERE grade_student_epita_email_ref='".$epita_email."'");
$con->executeQuery("DELETE FROM `students` WHERE student_epita_email='".$epita_email."'");
$con->executeQuery("DELETE FROM `attendance` WHERE attendance_student_ref='".$epita_email."'");

header('Location: populations.php?population_code='.$_GET['population_code'].'&year='.$_GET['year'].'&period='.$_GET['period']);