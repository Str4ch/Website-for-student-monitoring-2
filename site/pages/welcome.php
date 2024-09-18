<?php
require_once "Connection.php";
session_start();
if(!isset($_SESSION['username'])){
        header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../static/Styles.css"/>
<body>
    <?php
    echo "<h1>Hello ".$_SESSION['username']."</h1>";
    echo "<h2>Active Populations</h2>";
    ?>
    <div class="main">
        <table id = "Populations">
            <th>
                Course name
            </th>
            <th>
                Students
            </th>
            <?php
            $con = new Connection();

            $myfile = fopen("../sql_scripts/p1r1", "r") or die("Unable to open file!");
            $query = fread($myfile,filesize("../sql_scripts/p1r1"));
            fclose($myfile);
            $populations = $con->getData($query);
            foreach ($populations as $population) {
                echo "<tr>";
                echo '<td><a href="populations.php?population_code='.$population[0].'&year='.$population[1].'&period='.$population[2].'">'.$population[0].' - '.$population[1].' '.$population[2].'</a></td> <td>'.$population[3].'</td>';
                echo "</tr>";
            }
            ?>
        </table>
        <canvas id="firstChart" style="width:100%;max-width:700px"></canvas>
    </div>
    <h2>Overall Attendance</h2>
    <div class="main">
        <table id = "Attendance">
            <th>
                Course name
            </th>
            <th>
                Attendance
            </th>
            <?php
            $myfile = fopen("../sql_scripts/p1r2", "r") or die("Unable to open file!");
            $query = fread($myfile,filesize("../sql_scripts/p1r2"));
            fclose($myfile);
            $attendance = $con->getData($query);
            foreach ($attendance as $att) {
                echo "<tr>";
                echo '<td>'.$att[0].' - '.$att[1].' '.$att[2].'</td> <td>'.$att[3].'</td>';
                echo "</tr>";
            }
            ?>
        </table>


        <canvas id="secondChart" style="width:100%;max-width:700px"></canvas>
    </div>
    <p>Last time generated <?php echo date('Y-m-d H:i:s');?></p>
    <a href="logout.php">Logout</a>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="main.js"></script>

</html>