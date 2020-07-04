<?php

require '../../include/connect.php';
date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;



 ?>
 <?php

$ser_id = $_POST["ser_id"];
$ser_name = $_POST["ser_name"];
$ser_duration = $_POST["ser_duration"];
$ser_price = $_POST["ser_price"];
$ser_home = $_POST["ser_home"];

// @session_start();
// $sName = $_SESSION['firstName'] . " " . $_SESSION['lastName'];
// $sd = date("Y-m-d");


$sql_add_user = "INSERT INTO `service`(
    `ser_id`,
    `ser_name`,
    `ser_duration`,
    `ser_price`,
    `ser_home`

)VALUES('$ser_id','$ser_name','$ser_duration','$ser_price','$ser_home')";
// เอาตัวแปรข้างบนมาใส ตามลำดับอ่ะ 
if (mysqli_query($conn, $sql_add_user)) {
    echo $sql_add_user;
    echo "test update here ";
} else {
    echo mysqli_error($conn);
}
