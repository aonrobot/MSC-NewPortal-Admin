@extends('admin.admin_template')
@section('content')
	
<div class="row">
   <div class="col-md-12">
      <br>
	  <h3 class="box-title"><i class="fa  fa-gavel" aria-hidden="true"></i> Request List</h3>
	     <div  class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Not Approve</h3>
            </div>
         <!-- /.box-header -->
         <div class="box-body">
            <table id="request"  class="table table-bordered table-hover">
               <thead>
			   <tr>
                     <th><center>request_id</th>
                     <th><center>Trop_Name</th>
                     <th><center>request_name</th>
                     <th><center>request_object</th>
                     <th><center>request_type </th>
                     <th><center>Status</th>
                     <th></th>
               </tr>
               </thead>
               <tbody>
                  <?php 
                     foreach($request as $request1){
                     ?>  
					  <?php  if(!$request1->request_status or $request1->request_status == '2'){?>
                  <tr>
				      <td><center><?php echo $request1->request_id?></td>
                      <td><center><?php echo $request1->trop_name?></td>
					  <td><center><?php echo $request1->request_detail?></td>
                      <td><center><?php echo $request1->request_object ?></td>
                      <td><center><?php echo $request1->request_type?></td>
                      <td><center>
                        <?php  if(!$request1->request_status){?> 
						<button  type="button" class="btn btn-warning" data-toggle="modal" data-target="#" data-whatever="@mdo"  readonly>
						<span class="glyphicon glyphicon-send"></span></button>
						<?php } if($request1->request_status=='2'){?>	
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $request1->request_id;?>" data-whatever="@mdo"  >
						<span class="glyphicon glyphicon-remove"></span></button><?php }?></center>
                      </td>
                      </font>
                      <td>
                        <center>
						<div class="bd-example">
						
						<a href="<?=asset('/admin/request/add/') ?><?php echo '/'.$request1->request_id.",".$request1->object_id;?>"><button class="btn btn-success" onclick="return confirm('Are you sure you want to active?')"> Active </button></a> 
					
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $request1->request_id;?>" data-whatever="@mdo"  ><span class="glyphicon glyphicon-remove"></span> Reject</button>
						<!--
						<a href="<?=asset('/admin/request/del/')?><?php echo '/'.$request1->request_id;?>"><button class="btn btn-danger"   type="button" style="height:33px"onclick="return confirm('Are you sure you want to Delete :: <?php echo  $request1->trop_name?> ?')"><span class="glyphicon glyphicon-trash"></span> Delete</button></a> --></center>
                        
   
  <div class="modal fade" id="<?php echo $request1->request_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
       <form action="<?=asset('/admin/request/reject')?>" method="get">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
		  
          <h4 class="modal-title" id="exampleModalLabel"><center>Message</center></h4>
        </div>
        <div class="modal-body">
        
            <div class="form-group">
			<center>
              <label for="recipient-name" class="form-control-label" >Comment :</label>
              <input name="comment" type="text" class="form-control" id="recipient-name" size="75" value="<?php echo $request1->request_comment; ?>">
			  <input name="request_id" type="hidden" class="form-control" id="recipient-name" size="75" value="<?php echo $request1->request_id; ?>">
			  <input name="tropid" type="hidden"  class="form-control" id="recipient-name" size="75" value="<?php echo $request1->object_id; ?>">
			</center>
            </div>

        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	    
		<button class="btn btn-primary"   TYPE="submit" style="height:33px"onclick="return confirm('Are you sure you want to Update :: <?php echo  $request1->trop_name?> ?')">Reject</button>
		  
        
        </div>
	    </form>
      </div>
    </div>
  </div>
</div>
						
					
                      </td>
                  </tr>
					  <?php }}?>
               </tbody>
            </table>
         </div>
      </div>
	  
      <div  class="box box-success">
             <div class="box-header">
              <h3 class="box-title">Approve</h3>
            </div>
         <div class="box-body">
            <table id="request_data"  class="table table-bordered table-hover">
               <thead>
			   <tr>
                     <th><center>request_id</th>
                     <th><center>Trop_Name</th>
                     <th><center>request_name</th>
                     <th><center>request_object</th>
                     <th><center>request_type </th>
                     <th><center>Status</th>
                     <th></th>
               </tr>
               </thead>
               <tbody>
                  <?php 
                     foreach($request as $request1){
                     ?>  
					  <?php  if($request1->request_status==1){?>
                  <tr>
				      <td><center><?php echo $request1->request_id?></td>
                      <td><center><?php echo $request1->trop_name?></td>
					  <td><center><?php echo $request1->request_detail?></td>
                      <td><center><?php echo $request1->request_object ?></td>
                      <td><center><?php echo $request1->request_type?></td>
                      <td><center>
                        <?php  if(!$request1->request_status){?><font size="3" color="red"><span class="glyphicon glyphicon-remove"></span>
                        <?php }if($request1->request_status){?><font size="3" color="green"><span class="glyphicon glyphicon-ok"><?php } ?>
                      </td>
                      </font>
                      <td>
                        <center><a href="<?=asset('/admin/request/del/')?><?php echo '/'.$request1->request_id;?>"><button class="btn btn-danger"   type="button" style="height:33px"onclick="return confirm('Are you sure you want to Delete :: <?php echo  $request1->trop_name?> ?')"><span class="glyphicon glyphicon-trash"></span> Delete</button></a></center>
                      </td>
                  </tr>
					  <?php }}?>
               </tbody>
            </table>
         </div>
      </div>
      <br>
      <br>
      <br>
   </div>
</div>
<script>
   $(function () {
     $("#request_data").DataTable();
	  $("#request").DataTable();
    
   });
</script>
<!-- /.row -->
@stop