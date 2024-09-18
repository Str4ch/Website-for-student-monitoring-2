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
<?php echo '<form action="addCourseaction.php?population_code='.$population_code.'&year='.$year.'&period='.$period.'" method="post">';?>
<table border="1px" id="Login-table">
    <th>
        Course name
    </th>
    <th>
        Course code
    </th>
    <th>
        Sessions count
    </th>
    <th>
        Teacher
    </th>
    <tr>
        <td> <input required type = "text" name = "course_name" placeholder = "Enter course name" /></td>
        <td> <input required type = "text" name = "course_code" placeholder = "Enter course code" /></td>
        <td> <input required type = "number" name = "sessions_count" placeholder = "Enter sessions count" min="1" max="100"/></td>
        <td>
            <select required name="teacher">
                <option value="">Choose teacher</option>
                <?php
                $con = new Connection();
                $teachers = $con->getData("select teacher_epita_email from teachers");
                foreach ($teachers as $teacher) {
                    echo '<option value="'.$teacher[0].'">'.$teacher[0].'</option>';
                }
                ?>
            </select>
        </td>
    </tr>
</table>
<input type = "submit">
</form>
</body>
</html>