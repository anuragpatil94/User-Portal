<?php
/**
 * Created by PhpStorm.
 * User: Anurag Patil
 * Date: 2/1/2017
 * Time: 2:30 PM
 */


$username = $_SESSION['username'];

if (isset($_POST['personal_submit'])) {
    echo('<pre>');
    updateProfileData($con, $username, $_POST);
    echo('</pre>');
} else if (isset($_POST['address_submit'])) {
    echo('<pre>');
    updateAddressData($con, $username, $_POST);

    echo('</pre>');
} else if (isset($_POST['contact_submit'])) {
    echo('<pre>');
    updateContactData($con, $username, $_POST);
    echo('</pre>');
} else if (isset($_POST['employment_submit'])) {
    echo('<pre>');
    updateEmploymentData($con, $username, $_POST);
    echo('</pre>');
} else if (isset($_POST['university_submit'])) {
    echo('<pre>');
    updateUniversityData($con, $username, $_POST);
    echo('</pre>');
} else if (isset($_POST['personal_delete'])) {
    echo('<pre>');
    deleteProfileData($con, $username, $_POST);
    echo('</pre>');
} else if (isset($_POST['contact_delete_submit'])) {
    echo('<pre>');
    deleteContactData($con, $username, $_POST);
    echo('</pre>');
} else if (isset($_POST['address_delete_submit'])) {
    echo('<pre>');
    deleteAddressData($con, $username, $_POST);
    echo('</pre>');
} else if (isset($_POST['employment_delete_submit'])) {
    echo('<pre>');
    deleteEmploymentData($con, $username, $_POST);
    echo('</pre>');
} else if (isset($_POST['university_delete_submit'])) {
    echo('<pre>');
    deleteUniversityData($con, $username, $_POST);
    echo('</pre>');
}


