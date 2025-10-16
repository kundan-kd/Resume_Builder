<?php
include '../../includes/connection.php';
$action = $_POST['action'];
    if($action == 'loadData'){
        $query = "SELECT * FROM language_types WHERE status = 1 AND deleted_at IS NULL";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <th scope='row'>{$count}</th>
                        <td>" . $row['name'] . "</td>
                        <td>
                        <button class='btn btn-outline-primary btn-sm me-2 edit-language-btn'
                                data-id='{$row['id']}' '>
                            <i class='ri-pencil-line'></i>
                        </button>
                        <button class='btn btn-outline-danger btn-sm delete-language-btn' 
                                data-id='{$row['id']}'>
                            <i class='ri-delete-bin-6-line'></i>
                        </button>
                        </td>
                    </tr>";
                $count++;
            }
        }
    }

    if($action == 'add'){
        $language = trim(mysqli_real_escape_string($conn,$_POST["language_name"]));
        $insert = "INSERT INTO language_types (`name`,`status`,`created_at`,`updated_at`) values('$language',1,NOW(),NOW())";
        if(mysqli_query($conn, $insert)){
            $last_id = mysqli_insert_id($conn);
            echo json_encode([
                'success' => 'Language added successfully',
                'id' => $last_id,
                'name' => $language
            ]);
        } else {
            echo json_encode(['success' => 'Language not added']);
        }
    }

    if($action == 'delete'){
        $id = trim(mysqli_real_escape_string($conn,$_POST["id"]));
        $query = "UPDATE language_types SET deleted_at = NOW() WHERE id = $id";
        if(mysqli_query($conn,$query)){
            echo json_encode(['success' => 'Language deleted successfully']);
        }else{
            echo json_encode(['error_success' => 'Language not deleted']);
        }
    }

    if($action == 'getData'){
        $id = trim(mysqli_real_escape_string($conn,$_POST["id"]));
        $query = "SELECT `name` FROM language_types WHERE id = '$id'";
        $result = mysqli_query($conn,$query);
        if($result && mysqli_num_rows($result)){
            while($row = mysqli_fetch_assoc($result)){
                echo json_encode(['success' => 'Data fetch successfully','data' => $row]);
            }
        }else{
            echo json_encode(['error_success' => 'Data not fetched']);
        }
       
    }

    if($action == 'update'){
        $id = trim(mysqli_real_escape_string($conn,$_POST["id"]));
        $name = trim(mysqli_real_escape_string($conn,$_POST["language_name"]));
        $query = "UPDATE language_types SET name = '$name' WHERE id = $id";
        if(mysqli_query($conn,$query)){
            echo json_encode(['success' => 'Language updated successfully']);
        }else{
            echo json_encode(['error_success' => 'Language not updated']);
        }
    }
?>