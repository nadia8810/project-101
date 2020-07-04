<?php

require '../../include/connect.php';
date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;


?>
<?php
$cus_id = $_POST['id'];
$status = $_POST['status'];

    $sql_update = "UPDATE customer SET cus_status = '$status' WHERE cus_id = '$cus_id'";




// เอาตัวแปรข้างบนมาใส ตามลำดับอ่ะ 
if (mysqli_query($conn, $sql_update)) {
    echo $sql_update;
    echo "test update here ";
} else {
    echo mysqli_error($conn);
}
