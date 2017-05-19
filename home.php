<?php
/**
 * Created by PhpStorm.
 * User: Anurag Patil
 * Date: 1/27/2017
 * Time: 6:01 PM
 */
include 'includes/session_start.php';

?>

<!DOCTYPE HTML>
<HTML>
<HEAD>
    <TITLE>
        HOME
    </TITLE>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" type="text/css" href="css/display_data.css">
</HEAD>
<BODY>

<?php
include 'includes/header.php';
?>
<div class="content">
</div>


<div id="home_container">
    <input type="radio" id="s1" name="s" checked/>
    <input type="radio" id="s2" name="s"/>

    <input type="radio" id="s4" name="s"/>
    <div class="tabs">
        <label for="s1">New Profile</label>
        <label for="s2">My Profile</label>
        <label for="s4">Update</label>
    </div>
    <ul class="sections">
        <li>
            <?php
            include 'new_main.php';
            ?>

        </li>
        <li>
            <?php
            include 'my_profile.php';
            ?>
        </li>

        <li><?php
            include 'update.php';
            ?>
        </li>

    </ul>
</div>
</BODY>
</HTML>
