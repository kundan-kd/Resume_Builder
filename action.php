<?php 
include "admin/includes/connection.php";
if(isset($_POST['contactName']) && isset($_POST['id'])){
    // $user_id = $_POST['id'];
    // $name = trim(mysqli_real_escape_string($conn,$_POST['contactName']));
    // $email = trim(mysqli_real_escape_string($conn,$_POST['email']));
    // $message = trim(mysqli_real_escape_string($conn,$_POST['message']));
    // $insert = "INSERT INTO user_contact_us(`user_id`,`name`,`email`,`message`,`status`,`created_at`,`updated_at`)values($user_id,'$name','$email','$message','1',NOW(),NOW())";
    // $result = mysqli_query($conn,$insert)or die('Error in inserting contacts');
    // if($result){
    //     echo json_encode(['success' => 'Query submitted succesfully']);
    //      exit;
    // }else{
    //     echo json_encode(['error_success' => 'Query not submitted']);
    //      exit;
    // }




    $toEmail = $_POST['userEmail'];

       // Collect form data
    $name = htmlspecialchars($_POST['contactName']);
    $email = htmlspecialchars($_POST['email']);
    $subject = "resume builder";
    $message = htmlspecialchars($_POST['message']);

    // Recipient email address
    $to = $toEmail; // Replace with your actual email address

    // Construct email headers
    $headers = "From: " . $name . " <" . $email . ">\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";

    // Construct email body
    $email_body = "Name: " . $name . "\n";
    $email_body .= "Email: " . $email . "\n";
    $email_body .= "Subject: " . $subject . "\n\n";
    $email_body .= "Message:\n" . $message . "\n";

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        echo json_encode(['success' => 'Query submitted succesfully..']);
         exit;
    } else {
        echo json_encode(['error_success' => 'Query not submitted..']);
         exit;
    }
} 
   
// }
?>