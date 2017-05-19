<?php
/**
 * Created by PhpStorm.
 * User: Anurag Patil
 * Date: 2/1/2017
 * Time: 2:33 PM
 * @param $con
 * @param $username
 * @return bool|mysqli_result
 */

//---------------------------------------------------------------------------------------------MANIPULATING PROFILE DATA
function selectProfileData($con, $username)
{
    $profile_query = "SELECT * FROM profile WHERE username='$username'";
    $query_result = mysqli_query($con, $profile_query);
    return $query_result;
}

function updateProfileData($con, $username, $array)
{
    print_r($array['first_name']);
    $profile_query = "UPDATE profile SET first_name='$array[first_name]', profile.last_name='$array[last_name]' WHERE username='$username'";
    mysqli_query($con, $profile_query);
}

function deleteProfileData($con, $username, $array)
{
    print_r($array);
    $query = "delete from profile WHERE username='$username'";
    mysqli_query($con, $query);


}

//---------------------------------------------------------------------------------------------MANIPULATING ADDRESS DATA
function selectAddressData($con, $username)
{
    $address_query = "SELECT * FROM address WHERE username='$username'";
    $address_query_result = mysqli_query($con, $address_query);

    return $address_query_result;
}

function updateAddressData($con, $username, $array)
{
    foreach ($array['id'] as $id) {
        if (isset($array['address_submit'][$id])) {
            $new_address = $array['address'][$id];
            $sql = "UPDATE address SET address='$new_address' WHERE username='$username' and address_id='$id'";
            mysqli_query($con, $sql);
        }
    }
}

function deleteAddressData($con, $username, $array)
{

    foreach ($array['id'] as $id) {

        if (isset($array['address_delete_submit'][$id])) {

            $query = "delete from address WHERE username='$username' AND address_id=$id";
            mysqli_query($con, $query);
        }
    }
}

//---------------------------------------------------------------------------------------------MANIPULATING CONTACT DATA
function selectContactData($con, $username)
{
    $query = "SELECT * FROM contact WHERE username_c='$username'";
    $query_result = mysqli_query($con, $query);
    return $query_result;
}

function updateContactData($con, $username, $array)
{
    foreach ($array['id'] as $id) {
        if (isset($array['contact_submit'][$id])) {
            $new_contact = $array['contact_number'][$id];
            $sql = "UPDATE contact SET contact.contact_number=$new_contact WHERE username_c='$username' and contact.contact_id=$id";
            mysqli_query($con, $sql);
        }
    }
}

function deleteContactData($con, $username, $array)
{
    foreach ($array['id'] as $id) {

        if (isset($array['contact_delete_submit'][$id])) {

            $query = "delete from contact WHERE username_c='$username' AND contact_id=$id";
            mysqli_query($con, $query);
        }
    }
}

//-------------------------------------------------------------------------------------------MANIPULATING EMPLOYMENT DATA
function selectEmploymentData($con, $username)
{
    $query = "SELECT * FROM employment WHERE username='$username'";
    $query_result = mysqli_query($con, $query);
    return $query_result;
}

function updateEmploymentData($con, $username, $array)
{
    // print_r($_POST);
    foreach ($array['id'] as $id) {
        $new_company_name = $array['company_name'][$id];
        $new_position = $array['position'][$id];
        $new_form = $array['from'][$id];
        $new_till = $array['till'][$id];
        if (isset($array['employment_submit'][$id])) {
            $sql = "UPDATE employment SET company_name='$new_company_name',position='$new_position',`from`=$new_form ,till='$new_till' WHERE username='$username' AND employment_id=$id";
            mysqli_query($con, $sql);
        }
    }
}

function deleteEmploymentData($con, $username, $array)
{
    foreach ($array['id'] as $id) {

        if (isset($array['employment_delete_submit'][$id])) {

            $query = "delete from employment WHERE username='$username' AND employment_id=$id";
            mysqli_query($con, $query);
        }
    }
}

//------------------------------------------------------------------------------------------MANIPULATING UNIVERSITY DATA
function selectUniversityData($con, $username)
{
    $query = "SELECT * FROM university WHERE username='$username'";
    $query_result = mysqli_query($con, $query);
    return $query_result;
}

function updateUniversityData($con, $username, $array)
{
//     print_r($array);
    foreach ($array['id'] as $id) {
        $new_university_name = $array['university_name'][$id];
        $new_attended_from = $array['attended_from'][$id];
        $new_attended_till = $array['attended_till'][$id];
        $new_research = $array['research'][$id];
        if (isset($array['university_submit'][$id])) {
            $sql = "UPDATE university SET university_name='$new_university_name', attended_from='$new_attended_from',`attended_till`='$new_attended_till' ,research='$new_research' WHERE username='$username' AND university_id=$id";
            mysqli_query($con, $sql);
        }
    }
}

function deleteUniversityData($con, $username, $array)
{
    foreach ($array['id'] as $id) {

        if (isset($array['university_delete_submit'][$id])) {

            $query = "delete from university WHERE username='$username' AND university_id=$id";
            mysqli_query($con, $query);
        }
    }
}