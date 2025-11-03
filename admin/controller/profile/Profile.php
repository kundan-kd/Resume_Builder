<?php
// header('Content-Type: application/json');
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

if(isset($_POST['skillName']) && isset($_SESSION['user_id'])){
    $userId = (int) $_SESSION['user_id']; // Cast to int for safety
    $skillName = mysqli_real_escape_string($conn,$_POST['skillName']);
    $skillEfficiency = mysqli_real_escape_string($conn,$_POST['skillEfficiency']);
    $insert = "INSERT INTO user_programming_languages(`user_id`,`programming_language_id`,`user_efficiency`)values($userId,$skillName,$skillEfficiency)";
    if(mysqli_query($conn,$insert)){
        echo json_encode(['success'=>'Skill added sucesfully']);
    }else{
        echo json_encode(['Skill not added']);
    }
}

if (isset($_POST['GetProgrammingSkill']) && isset($_SESSION['user_id'])) {
     $id = $_SESSION['user_id'];
     
     $query = "SELECT user_programming_languages.*, programming_skill_types.name
        FROM user_programming_languages
        JOIN programming_skill_types ON user_programming_languages.programming_language_id = programming_skill_types.id
        WHERE user_programming_languages.user_id = $id
    ";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode(['success' => true, 'data' => $data]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Query failed']);
    }

}

if(isset($_POST['languageName']) && isset($_SESSION['user_id'])){
    $userId = (int) $_SESSION['user_id'];
    $languageName = mysqli_real_escape_string($conn,$_POST['languageName']);
    $languageEfficiency = mysqli_real_escape_string($conn,$_POST['languageEfficiency']);
    $insert = "INSERT INTO user_languages(`user_id`,`language_id`,`user_efficiency`,`status`,`created_at`,`updated_at`)values($userId,$languageName,$languageEfficiency,'1',NOW(),NOW())";
    if(mysqli_query($conn,$insert)){
        echo json_encode(['success' => 'Language added successfully']);
    }else{
        echo json_encode(['error_success' => 'Language not added']);
    }
}

if(isset($_POST['getLanguage']) && isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
    $query = "SELECT  user_languages.user_efficiency,language_types.name
    FROM user_languages
    LEFT JOIN language_types ON user_languages.language_id = language_types.id
    WHERE user_languages.user_id = $id";
    $result = mysqli_query($conn,$query);
    if($result){
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode(['status' =>true, 'data' => $data]);
    }else{
        echo json_encode(['status' => false, 'data' => 'Query failed']);
    }
}

if(isset($_POST['extraSkill']) && isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
    $skills =  $_POST['extraSkill'];
    $success = true;
    for($i = 0; $i < count($skills); $i++){
        $skils = trim(mysqli_real_escape_string($conn,$skills[$i]));
        $insert = "INSERT INTO user_extra_skills(`user_id`,`skill_list_id`,`status`,`created_at`,`updated_at`)values($id,$skils,'1',NOW(),NOW())";
        if(!mysqli_query($conn,$insert)){
            $success = false;
            break;
        }

    }
    if($success){
        echo json_encode(['success' => 'Extra skills added']);
        exit; // to restrict whitespace charactor passing
    }else{
        echo json_encode(['error_success' => 'Extra skills not added']);
    }
}

if(isset($_POST['getExtraSkill']) && isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
    $query = "SELECT user_extra_skills.skill_list_id,extra_skill_types.name
    FROM user_extra_skills
    LEFT JOIN extra_skill_types ON user_extra_skills.skill_list_id = extra_skill_types.id
    WHERE user_extra_skills.user_id = $id";
}
$result = mysqli_query($conn,$query);
if($result){
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode(['status' => true ,'data' =>$data]);
}else{
    echo json_encode(['status' =>false, 'data' => 'Query failed']);
}



?>