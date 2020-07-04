<?php
require '../../include/connect.php';
$employee = '';
$id = $_POST['id'];
$sql = 'SELECT * FROM employee WHERE emp_id = \''. $id .'\'';

$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) { 
        $employee = $row;
    }
}

echo json_encode ($employee);

?>