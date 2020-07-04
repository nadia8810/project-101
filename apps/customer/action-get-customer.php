<?php
require '../../include/connect.php';
$customer = '';
$id = $_POST['id'];
$sql = 'SELECT * FROM customer WHERE cus_id = \''. $id .'\'';

$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) { 
        $customer = $row;
    }
}

echo json_encode ($customer);

?>