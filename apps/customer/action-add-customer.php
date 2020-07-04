<?php
require '../../include/connect.php';
date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;


 ?>
 <?php

    $cus_id = $_POST['cus_id'];
    $cus_type = $_POST["cus_type"];
    $cus_name = $_POST['cus_name'];
    $cus_lastname = $_POST["cus_lastname"];
    $cus_tel = $_POST["cus_tel"];
    $cus_email = $_POST["cus_mail"];
    $cus_num_home = $_POST["cus_num_home"];
    $cus_muu = $_POST["cus_muu"];
    $cus_soi = $_POST["cus_soi"];
    $cus_road = $_POST["cus_road"];
    $cus_district = $_POST["cus_district"];
    $cus_amphoe = $_POST["cus_amphoe"];
    $cus_province = $_POST["cus_province"];
    $cus_zipcode = $_POST["cus_zipcode"];

    // print_r($in_cusname);

    $sql_add_user = "INSERT INTO `customer`(
        `cus_id`,
        `cus_type`,
        `cus_name`,
        `cus_lastname`,
        `cus_phone`,
        `cus_email`,
        `cus_num_home`,
        `cus_muu`,
        `cus_soi`,
        `cus_road`,
        `cus_district`,
        `cus_amphoe`,
        `cus_province`,
        `cus_zipcode`,
        `cus_status`
    )VALUES('$cus_id','$cus_type','$cus_name','$cus_lastname','$cus_tel','$cus_email'
    ,'$cus_num_home','$cus_muu','$cus_soi','$cus_road','$cus_district','$cus_amphoe','$cus_province','$cus_zipcode','1')";

// เอาตัวแปรข้างบนมาใส ตามลำดับอ่ะ 
if (mysqli_query($conn, $sql_add_user)) {
    echo $sql_add_user;
    echo "test update here ";
} else {
    echo mysqli_error($conn);
}
