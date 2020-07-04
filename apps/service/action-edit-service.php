<?php

//Run id
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;


?>
<?php


$edit_id  = $_POST["id"];
$edit_name = $_POST["editname"]; //ค่าที่ส่งจาก js
$edit_duration = $_POST["edit-duration"];
$edit_price = $_POST["edit-price"];



$sql_update = "UPDATE service  SET   ser_name = '$edit_name', 
ser_duration = '$edit_duration',ser_price='$edit_price'WHERE ser_id = '$edit_id'";



// เอาตัวแปรข้างบนมาใส ตามลำดับอ่ะ 
 if (mysqli_query($conn,$sql_update)) { 
    echo $sql_update;
 
 } else {
    echo mysqli_error($conn);
}
 