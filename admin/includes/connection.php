<?php   
  $conn = mysqli_connect("localhost", "root", "", "resume_db");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    

    function getdatafromtable($conn, $table, $column, $condition) {
            $query = "SELECT $column FROM $table WHERE $condition";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                return $row[$column];
            }
            return null;
        }
?>
