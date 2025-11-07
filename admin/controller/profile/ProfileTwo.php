<?php
session_start();
include '../../includes/connection.php';




if(isset($_POST['plan_type']) && $_SESSION['user_id']){
    $id = $_SESSION['user_id'];
    $planTypes = $_POST['plan_type'];
    $planPrice = $_POST['plan_price'];
    $skillType = $_POST['skill_type'];
    $popularitys = $_POST['popularity'];
    $success = true;
    for($i = 0; $i < count($planTypes); $i++){
        $plan_type = mysqli_real_escape_string($conn,trim($planTypes[$i]));
        $plan_price = mysqli_real_escape_string($conn,trim($planPrice[$i]));
        $skill_type = mysqli_real_escape_string($conn,trim($skillType[$i]));
        $popularity = mysqli_real_escape_string($conn,trim($popularitys[$i]));
        $insert = "INSERT INTO user_plan(`user_id`,`plan_type_id`,`price`,`skill_types`,`popularity_type`,`status`,`created_at`,`updated_at`)values($id,$plan_type,$plan_price,$skill_type,$popularity,'1',NOW(),NOW())";
        if(!mysqli_query($conn,$insert)){
            $success = false;
            break;
        }
    }
    if($success){
        echo json_encode(['success' => 'Plan added successfully']);
        exit;
    }else{
        echo json_encode(['error_success' => 'Plan not added']);
       
    }

}

if (isset($_POST['getPlanType']) && isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $query = "SELECT user_plan.price,popularity_type, plan_types.name As plan_type_name, skill_list_types.name As skill_type_name
              FROM user_plan
              JOIN plan_types ON user_plan.plan_type_id = plan_types.id
              JOIN skill_list_types ON user_plan.skill_types = skill_list_types.id
              WHERE user_plan.user_id = $id";
    
    $result = mysqli_query($conn,$query);
    if($result){
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode(['status' => true ,'data' =>$data]);
        exit;
    }else{
        echo json_encode(['status' =>false, 'data' => 'Query failed']);
    }
}

if (isset($_POST['qualification_type']) && isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $qualification_types = $_POST['qualification_type'];
    $education_types = $_POST['education_type'];
    $qualification_titles = $_POST['qualification_title'];
    $start_dates = $_POST['start_date'];
    $end_dates = $_POST['end_date'];
    $certifications = $_POST['certification'];
    $descs = $_POST['desc'];
    $success = true;
// print_r($qualification_types);
// print_r($qualification_titles);
// print_r($start_dates);
// print_r($end_dates);
// print_r($certifications);
// print_r($descs);
    for ($i = 0; $i < count($qualification_types); $i++) {
        $qualification_type = mysqli_real_escape_string($conn, trim($qualification_types[$i]));
        $education_type = mysqli_real_escape_string($conn, trim($education_types[$i]));
        $qualification_title = mysqli_real_escape_string($conn, trim($qualification_titles[$i]));
        $startDate = mysqli_real_escape_string($conn, trim($start_dates[$i]));
        $endDate = mysqli_real_escape_string($conn, trim($end_dates[$i]));
        $certification = mysqli_real_escape_string($conn, trim($certifications[$i]));
        $desc = mysqli_real_escape_string($conn, trim($descs[$i]));

        // Handle file upload
        $fileName = "";
        if (isset($_FILES['qualification_upload']['name'][$i]) && $_FILES['qualification_upload']['name'][$i] != "") {
            $targetDir = "../../uploads/qualifications/";
            $fileTmp = $_FILES['qualification_upload']['tmp_name'][$i];
            $originalName = basename($_FILES['qualification_upload']['name'][$i]);
            $fileName = time() . "_" . $originalName;
            $targetFilePath = $targetDir . $fileName;

            if (!move_uploaded_file($fileTmp, $targetFilePath)) {
                error_log("File upload failed for: " . $originalName);
                $fileName = "";
            }
        }

        // Insert into DB
        $insert = "INSERT INTO user_qualification_details 
        (`user_id`, `qualification_type`,`education_id`,`qualification_title`, `start_date`, `end_date`, `certification`, `file_name`, `description`, `status`, `created_at`, `updated_at`) 
        VALUES ('$id', '$qualification_type','$education_type','$qualification_title', '$startDate', '$endDate', '$certification', '$fileName', '$desc', '1', NOW(), NOW())";

        if (!mysqli_query($conn, $insert)) {
            error_log("Insert failed: " . mysqli_error($conn));
            $success = false;
            break;
        }
    }

    if ($success) {
        echo json_encode(['success' => 'Qualification added successfully']);
    } else {
        echo json_encode(['error_success' => 'Qualification not added']);
    }
    exit;
}

if(isset($_POST['getQualification']) && isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
    $query = "SELECT * FROM user_qualification_details WHERE user_id = $id";
}
$result = mysqli_query($conn,$query);
if($result){
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode(['status' => true ,'data' =>$data]);
    exit;
}else{
    echo json_encode(['status' =>false, 'data' => 'Query failed']);
}
?>