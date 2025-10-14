





<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once('../includes/dbconfig.php'); // Adjust path as needed

header('Content-Type: application/json');
if (isset($_POST['login_data']) && $_POST['login_data'] == 'login_data') {
    $email = trim($_POST['login_email']);
    $password = trim($_POST['login_password']);
    if ($email === '' || $password === '') {
        echo json_encode(['status' => 'error', 'message' => 'Email and password are required']);
        exit;
    }

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM `user_registrations` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['user_name']; // Adjust if needed

            echo json_encode(['status' => 'success', 'message' => 'Login successful']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid password']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'User not found']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}


if (isset($_POST['registration_data']) && $_POST['registration_data'] === 'registration_data') {
    $firstname = trim($_POST['reg_firstname']);
    $lastname = trim($_POST['reg_lastname']);
    $email = trim($_POST['reg_email']);
    $password = trim($_POST['reg_password']);

    // Basic validation
    if ($firstname === '' || $lastname === '' || $email === '' || $password === '') {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        exit;
    }

    // Escape input
    $firstname = mysqli_real_escape_string($conn, $firstname);
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $email = mysqli_real_escape_string($conn, $email);

    // Check if email already exists
    $query = "SELECT * FROM `user_registrations` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Email already registered']);
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $insert = "INSERT INTO `user_registrations` (`first_name`, `last_name`, `email`, `password`, `created_at`) 
                   VALUES ('$firstname', '$lastname', '$email', '$hashedPassword', NOW())";

        if (mysqli_query($conn, $insert)) {
            echo json_encode(['status' => 'success', 'message' => 'Registration successful']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Database error: ' . mysqli_error($conn)]);
        }
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}

?>