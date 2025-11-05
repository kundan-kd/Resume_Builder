<?php 
include "admin/includes/connection.php";
if(isset($_POST['contactName']) && isset($_POST['id'])){
    $user_id = $_POST['id'];
    $name = trim(mysqli_real_escape_string($conn,$_POST['contactName']));
    $email = trim(mysqli_real_escape_string($conn,$_POST['email']));
    $message = trim(mysqli_real_escape_string($conn,$_POST['message']));
    $insert = "INSERT INTO user_contact_us(`user_id`,`name`,`email`,`message`,`status`,`created_at`,`updated_at`)values($user_id,'$name','$email','$message','1',NOW(),NOW())";
    $result = mysqli_query($conn,$insert)or die('Error in inserting contacts');
    if($result){
        echo json_encode(['success' => 'Query submitted succesfully']);
         exit;
    }else{
        echo json_encode(['error_success' => 'Query not submitted']);
         exit;
    }
   
}
?>