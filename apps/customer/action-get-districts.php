<?php
require '../../include/connect.php';
$districts = array();
$id = $_POST['id'];
$sql = 'SELECT * FROM districts WHERE amphure_id = ' . $id . ' ';

$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) { 
        array_push($districts, $row);
    }
}

echo json_encode ($districts);

?>