<?php
require_once "Connection.php";

session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
}

$query = "SELECT contact_email, contact_first_name, contact_last_name, contact_address, contact_city, contact_birthdate, student_population_period_ref, student_population_year_ref, student_population_code_ref FROM `students` join contacts on contact_email = student_contact_ref where ";
if(($_POST['first_name'])!=''){
    $query .= "contact_first_name = '" . $_POST['first_name'] . "'";
    if(($_POST['last_name'])!=''){
        $query .= "and contact_last_name = '" . $_POST['last_name'] . "'";
    }
    if(($_POST['email'])!=''){
        $query .= "and contact_email = '" . $_POST['email'] . "'";
    }
}
else if(($_POST['last_name'])!=''){
    $query .= "contact_last_name = '" . $_POST['last_name'] . "'";
    if(($_POST['email'])!=''){
        $query .= "and contact_email = '" . $_POST['email'] . "'";
    }
}
else if(($_POST['email'])!=''){
    $query .= "contact_email = '" . $_POST['email'] . "'";
}
else{
    echo "Invalid search";
    return false;
}
$con = new Connection();
$info = $con->getData($query, true);
?>
<html>
<link rel="stylesheet" href="../static/Styles.css"/>
<body>
<table>
    <th>
        contact email
    </th>
    <th>
        contact first name
    </th>
    <th>
        contact last name
    </th>
    <th>
        contact address
    </th>
    <th>
        contact city
    </th>
    <th>
        contact birthdate
    </th>
    <th>
        period
    </th>
    <th>
        year
    </th>
    <th>
        code
    </th>
    <?php
    echo "<tr>";
    echo "<td>" . $info[0] . "</td>";
    echo "<td>" . $info[1] . "</td>";
    echo "<td>" . $info[2] . "</td>";
    echo "<td>" . $info[3] . "</td>";
    echo "<td>" . $info[4] . "</td>";
    echo "<td>" . $info[5] . "</td>";
    echo "<td>" . $info[6] . "</td>";
    echo "<td>" . $info[7] . "</td>";
    echo "<td>" . $info[8] . "</td>";
    echo "</tr>";
    ?>
</table>
<a href="welcome.php">Go back</a>
</body>
</html>
