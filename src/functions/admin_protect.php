<?php
/**
 * Created by PhpStorm.
 * User: Anurag Patil
 * Date: 1/31/2017
 * Time: 6:25 PM
 */
function admin_protect($con){
    $data=getData($con);
    if ($data['type']==0){
        header('Location:index.php');
        exit();
    }
}