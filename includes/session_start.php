<?php
/**
 * Created by PhpStorm.
 * User: Anurag Patil
 * Date: 1/27/2017
 * Time: 6:02 PM
 */
//----------------------------------------------------------------------------------------------------Starting a Session
session_start();
//-----------------------------------------------------------------------------------------------Error Reporting Minimum
error_reporting(0);
//---------------------------------------------------------------------------------------------------------Basic Imports
require 'src/database/connect.php';
require 'src/functions/sanitize.php';
require 'src/functions/user.php';
require 'src/functions/email.php';
?>