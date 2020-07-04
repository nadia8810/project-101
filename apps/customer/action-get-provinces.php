<?php
require '../../include/connect.php';
$provinces = array();
$sql = 'SELECT * FROM provinces';

$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) { 
        array_push($provinces, $row);
    }
}

echo json_encode ($provinces);

?>