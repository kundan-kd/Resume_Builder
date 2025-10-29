<?php
    session_start();
    include 'connection.php';
    if (!isset($_SESSION['user_email'])) {
       header("Location: /resume_builder/admin/");
        exit();
    }
    $select = "SELECT * FROM `user_registrations` WHERE `email` = '{$_SESSION['user_email']}' ";
    // $result = mysqli_query($conn,$select);
    // if($result && mysqli_num_rows($result) > 0){
    //     $row = mysqli_fetch_assoc($result); 
    //     $_SESSION['user_id']  = $row['id'];
    //     $_SESSION['first_name']  = $row['first_name'];
    //     $_SESSION['last_name']   = $row['last_name'];
    //     $_SESSION['email']       = $row['email'];
    //     $_SESSION['country']     = $row['country'];
    //     $_SESSION['street']      = $row['street'];
    //     $_SESSION['pincode']     = $row['pincode'];
    //     $_SESSION['telegram']    = $row['telegram'];
    //     $_SESSION['skype']       = $row['skype'];
    //     $_SESSION['personal_no'] = $row['personal_no'];
    //     $_SESSION['support_no']  = $row['support_no'];
    //     $_SESSION['office_no']   = $row['office_no'];
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Resume Builder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create professional resumes quickly with smart, customizable templates." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- App css -->
    <link href="../../assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <!-- Icons -->
    <link href="../../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" /> -->
    <link href="../../assets/css/custom.css" rel="stylesheet" type="text/css" />
    <script src="../../assets/js/head.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <!-- DataTables Bootstrap 5 CSS -->
    <link href="../../assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
    <!-- Toastr JS -->
     
</head>