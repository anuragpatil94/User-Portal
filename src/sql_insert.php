<?php
/**
 * Created by PhpStorm.
 * User: Anurag Patil
 * Date: 1/31/2017
 * Time: 10:34 AM
 */
$username = $_SESSION['username'];
$first_name = $_SESSION['first_name'];


if (isset($_POST['submit'])) {

    //INSERT CONTACT DATA IN DATABASE
    $contact_count = count($_POST['contact']);
    if ($contact_count > 0) {
        for ($i = 0; $i < $contact_count; $i++) {
            if (trim($_POST["contact"][$i] != '')) {
                $sql = "INSERT INTO contact VALUES('$username','" . mysqli_real_escape_string($con, $_POST['contact'][$i]) . "')";
                mysqli_query($con, $sql);
            }
        }

    }


    //INSERT ADDRESS DATA IN DATABASE
    $address_count = count($_POST['address']);
    if ($address_count > 0) {
        for ($i = 0; $i < $address_count; $i++) {
            if (trim($_POST["address"][$i] != '')) {
                $sql = "INSERT INTO address VALUES('$username','" . mysqli_real_escape_string($con, $_POST['address'][$i]) . "')";
                mysqli_query($con, $sql);
            }
        }

    }


    //INSERT UNIVERSITY DATA IN DATABASE
    $university_count = count($_POST['university_name']);

    if ($university_count > 0) {

        for ($i = 0; $i < $university_count; $i++) {
            $attended_till = $_POST['attended_till'][$i];
            $research = $_POST['research'][$i];
            if (isset($_POST['attended_from']) and (!isset($_POST['attended_till'][$i]) or trim($_POST['attended_till'][$i]) == '')) {

                $attended_till = 'Ongoing';
            }
            if ((!isset($_POST['research'][$i]) or trim($_POST['research'][$i]) == '')) {

                $research = 'None';
            }
            if (trim($_POST["university_name"][$i] != '')) {
                $sql = "INSERT INTO university VALUES('$username','" . mysqli_real_escape_string($con, $_POST['university_name'][$i]) .
                    "','" . mysqli_real_escape_string($con, $_POST['attended_from'][$i]) . "','$attended_till','$research')";
                mysqli_query($con, $sql);
            }
        }

    }

    //INSERT EMPLOYMENT DATA IN DATABASE
    $employment_count = count($_POST['company_name']);

    if ($employment_count > 0) {

        for ($i = 0; $i < $employment_count; $i++) {
            $till = $_POST['till'][$i];
            $from = $_POST['from'][$i];
            if (isset($_POST['from']) and (!isset($_POST['till'][$i]) or trim($_POST['till'][$i]) == '')) {

                $till = 'Ongoing';
            }

            if (trim($_POST["company_name"][$i] != '')) {
                $sql = "INSERT INTO employment VALUES('$username','" . mysqli_real_escape_string($con, $_POST['company_name'][$i]) .
                    "','" . mysqli_real_escape_string($con, $_POST['position'][$i]) .
                    "','" . $from . "','$till')";
                mysqli_query($con, $sql);
            }
        }

    }



    //INSERT PERSONAL DATA IN DATABASE
    $personal_query = "SELECT * FROM profile WHERE username='$username'";
    $personal_query_result = mysqli_query($con, $personal_query);
    if (mysqli_num_rows($personal_query_result) > 0) {
    } else {
        $InsertQuery = "INSERT INTO profile VALUES('','$username','$_POST[fname]','$_POST[lname]'); ";
        // $InsertQuery .= "INSERT INTO contact VALUES('$username','$_POST[contact]'); ";
        mysqli_multi_query($con, $InsertQuery);
    }

    echo "Data Inserted Successfully";
    header("Refresh:0; url=home.php");
}
