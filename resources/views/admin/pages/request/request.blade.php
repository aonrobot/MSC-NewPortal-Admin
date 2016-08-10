@extends('admin.admin_template')
@section('content')
        <div class="row">
            <div class="col-md-12">
                   <style>

  </style>
  </head>
  <body>
  <br>
  <h2>List Request</h2>


  <table class="table table-bordered">

    <tr>
      <th><center>request_id</th>
	  <th><center>Trop_Name</th>
	  <th><center>request_name</th>
      <th><center>request_object</th>
	  <th><center>request_type</th>
	  <th><center>Status</th>
	  <th></th>
     
	
    
    </tr>
	   <tr>
	  
 <tr>
  <?php 
foreach($request as $request1){
?>  
      <td><center><?php echo $request1->request_id?><center></td>
	  <td><center><?php echo $request1->trop_name?></td>
	  <td><center><?php echo $request1->request_detail?></center></td>
	  <td><center><?php echo $request1->request_object ?></center></td>
	  <td><center><?php echo $request1->request_type?></td>
	  <td><center><?php  if(!$request1->request_status){?><font size="3" color="red"><span class="glyphicon glyphicon-remove"></span>
      <?php }if($request1->request_status){?><a href="<?php echo "/settrop/$request1->request_id"?>"><font size="3" color="green"><span class="glyphicon glyphicon-ok"></a> <?php } ?></td></font>
	  
	  <td><center><a href="<?=asset('/admin/request/add/') ?><?php echo '/'.$request1->request_id.",".$request1->object_id;?>"> Active / </a> <a href="<?php echo "/active/del/$request1->request_id"?>">Delete</a></center></td>
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

