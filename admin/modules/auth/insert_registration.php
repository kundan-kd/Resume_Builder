<?php
require_once('dbconfig.php');

if (isset($_POST['first_name'])) {
    $first_name = $_POST['first_name'];

    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $insert = "INSERT INTO `user_registrations` (`first_name`, `last_name`, `email`, `password`) VALUES('$first_name', '$last_name','$email', '$password')";
    error_log($insert);
    $result = mysqli_query($conn, $insert);
    if ($result) {
        echo json_encode([
            "status" => "success"
        ]);
    }
    else{
       echo json_encode([
            "status" => "error",
            "error"  => mysqli_error($conn)  
        ]);
    }
    // add createdat

    // INSERT INTO 'categ'
}
?>
