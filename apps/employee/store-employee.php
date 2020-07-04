<?php

// DB table to use
$table = 'employee';
 
// Table's primary key
$primaryKey = 'emp_id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes

// เรียกชื่อ Column จาก DB 
$columns = array(
    array( 'db' => 'emp_id', 'dt' => 'id' ),
    array( 'db' => 'emp_name',  'dt' => 'name' ),
    array( 'db' => 'emp_lastname',   'dt' => 'lastname' ),
    array( 'db' => 'emp_citizenid',   'dt' => 'citizenid' ),
    array( 'db' => 'emp_phone',   'dt' => 'phone' ),
    array( 'db' => 'emp_email',   'dt' => 'email' ),
    array( 'db' => 'emp_status',   'dt' => 'status' ),
    array( 'db' => 'emp_pic',   'dt' => 'pic' ),
    array( 'db' => 'emp_num_home',   'dt' => 'num_home' ),
    array( 'db' => 'emp_muu',   'dt' => 'muu' ),
    array( 'db' => 'emp_soi',   'dt' => 'soi' ),
    array( 'db' => 'emp_road',   'dt' => 'road' ),
    array( 'db' => 'emp_district',   'dt' => 'district' ),
    array( 'db' => 'emp_amphoe',   'dt' => 'amphoe' ),
    array( 'db' => 'emp_province',   'dt' => 'province' ),
    array( 'db' => 'emp_zipcode',   'dt' => 'zipcode' ),
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '12345678',
    'db'   => 'project101',
    'host' => 'localhost'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( '../../../DataTables/examples/server_side/scripts/ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
?> 