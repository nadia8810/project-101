<?php

require '../../include/connect.php';
date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;


?>
<?php

    $cus_id = $_POST['cus_id'];
    $cus_id2 = $_POST['cus_id2'];
    $cus_type = $_POST["cus_type"];
    $cus_name = $_POST['cus_name'];
    $cus_name2 = $_POST['cus_name2'];
    $cus_lastname = $_POST["cus_lastname"];
    $cus_tel = $_POST["cus_tel"];
    $cus_email = $_POST["cus_mail"];
    $cus_tel2 = $_POST["cus_tel2"];
    $cus_email2 = $_POST["cus_mail2"];
    $cus_num_home = $_POST["cus_num_home"];
    $cus_muu = $_POST["cus_muu"];
    $cus_soi = $_POST["cus_soi"];
    $cus_road = $_POST["cus_road"];
    $cus_district = $_POST["cus_district"];
    $cus_amphoe = $_POST["cus_amphoe"];
    $cus_province = $_POST["cus_province"];
    $cus_zipcode = $_POST["cus_zipcode"];

    if($cus_type == 'บุคคลธรรมดา'){
        $sql_update = "UPDATE customer  SET  cus_type = '$cus_type', cus_name = '$cus_name',cus_lastname='$cus_lastname',
        cus_phone = '$cus_tel',cus_email = '$cus_email',cus_num_home = '$cus_num_home',
        cus_muu = '$cus_muu',cus_soi = '$cus_soi',cus_road = '$cus_road',cus_district = '$cus_district',cus_amphoe = '$cus_amphoe',
        cus_province = '$cus_province' WHERE cus_id ='$cus_id'";
    }else if($cus_type == 'นิติบุคคล'){
        $sql_update = "UPDATE customer  SET  cus_type = '$cus_type', cus_name = '$cus_name2',cus_lastname='',
        cus_phone = '$cus_tel2',cus_email = '$cus_email2',cus_num_home = '$cus_num_home',
        cus_muu = '$cus_muu',cus_soi = '$cus_soi',cus_road = '$cus_road',cus_district = '$cus_district',cus_amphoe = '$cus_amphoe',
        cus_province = '$cus_province' WHERE cus_id ='$cus_id2'";
    }




// เอาตัวแปรข้างบนมาใส ตามลำดับอ่ะ 
if (mysqli_query($conn, $sql_update)) {
    echo $sql_update;
    echo "test update here ";
} else {
    echo mysqli_error($conn);
}
