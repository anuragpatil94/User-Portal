<?php
/**
 * Created by PhpStorm.
 * User: Anurag Patil
 * Date: 1/27/2017
 * Time: 8:42 PM
 */

//----------------------------------------------------------------------This file consist of many user related functions
include 'src/database/connect.php';
function getData($con)
{
    if ($_SESSION['username']!=null) {
        $username_global = $_SESSION['username'];
        $global_user_query = "select * from users where username=$username_global";
        $query_result = mysqli_query($con, $global_user_query);
        $qr = mysqli_fetch_array($query_result);
        return $qr;
    }else{
        return false;
    }
}

//----------------------------------------------------------------To check if the account is activated before Logging in
function activate($con,$email,$email_code){
    $email=mysqli_real_escape_string($con,$email);
    $email_code=mysqli_real_escape_string($con,$email_code);

    $sql="select (username) from users WHERE email='$email' and email_code='$email_code' and active=0";

    $result=(mysqli_query($con,$sql));


    if(mysqli_num_rows($result)>0){
       mysqli_query($con,"UPDATE users SET active=1 WHERE email='$email'");
        return true;
    }
    else{
        return false;
    }

}
function user_exists($con,$username){
    $query="select count(`user_id`) form `users` where `username`='$username'";
    return (mysqli_query($con,$query)==1)?true:false;

}
function user_active($con,$username){
    $query="select active  from users where username=$username and active=1";
    $result_answer=mysqli_query($con,$query);
    $row=mysqli_fetch_row($result_answer);
    echo($row[0]);
    return ($row[0]);
//    $result=mysqli_query($con, $query);
//    return mysqli_result($result,0==1);
}

?>

