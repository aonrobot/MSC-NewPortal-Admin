@extends('admin.admin_template')
@section('content')
<form action="<?=asset('/admin/role/edit')?>" method="get">
   <div class="row metrop-row-content">
      <div class="col-md-12">
	   <h2><i class="fa  fa-edit" aria-hidden="true"></i> Role {{$rolename->name}}</h2>

             <ol class="breadcrumb" style="background-color:white" >
            <font color="black">
            <div>
                Permissions Add 
               <select name="perid[]" class="form-control select2" multiple="multiple"  data-placeholder="Select a permission" style="width: 80%;">
                  <?php 
                     error_reporting(E_ALL ^ E_NOTICE);
                     			 foreach($select_per as $per){ 	
                     			  $i=0;
                     			 foreach($show_per_role as $per_role){
                                  if($per->id==$per_role->permission_id)
                     		     {$i=$i+1;} 	
                     			 }
                     			 if($i==0){
                     ?>
                  <option value="<?php echo  $per->id ?>"><?php echo  $per->display_name?></option>
                  <?php
                     }  }
                     ?>
               </select>
			 
               
               <INPUT name="sum" TYPE="submit" VALUE="Update" class="btn btn-success" onclick="return confirm('Are you sure you want to update?')" >
            </div>
			
                
           
			<input value="<?php  echo $role_id;?>" name="idrole" type="hidden" >

</ol>
</form>
<form action="<?=asset('/admin/role/delPermissions')?>" method="get">

<input value="<?php  echo $role_id;?>" name="idrole" type="hidden" >
<h2> </h2><label>

<input type="checkbox" id="chkall1"/> Select all</label>


<div  class="box box-info">
  <div class="box-body">
 <table id="table_category" class="table table-bordered">
 <thead>
<tr>
<th><center>Id</center></th>
<th><center>Display</center></th>
<th><center>Name</center></th>
<th><center>Description</center></th>

</tr>
 </thead>
<tbody>
<?php
   foreach($show_per_role as $show){
   ?>
   
<tr>
<td><center><input style="margin-right:12px;" type="checkbox" class="chk1" name="rela_id[]" value="<?php echo $show->id ?>"><?php echo $show->id?></center></td>
<td><center><?php echo $show->display_name?></center></td>
<td><center><?php echo $show->name?></center></td>
<td><center><?php echo $show->description?></center></td>


</tr>
<?php };?>
<tbody>
</table>
<font color="white">
<button class="btn btn-danger"  TYPE="submit"  style="height:33px" onclick="return confirm('Are you sure you want to delete?')"><span class="glyphicon glyphicon-trash"></span>
Delete</font></button>

</div>
</div>

</div>
</div>
</form>



<form action="<?=asset('/admin/role/insert/employee')?>" method="get">

<input value="<?php  echo $role_id;?>" name="idrole" type="hidden" >
<h2>Employee List </h2>
 <ol class="breadcrumb" style="background-color:white" >
            <font color="black">
            <div>
              
			   Employee Add 
               <select name="emp_id[]" class="form-control select2" multiple="multiple"  data-placeholder="Select a Employee" style="width: 80%;">
                  <?php 
                     error_reporting(E_ALL ^ E_NOTICE);
                     			 foreach($employer_list as $emp){ 	
                     			  $i=0;
                     			 foreach($role_user as $per_role){
                                  if($emp->EmpCode==$per_role->EmpCode)
                     		     {$i=$i+1;} 	
                     			 }
                     			 if($i==0){
							     $em = App\MainEmployee::where('EmpCode', '=', $emp->EmpCode)->first()
                     ?>
					 
                  <option value="<?php echo  $emp->emid ?>">[{{$em->EmpCode}}] {{$em->FirstNameEng}} {{$em->LastNameEng}}</option>
                  <?php
                     }  }
                     ?>
					 
               </select>
               
               <INPUT name="sum" TYPE="submit" VALUE="Update" class="btn btn-success"  onclick="return confirm('Are you sure you want to update?')" >
            </div>
			
                
           
			<input value="<?php  echo $role_id;?>" name="idrole" type="hidden" >

</ol>
</form>
<form action="<?=asset('/admin/role/delPermissions')?>" method="get">
<input value="<?php  echo $role_id;?>" name="idrole" type="hidden" >
<label><input type="checkbox" id="chkall2"/>Select all</label>

<div  class="box box-info">
  <div class="box-body">
 <table id="table_employee" class="table table-bordered">
 <thead>
<tr>
<th><center>Employee Id</center></th>
<th><center>FullName</center></th>
<th><center>NickName</center></th>

</tr>
 </thead>
<tbody>
<?php
   foreach($role_user as $show){
	     $em = App\MainEmployee::where('EmpCode', '=', $show->EmpCode)->first()
   ?>
   
<tr>
<td><center><input style="margin-right:12px;" type="checkbox" class="chk2" name="empcheck[]" value="<?php echo $show->employee_id ?>">[{{$em->EmpCode}}]</center></td>
<td><center>{{$em->FirstNameEng}}   {{$em->LastNameEng}}</center></td>
<td><center>{{$em->NickName}}</center></td>


</tr>
<?php };?>
<tbody>
</table>
<font color="white">
<button class="btn btn-danger"  TYPE="submit"  style="height:33px" onclick="return confirm('Are you sure you want to delete?')"><span class="glyphicon glyphicon-trash"></span>
Delete</font></button>

</div>
</div>
</form>
<script>
   $(function () {
     $("#table_category").DataTable();
	 $("#table_employee").DataTable();
	 $("#chkall1").change(function () {
	   console.log($(this).prop("id"));
       $("input.chk1").prop('checked', $(this).prop("checked"));
	 });
	 $("#chkall2").change(function () { 
	   $("input.chk2").prop('checked', $(this).prop("checked"));
	 });
	 
   });
</script>
</div>
</div>

@stop