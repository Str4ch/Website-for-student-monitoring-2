<?php
session_start();

session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
}

require("Connection.php");
$con = new Connection();
$con->executeQuery('UPDATE grades SET grade_score='.$_POST['grade'].' WHERE grade_student_epita_email_ref="'.$_GET['student'].'" and grade_exam_type_ref="'.$_GET['ex_type'].'" and grade_course_code_ref="'.$_GET['course'].'"');
header("location:grades.php?course=".$_GET['return_course']."&population_code=". $_GET['return_population_code'] ."&year=".$_GET["return_year"]. "&period=".$_GET["return_period"]."");
#<a href="grades.php?course='.$course[0].'&population_code=' . $population_code . '&year=' . $year . '&period=' . $period . '">' . $course[0] . '</a></td>';