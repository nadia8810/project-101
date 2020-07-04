<?php

//Run id
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;


?>
<?php

$edit_id  = $_POST["id"];
$edit_status = $_POST["edit-status"]; //ค่าที่ส่งจาก js
$edit_name = $_POST["edit-name"];
$edit_volume = $_POST["edit-volume"];
$edit_unit = $_POST["edit-unit"];



$sql_update = "UPDATE equipment  SET   
equ_status = '$edit_status',equ_name = '$edit_name',equ_volume = '$edit_volume',equ_unit='$edit_unit' 
WHERE equ_id = '$edit_id'";



// เอาตัวแปรข้างบนมาใส ตามลำดับอ่ะ 
if (mysqli_query($conn, $sql_update)) {
    echo $sql_update;
    echo "test update here ";
} else {
    echo mysqli_error($conn);
}
