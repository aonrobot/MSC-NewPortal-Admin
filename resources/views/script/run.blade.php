<?php
	
	header('Content-Type: text/html; charset=utf-8');
	
	$serverName = "MSCDTA\MSCDATA";
	$connectionInfo = array( "Database"=>"MSCPortal", "UID"=>"sa", "PWD"=>"Leave&Time" );
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	if( $conn === false ) {
		 die( print_r( sqlsrv_errors(), true));
	}
	
	$select = "SELECT dbo.tb_category.name_cat, dbo.tb_iso_dep.name_dep, dbo.tb_iso_add.file_work, dbo.tb_iso_add.year, dbo.tb_iso_add.name_work FROM dbo.tb_iso_dep INNER JOIN
               dbo.tb_iso_add ON dbo.tb_iso_dep.id_dep = dbo.tb_iso_add.id_dep INNER JOIN dbo.tb_category ON dbo.tb_iso_add.id_cat = dbo.tb_category.id_cat";
	
	$result = sqlsrv_query($conn, $select);
	
	
	//$kk = 'dsa....dsadsad.dasd';
			
	//echo strrpos($kk, '.');
		
	while($row = sqlsrv_fetch_object($result)) {
		
		//if(file_exists('D:\\MSCNewPortal\\public\\script\\Audit\\' . $row->file_work))
			//echo 'ok '. $i . '<br>';
		
		//$name_cat = $row->name_cat;
		
		if(!file_exists('D:\\MSCNewPortal\\public\\script\\Audit\\' . $row->name_cat . ' of ' . $row->year)){
			mkdir('D:\\MSCNewPortal\\public\\script\\Audit\\' . $row->name_cat . ' of ' . $row->year);
			//echo 'create ' . $row->name_cat . ' of ' . $row->year . '<br>';
		}
		
		$name_dep = str_replace("/", '-', $row->name_dep);


		if(substr($name_dep,-1) == ' '){
			$name_dep = substr_replace($name_dep,'',-1);
		}
		
		/*while(substr($name_dep,-1) != ' '){
			$name_dep = substr_replace(' ', '', $name_dep,-1);
			echo $name_dep;
		}*/
		
		
		
		if(!file_exists('wfio://' . 'D:\\MSCNewPortal\\public\\script\\Audit\\' . $row->name_cat . ' of ' . $row->year . '\\' . $name_dep)){
			
			mkdir('D:\\MSCNewPortal\\public\\script\\Audit\\' . $row->name_cat . ' of ' . $row->year . '\\' . $name_dep);
		}
		
		//$file_name = str_replace("/", '-', $row->file_work);
		//$file_name = str_replace("&", ' and ', $row->file_work);
		$file_name = $row->file_work;
		$file_name = iconv('TIS-620' ,'UTF-8' , $file_name );
		
		
		//echo $file_name . '<br>';
		
			
		if(file_exists('wfio://' . 'D:\\MSCNewPortal\\public\\script\\Audit\\' . $file_name)){
			
			$name_work = $row->name_work;
			$name_work  = iconv('TIS-620' ,'UTF-8' , $name_work);
			$name_work = str_replace("/", '-', $name_work);
			$name_work = str_replace("&", ' and ', $name_work);
			
			if(substr($name_work,-1) == ' '){
				$name_work = substr_replace($name_work,'',-1);
			}
			
			//$file = fopen('wfio://' . 'D:\\MSCNewPortal\\public\\script\\Audit\\' . $file_name, 'r');
			
			$dot_pos = strrpos($file_name,'.');
			$file_exten = substr($file_name,$dot_pos);
			
			copy('wfio://' . 'D:\\MSCNewPortal\\public\\script\\Audit\\' . $file_name, 'wfio://' . 'D:\\MSCNewPortal\\public\\script\\Audit\\' . $row->name_cat . ' of ' . $row->year . '\\' . $name_dep . '\\' . $name_work . $file_exten);
			
			echo 'copy ' . $row->name_cat . ' of ' . $row->year . '\\' . $name_dep . '\\' . $name_work . $file_exten . '<br>';
		}

		
		
		
 
	}

?>