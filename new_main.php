<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-rc1/jquery.min.js"></script>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Anurag Patil
 * Date: 1/28/2017
 * Time: 10:40 PM
 */


include "src/sql_insert.php";

?>


<div id="main_view">
    <form id='ff' action='home.php' method='post'>
        <div id="personal_view">
            <input type='text' class='input' name='fname' value='' placeholder="First Name"><br>
            <input type='text' class='input' name='lname' value='' placeholder="Last Name">
        </div>

        <div id="address_view">
            <div id="y">
                <input type='text' class="input" name='address[]' placeholder='Enter Address '>
                <button type='button' class="d_add" name='add' id='add_address'>+</button>
            </div>
        </div>
        <div id="contact_view">
            <div id="x">
                <input type='text' class="input" name='contact[]' placeholder='Enter Contact'>
                <button type='button' class="d_add" name='add' id='add_contact'>+</button>
            </div>
        </div>

        <div id="employment_research_view">
            <div id="e">
                <input type="text" class="input" name="company_name[]" placeholder="Work Industry Name">
                <input type="text" class="input" name="position[]" placeholder="Title">
                <input type="text" class="input" name="from[]" placeholder="From">
                <input type="text" class="input" name="till[]" placeholder="till">
                <button type="button" class="d_add" name="add" id="add_employment">+</button>
                <hr>
            </div>

        </div>
        <div id="university_view">
            <div id="z">
                <input type="text" class="input" name="university_name[]" placeholder="Enter Name of the University">
                <input type="text" class="input" name="attended_from[]" placeholder="Attended From">
                <input type="text" class="input" name="attended_till[]" placeholder="Attended till">
                <input type="text" class="input" name="research[]" placeholder="Any Research? on what?">
                <button type="button" class="d_add" name="add" id="add_university">+</button>
                <hr>
            </div>
        </div>


        <input type='submit' name='submit' id='submit' value='Submit'>
    </form>

</div>


<!-------------------------------------------------CONTACT-->
<script>
    var c = 1, max_count = 2;
    $(document).ready(function () {

        $('#add_contact').click(function () {
            if (c <= max_count) {
                c++;
                $('#x').append('<div id="div_contact_field' + c + '">' +
                    '<input  type="text" class="input" name="contact[]" placeholder="Enter Contact" />' +
                    '<button style=" width:5%;min-width: 37px;min-height: 37px;height: 10%;border-radius: 3px;border: rgba(0, 0, 0, .3) 2px solid; margin-left: 4px " type="button"  name="remove_contact_btn" id="' + c + '" class="count_rm">' +
                    '-</button></div>');
            }
        });
        $(document).on('click', '.count_rm', function () {
            var button_id = $(this).attr("id");
            $('#div_contact_field' + button_id + '').remove();
            c--;
        });

    });

</script>
<!-------------------------------------------------ADDRESS-->
<script>
    var j = 1, max_address = 2;
    $(document).ready(function () {

        $('#add_address').click(function () {
            if (j <= max_address) {
                j++;
                $('#y').append('<div id="div_address_field' + j + '">' +
                    '<input type="text" class="input" name="address[]" placeholder="Enter Address" />' +
                    '<button style=" width:5%;min-width: 37px;min-height: 37px;height: 10%;border-radius: 3px;border: rgba(0, 0, 0, .3) 2px solid; margin-left: 4px  " type="button"  name="remove_address_btn" id="' + j + '" class="address_rm">' +
                    '-</button></div>');
            }
        });
        $(document).on('click', '.address_rm', function () {
            var button_id = $(this).attr("id");
            $('#div_address_field' + button_id + '').remove();
            j--;
        });

    });

</script>
<!-------------------------------------------------UNIVERSITY-->
<script>
    var u = 1, max_university = 2;
    $(document).ready(function () {

        $('#add_university').click(function () {
            if (u <= max_university) {
                u++;
                $('#z').append('<div id="div_university_field' + u + '">' +
                    '<input type="text" class="input" name="university_name[]" placeholder="Enter Name of the University">' +
                    '<input style="margin-left: 4px" type="text" class="input" name="attended_from[]" placeholder="Attended From">' +
                    '<input style="margin-left: 4px" type="text" class="input" name="attended_till[]" placeholder="Attended till">' +
                    '<input style="margin-left: 4px" type="text" class="input" name="research[]" placeholder="Any Research? on what?">' +
                    '<button style=" width:5%;min-width: 37px;min-height: 37px;height: 10%;border-radius: 3px;border: rgba(0, 0, 0, .3) 2px solid; margin-left: 4px " type="button"  name="remove_university_btn" id="' + u + '" class="university_rm">-</button>' +
                    '<hr></div>');


            }
        });
        $(document).on('click', '.university_rm', function () {
            var button_id = $(this).attr("id");
            $('#div_university_field' + button_id + '').remove();
            u--;
        });

    });

</script>

<!-------------------------------------------------EMPLOYMENT-->
<script>
    var e = 1, max_employment = 2;
    $(document).ready(function () {

        $('#add_employment').click(function () {
            if (e <= max_employment) {
                e++;
                $('#e').append('<div id="div_employment_field' + e + '">' +
                    '<input type="text" class="input" name="company_name[]" placeholder="Work Industry Name">' +
                    ' <input type="text" class="input" name="position[]" placeholder="Title">' +
                    ' <input type="text" class="input" name="from[]" placeholder="From">' +
                    ' <input type="text" class="input" name="till[]" placeholder="till">' +

                    '<button style=" width:5%;min-width: 37px;min-height: 37px;height: 10%;border-radius: 3px;border: rgba(0, 0, 0, .3) 2px solid; margin-left: 4px " type="button"  name="remove_employment_btn" id="' + e + '" class="employment_rm">-</button>' +
                    '<hr></div>');
            }
        });
        $(document).on('click', '.employment_rm', function () {
            var button_id = $(this).attr("id");
            $('#div_employment_field' + button_id + '').remove();
            e--;
        });

    });

</script>
