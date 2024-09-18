<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
}

require_once "Connection.php";
$con = new Connection();
$con->executeQuery("INSERT INTO courses(course_code, course_rev, duration, course_last_rev, course_name, course_description) VALUES ('".$_POST['course_code']."', 0, 0, 0,'".$_POST['course_name']."', '');");
$students_array = $con->getData("select student_epita_email from students where student_population_code_ref ='".$_GET['population_code']."' and student_population_year_ref = ".$_GET['year']." and student_population_period_ref = '".$_GET['period']."'", true);
for($i = 0; $i<$_POST['sessions_count']; $i+=1){
    $d=mktime(0, 0, 0, date("m"), date("d") + $i, date("Y"));
    $day = date("Y-m-d", $d);
    $con->executeQuery("INSERT INTO attendance (attendance_student_ref, attendance_population_year_ref, attendance_course_ref, attendance_session_date_ref) VALUES ('".$students_array[0]."', ".$_GET['year'].", '".$_POST['course_code']."', '".$day."')");
    $con->executeQuery("INSERT INTO sessions (session_prof_ref, session_course_ref, session_date, session_course_rev_ref, session_start_time, session_end_time) VALUES ('".$_POST['teacher']."', '".$_POST['course_code']."', '".$day."', 0, '09:00:00', '10:00:00')");
}
header('Location: populations.php?population_code='.$_GET['population_code'].'&year='.$_GET['year'].'&period='.$_GET['period']);