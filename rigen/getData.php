<?php  

	// Database Connection info
	$dbDetails = array(
		'host' => 'localhost',
		'user' => 'root',
		'pass' => '',
		'db' => 'rigen2',
	);

	//table
	$table = 'member_rigen';

	// Primary key
	$primaryKey = 'id';

	 
	// Array of database columns which should be read and sent back to DataTables.
	// The `db` parameter represents the column name in the database, while the `dt`
	// parameter represents the DataTables column identifier. In this case simple
	// indexes
	$columns = array(
		array( 'db' => 'id', 		'dt' => 0 ),
	    array( 'db' => 'name', 		'dt' => 1 ),
	    array( 'db' => 'phone',  	'dt' => 2 ),
	    array( 'db' => 'code',   	'dt' => 3 ),
	    array( 'db' => 'branch',  'dt' => 4 ), 
	);
	 
	 
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * If you just want to use the basic configuration for DataTables with PHP
	 * server-side, there is no need to edit below this line.
	 */
	 
	require( 'ssp.class.php' );
	 
	echo json_encode(
	    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns )
	);

 