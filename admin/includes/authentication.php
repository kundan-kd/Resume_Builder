<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


// echo "helloooo";
session_start();
include 'connection.php';
if(isset($_POST['login_email'])){
    $email = trim($_POST['login_email']);
    $password = trim($_POST['login_password']);

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM `user_registrations` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['user_name']; // Adjust if needed
            $_SESSION['user_email'] = $user['email']; // Adjust if needed

            echo json_encode(['status' => 'success', 'message' => 'Login successful']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid password']);
        }
    } else { 
        echo json_encode(['status' => 'error', 'message' => 'User not found']);
    }
}



// if(isset($_POST['reg_firstname'])){
//     $firstname = trim($_POST['reg_firstname']);
//     $lastname = trim($_POST['reg_lastname']);
//     $email = trim($_POST['reg_email']);
//     $password = trim($_POST['reg_password']);

//     // Basic validation
//     // if ($firstname === '' || $lastname === '' || $email === '' || $password === '') {
//     //     echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
//     //     exit;
//     // }

//     // Escape input
//     $firstname = mysqli_real_escape_string($conn, $firstname);
//     $lastname = mysqli_real_escape_string($conn, $lastname);
//     $email = mysqli_real_escape_string($conn, $email);

//     // Check if email already exists
//     $query = "SELECT * FROM `user_registrations` WHERE `email` = '$email'";
//     $result = mysqli_query($conn, $query);

//     if ($result && mysqli_num_rows($result) > 0) {
//         echo json_encode(['status' => 'error', 'message' => 'Email already registered']);
//     } else {
//         // Hash the password
//         // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//         // Insert new user
//         $insert = "INSERT INTO `user_registrations` (`first_name`, `last_name`, `email`, `password`, `created_at`) 
//                    VALUES ('$firstname', '$lastname', '$email', '$password', NOW())";

//         if (mysqli_query($conn, $insert)) {
//             echo json_encode(['status' => 'success', 'message' => 'Registration successful']);
//         } else {
//             // echo json_encode(['status' => 'error', 'message' => 'Database error: ' . mysqli_error($conn)]);
//         }
//     }
// }

if (isset($_POST['reg_firstname'])) {
    $first_name = $_POST['reg_firstname'];
    $last_name = $_POST['reg_lastname'];
    $email = $_POST['reg_email'];
    $plain_password = $_POST['reg_password'];
    $password = password_hash($plain_password, PASSWORD_DEFAULT);

    $select = "SELECT * FROM `user_registrations` WHERE `email` = '{$email}'";
    $check = mysqli_query($conn,$select);
    if($check && mysqli_num_rows($check) > 0){  
        $error = "The user already exists";
        echo json_encode(["status" => "error", "error1" => $error]);
        exit;
    }
    else{
        $insert = "INSERT INTO `user_registrations` (`first_name`, `last_name`, `user_name`, `email`, `plain_password`, `password`, `created_at`) VALUES('$first_name', '$last_name', '".$first_name.' '.$last_name."', 
        '$email', '$plain_password' , '$password', NOW())";
        $result = mysqli_query($conn, $insert);
        if (!$result) {
            $error = mysqli_error($conn);
            echo json_encode(["status" => "error", "error2" => $error]);
            exit;
        } else {
            echo json_encode(["status" => "success"]);
        }
    }
}
?>