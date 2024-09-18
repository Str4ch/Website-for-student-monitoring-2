<?php
require_once "Connection.php";
session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
}
$course = $_GET['course'];
$population_code = $_GET['population_code'];
$year = $_GET['year'];
$period = $_GET['period'];

?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../static/Styles.css"/>
<body>
<div>
    <h1>
        Grades <?php echo $course?>
    </h1>
    <table>
        <th>email</th>
        <th>first name</th>
        <th>last name</th>
        <th>exam type</th>
        <th>Grade</th>
        <th>Submit</th>
        <?php

        $con = new Connection();
        $myfile = fopen("../sql_scripts/getGrades", "r") or die("Unable to open file!");
        $query = fread($myfile,filesize("../sql_scripts/getGrades"));
        fclose($myfile);
        $grades = $con->getData(sprintf($query,$course, $population_code, $year, $period));
        foreach($grades as $grade) {
            echo "<tr>";
            echo "<td>".$grade[0]."</td>";
            echo "<td>".$grade[1]."</td>";
            echo "<td>".$grade[2]."</td>";
            echo "<td>".$grade[3]."</td>";
            echo '<td><form action="editGrades.php?return_course='.$course.'&return_population_code='.$population_code.'&return_year='.$year.'&return_period='.$period.'&course='.$grade[5].'&student='.$grade[0].'&ex_type='.$grade[3].'" method="post"><input value="'.$grade[4].'" type = "number" name = "grade" placeholder = "Enter new grade" min="1" max="20"/></td>';
            echo '<td><input type="submit" value="Submit" /></form></td>';
            echo "</tr>";
        }
        echo "</table>";
        echo '<a href="populations.php?population_code='.$population_code.'&year='.$year.'&period='.$period.'">Go back</a>';

        ?>
</div>

</body>
</html>
