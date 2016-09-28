@extends('admin.admin_template')
@section('content')
{{--*/$per = new App\Library\Permission()/*--}}
<?php $em_info = Session::get('em_info');
      $assistant = ['update-assistant'];
	  $can_access = ['admin', 'owner'];

?>
<?php $trop_tid = Session::get('trop_id');?>
<form action="<?=asset('/admin/trop/editupdate')?>" method="get">
  <div class="row metrop-row-content">
      <div class="col-md-11" style="margin-left: 30px;">
 <h1><i class="fa fa-edit" aria-hidden="true"></i> Trop Setting</h1>
      <ol class="breadcrumb" style="background-color:white" >
	  @if(!$trop_tid)
		 Trop Name <input value="Newportal" name="newportal" readonly>
		 Title <input value="Portal" name="portal" style="width: 14%" readonly >
	  @else
         Trop Name <input value="<?php echo $detail1[0]->trop_name;?>" name="trop1">
		 Title <input value="<?php echo $detail1[0]->trop_title;?>" name="title1" style="width: 14%">
	  @endif
		 Slide Head 
         <select name="Slide1">
		  <option value="">-------------</option>
            <?php
               foreach($slide as $slide1){
               	error_reporting(E_ALL ^ E_NOTICE);
            ?>
            <option value="<?php echo $slide1->slide_id?>"<?php if($slide1->slide_id == $setting[0]->set_value) echo"selected"; ?> ><?php echo $slide1->slide_name?></option>
            <?php                        }?>
         </select>
		@if(!$trop_tid)
		 Slide Home 
         <select name="Slide_Home">
		  <option value="">-------------</option>
            <?php
               foreach($slide as $slide1){
               	error_reporting(E_ALL ^ E_NOTICE);
            ?>
            <option value="<?php echo $slide1->slide_id?>"<?php if($slide1->slide_id == $setting[1]->set_value) echo"selected"; ?> ><?php echo $slide1->slide_name?></option>
            <?php                        }?>
         </select>
		 Menu Setting 
         <select name="Menu1">
		 <option value="">-------------</option>
            <?php
               foreach($menuportal as $menuportal1){
               	error_reporting(E_ALL ^ E_NOTICE);
            ?>
            <option value="<?php echo $menuportal1->mid?>"<?php if($menuportal1->mid == $setting[2]->set_value) echo"selected"; ?>><?php echo $menuportal1->menu_name?></option>
            <?php                      }?>
         </select>
		 @else
		 Menu Setting 
         <select name="Menu1">
		 <option value="">-------------</option>
            <?php
               foreach($menu as $menu1){
               	error_reporting(E_ALL ^ E_NOTICE);
            ?>
            <option value="<?php echo $menu1->mid?>"<?php if($menu1->mid == $setting[1]->set_value) echo"selected"; ?>><?php echo $menu1->menu_name?></option>
            <?php                      }?>
         </select>
		
                  Status 
                  <select name="status">
                     <option value="1" selected="selected">Active</option>
                     <option value="0">Cancel</option>
                  </select> 
				  @endif
				  <INPUT class="btn btn-success" TYPE="submit" VALUE="update" onclick="return confirm('Are you sure you want to update trop?')">
				   
         </ol> 
		 <?php  
		 if($per::canrole($assistant) or $per::can($can_access)){?>	
	     <p>@if($trop_tid!='0')
		  Admin Assistant List
                 <select name="empid[]" class="form-control select2" multiple="multiple"  data-placeholder="Select a State" style="width: 30%;">
                 <?php 
                   foreach($employee as $em1){
                      $i=0;
                   foreach($troprela as $t1){ 
                         if($t1->emid==$em1->emid)
                           {$i=$i+1;} 	}
                      if($i==0){
					 $em = App\MainEmployee::where('EmpCode', '=' , $em1->EmpCode)->first()
                 ?>
            <option  value="<?php echo  $em1->emid?>">[{{$em->EmpCode}}] {{$em->FirstNameEng}} {{$em->LastNameEng}}</option>
            <?php
                         }          }
               ?>
                 </select>
				 @endif
		 <?php } ?>
	  </p>
   <div  class="box box-info">
   
        <div class="box-body">
         <input value="{{$trop_tid}}" name="idtrop" type="hidden">
    <div class="row metrop-row-content">
	
    <div class="box-body">
   <table id="trop_admin" class="table table-bordered">
     <thead>
      <tr>
         <th><center>Em_Id</th>
         <th><center>Name</th>
         <th><center></th>
      </tr>
	 </thead>


	 <tbody>
	 	 <?php if($trop_tid=='0'){?>
	    <tr>
         <td><center>{{$em_info->EmpCode}}</center></td>
         <td><center>{{$em_info->FirstNameEng}}{{$em_info->LastNameEng}}</center></td>
         <td><center>
		  Admin Trop
		</center></td>
	
      </tr>
	
	 <?php } ?>
	 
	       <?php
         foreach($troprela as $rela){
         	 $em = App\MainEmployee::where('EmpCode', '=' , $rela->EmpCode)->first()
         ?>
      <tr>
         <td><center>{{$em->EmpCode}}</center></td>
         <td><center>{{$em->FullNameEng}}</center></td>
         <td><center>
		 <?php if($rela->user_level==3){ echo "Admin Trop";} 
		 else {?>
		 <a href="<?=asset('/admin/trop/deladmin/') ?><?php echo '/'.$rela->trop_rela_id;?>"><font color="white">
	     <button class="btn btn-danger"   type="button" style="height:33px" onclick="return confirm('Are you sure you want to delete ::{{$em->FullNameEng}} ?')">
		 <span class="glyphicon glyphicon-trash"></span>
		  Delete</font>
		 </button></a></center></td>
		 <?php }?>
      </tr>
	
		 <?php }?>
    </tbody>  
   </table>
     </div>
    </div>
   </div>
  

</div>

</div>
</div>

</form>
<script>
   $(function () {
     $("#trop_admin").DataTable();
	
   });
</script>
@stop