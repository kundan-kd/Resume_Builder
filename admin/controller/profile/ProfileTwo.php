<?php
// header('Content-Type: application/json');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
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
    }else{
        echo json_encode(['status' =>false, 'data' => 'Query failed']);
    }
}
if (isset($_POST['qualification']) && isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $qualifications = $_POST['qualification'];
    $start_dates = $_POST['start_date'];
    $end_dates = $_POST['end_date'];
    $certifications = $_POST['certification'];
    $images = $_POST['image'];
    $descs = $_POST['desc'];
    $success = true;

    for ($i = 0; $i < count($qualifications); $i++) {
        $qualification = mysqli_real_escape_string($conn, trim($qualifications[$i]));
        $startDate = mysqli_real_escape_string($conn, trim($start_dates[$i]));
        $endDate = mysqli_real_escape_string($conn, trim($end_dates[$i]));
        $certification = mysqli_real_escape_string($conn, trim($certifications[$i]));
        $image = mysqli_real_escape_string($conn, trim($images[$i]));
        $desc = mysqli_real_escape_string($conn, trim($descs[$i]));

       $insert = "INSERT INTO user_qualification_details (`user_id`,`qualification_id`,`start_date`,`end_date`,`certification`,`file_name`,`description`,`status`, `created_at`,`updated_at`) 
VALUES ('$id', '$qualification', '$startDate', '$endDate', '$certification', '$image', '$desc', '1', NOW(), NOW())";
     if (!mysqli_query($conn, $insert)) {
    error_log("Insert failed: " . mysqli_error($conn));
    $success = false;
    break;
}

    }

    if ($success) {
        // var_dump(($success));
        echo json_encode(['success' => 'Qualification added successfully']);
        exit;
    } else {
        echo json_encode(['error_success' => 'Qualification not added']);
    }
   
}

?>