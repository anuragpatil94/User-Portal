<?php
/**
 * Created by PhpStorm.
 * User: Anurag Patil
 * Date: 2/2/2017
 * Time: 12:42 PM
 */
include "../src/database/connect.php";
echo("<pre>");
//print_r($_GET);
$attr_1 = strtolower(trim($_GET['attribute']));
if ($attr_1 != "") {
    if ($attr_1 == "university") {
        $attr_1_data = 'university_name';
    } else {
        $attr_1_data = 'company_name';
    }
    $res = mysqli_query($con, "SELECT DISTINCT($attr_1_data) FROM $attr_1 ");
    echo "<select name=\"an\" id=\"attribute_drop_down3\">";
    while ($row = mysqli_fetch_array($res)) {
        echo "<option>";
        echo $row[$attr_1_data];
        echo "</option>";
    }
    echo "</select>";
}


echo("</pre>");