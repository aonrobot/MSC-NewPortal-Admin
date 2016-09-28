<?php
$serverName = "MSCDTA\MSCDATA";
$connectionInfo = array( "Database"=>"mscnewportal", "UID"=>"sa", "PWD"=>"Leave&Time" );
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

$get_path = explode("\\",__DIR__);
 $real_path = $get_path[0] . '\\' . $get_path[1] . '\\' . $get_path[2];
 
echo $real_path;

$filePath = "dasdsad.sadasolicy";
$filename = "uploads/files/newPortalModelV1.35.pdf";

$str_upload = strpos($filename, "uploads/files");

//echo substr($filename,strpos($filename, "uploads/files") - 1);

$delete_file = "DELETE FROM [file] WHERE [file_location] = ?";
$stmt = sqlsrv_query($conn, $delete_file,  array($filename));
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}

//echo str_replace("D:/MSCNewPortal/public",'',$filename);

/*$file_type = stripos($filePath, 'policy') != false || strpos($filePath, 'Policy') != false ? "policy" : "other";
		 
$insert_file = "INSERT INTO [file] (emid, used, session, file_location, file_file_name, updated_at, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)";
$params = array(43216, "0", "SESSION", $filePath, "55.png", date("Y-m-d h:i:sa"), date("Y-m-d h:i:sa"));

$stmt = sqlsrv_query( $conn, $insert_file, $params);

if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}*/

?>