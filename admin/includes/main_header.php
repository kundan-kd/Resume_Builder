<?php
    include 'header.php';
    if (!isset($_SESSION['user_email'])) {
       header("Location: /resume_builder/admin/");
        exit();
    }
?>