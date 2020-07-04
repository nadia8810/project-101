<?php

// DB table to use
$table = 'customer';
 
// Table's primary key
$primaryKey = 'cus_id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes

// เรียกชื่อ Column จาก DB 
$columns = array(
    array( 'db' => 'cus_id', 'dt' => 'id' ),
    array( 'db' => 'cus_name',  'dt' => 'name' ),
    array( 'db' => 'cus_lastname',   'dt' => 'lastname' ),
    array( 'db' => 'cus_type',   'dt' => 'type' ),
    array( 'db' => 'cus_phone',   'dt' => 'phone' ),
    array( 'db' => 'cus_email',   'dt' => 'email' ),
    array( 'db' => 'cus_num_home',   'dt' => 'num_home' ),
    array( 'db' => 'cus_muu',   'dt' => 'muu' ),
    array( 'db' => 'cus_soi',   'dt' => 'soi' ),
    array( 'db' => 'cus_road',   'dt' => 'road' ),
    array( 'db' => 'cus_district',   'dt' => 'district' ),
    array( 'db' => 'cus_amphoe',   'dt' => 'amphoe' ),
    array( 'db' => 'cus_province',   'dt' => 'province' ),
    array( 'db' => 'cus_zipcode',   'dt' => 'zipcode' ),
    array( 'db' => 'cus_status',   'dt' => 'status' ),
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