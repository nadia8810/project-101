<?php
require '../../include/connect.php';
date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;


?>
<?php

$emp_id = $_POST["emp_id"];
$emp_name = $_POST["emp_name"];
$emp_lastname = $_POST["emp_lastname"];
$emp_citizen = $_POST["emp_citizen"];
$emp_tel = $_POST["emp_tel"];
$emp_email = $_POST["emp_mail"];
$emp_status  = $_POST["emp_status "];
$emp_num_home = $_POST["emp_num_home"];
$emp_muu = $_POST["emp_muu"];
$emp_soi = $_POST["emp_soi"];
$emp_road = $_POST["emp_road"];
$emp_district = $_POST["emp_district"];
$emp_amphoe = $_POST["emp_amphoe"];
$emp_province = $_POST["emp_province"];
$emp_zipcode = $_POST["emp_zipcode"];

// @session_start();
// $sName = $_SESSION['firstName'] . " " . $_SESSION['lastName'];
// $sd = date("Y-m-d");


$sql_add_user = "INSERT INTO `employee`(
    `emp_id`,
    `emp_name`,
    `emp_lastname`,
    `emp_citizenid`,
    `emp_phone`,
    `emp_email`,    
    `emp_status`,
    `emp_num_home`,
    `emp_muu`,
    `emp_soi`,
    `emp_road`,
    `emp_district`,
    `emp_amphoe`,
    `emp_province`,
    `emp_zipcode`
)VALUES('$emp_id','$emp_name','$emp_lastname','$emp_citizen','$emp_tel','$emp_email','1','$emp_num_home'
,'$emp_muu','$emp_soi','$emp_road','$emp_district','$emp_amphoe','$emp_province','$emp_zipcode')";


// เอาตัวแปรข้างบนมาใส ตามลำดับอ่ะ 
if (mysqli_query($conn, $sql_add_user)) {
    echo $sql_add_user;
    echo "test update here ";
} else {
    echo mysqli_error($conn);
}
