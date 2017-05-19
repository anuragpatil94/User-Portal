<?php
/**
 * Created by PhpStorm.
 * User: Anurag Patil
 * Date: 1/31/2017
 * Time: 3:48 PM
 */
//-----------------------------------------------------------------------------function for sending activation link mail
function email($to,$subject,$body){
    $headers = 'From: sercsystem@company.com';
    mail($to,$subject,$body, $headers);
}