@extends('admin.admin_template')
@section('content')
<form action="<?=asset('/admin/employee/update')?>" method="get">
   <div class="row metrop-row-content">
      <div class="col-md-8">
         <h2><?php  $em = App\MainEmployee::where('EmpCode', '=' , $em_id[0]->EmpCode)->first() ;
            echo $em->FullNameEng;
            ?></h2>
         <div class="box-body">
            <div class="form-group">
               <label for="exampleInputEmail1">...</label>
               <input type="email" class="form-control" id="exampleInputEmail1" placeholder="edit">
            </div>
            <div class="form-group">
               <label for="exampleInputPassword1">...</label>
               <input type="password" class="form-control" id="exampleInputPassword1" placeholder="edit">
            </div>
            <div class="form-group">
              	<span class="btn btn-primary fileinput-button" >
                    <i class="glyphicon glyphicon-plus"></i>
                        <span> Choose new image</span>
                        <input class="menuImageUpload" id="" type="file" name="files"> <!-- Upload Btn ID -->
                </span><br><br>

                <ol class="breadcrumb" >
			
                   Setting   <select name="role_setting">
					<option value="">-------------</option>
						<?php
							foreach($role as $roles){
							error_reporting(E_ALL ^ E_NOTICE);
						?>
				<option value="<?php echo  $roles->id?>"<?php if($roles->id == $role_select[0]->role_id) echo"selected"; ?>><?php echo $roles->name?></option>
            <?php                      }?>
         </select> 
		 <INPUT class="btn btn-success" TYPE="submit" VALUE="update" onclick="return confirm('Are you sure you want to update?')">
		  <input value="<?php echo $em_id[0]->emid ?>" name="eid" type="hidden">
                </ol>
				
            </div>
         </div>
         <!-- /.box-body -->
         <br>
         <h3>
            Trop List
         </h3>
         <table class="table table-bordered">
            <tr>
               <th><center>ID</th>
               <th><center>Trop Name</th>
               <th><center>Type</th>
               <th><center>Status</th>
               <th><center></th>
            </tr>
            <?php
               foreach($trop_em as $trop_list){
               ?>
            <tr>
               <center>
			  
               <td align="center" ><?php echo $trop_list->tid?></td>
               <td align="center" ><?php echo $trop_list->trop_name?></td>
               <td align="center" ><?php echo $trop_list->trop_type?></td>
               <td align="center" ><?php echo $trop_list->trop_status?></td>
               <td align="center" ><a href="<?=asset('/admin/employee/setting/') ?><?php echo '/'.$trop_list->emid;?>"> Del</a> </td>
            </tr>
            <?php };?>
         </table>
</form>
</div>
</div>
@stop