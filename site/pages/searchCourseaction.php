<?php
require_once "Connection.php";

session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
}

$myfile = fopen("../sql_scripts/searchCourse", "r") or die("Unable to open file!");
$query = fread($myfile,filesize("../sql_scripts/searchCourse"));
fclose($myfile);
if(($_POST['name'])!=''){
    $query .= "COURSE_NAME = '" . $_POST['name'] . "'";
    if(($_POST['teacher_first_name'])!=''){
        $query .= " and con.contact_first_name = '" . $_POST['teacher_first_name'] . "'";
    }
    if(($_POST['teacher_last_name'])!=''){
        $query .= " and con.contact_last_name = '" . $_POST['teacher_last_name'] . "'";
    }
}
else if(($_POST['teacher_first_name'])!=''){
    $query .= "con.contact_first_name = '" . $_POST['teacher_first_name'] . "'";
    if(($_POST['teacher_last_name'])!=''){
        $query .= " and con.contact_last_name = '" . $_POST['teacher_last_name'] . "'";
    }
}
else if(($_POST['teacher_last_name'])!=''){
    $query .= "con.contact_last_name = '" . $_POST['teacher_last_name'] . "'";
}
else{
    echo "Invalid search";
    return false;
}
$query .=" group by ATTENDANCE_STUDENT_REF, ATTENDANCE_COURSE_REF";
$con = new Connection();
$info = $con->getData($query);
?>
<html>
<link rel="stylesheet" href="../static/Styles.css"/>
<body>
<table>
    <th>Course name</th>
    <th>Teacher name</th>
    <th>Teacher surname</th>
    <?php
    foreach($info as $row){
        echo "<tr>";
        for($i = 0; $i < 4; $i++){
            echo "<td>" . $row[$i] . "</td>";
        }
    echo "</tr>";
    }
    ?>
</table>
</body>
</html>
