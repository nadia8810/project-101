<?php
require '../../include/connect.php';
$amphures = array();
$id = $_POST['id'];
$sql = 'SELECT * FROM amphures WHERE province_id = '. $id .'';

$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) { 
        array_push($amphures, $row);
    }
}

echo json_encode ($amphures);

?>