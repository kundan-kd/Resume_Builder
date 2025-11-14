<?php
// header('Content-Type: application/json');
session_start();
include '../../includes/connection.php';

// if (isset($_POST['first_name']) && isset($_SESSION['user_id'])) {
//     $id = $_SESSION['user_id'];
//     $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
//     $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
//     $email = mysqli_real_escape_string($conn, $_POST['email']);
//     $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
//     $dob = mysqli_real_escape_string($conn, $_POST['dob']);
//     $address = mysqli_real_escape_string($conn, $_POST['address']);
//     $city = mysqli_real_escape_string($conn, $_POST['city']);
//     $state = mysqli_real_escape_string($conn, $_POST['state']);
//     $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
//     $country = mysqli_real_escape_string($conn, $_POST['country']);
//     $linkedin = mysqli_real_escape_string($conn, $_POST['linkedin']);
//     $experience = mysqli_real_escape_string($conn, $_POST['experience']);
//     $project = mysqli_real_escape_string($conn, $_POST['project']);

//     $update = "UPDATE user_registrations SET 
//         first_name = '$first_name',
//         last_name = '$last_name',
//         email = '$email',
//         mobile = '$mobile',
//         dob = '$dob',
//         address = '$address',
//         city = '$city',
//         state = '$state',
//         pincode = '$pincode',
//         country = '$country',
//         linkedin = '$linkedin',
//         experience = '$experience',
//         project = '$project',
//         updated_at = NOW()
//         WHERE id = '$id'";

//     if (mysqli_query($conn, $update)) {
//         echo json_encode(['success' => 'Profile updated successfully']);
//     } else {
//         echo json_encode(['error_success' => 'Profile not updated']);
//     }
// }
if (isset($_POST['first_name']) && isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $first_name    = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name     = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email         = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile        = mysqli_real_escape_string($conn, $_POST['mobile']);
    $dob           = mysqli_real_escape_string($conn, $_POST['dob']);
    $address       = mysqli_real_escape_string($conn, $_POST['address']);
    $city          = mysqli_real_escape_string($conn, $_POST['city']);
    $state         = mysqli_real_escape_string($conn, $_POST['state']);
    $pincode       = mysqli_real_escape_string($conn, $_POST['pincode']);
    $country       = mysqli_real_escape_string($conn, $_POST['country']);
    $linkedin      = mysqli_real_escape_string($conn, $_POST['linkedin']);
    $experience    = mysqli_real_escape_string($conn, $_POST['experience']);
    $project       = mysqli_real_escape_string($conn, $_POST['project']);
    // new ones:
    $designation   = mysqli_real_escape_string($conn, $_POST['designation']);
    $personal_no   = mysqli_real_escape_string($conn, $_POST['personal_no']);
    $support_no    = mysqli_real_escape_string($conn, $_POST['support_no']);
    $office_no     = mysqli_real_escape_string($conn, $_POST['office_no']);
    $telegram      = mysqli_real_escape_string($conn, $_POST['telegram']);
    $skype         = mysqli_real_escape_string($conn, $_POST['skype']);
    $punchline     = mysqli_real_escape_string($conn, $_POST['punchline']);
    $customer_count= mysqli_real_escape_string($conn, $_POST['customer_count']);
    $award_count   = mysqli_real_escape_string($conn, $_POST['award_count']);

     // Handle image upload
    $profile_image = '';
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_image']['tmp_name'];
        $fileName = $_FILES['profile_image']['name'];
        $fileSize = $_FILES['profile_image']['size'];
        $fileType = $_FILES['profile_image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Set upload directory and unique filename
        $newFileName = uniqid() . '.' . $fileExtension;
        $uploadFileDir = '../../uploads/profile/';
        $dest_path = $uploadFileDir . $newFileName;

        // Move file
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $profile_image = $dest_path;
        } else {
            echo json_encode(['error_success' => 'Image upload failed']);
            exit;
        }
    }

    
    $update = "UPDATE user_registrations SET 
        first_name     = '$first_name',
        last_name      = '$last_name',
        email          = '$email',
        mobile         = '$mobile',
        dob            = '$dob',
        address        = '$address',
        city           = '$city',
        state          = '$state',
        pincode        = '$pincode',
        country        = '$country',
        linkedin       = '$linkedin',
        experience     = '$experience',
        project        = '$project',
        designation    = '$designation',
        personal_no    = '$personal_no',
        support_no     = '$support_no',
        office_no      = '$office_no',
        telegram       = '$telegram',
        skype          = '$skype',
        punchline      = '$punchline',
        customer_count = '$customer_count',
        award_count    = '$award_count',
         updated_at     = NOW()";

// Append profile_image only if uploaded
if (!empty($profile_image) && trim($profile_image) !== '') {
    $update .= ", profile_image = '$profile_image'";
}


// Now add the WHERE clause
$update .= " WHERE id = '$id'";

      
    
    if (mysqli_query($conn, $update)) {
        echo json_encode(['success' => 'Profile updated successfully']);
    } else {
        echo json_encode(['error_success' => 'Profile not updated']);
    }
}

if(isset($_POST['servicesName']) && isset($_SESSION['user_id'])){
    $id = (int)$_SESSION['user_id'];
    $servicesNames = $_POST['servicesName'];
    $servicesDescs = $_POST['servicesDesc'];
    $success = true;
    for($i=0; $i < count($servicesDescs); $i++){
        $name = mysqli_real_escape_string($conn, $servicesNames[$i]);
        $desc = mysqli_real_escape_string($conn, $servicesDescs[$i]);
        $insert = "INSERT INTO user_services(`user_id`,`name`,`description`,`status`,`created_at`,`updated_at`)values($id,'$name','$desc','1',NOW(),NOW())";
        if(!mysqli_query($conn,$insert)){
            $success = false;
            break;
        }
    }
    if($success){
        echo json_encode(['success' =>'Service added succesfully']);
    }else{
        echo json_encode(['error_success' => 'Service not added']);
    }
}

