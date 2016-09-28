<?php
	$serverName = "MSCDTA\MSCDATA";
	$connectionInfo = array( "Database"=>"mscnewportal", "UID"=>"sa", "PWD"=>"Leave&Time" );
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	if( $conn === false ) {
		 die( print_r( sqlsrv_errors(), true));
	}
?>