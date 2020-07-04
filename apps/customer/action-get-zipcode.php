<?php
require '../../include/connect.php';
$zipcode = '';
$id = $_POST['id'];
$sql = 'SELECT zip_code FROM districts WHERE id = ' . $id . ' ';

$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) { 
        $zipcode = $row;
        // print_r($row);
    }
}

echo json_encode ($zipcode);

?>