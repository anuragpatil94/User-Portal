<?php
/**
 * Created by PhpStorm.
 * User: Anurag Patil
 * Date: 1/27/2017
 * Time: 6:07 PM
 */
include 'includes/session_start.php';
?>
    <!DOCTYPE HTML>
    <HTML>
    <HEAD>
        <TITLE>
            Registration Form
        </TITLE>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </HEAD>
    <BODY>
    <div id="container">
        <h3>Registration Form</h3>

        <form class="myform" action="register.php" method="post">
            <input name="f_name" type="text" class="input" placeholder="firstname" required=""/><br>

            <input name="l_name" type="text" class="input" placeholder="lastname" required=""/><br>

            <input name="email" type="Email" class="input" placeholder="email" required=""/><br>
            <input name="username" type="text" class="input" placeholder="username" required=""/><br>
            <input name="password" type="password" class="input" placeholder=" Password" required=""/><br>
            <input name="c_password" type="password" class="input" placeholder="Confirm Password" required=""/><br>
            <input name="submit_btn" type="submit" class="button" value="Sign Up"/><br>
            <a href="index.php"><input name="back" type="button" class="button" value="Back"/></a>
        </form>

<?php
if (isset($_GET['success'])===true && empty($_GET['success'])){
     echo "<h1 style='color: white'>You have been registered successfully, <br><br> Please check your email to activate your account</h1>";
     header("Refresh:4; url=index.php");
}else
if (isset($_POST['submit_btn'])) {
    $username = sanitize($con, $_POST['username']);
    $password = sanitize($con, $_POST['password']);
    $email = sanitize($con, $_POST['email']);
    $c_password = sanitize($con, $_POST['c_password']);
    $f_name = sanitize($con, $_POST['f_name']);
    $l_name = sanitize($con, $_POST['l_name']);
    $email_code = md5($_POST['username'] + microtime()); //take username and append it to microtime
    if ($password == $c_password) {

        $query = "select * from users where username='$username'";
        $query_run = mysqli_query($con, $query);
        $result_query_run=mysqli_fetch_array($query_run);
        if ($query_run) {
            if (mysqli_num_rows($query_run) > 0) {
                echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
            } else {
                //echo '<script type="text/javascript">alert("Please check your mail for approval of account")</script>';
                $query = "insert into users(username, password, first_name, email, last_name, email_code) values('$username','$password','$f_name','$email','$l_name','$email_code')";
                $query_run = mysqli_query($con, $query);
                if ($query_run) {


                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $_SESSION['email'] = $email;
                    $_SESSION['f_name'] = $f_name;
                    $_SESSION['l_name'] = $l_name;
                    $_SESSION['type']=$result_query_run['type'];

                    //send email

                    $body = "Hello " . $f_name . ",\n\nYou need to activate your account, so use the link below:\n\nhttp://localhost:1234/SERCProject/activate.php?email=$email&email_code=$email_code\n\n\nThank You for joining us!!\n-- sercsystem
                       ";
                    email($email, 'Activate your Account', $body);

                    header('location:register.php?success');


                }
            }
        } else {
            echo '<script type="text/javascript">alert("DB error")</script>';
        }
    } else {
        echo '<script type"type/javascript"> alert("Password and confirm password does not match")</script>';
    }
}

?>