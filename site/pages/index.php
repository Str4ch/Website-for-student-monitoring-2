<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="../static/Styles.css"/>

<body id="centered">
<section class="login">
<div id="Login">

    <form id="loginform" action="loginaction.php" method="post">
        <table border="1px" id="Login-table">
            <tr>
                <td>Username</td> <td> <input type = "username" name = "Uinput" placeholder = "Enter your username" /></td>
            </tr>
            <tr>
                <td>Password</td> <td> <input type = "password" name = "Pinput" placeholder = "Enter your password" /></td>
            </tr>
        </table>
        <input type = "submit">
    </form>
    <div id="Error">
        <?php
        $errorMessage = '';
        if(isset($_GET['Err'])){
            $errorMessage = 'Login failed';
        }
        echo $errorMessage;
        ?>
    </div>
</div>
</section>
</body>

</html>