if(isset($_POST['GetServices']) && isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
     $query = "SELECT * FROM user_services WHERE user_id = $id AND deleted_at IS NULL";
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
if(isset($_POST['GetServiceData'])){
    $id = $_POST['id'];
    $query = "SELECT name, description FROM user_services WHERE id = $id";
    $result = mysqli_query($conn,$query);
    if($result){
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode(['status'=>true, 'data'=>$data]);
    }else{
        echo json_encode(['status'=>false, 'error'=>'Query failed']);
    }exit;
}
if(isset($_POST['deleteServices'])){
    $id = $_POST['id'];
    $query = "UPDATE user_services SET deleted_at = NOW() WHERE id = $id";
    $result = mysqli_query($conn,$query);
    if($result){
        echo json_encode(['success' => 'Service deleted successfully']);
    }else{
        echo json_encode(['error_success' => 'Service not deleted']);
    }exit;
}
if(isset($_POST['updateServices'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $query ="UPDATE user_services SET name = '$name', description = '$desc', updated_at = NOW() WHERE id = $id";
    $result = mysqli_query($conn,$query);
    if($result){
        echo json_encode(['success' => 'Service updated successfully']);
    }else{
        echo json_encode(['error_success' => 'Service not updated']);
    }exit;
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
        WHERE user_programming_languages.user_id = $id AND user_programming_languages.deleted_at IS NULL;
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
if(isset($_POST['GetProgrammingSkillData'])){
    $id = $_POST['id'];
    $query = "SELECT programming_language_id,user_efficiency FROM user_programming_languages WHERE id = $id";
    $result = mysqli_query($conn,$query);
    if($result){
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode(['status'=>true, 'data'=>$data]);
    }else{
        echo json_encode(['status'=>false, 'error'=>'Query failed']);
    }exit;
}
if(isset($_POST['updateProgrammingSkill'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $value = $_POST['value'];
    $query ="UPDATE user_programming_languages SET programming_language_id = $name, user_efficiency = $value, updated_at = NOW() WHERE id = $id";
    $result = mysqli_query($conn,$query);
    if($result){
        echo json_encode(['success' => 'Skill updated successfully']);
    }else{
        echo json_encode(['error_success' => 'Skill not updated']);
    }exit;
}
if(isset($_POST['deleteProgrammingSkills'])){
    $id = $_POST['id'];
    // var_dump($id);
    $query = "UPDATE user_programming_languages SET deleted_at = NOW() WHERE id = $id";
    $result = mysqli_query($conn,$query);
    if($result){
        echo json_encode(['success' => 'Skill deleted successfully']);
    }else{
        echo json_encode(['error_success' => 'Skill not deleted']);
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

// if (isset($_POST['projectCategory']) && isset($_SESSION['user_id'])) {
//     $id = $_SESSION['user_id'];
//     $projectCategory = $_POST['projectCategory'];
//     $projectTitle = $_POST['projectTitle'];
//     $projectDesc = $_POST['projectDesc'];
//     $success = true;

//     for ($i = 0; $i < count($projectCategory); $i++) {
//         $category = mysqli_real_escape_string($conn, trim($projectCategory[$i]));
//         $title = mysqli_real_escape_string($conn, trim($projectTitle[$i]));
//         $desc = mysqli_real_escape_string($conn, trim($projectDesc[$i]));

//         $insert = "INSERT INTO user_projects(`user_id`,`category_id`,`title`,`description`,`status`,`created_at`,`updated_at`)
//                    VALUES($id,$category,'$title','$desc','1',NOW(),NOW())";

//         if (!mysqli_query($conn, $insert)) {
//             $success = false;
//             break;
//         }
//     }

//     if ($success) {
//         echo json_encode(['success' => 'Project added successfully']);
//     } else {
//         echo json_encode(['error_success' => 'Project not added']);
//     }
//     exit;
// }


if (isset($_POST['projectCategory']) && isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $projectCategory = $_POST['projectCategory'];
    $projectTitle = $_POST['projectTitle'];
    $projectDesc = $_POST['projectDesc'];
    $success = true;

    $uploadDir = '../../uploads/projects/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    for ($i = 0; $i < count($projectCategory); $i++) {
        $category = mysqli_real_escape_string($conn, trim($projectCategory[$i]));
        $title = mysqli_real_escape_string($conn, trim($projectTitle[$i]));
        $desc = mysqli_real_escape_string($conn, trim($projectDesc[$i]));

        $imagePath = null;
        if (isset($_FILES['file_name']['tmp_name'][$i]) && $_FILES['file_name']['tmp_name'][$i] != '') {
            $fileTmp = $_FILES['file_name']['tmp_name'][$i];
            $fileName = basename($_FILES['file_name']['name'][$i]);
            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = uniqid('project_') . '.' . $fileExt;
            $targetFile = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmp, $targetFile)) {
                $imagePath = $targetFile;
            }
        }

        $insert = "INSERT INTO user_projects(`user_id`,`category_id`,`title`,`description`,`file_name`,`status`,`created_at`,`updated_at`)
                   VALUES($id,$category,'$title','$desc','$newFileName','1',NOW(),NOW())";

        if (!mysqli_query($conn, $insert)) {
            $success = false;
            break;
        }
    }

    echo json_encode($success ? ['success' => 'Project added successfully'] : ['error_success' => 'Project not added']);
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