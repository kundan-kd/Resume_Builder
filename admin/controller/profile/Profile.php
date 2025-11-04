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

if(isset($_POST['skillNameID']) && isset($_SESSION['user_id'])){
    $userId = (int) $_SESSION['user_id']; // Cast to int for safety
    $skillNameID = $_POST['skillNameID'];
    $skillNames = $_POST['skillName'];
    $skillEfficencties = $_POST['skillEfficiency'];
    $success = true;
    for($i=0; $i < count($skillNameID); $i++){
        $skillName_id = mysqli_real_escape_string($conn,trim($skillNameID[$i]));
        if($skillName_id == 0){
            $skillName = mysqli_real_escape_string($conn,trim($skillNames[$i]));
            $insertSetting = "INSERT INTO programming_skill_types(`name`,`status`,`created_at`,`updated_at`)values('$skillName','1',NOW(),NOW())";
            if (mysqli_query($conn, $insertSetting)) {
                $skillName_id = mysqli_insert_id($conn); // ✅ This stores the inserted ID
            }
        }
        $skillEfficiency = mysqli_real_escape_string($conn,trim($skillEfficencties[$i]));
        $insert = "INSERT INTO user_programming_languages(`user_id`,`programming_language_id`,`user_efficiency`,`status`,`created_at`,`updated_at`)values($userId,$skillName_id,$skillEfficiency,'1',NOW(),Now())";
        if(!mysqli_query($conn,$insert)){
            $success = false;
            break;
        }
    }
    
    if($success){
        echo json_encode(['success'=>'Skill added sucesfully']);
        exit;
    }else{
        echo json_encode(['error_success'=>'Skill not added']);
    }
}

if (isset($_POST['GetProgrammingSkill']) && isset($_SESSION['user_id'])) {
     $id = $_SESSION['user_id'];
     $query = "SELECT user_programming_languages.*,programming_skill_types.name
        FROM user_programming_languages
        JOIN programming_skill_types ON user_programming_languages.programming_language_id = programming_skill_types.id
        WHERE user_programming_languages.user_id = $id
    ";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // print_r($data);
        echo json_encode(['status' => true, 'data' => $data]);
        exit;
    } else {
        echo json_encode(['status' => false, 'error' => 'Query failed']);
    }
}

// if(isset($_POST['languageNameID']) && isset($_SESSION['user_id'])){
//     $userId = (int) $_SESSION['user_id'];
//     $languageNameIDs = $_POST['languageNameID'];
//     $languageNames = $_POST['languageName'];
//     $efficiencies = $_POST['languageEfficiency'];
//     $success = true;
//     for($i=0; $i < count($languages); $i++){
//         $languageName_id = mysqli_real_escape_string($conn,trim($languageNameIDs[$i]));
//         $languageEfficiency = mysqli_real_escape_string($conn,trim($efficiencies[$i]));
//         $insert = "INSERT INTO user_languages(`user_id`,`language_id`,`user_efficiency`,`status`,`created_at`,`updated_at`)values($userId,$languageName,$languageEfficiency,'1',NOW(),NOW())";
//         if(!mysqli_query($conn,$insert)){
//             $success = false;
//             break;
//         }
//     }
   
//     if($success){
//         echo json_encode(['success' => 'Language added successfully']);
//         exit;
//     }else{
//         echo json_encode(['error_success' => 'Language not added']);
//     }
// }
if(isset($_POST['languageNameID']) && isset($_SESSION['user_id'])){
    $userId = (int) $_SESSION['user_id']; // Cast to int for safety
    $languageNameIDs = $_POST['languageNameID'];
    $languageNames = $_POST['languageName'];
    $efficiencies = $_POST['languageEfficiency'];
    $success = true;

    for($i = 0; $i < count($languageNameIDs); $i++){
        $languageName_id = mysqli_real_escape_string($conn, trim($languageNameIDs[$i]));

        if($languageName_id == 0){
            $languageName = mysqli_real_escape_string($conn, trim($languageNames[$i]));
            $insertLanguage = "INSERT INTO language_types(`name`, `status`, `created_at`, `updated_at`) VALUES('$languageName', '1', NOW(), NOW())";
            if(mysqli_query($conn, $insertLanguage)){
                $languageName_id = mysqli_insert_id($conn); // ✅ Store the inserted ID
            }
        }

        $languageEfficiency = mysqli_real_escape_string($conn, trim($efficiencies[$i]));
        $insert = "INSERT INTO user_languages(`user_id`, `language_id`, `user_efficiency`, `status`, `created_at`, `updated_at`) VALUES($userId, $languageName_id, $languageEfficiency, '1', NOW(), NOW())";
        if(!mysqli_query($conn, $insert)){
            $success = false;
            break;
        }
    }

    if($success){
        echo json_encode(['success' => 'Language added successfully']);
        exit;
    }else{
        echo json_encode(['error_success' => 'Language not added']);
    }
}

if(isset($_POST['getLanguage']) && isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
    $query = "SELECT user_languages.user_efficiency,language_types.name
    FROM user_languages
    LEFT JOIN language_types ON user_languages.language_id = language_types.id
    WHERE user_languages.user_id = $id";
    $result = mysqli_query($conn,$query);
    if($result){
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode(['status' =>true, 'data' => $data]);
        exit;
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
    $result = mysqli_query($conn,$query);
    if($result){
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode(['status' => true ,'data' =>$data]);
        exit;
    }else{
        echo json_encode(['status' =>false, 'data' => 'Query failed']);
    }
}

if (isset($_POST['projectCategory']) && isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $projectCategory = $_POST['projectCategory'];
    $projectTitle = $_POST['projectTitle'];
    $projectDesc = $_POST['projectDesc'];
    $success = true;

    for ($i = 0; $i < count($projectCategory); $i++) {
        $category = mysqli_real_escape_string($conn, trim($projectCategory[$i]));
        $title = mysqli_real_escape_string($conn, trim($projectTitle[$i]));
        $desc = mysqli_real_escape_string($conn, trim($projectDesc[$i]));

        $insert = "INSERT INTO user_projects(`user_id`,`category_id`,`title`,`description`,`status`,`created_at`,`updated_at`)
                   VALUES($id,$category,'$title','$desc','1',NOW(),NOW())";

        if (!mysqli_query($conn, $insert)) {
            $success = false;
            break;
        }
    }

    if ($success) {
        echo json_encode(['success' => 'Project added successfully']);
    } else {
        echo json_encode(['error_success' => 'Project not added']);
    }
    exit;
}

if(isset($_POST['getProjectData']) && isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
    $query = "SELECT user_projects.title,description,file_name,category_types.name
    FROM user_projects
    JOIN category_types ON user_projects.category_id = category_types.id
    WHERE user_projects.user_id = $id";
    $result = mysqli_query($conn,$query);
    if($result){
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode(['status' => true, 'data' => $data]);
    }else{
        echo json_encode(['status' => false, 'data' => 'Query failed']);
    }
    exit;

}


?>