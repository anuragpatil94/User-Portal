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

if (isset($_POST['update'])) {
    $query_1 = "update profile set first_name='$_POST[fname]',last_name='$_POST[lname]' WHERE username=$username";
    $query_1 .= "update address set address='$_POST[address]'";
    $query_1 .= "update contact set contact.contact_number='$_POST[contact_number]'";
    $query_1 .= "update university set university_name='$_POST[university_name]',attended_from='$_POST[attended_from]',attended_till='$_POST[attended_till]',research='$_POST[research]'";
    $query_1 .= "update employment set company_name='$_POST[company_name]',`from`='$_POST[from]',till=$_POST[till],position=$_POST[position]";
    $result = mysqli_multi_query($con, $query_1);
    header('Location:home.php');
}


?>


    <div id="main_view">
    <!--DISPLAYING PERSONAL DETAILS -->
<?php
echo('<form method="post" action="home.php">');

if ($personal_query_result) {
    if (mysqli_num_rows($personal_query_result) > 0) {

        echo("   <div id='personal_view'>");


        while ($row = mysqli_fetch_array($personal_query_result)) {
            echo("First Name:  <input type='text' name='fname' value='" . $row['first_name'] . "'><br>");
            echo("Last Name:  <input type='text' name='lname' value='" . $row['last_name'] . "'>");


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

        echo('<div id="address_view">');

        while ($row = mysqli_fetch_array($address_query_result)) {
            echo("Address: <input type='text' name='address' value='" . $row['address'] . "'><br>");
        }
        echo('</div>');
        ?>

        <?php
    }
}
?>
    <!--DISPLAYING CONTACT DETAILS -->
<?php
if ($contact_query_result) {
    if (mysqli_num_rows($contact_query_result) > 0) {

        echo('<div id="contact_view">');

        while ($row = mysqli_fetch_array($contact_query_result)) {

            echo("Contact: <input type='text' name='contact_number' value='" . $row['contact_number'] . "'><br>");
            ?>


            <?php
        }
        echo('</div>');
        ?>

        <?php
    }
}

?>
    <!--DISPLAYING employment DETAILS -->
<?php
if ($employment_query_result) {
    if (mysqli_num_rows($employment_query_result) > 0) {

        echo('<div id="employment_research_view">');


        while ($row = mysqli_fetch_array($employment_query_result)) {


            echo('<div id="ll">');

            echo("company_name: <input type='text' name='company_name' value='" . $row['company_name'] . "'><br>");
            echo("position: <input type='text' name='position' value='" . $row['position'] . "'><br>");
            echo("form: <input type='text' name='from' value='" . $row['from'] . "'><br>");
            echo("till: <input type='text' name='till' value='" . $row['till'] . "'><br>");

            echo('</div>');
            ?>


            <?php
        }

        echo('</div>');

    }
}

?>

    <!--DISPLAYING UNIVERSITY DETAILS -->
<?php
if ($university_query_result) {
    if (mysqli_num_rows($university_query_result) > 0) {

        echo('<div id="university_view">');


        while ($row = mysqli_fetch_array($university_query_result)) {


            echo('<div id="ll">');


            echo("University Name: <input type='text'  name='university_name' value='" . $row['university_name'] . "'><br>");
            echo("Attended From: <input type='text' name='attended_from' value='" . $row['attended_from'] . "'><br>");
            echo("Attended Till: <input type='text' name='attended_till' value='" . $row['attended_till'] . "'><br>");
            echo("Research: <input type='text' name='research' value='" . $row['research'] . "'><br>");


            echo(' </div>');


        }

        echo('</div>');

    }
}


echo('</div>');

echo('<input type="submit" name="update" value="Update" id="submit">');
echo('</form>');
