<?php
$username = $_SESSION['username'];
$first_name = $_SESSION['first_name'];

$personal_query = "SELECT * FROM profile WHERE username='$username'";
$contact_query = "SELECT * FROM contact WHERE username_c='$username'";
$address_query = "SELECT * FROM address WHERE username='$username'";
$university_query = "SELECT * FROM university WHERE username='$username'";
$employment_query = "SELECT * FROM employment WHERE username='$username'";
//$employment_query="SELECT * FROM initial WHERE username='$username'";
//$university_query="SELECT * FROM uni WHERE username='$username'";
$personal_query_result = mysqli_query($con, $personal_query);
$contact_query_result = mysqli_query($con, $contact_query);
$address_query_result = mysqli_query($con, $address_query);
$university_query_result = mysqli_query($con, $university_query);
$employment_query_result = mysqli_query($con, $employment_query);
?>


<div id="main_view">
    <!--DISPLAYING PERSONAL DETAILS -->
    <?php
    if ($personal_query_result) {
        if (mysqli_num_rows($personal_query_result) > 0) {
            ?>
            <div id="personal_view">
                Name:
                <?php
                while ($row = mysqli_fetch_array($personal_query_result)) {


                    echo($row['first_name'] . ' ' . $row['last_name']);

                    ?>
                    <br>

                    <?php
                }
                ?>
            </div>
            <?php
        }
    }
    ?>
    <!--DISPLAYING ADDRESS DETAILS -->
    <?php
    if ($address_query_result) {
        if (mysqli_num_rows($address_query_result) > 0) {
            ?>
            <div id="address_view">
                Address:<br>
                <?php
                while ($row = mysqli_fetch_array($address_query_result)) {


                    echo($row['address']);
                    ?>
                    <br>

                    <?php
                }
                ?>
            </div>
            <?php
        }
    }
    ?>
    <!--DISPLAYING CONTACT DETAILS -->
    <?php
    if ($contact_query_result) {
        if (mysqli_num_rows($contact_query_result) > 0) {
            ?>
            <div id="contact_view">
                Contact:<br>
                <?php
                while ($row = mysqli_fetch_array($contact_query_result)) {


                    echo($row['contact_number']);
                    ?>
                    <br>

                    <?php
                }
                ?>
            </div>
            <?php
        }
    }

    ?>
    <!--DISPLAYING employment DETAILS -->
    <?php
    if ($employment_query_result) {
        if (mysqli_num_rows($employment_query_result) > 0) {
            ?>
            <div id="employment_research_view">

                <?php
                while ($row = mysqli_fetch_array($employment_query_result)) {

                    ?>
                    <div id="ll">

                        <?php
                        echo('Name: ' . $row['company_name'] . '<br>');
                        echo('Title: ' . $row['position'] . '<br>');
                        echo('From: ' . $row['from'] . '<br>');
                        echo('Till: ' . $row['till'] . '<br>');
                        ?>


                    </div>

                    <?php
                }
                ?>
            </div>
            <?php
        }
    }

    ?>

    <!--DISPLAYING UNIVERSITY DETAILS -->
    <?php
    if ($university_query_result) {
        if (mysqli_num_rows($university_query_result) > 0) {
            ?>
            <div id="university_view">

                <?php
                while ($row = mysqli_fetch_array($university_query_result)) {

                    ?>
                    <div id="ll">

                        <?php
                        echo('University Name: ' . $row['university_name'] . '<br>');
                        echo('From: ' . $row['attended_from'] . '<br>');
                        echo('Till: ' . $row['attended_till'] . '<br>');
                        echo('Research: ' . $row['research'] . '<br>');
                        ?>


                    </div>

                    <?php
                }
                ?>
            </div>
            <?php
        }
    }

    ?>


</div>