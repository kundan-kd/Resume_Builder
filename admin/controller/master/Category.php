<?php
include '../../includes/connection.php';
$action = $_POST['action'];
    if($action == 'loadData'){
        $query = "SELECT * FROM categories WHERE status = 1 AND deleted_at IS NULL";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <th scope='row'>{$count}</th>
                        <td>" . $row['name'] . "</td>
                        <td>
                        <button class='btn btn-outline-primary btn-sm me-2 edit-category-btn'
                                data-id='{$row['id']}' '>
                            <i class='ri-pencil-line'></i>
                        </button>
                        <button class='btn btn-outline-danger btn-sm delete-category-btn' 
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
        $category = trim(mysqli_real_escape_string($conn,$_POST["category_name"]));
        $insert = "INSERT INTO categories (`name`,`status`,`created_at`,`updated_at`) values('$category',1,NOW(),NOW())";
        if(mysqli_query($conn, $insert)){
            $last_id = mysqli_insert_id($conn);
            echo json_encode([
                'status' => 'Success',
                'id' => $last_id,
                'name' => $category
            ]);
        } else {
            echo json_encode(['status' => 'Error']);
        }
    }

    if($action == 'delete'){
        $id = trim(mysqli_real_escape_string($conn,$_POST["id"]));
        $query = "UPDATE categories SET deleted_at = NOW() WHERE id = $id";
        if(mysqli_query($conn,$query)){
            echo json_encode(['status' => 'Success']);
        }else{
            echo json_encode(['status' => 'Error']);
        }
    }

    if($action == 'getData'){
        $id = trim(mysqli_real_escape_string($conn,$_POST["id"]));
        $query = "SELECT `name` FROM categories WHERE id = '$id'";
        $result = mysqli_query($conn,$query);
        if($result && mysqli_num_rows($result)){
            while($row = mysqli_fetch_assoc($result)){
                echo json_encode(['status' => 'Success','data' => $row]);
            }
        }else{
            echo json_encode(['status' => 'Error']);
        }
       
    }

    if($action == 'update'){
        $id = trim(mysqli_real_escape_string($conn,$_POST["id"]));
        $name = trim(mysqli_real_escape_string($conn,$_POST["category_name"]));
        $query = "UPDATE categories SET name = '$name' WHERE id = $id";
        if(mysqli_query($conn,$query)){
            echo json_encode(['status' => 'Success']);
        }else{
            echo json_encode(['status' => 'Error']);
        }
    }
?>