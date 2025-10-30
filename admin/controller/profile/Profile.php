<?php
session_start();
include '../../includes/connection.php';

if (isset($_POST['first_name']) && isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $linkedin = mysqli_real_escape_string($conn, $_POST['linkedin']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $project = mysqli_real_escape_string($conn, $_POST['project']);

    $update = "UPDATE user_registrations SET 
        first_name = '$first_name',
        last_name = '$last_name',
        email = '$email',
        mobile = '$mobile',
        dob = '$dob',
        address = '$address',
        city = '$city',
        state = '$state',
        pincode = '$pincode',
        country = '$country',
        linkedin = '$linkedin',
        experience = '$experience',
        project = '$project',
        updated_at = NOW()
        WHERE id = '$id'";

    if (mysqli_query($conn, $update)) {
        echo json_encode(['success' => 'Profile updated successfully']);
    } else {
        echo json_encode(['error_success' => 'Profile not updated']);
    }
}
?>