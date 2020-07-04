<?php

//Run id
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;


?>
<?php

$edit_id = $_POST["emp_id"];
$edit_fname = $_POST["emp_name"];
$edit_lname = $_POST["emp_lastname"];
$edit_phone = $_POST["emp_tel"];
$edit_mail = $_POST["emp_mail"];
$edit_status = $_POST["emp_status"];
$edit_num_home = $_POST["emp_num_home"];
$edit_muu = $_POST["emp_muu"];
$edit_soi = $_POST["emp_soi"];
$edit_road = $_POST["emp_road"];
$edit_district = $_POST["emp_district"];
$edit_amphoe = $_POST["emp_amphoe"];
$edit_province = $_POST["emp_province"];
$edit_zipcode = $_POST["emp_zipcode"];



$sql_update = "UPDATE employee  SET  emp_name = '$edit_fname', emp_lastname = '$edit_lname',emp_phone = '$edit_phone',
emp_status = '$edit_status',emp_num_home='$edit_num_home',emp_muu = '$edit_muu',emp_soi = '$edit_soi',
emp_road = '$edit_road',emp_district = '$edit_district',emp_amphoe = '$edit_amphoe',emp_province = '$edit_province',
emp_zipcode = '$edit_zipcode'  WHERE emp_id ='$edit_id'";



// เอาตัวแปรข้างบนมาใส ตามลำดับอ่ะ 
if (mysqli_query($conn, $sql_update)) {
    echo $sql_update;
    echo "test update here ";
} else {
    echo mysqli_error($conn);
}
