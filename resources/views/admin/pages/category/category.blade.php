@extends('admin.admin_template')
@section('content')
	<form action="<?=asset('/admin/category/insert')?>" method="get">
        <div class="row">
		
            <div class="col-md-12">
			
<br><ol class="breadcrumb">
                    <li class="active"><font color="black">Category Name <input value="" name="category"  maxlength="20" > Trop <select name="trop">
  <?php
	foreach($trops as $trops1){
?>
    <option value="<?php echo $trops1->tid ?>"><?php echo  $trops1->trop_Name ?></option>
	<?php }
	?>
  </select>  Type <input value="" name="type" maxlength="20" > <INPUT class="button4" TYPE="submit" VALUE="Create"></li>
                </ol>
                   <style>

  table {
      border-collapse: collapse;
      width: 100%;
  }

  th, td {
      text-align: left;
      padding: 8px;
  }

  tr:nth-child(even){background-color: #f2f2f2}

  th {
      background-color: #4CAF50;
      color: white;
  }
  </style>
  </head>
  <body>
  <br>
  <h2>List Category</h2>


  <table>

    <tr>
      <th><center>Id_category</th>
	        <th><center>Trop_Name</th>
      <th><center>Category_Name</th>
	  <th><center>Type</th>
	 
     
	
      <th><center></th>
    </tr>
	   <tr>
	  
 <tr>
  <?php 
foreach($ca2 as $cat2){
?>  
      <td><center><?php echo $cat2->catid?><center></td>
	  <td><center><?php echo $cat2->trop_name?></center></td></td>
	  <td><center><?php echo $cat2->cat_name?></center></td></td>
	  <td><center><?php echo $cat2->cat_type?></td>
	  <td><center> <a href="<?php echo "/tropedit/$cat2->catid"?>">
	  Edit</a> <a href="<?=asset('/admin/category/del/') ?><?php echo '/'.$cat2->catid;?>">Delete</a></center></td>
</tr>

	<?php };?>
	
	
  
	
  </table>
				<br>
				<br>
			
                <br>
</div>

        </div>
        <!-- /.row -->

@stop
