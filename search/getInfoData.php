<?php
/**
 * Created by PhpStorm.
 * User: Anurag Patil
 * Date: 2/2/2017
 * Time: 1:30 PM
 */
include "../src/database/connect.php";
echo("<pre>");
//print_r($_GET);

$attr_1 = strtolower(trim($_GET['attribute']));  //university
$attr_3 = strtolower(trim($_GET['an'])); //stevens
$attr_2 = strtolower(trim($_GET['info']));  //name
$flag = 0;
if ($attr_2 != "") {
    if ($attr_1 == 'university') {
        $attr_1_data = 'university_name';
    } else {
        $attr_1_data = 'company_name';
    }
    $query = mysqli_query($con, "SELECT DISTINCT(`username`) FROM $attr_1 WHERE $attr_1_data='$attr_3'");
    while ($username = mysqli_fetch_array($query)) {
        // echo $username['username'] . '<br>';

        echo '<div style="border: 1px black hidden">';
        if ($attr_2 == 'name') {
            $res = mysqli_query($con, "SELECT * FROM profile WHERE username='$username[username]' ");

            while ($row = mysqli_fetch_array($res)) {
                echo $row['first_name'] . ' ';
                echo $row['last_name'] . '<br>';

            }
        } elseif ($attr_2 == 'contact') {
            $res1 = mysqli_query($con, "SELECT * FROM profile WHERE username='$username[username]' ");
            while ($row1 = mysqli_fetch_array($res1)) {


                $res = mysqli_query($con, "SELECT * FROM contact WHERE username_c='$username[username]' ");
                $i = 0;
                while ($row = mysqli_fetch_array($res)) {

                    if ($flag == 0) {
                        echo $row1['first_name'] . '  ' . $row1['last_name'] . ' <br>';
                        $flag = 1;
                    }
                    echo '       ' . $row['contact_number'] . '<br>';
                    // $i++;
                }


            }
        } else {
            $res1 = mysqli_query($con, "SELECT * FROM profile WHERE username='$username[username]' ");
            while ($row1 = mysqli_fetch_array($res1)) {


                $res = mysqli_query($con, "SELECT * FROM address WHERE username='$username[username]' ");
                $i = 1;
                while ($row = mysqli_fetch_array($res)) {

                    if ($flag == 0) {
                        echo $row1['first_name'] . '  ' . $row1['last_name'] . ' <br>';
                        $flag = 1;
                    }
                    echo '       ' . 'Address' . $i . ':  ' . $row['address'] . '<br>';
                    $i++;
                }


            }

        }

        $flag = 0;
        echo '</div>';
    }


}

echo("</pre>");