
<?php
//-----------------------------------------------------------------------------------A function to prevent SQL Injection
function sanitize($con,$data){
    return mysqli_real_escape_string($con,$data);
}

