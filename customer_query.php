<?php
    require_once('admin/dbconfig.php');
    require_once('assets/mail/PHPMailer.php');
    require_once('assets/mail/SMTP.php');

  
    if(isset($_POST['name'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $number = $_POST['number'];
        $check = "SELECT * FROM `user_contacts` WHERE `name` ='$name' AND `email` = '$email' AND `phone_no` = '$number' ";
        if(mysqli_num_rows(mysqli_query($conn, $check)) > 0){
            echo json_encode(['existsAlready' => true]);
            exit;
        }
        $insert = "INSERT INTO `user_contacts` (`user_id`, `name`, `email`, `phone_no`, `message`, `created_at`)
            VALUES ('$id', '$name', '$email', '$number', '$message', NOW())";
        $result = mysqli_query($conn, $insert);
        
        if($result){
            echo json_encode(['status' => true]);
            exit;
        }
        else{
            echo json_encode(['failed' => mysqli_error($conn)]);
            exit;
        }
    }
?>