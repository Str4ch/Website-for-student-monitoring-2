<?php
require_once "Connection.php";

session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
}

$epita_email = strtolower($_POST['first_name']).".".strtolower($_POST['last_name'])."@epita.fr";
$con = new Connection();
$con->executeQuery("INSERT INTO contacts (contact_email, contact_first_name, contact_last_name) VALUES ('".$_POST['email']."', '".$_POST['first_name']."', '".$_POST['last_name']."')");
$con->executeQuery("INSERT INTO students (student_epita_email, student_contact_ref, student_population_period_ref, student_population_year_ref,student_population_code_ref, student_enrollment_status) VALUES ('".$epita_email."', '".$_POST['email']."', '".$_GET['period']."', ".$_GET['year'].", '".$_GET['population_code']."', 'completed')");
$myfile = fopen("../sql_scripts/getCorseGrades", "r") or die("Unable to open file!");
$query = fread($myfile,filesize("../sql_scripts/getCorseGrades"));
fclose($myfile);
$grades = $con->getData(sprintf($query, $_GET['population_code'], $_GET['year'], $_GET['period']));
foreach ($grades as $grade) {
    $con->executeQuery("INSERT INTO grades VALUES ('".$epita_email."', '".$grade[0]."', '".$grade[1]."', '".$grade[2]."',0)");
}
header('Location: populations.php?population_code='.$_GET['population_code'].'&year='.$_GET['year'].'&period='.$_GET['period']);