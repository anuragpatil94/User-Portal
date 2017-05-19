<?php
/**
 * Created by PhpStorm.
 * User: Anurag Patil
 * Date: 2/2/2017
 * Time: 10:33 AM
 */

//$table=$_GET['attribute'];


?>
<div id="search">
    <h5>SEARCH</h5><br><br>
    <form method="get">
        <table id="search_table">
            <tr>
                <td>
                    ATTRIBUTES:
                </td>
                <td>
                    <select name="attribute" id="attribute_drop_down1" onchange="change_attribute1()">
                        <option>SELECT</option>
                        <option>UNIVERSITY</option>
                        <option>EMPLOYMENT</option>
                    </select>

                </td>
                <td>
                    <select name="info" id="attribute_drop_down2" onchange="change_attribute2()">
                        <option>SELECT</option>
                        <option>NAME</option>
                        <option>CONTACT</option>
                        <option>ADDRESS</option>
                    </select>
                </td>

            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <div id="get_data1">
                        <select>
                            <option>
                                Select
                            </option>
                        </select>
                    </div>
                </td>
                <td>

                </td>
            </tr>
            <tr>

            </tr>
        </table>

        <div id="get_data2" ">
        </div>
    </form>

</div>
<script>
    function change_attribute1() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "search/getAttributeData.php?attribute=" + document.getElementById("attribute_drop_down1").value, false);
        xmlhttp.send(null);
        document.getElementById("get_data1").innerHTML = xmlhttp.responseText;

    }
    function change_attribute2() {
        //  alert(document.getElementById('ae').value);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET",
            "search/getInfoData.php?info=" + document.getElementById("attribute_drop_down2").value +
            "&an=" + document.getElementById("attribute_drop_down3").value +
            "&attribute=" + document.getElementById("attribute_drop_down1").value, false);
        xmlhttp.send(null);
        document.getElementById("get_data2").innerHTML = xmlhttp.responseText;

    }
    //    function search() {
    //        var xmlhttp = new XMLHttpRequest();
    //        xmlhttp.open("GET", "getSearchData.php?attribute=" + document.getElementById("attribute_drop_down").value + "&info=" + document.getElementById("attribute_drop_down2").value, false);
    //        xmlhttp.send(null);
    //        document.getElementById("an").innerHTML = xmlhttp.responseText;
    //    }
</script>

