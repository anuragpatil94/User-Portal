<?php
/**
 * Created by PhpStorm.
 * User: Anurag Patil
 * Date: 1/27/2017
 * Time: 6:01 PM
 */
//-------------------------------------------------------------------------------------Database Connection Configuration
$db_connect_error='Sorry, we\'re experiencing some connection problem';
$con=mysqli_connect("localhost","root","root") or die($db_connect_error);
mysqli_select_db($con,'serc_lr');
