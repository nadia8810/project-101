<?php

// DB table to use
$table = 'service';
 
// Table's primary key
$primaryKey = 'ser_id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes

// เรียกชื่อ Column จาก DB 
$columns = array(
    array( 'db' => 'ser_id', 'dt' => 'id' ),
    array( 'db' => 'ser_name',  'dt' => 'name' ),
    array( 'db' => 'ser_duration',   'dt' => 'duration' ),
    array( 'db' => 'ser_price',   'dt' => 'price' ),
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