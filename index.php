<?php
/**
 * Created by PhpStorm.
 * User: Anurag Patil
 * Date: 1/27/2017
 * Time: 6:01 PM
 */
//-----------------------------------------------------------------------------------------A FILE CONTAINING ALL IMPORTS
include 'includes/session_start.php';

?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
    <TITLE>
        LOGIN
    </TITLE>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</HEAD>
<BODY>
<div id="container">
    <h3>Sign in</h3>
    <form class="myform" action="" method="post">
        <input name="username" type="text" class="input" placeholder="Username" required=""/><br>

        <input name="password" type="password" class="input" placeholder="Password" required=""/><br>

        <input name="login" type="submit" class="button" value="Log in"/><br>
        <a href="register.php"><input type="button" class="button" value="Register"/></a>
    </form>

    <?php //----------------------------------------------------------------------------------------LOGIN AUTHENTICATION
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $username = sanitize($con, $username);
        $password = sanitize($con, $password);
        $query = "select * from users where username='$username' and password='$password'";
        $run_query = mysqli_query($con, $query);
        $row = mysqli_fetch_array($run_query);
        if ($run_query) {
            if (mysqli_num_rows($run_query) < 0) {
                echo '<script type="text/javascript">alert("Incorrect Username/Password")</script>';
            } elseif ($row['type'] == 1) {

                header('location:admin.php');
            } else if (mysqli_num_rows($run_query) > 0 and $row['active'] == 1) {

                $query1 = "UPDATE users SET online=1 WHERE username='$username'";
                $result = mysqli_query($con, $query1);
                $new_query = "select * from users where username='$username'";
                $row_query1 = mysqli_fetch_row(mysqli_query($con, $new_query));
                header('refresh:1');
                $_SESSION['first_name'] = $row[2];
                $_SESSION['username'] = $username;
                $_SESSION['type'] = $row[7];
                $_SESSION['online'] = $row_query1[8];
                header('location:home.php');


            } else {
                echo '<script type="text/javascript">alert("Incorrect Username/Password or activate your account")</script>';
            }
        } else {
            echo '<script type="text/javascript">alert("Database Error")</script>';
        }
    }
    ?>
</div>
</BODY>
</HTML>