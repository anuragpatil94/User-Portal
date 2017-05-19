<?php
/**
 * Created by PhpStorm.
 * User: Anurag Patil
 * Date: 1/27/2017
 * Time: 6:01 PM
 */
include 'includes/session_start.php';

if (isset($_POST['offline'])) {
    $username = $result['username'];
    echo $username;
//    $query1 = "UPDATE users SET online=0 WHERE username='$username'";
//    $result = mysqli_query($con, $query1);
//    header('location:admin.php');
//    session_destroy();

}


?>

<!DOCTYPE HTML>
<HTML>
<HEAD>
    <TITLE>
        ADMIN
    </TITLE>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" type="text/css" href="css/display_data.css">
</HEAD>
<BODY>

<?php
?>
<div class="header">
    <form action="admin.php" method="post">
        <input type="submit" id="logout_btn" name="logout" value="Logout">
        <input type="submit" id="refresh_btn" name="refresh" value="Refresh">

    </form>
    <h1>Welcome, Admin </h1>

</div>

<?php
//--------------------------------------------------------------------------------------------------------Refresh Button
if (isset($_POST['refresh'])) {

    header('refresh:0', 'location:admin.php');
}
//---------------------------------------------------------------------------------------------------------Logout Button
if (isset($_POST['logout'])) {
    session_destroy();
    header('location:index.php');
}
?>
<div class="content">
</div>


<div id="home_container">
    <input type="radio" id="s1" name="s" checked/>
    <input type="radio" id="s2" name="s"/>
    <input type="radio" id="s3" name="s"/>

    <div class="tabs">
        <label for="s1">SEARCH USER</label>
        <label for="s2">ONLINE USER</label>
        <label for="s3">ADD NEW</label>

    </div>
    <ul class="sections">
        <li>
            <?php //---------------------------------------------------------------------------Including the search page
            include 'admin_search.php';
            ?>


        </li>
        <li>
            <h2 style="border-bottom: solid black 2px;margin-bottom: 10px margin-left:300px">ONLINE USERS</h2>

            <?php
            //------------------------------------------------------------------------------------Check for online Users
            $query = "SELECT * FROM users WHERE online=1";
            $res = (mysqli_query($con, $query));
            $result = mysqli_fetch_array($res);
            $user = $result['username'];
            ?>
            <div id="display_online">
                <?php
                if (mysqli_num_rows(mysqli_query($con, $query)) > 0) {
                    echo " <form action='admin.php' method='post'>";
                    echo "USERNAME:" . ucfirst($user);
                    echo("<input type='submit' id='offline_btn' name='offline' value='offline'>");
                    echo " </form>";
                }
                ?>
            </div>
        </li>
        <li>
            <?php
            include 'extras/add_new.php'
            ?>
        </li>


    </ul>
</div>
</BODY>
</HTML>
