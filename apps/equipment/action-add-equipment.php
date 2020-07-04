<?php

require '../../include/connect.php';
date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;


?>
<?php

$equ_id = $_POST["equ_id"];
$equ_type = $_POST["equ_type"];
$equ_name = $_POST["equ_name"];
$equ_volume = $_POST["equ_volume"];
$equ_unit = $_POST["equ_unit"];

// @session_start();
// $sName = $_SESSION['firstName'] . " " . $_SESSION['lastName'];
// $sd = date("Y-m-d");


$sql_add_user = "INSERT INTO `equipment`(
    `equ_id`,
    `equ_type`,
    `equ_name`,
    `equ_volume`,
    `equ_unit`
)VALUES('$equ_id','$equ_type','$equ_name','$equ_volume','$equ_unit')";
// เอาตัวแปรข้างบนมาใส ตามลำดับอ่ะ 
if (mysqli_query($conn, $sql_add_user)) {
    echo $sql_add_user;
    echo "test update here ";
} else {
    echo mysqli_error($conn);
}


