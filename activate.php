<!DOCTYPE HTML>
<HTML>
<HEAD>
    <TITLE>
        Login
    </TITLE>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</HEAD>
<BODY>
<div id="container">
    <?php
    /**
     * Created by PhpStorm.
     * User: Anurag Patil
     * Date: 1/31/2017
     * Time: 4:23 PM
     */
    include 'includes/session_start.php';
    if (isset($_GET['success']) === true && empty($_GET['success'])) {
        ?>
        <h2 style="color: white">Thanks, we've activated your account...<br>You are free to log in</h2>
        <form action="index.php" method="post">
            <input type="submit" class="button" value="Return to Login Page">
        </form>
        <?php


    } else
        if (isset($_GET['email'], $_GET['email_code'])) {

            $email = trim($_GET['email']);
            $email_code = trim($_GET['email_code']);

            //echo (activate($con, $email, $email_code)) . '<br>';
            if (activate($con, $email, $email_code) === false) {
                echo "<h1 style='color: white'>We have problems activating your account</h1>";
            } else {
                echo 'true';
                header('Location:activate.php?success');
            }

        } else {
            header('Location:index.php');
            exit();
        }


    ?>
</div>
</BODY>
</HTML>
