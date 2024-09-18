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
<?php echo '<form action="addStudentaction.php?population_code='.$population_code.'&year='.$year.'&period='.$period.'" method="post">';?>
    <table border="1px" id="Login-table">
        <th>
            First name
        </th>
        <th>
            Last name
        </th>
        <th>
            Email
        </th>
        <tr>
           <td> <input required type = "text" name = "first_name" placeholder = "Enter first name" /></td>
            <td> <input required type = "text" name = "last_name" placeholder = "Enter last name" /></td>
            <td> <input required type = "email" name = "email" placeholder = "Enter email" /></td>
        </tr>
    </table>
    <input type = "submit">
</form>
</body>
</html>