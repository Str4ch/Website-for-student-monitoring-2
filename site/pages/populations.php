<?php
require_once "Connection.php";
session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
}
$population_code = $_GET['population_code'];
$year = $_GET['year'];
$period = $_GET['period'];
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../static/Styles.css"/>
<body>
    <h1> Students </h1>
    <div>
        <?php echo '<form action="addStudent.php?&population_code=' . $population_code . '&year=' . $year . '&period=' . $period . '" method="post">';?>
        <button value="Add" >Add</button>
    </form>
    <form action="searchStudent.html">
        <button value="Search" >Search</button>
    </form>
    </div>
    <table>
        <th>email</th>
        <th>first name</th>
        <th>last name</th>
        <th>passed</th>
        <th>action</th>
        <?php
        $con = new Connection();
        $myfile = fopen("../sql_scripts/p2r1", "r") or die("Unable to open file!");
        $query = fread($myfile,filesize("../sql_scripts/p2r1"));
        fclose($myfile);
        $students = $con->getData(sprintf($query, $population_code, $year, $period));
        foreach ($students as $student) {
            echo "<tr>";

                echo '<td><a href="student.php?id='.$student[0].'&population_code=' . $population_code . '&year=' . $year . '&period=' . $period . '">'.$student[0].'</a></td>';
                echo'<td><a href="student.php?id='.$student[0].'&population_code=' . $population_code . '&year=' . $year . '&period=' . $period . '">'.$student[1].'</a></td>';
                echo'<td><a href="student.php?id='.$student[0].'&population_code=' . $population_code . '&year=' . $year . '&period=' . $period . '">'.$student[2].'</a></td>';
                echo'<td>'.$student[3].' / '.$student[4].'</td>';
                echo '<td><form action="student.php?id='.$student[0].'&population_code=' . $population_code . '&year=' . $year . '&period=' . $period . '" method="post"><button value="Edit" >Edit</button></form> <form action="deleteStudent.php?id='.$student[0].'&population_code=' . $population_code . '&year=' . $year . '&period=' . $period . '" method="post"><button class="confirm">Delete</button></form></td>';
            echo"</tr>";
        }
        ?>
    </table>

    <h1> Courses </h1>
    <div>
        <?php echo '<form action="addCourse.php?&population_code=' . $population_code . '&year=' . $year . '&period=' . $period . '" method="post">';?>
        <button value="Add" >Add</button>
        </form>
        <form action="searchCourse.html">
            <button value="Search" >Search</button>
        </form>
    </div>
    <table>
        <th>Name</th>
        <th>Sessions count</th>
        <th>Teacher's name</th>
        <?php
        $myfile = fopen("../sql_scripts/p2r2", "r") or die("Unable to open file!");
        $query = fread($myfile,filesize("../sql_scripts/p2r2"));
        fclose($myfile);
        $courses = $con->getData(sprintf($query, $population_code, $year, $period));
        foreach ($courses as $course) {
            echo "<tr>";
            echo '<td><a href="grades.php?course='.$course[0].'&population_code=' . $population_code . '&year=' . $year . '&period=' . $period . '">' . $course[0] . '</a></td>';
            echo "<td>" . $course[1] . "</td>";
            echo "<td>" . $course[2] ." ". $course[3]. "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <div>
        <a href="welcome.php">Go back</a>
    </div>
<script src="confirm.js"></script>
</body>
</html>
