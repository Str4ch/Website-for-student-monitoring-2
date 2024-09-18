<?php
require_once "Connection.php";
session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
}
$id = $_GET['id'];
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
        Student
    </h1>
    <table>
        <th>email</th>
        <th>first name</th>
        <th>last name</th>
        <th>passed</th>
        <?php
        $con = new Connection();
        $myfile = fopen("../sql_scripts/getStudent", "r") or die("Unable to open file!");
        $query = fread($myfile,filesize("../sql_scripts/getStudent"));
        fclose($myfile);
        $student = $con->getData(sprintf($query, $id), true);
        echo "<tr>";
        echo '<form id="editform" action="editStudents.php?id='.$student[0].'" method="post">';
        echo'<td>'.$student[0].'</td>';
        echo'<td><input value="'.$student[1].'" type = "text" name = "name" placeholder = "Enter new name" /></td>';
        echo'<td><input value="'.$student[2].'" type = "text" name = "surname" placeholder = "Enter new surname" /></td>';
        echo'<td>'.$student[3].' / '.$student[4].'</td>';
        echo '<td><input type="submit" value="Submit" /></form></td>';
        echo'</tr>';

    echo "</table>";

    echo '<a href="populations.php?population_code='.$population_code.'&year='.$year.'&period='.$period.'">Go back</a>';
    ?>
</div>
</body>
</html>
