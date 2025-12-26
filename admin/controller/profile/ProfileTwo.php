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
    $query = "SELECT user_plan.id,price,popularity_type, plan_types.name As plan_type_name, skill_list_types.name As skill_type_name
              FROM user_plan
              JOIN plan_types ON user_plan.plan_type_id = plan_types.id
              JOIN skill_list_types ON user_plan.skill_types = skill_list_types.id
              WHERE user_plan.user_id = $id AND user_plan.deleted_at IS NULL";
    
    $result = mysqli_query($conn,$query);
    if($result){
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode(['status' => true ,'data' =>$data]);
        exit;
    }else{
        echo json_encode(['status' =>false, 'data' => 'Query failed']);
    }
}

if(isset($_POST['GetPlanData'])){
    $id = $_POST['id'];
    $query = "SELECT * FROM user_plan WHERE id = $id";
    $result = mysqli_query($conn,$query);
    if($result){
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode(['status'=>true, 'data'=>$data]);
    }else{
        echo json_encode(['status'=>false, 'error'=>'Query failed']);
    }exit;
}
if(isset($_POST['updatePlan'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $skill = $_POST['skill'];
    $value = $_POST['value'];
    $query ="UPDATE user_plan SET plan_type_id = $name,price = $price, skill_types = $skill, popularity_type = $value, updated_at = NOW() WHERE id = $id";
    $result = mysqli_query($conn,$query);
    if($result){
        echo json_encode(['success' => 'Plan updated successfully']);
    }else{
        echo json_encode(['error_success' => 'Plan not updated']);
    }exit;
}
if(isset($_POST['deletePlan'])){
    $id = $_POST['id'];
    $query = "UPDATE user_plan SET deleted_at = NOW() WHERE id = $id";
    $result = mysqli_query($conn,$query);
    if($result){
        echo json_encode(['success' => 'Plan deleted successfully']);
    }else{
        echo json_encode(['error_success' => 'Plan Skill not deleted']);
    }exit;
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
    for ($i = 0; $i < count($qualification_types); $i++) {
        $qualification_type = mysqli_real_escape_string($conn, trim($qualification_types[$i]));
        $education_type = mysqli_real_escape_string($conn, trim($education_types[$i]));
        $qualification_title = mysqli_real_escape_string($conn, trim($qualification_titles[$i]));
        $startDate = mysqli_real_escape_string($conn, trim($start_dates[$i]));
        $endDate = mysqli_real_escape_string($conn, trim($end_dates[$i]));
        $certification = mysqli_real_escape_string($conn, trim($certifications[$i]));
        $desc = mysqli_real_escape_string($conn, trim($descs[$i]));
        $insert = "INSERT INTO user_qualification_details 
        (`user_id`, `qualification_type`, `education_id`, `qualification_title`, `start_date`, `end_date`, `certification`, `description`, `status`, `created_at`, `updated_at`) 
        VALUES ('$id', '$qualification_type', '$education_type', '$qualification_title', '$startDate', '$endDate', '$certification', '$desc', '1', NOW(), NOW())";
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
    $id = (int)$_SESSION['user_id'];
    $query = "SELECT user_qualification_details.*, 
                 CASE 
                     WHEN user_qualification_details.education_id = 0 THEN '-' 
                     ELSE education_types.name 
                 END AS name
          FROM user_qualification_details
          LEFT JOIN education_types 
          ON user_qualification_details.education_id = education_types.id
          WHERE user_qualification_details.user_id = $id AND user_qualification_details.deleted_at IS NULL";

    $result = mysqli_query($conn,$query);
    if($result){
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode(['status' => true ,'data' =>$data]);
    }else{
        echo json_encode(['status' =>false, 'data' => 'Query failed']);
    }exit;
}

if(isset($_POST['GetQualificationData'])){
    $id = $_POST['id'];
    $query1 = "SELECT * FROM user_qualification_details WHERE id = '$id'";
    $result = mysqli_query($conn,$query1);
    if($result){
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode(['status'=>true, 'data'=>$data]);
    }else{
        echo json_encode(['status'=>false, 'error'=>'Query failed']);
    }exit;
}
if (isset($_POST['updateQualification'])) {
    // Sanitize and extract POST data
    $id = (int) $_POST['id'];
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
    $education = (int) $_POST['education'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
    $certification = mysqli_real_escape_string($conn, $_POST['certification']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);

    // Build update query
    $query = "UPDATE user_qualification_details SET 
                qualification_type = '$qualification',
                education_id = $education,
                qualification_title = '$title',
                start_date = '$start_date',
                end_date = '$end_date',
                certification = '$certification',
                description = '$desc',
                updated_at = NOW()
              WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo json_encode(['success' => 'Qualification updated successfully']);
    } else {
        echo json_encode(['error_success' => 'Qualification not updated']);
    }
    exit;
}
if(isset($_POST['deleteQualification'])){
    $id = $_POST['id'];
    $query = "UPDATE user_qualification_details SET deleted_at = NOW() WHERE id = $id";
    $result = mysqli_query($conn,$query);
    if($result){
        echo json_encode(['success' => 'Qualification deleted successfully']);
    }else{
        echo json_encode(['error_success' => 'Qualification not deleted']);
    }exit;
}

if(isset($_POST['myserviceStatus'])){
    $prevData = getdatafromtable($conn,"settings","is_myservice_active","id=1");
    $newData = 1;
    if($prevData == 1){
        $newData = 0;
    }
    $query = "UPDATE settings SET is_myservice_active = $newData WHERE id = 1";
    $result = mysqli_query($conn, $query);
    if($result){
        echo json_encode(['success' => 'My Services status changed','data' => $newData]);
    }else{
        echo json_encode(['error_success' => 'Status not changed']);
    }
}
if(isset($_POST['projectStatus'])){
    $prevData = getdatafromtable($conn,"settings","is_project_active","id=1");
    $newData = 1;
    if($prevData == 1){
        $newData = 0;
    }
    $query = "UPDATE settings SET is_project_active = $newData WHERE id = 1";
    $result = mysqli_query($conn, $query);
    if($result){
        echo json_encode(['success' => 'Project status changed','data' => $newData]);
    }else{
        echo json_encode(['error_success' => 'Status not changed']);
    }
}
if(isset($_POST['planStatus'])){
    $prevData = getdatafromtable($conn,"settings","is_plan_active","id=1");
    $newData = 1;
    if($prevData == 1){
        $newData = 0;
    }
    $query = "UPDATE settings SET is_plan_active = $newData WHERE id = 1";
    $result = mysqli_query($conn, $query);
    if($result){
        echo json_encode(['success' => 'Plan status changed','data' => $newData]);
    }else{
        echo json_encode(['error_success' => 'Status not changed']);
    }
}


?>