?>


    <div id="main_view">

        <div id="personal_view">
            <div class="view_border">
                <H5>PERSONAL INFO</H5>
                <br>

                <?php
                $personal_query_result = selectProfileData($con, $username);
                if (mysqli_num_rows($personal_query_result) > 0) {
                    echo("<form method='post'>");
                    while ($row = mysqli_fetch_array($personal_query_result)) {
                        echo(' <input type="text" class="input" name="first_name" value="' . $row['first_name'] . '">');
                        echo(' <input type="text" class="input" name="last_name" value="' . $row['last_name'] . '">');

                    }

                    echo('<br>');
                    echo('<input class="submit" name="personal_submit" type="submit" value="Update">');
                    echo('<input class="delete" name="personal_delete" type="submit" value="Delete">');
                    echo('</form>');
                }
                ?>
            </div>
        </div>


        <div id="address_view">
            <div class="view_border">
                <H5>ADDRESS</H5>
                <br>

                <?php
                $address_query_result = selectAddressData($con, $username);
                if (mysqli_num_rows($address_query_result) > 0) {
                    echo('<form method="post">');

                    while ($row = mysqli_fetch_array($address_query_result)) {

                        echo('<input type="text" class="input" name="address[' . $row['address_id'] . ']" value="' . $row['address'] . '">');
                        echo('<input class="submit" name="address_submit[' . $row['address_id'] . ']" type="submit" value="Update">');
                        echo('<input class="delete" name="address_delete_submit[' . $row['address_id'] . ']" type="submit" value="Delete"><br>');
                        echo(' <input type="hidden" class="input" name="id[]" value="' . $row['address_id'] . '">');

                    }

                    //echo('<input class="submit" name="address_submit" type="submit" value="Update">');
                    //  echo('<input class="delete" name="address_delete" type="submit" value="Delete">');
                    echo('<br>');
                    echo('</form>');
                }
                ?>

            </div>
        </div>
        <div id="contact_view">
            <div class="view_border">
                <H5>CONTACT</H5>
                <br>
                <?php
                $contact_query_result = selectContactData($con, $username);
                if (mysqli_num_rows($contact_query_result) > 0) {
                    echo('<form method="post">');
                    while ($row = mysqli_fetch_array($contact_query_result)) {
                        echo('<input type="text" class="input" name="contact_number[' . $row['contact_id'] . ']" value="' . $row['contact_number'] . '">');
                        echo('<input class="submit" name="contact_submit[' . $row['contact_id'] . ']" type="submit" value="Update">');
                        echo('<input class="delete" name="contact_delete_submit[' . $row['contact_id'] . ']" type="submit" value="Delete"><br>');
                        echo(' <input type="hidden"  name="id[]" value="' . $row['contact_id'] . '">');
                    }

                    //   echo('<input class="submit" name="address_submit" type="submit" value="Update">');
                    //   echo('<input class="delete" name="contact_delete" type="submit" value="Delete">');
                    echo('<br>');
                    echo('</form>');
                }
                ?>

            </div>
        </div>

        <div id="employment_research_view">
            <div class="view_border">
                <H5>EMPLOYMENT</H5>
                <br>
                <?php
                $employment_query_result = selectEmploymentData($con, $username);
                if (mysqli_num_rows($employment_query_result) > 0) {
                    echo('<form method="post">');
                    while ($row = mysqli_fetch_array($employment_query_result)) {
                        echo('<div id="erv_update">');
                        echo('<input type="text" class="input" name="company_name[' . $row['employment_id'] . ']" value="' . $row['company_name'] . '"><br>');
                        echo('<input type="text" class="input" name="position[' . $row['employment_id'] . ']" value="' . $row['position'] . '"><br>');
                        echo('<input type="text" class="input" name="from[' . $row['employment_id'] . ']" value="' . $row['from'] . '"><br>');
                        echo('<input type="text" class="input" name="till[' . $row['employment_id'] . ']" value="' . $row['till'] . '"><br>');

                        echo('<input class="submit" name="employment_submit[' . $row['employment_id'] . ']" type="submit" value="Update">');
                        echo('<input class="delete" name="employment_delete_submit[' . $row['employment_id'] . ']" type="submit" value="Delete"><br>');
                        echo(' <input type="hidden"  name="id[]" value="' . $row['employment_id'] . '"><br>');
                        echo('</div>');
                    }

                    //   echo('<input class="submit" name="address_submit" type="submit" value="Update">');
                    //   echo('<input class="delete" name="employment_delete" type="submit" value="Delete">');
                    echo('<br>');
                    echo('</form>');
                }
                ?>
            </div>
        </div>
        <div id="university_view">
            <div class="view_border">
                <H5>UNIVERSITY</H5>
                <br>
                <?php
                $university_query_result = selectUniversityData($con, $username);
                if (mysqli_num_rows($university_query_result) > 0) {
                    echo('<form method="post">');
                    while ($row = mysqli_fetch_array($university_query_result)) {
                        echo('<div id="erv_update">');
                        echo('<input type="text" class="input" name="university_name[' . $row['university_id'] . ']" value="' . $row['university_name'] . '"><br>');
                        echo('<input type="text" class="input" name="attended_from[' . $row['university_id'] . ']" value="' . $row['attended_from'] . '"><br>');
                        echo('<input type="text" class="input" name="attended_till[' . $row['university_id'] . ']" value="' . $row['attended_till'] . '"><br>');
                        echo('<input type="text" class="input" name="research[' . $row['university_id'] . ']" value="' . $row['research'] . '"><br>');
                        echo('<input class="submit" name="university_submit[' . $row['university_id'] . ']" type="submit" value="Update">');
                        echo('<input class="delete" name="university_delete_submit[' . $row['university_id'] . ']" type="submit" value="Delete"><br>');
                        echo(' <input type="hidden"  name="id[]" value="' . $row['university_id'] . '"><br>');
                        echo('</div>');
                    }

                    //   echo('<input class="submit" name="address_submit" type="submit" value="Update">');

                    echo('<br>');
                    echo('</form>');
                }
                ?>
            </div>

        </div>

    </div>
<?php

