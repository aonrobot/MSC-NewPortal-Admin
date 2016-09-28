@extends('admin.admin_template')
@section('content')
{{--*/$per = new App\Library\Permission()/*--}}
<?php $em_info = Session::get('em_info');?>
<?php
$user = Session::get('user');
$can_access = ['admin', 'owner','trop_admin'];
$can_access_del = ['admin', 'owner'];
$canrole = ['delete-trop'];
?>

<?php //test permission
echo $per::canrole($canrole);
?>

<form action="<?=asset('/admin/trop/insert')?>" method="get">

   <div class="row metrop-row-content">
      <div class="col-md-11" style="margin-left: 30px;">
         <h2><i class="fa fa-newspaper-o" aria-hidden="true" ></i> Create Trop</h2>
		 
		 @if(($per::can($can_access)))
	
         <ol class="breadcrumb" style="background-color:white" >
            <li class="active"><font color="black">Trop Name <input value="" name="trop"  maxlength="20">Title<input value="" name="trop_title"  maxlength="30">
			<INPUT  TYPE="submit" VALUE="Create" class="btn btn-success" style="height:30px" onclick="return confirm('Are you sure you want to create trop ?')"></li>
         </ol>
		 @endif
		   <div class="box box-danger">
           <div class="box-header">
              <h3 class="box-title">Trop Not Approve</h3>
            </div>
            <div class="box-body">
               <table id="trop" class="table table-bordered">
                  <thead>
                     <tr>
                        <th><center>Id_Trop</th>
                        <th><center>Name</th>
						<th><center>Title</th>
                        <th><center>Type</th>
                        <th><center>Status</th>
						<th></th>                        
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach($trops as $trop){ ?>
					   <?php if(!$trop->request_status or  $trop->request_status==2){?>
                        <tr>
                        <td><center><?php echo $trop->tid?></center></td>
                        <td><center><?php echo $trop->trop_name?></center></td>
						<td><center><?php echo $trop->trop_title?></center></td>
                        <td><center><?php echo $trop->trop_type?></center></td>
						
                        <td><center>
                           <?php  if(!$trop->request_status){?>
						     <button  type="button" class="btn btn-warning" data-toggle="modal" data-target="#<?php echo $trop->tid;?>" data-whatever="@mdo"  readonly><span class="glyphicon glyphicon-send"></span></button>
                           <?php }if($trop->request_status==2){?>
						   
						   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $trop->tid;?>" data-whatever="@mdo"  ><span class="glyphicon glyphicon-remove"></span> </button>
	                         <div class="modal fade" id="<?php echo $trop->tid;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                               <div class="modal-content">   
						 		<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								<h4 class="modal-title" id="exampleModalLabel"><center>Message</center></h4>
								</div>
						<div class="modal-body">
						<div class="form-group">
						<center>
						<label for="recipient-name" class="form-control-label" ><?php  echo $trop->request_comment?></label> 
						</center>
						</div></div>
                           <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                           </div>
						</div>
					   </div>
                      </div>
					 <?php } ?>
						   </font></center>
                        </td>
                       
                        <td>
                           <center>
						   <a href="<?=asset('/admin/trop/del/') ?><?php echo '/'.$trop->tid;?>"><font color="white">
						   <button class="btn btn-danger"   type="button" style="height:33px"onclick="return confirm('Are you sure you want to Delete :: <?php echo $trop->trop_name?> ?')" /> <span class="glyphicon glyphicon-trash" ></span>
						   delete</font>
						   </button>
						   </a>
						   </center>
                        </td>
                     </tr>
					
					   <?php } } ?>
                  </tbody>
               </table>
            </div>
         </div>
		 
		 
         <div  class="box box-success">
		 <div class="box-header">
              <h3 class="box-title">Trop  Approve</h3>
            </div>
            <div class="box-body">
               <table id="trop_request" class="table table-bordered">
                  <thead>
                     <tr>
                        <th><center>Id_Trop</th>
                        <th><center>Name</th>
						<th><center>Title</th>
                        <th><center>Type</th>
                        <th><center>Status</th>
						<th></th>
                        
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach($trops as $trop){ ?>
					   <?php if($trop->trop_status){?>
                        <tr>
                        <td><center><?php echo $trop->tid?></center></td>
                        <td><center><?php echo $trop->trop_name?></center></td>
						 <td><center><?php echo $trop->trop_title?></center></td>
                        <td><center><?php echo $trop->trop_type?></center></td>
						
                        <td><center>
                           <?php  if(!$trop->trop_status){?><font size="3" color="red"><span class="glyphicon glyphicon-remove"></span>
                           <?php }if($trop->trop_status){?><font size="3" color="green"><span class="glyphicon glyphicon-ok"><?php } ?>
						   </font></center>
                        </td>
                       
                        <td>
                           <center> 
						   <a href="<?=asset('/admin/trop/edit/') ?><?php echo '/'.$trop->tid;?>">
						   <!--
						   <button class="btn btn-default btn-sm"  type="button" style="background-color:white;height:33px"><span class="glyphicon glyphicon glyphicon-pencil"></span>
						   <?php if($trop->trop_status){?> Edit<?php }?>
						   </button>
						    -->
						   </a>					
						
                           <?php  if($user->can('delete-trop') or $per::can($can_access_del)){?>				   
						   <a href="<?=asset('/admin/trop/del/') ?><?php echo '/'.$trop->tid;?>"><font color="white">
						   <button class="btn btn-danger"   type="button" style="height:33px" onclick="return confirm('Are you sure you want to Delete :: <?php echo $trop->trop_name?> ?')"><span class="glyphicon glyphicon-trash" ></span>
					    	 delete</font>
						   </button>
						   </a>
						   <?php }?>
						
						   </center>
                        </td>
                     </tr>
					
					   <?php } } ?>
                  </tbody>
               </table>
            </div>
         </div>
		 
		
      </div>
   </div>

</form>

<script>
   $(function () {
     $("#trop_request").DataTable();
	 $("#trop").DataTable();
   });
</script>
@stop