<?php
$username=$_SESSION['username'];
$online=$_SESSION['online'];
if ($online==0){
    header('location:index.php');
}

?>

<div class="header">
    <form action="home.php" method="post">
    <input type="submit" id="logout_btn" name="logout" value="Logout">
    </form>
        <h1>Welcome, <?php
        echo(ucfirst($_SESSION['first_name']));
        ?>
        <!-- button logout sublime-->
    </h1>

</div>

<?php
if (isset($_POST['logout'])){
    $query1 = "UPDATE users SET online=0 WHERE username='$username'";
    $result = mysqli_query($con, $query1);

    session_destroy();
    header('location:index.php');
}
?>