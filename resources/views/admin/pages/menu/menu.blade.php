@extends('admin.admin_template')
@section('content')
<?php $trop_tid = Session::get('trop_id'); ?>
<form action="<?=asset('/admin/menu/insert')?>" method="get">
<div class="row metrop-row-content">
      <div class="col-md-11">
         <h3><i class="fa  fa-th" aria-hidden="true"></i> Create Menu</h3>
         <ol class="breadcrumb"  style="background-color:white">
            <li class="active">
               <font color="black">Menu Name <input value="" name="name1"> 
               Title			
               <input value="" name="title"> 	
			   @if($trop_tid=='0')     
               Type 
               <select name="type1" id="typeselect">
                  <option value="template">template</option>
                  <option value="menubar">menubar</option>
                  <option value="trop">trop</option>
               </select>
               @endif
			   @if($trop_tid!='0')
				   <input value="trop" name="type1" type="hidden">
			   @endif
             <!-- <select name="trop" id="tropselect">
                  <?php
                     foreach($trops as $trops1){
                      ?> 
                  <option value="<?php echo $trops1->tid ?>"><?php echo  $trops1->trop_Name ?></option>
                  <?php }
                     ?>
                 </select> -->
               <INPUT class="btn btn-success" TYPE="submit" VALUE="Create" style="height:30px" onclick="return confirm('Are you sure you want to create menu?')">
			   </font>
            </li>
         </ol>
 <?php 

if ($trop_tid=="0") {?>
  <div  class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Department Menu</h3>
            </div>
            <div  class="box-body">
            <table id="menubar" class="table table-bordered table-hover">
			<thead>
               <tr>
			   <th><center>Menubar_id</center></th>
               <th><center>Menubar_name</center></th>
               <th><center>Menubar_type</center></th>
               <th><center></center></th>
               </tr>
			   </thead>
			   <tbody>
               <?php
                  foreach($menu2 as $menu2){
               ?>
               <tr>
                  <td><center><?php echo $menu2->mid?> </td>
                  <td><center><?php echo $menu2->menu_name?></td>
                  <td><center><?php echo $menu2->menu_type?></td>
                  <td><center>
				  <a href="<?=asset('/admin/menu/edit/') ?><?php echo '/'.$menu2->mid;?>"> 
				  <button class="btn btn-default btn-sm" style="background-color:white;height:33px"  type="button"><span class="glyphicon glyphicon-pencil"></span> Edit</button> </a> 
				  
				  <a href="<?=asset('/admin/menu/del/') ?><?php echo '/'.$menu2->mid;?>"> 
				  <button class="btn btn-danger"  type="button" style="height:33px" onclick="return confirm('Are you sure you want to Delete :: <?php echo  $menu2->menu_name?> ?')"><span class="glyphicon glyphicon-trash"></span> Delete</button></a></center>
                  </td>
               </tr>
               <?php };?>
			   </tbody>
            </table>
			</div>
			</div>


       <div  class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Template List</h3>
            </div>
        <div  class="box-body">
          
            <table id="menu_template" class="table table-bordered table-hover">
			<thead>
               <tr>
			   <th><center>Template_id</center></th>
               <th><center>Template_name</center></th>
               <th><center>Template_type</center></th>
               <th><center></center></th>
               </tr>
			 </thead>
		    <tbody>
               <?php
                  foreach($menu0 as $menu0){
                  ?>
				   @if($menu0->menu_type == 'template')  <tr>   @elseif ($menu0->menu_type == 'templatedefault')
					    <tr bgcolor="#98FB98"> @endif
				  
			   <td><center>@if($menu0->menu_type == 'templatedefault')<font size="3" color="green"><span class="glyphicon glyphicon-ok"> @endif<?php echo $menu0->mid?></td>
               <td><center><?php echo $menu0->menu_name?></</td>
               <td><center><?php echo $menu0->menu_type?></td>
               <td>
                     <center> 
					 <a href="<?=asset('/admin/menu/default/') ?><?php echo '/'.$menu0->mid;?>"> @if($menu0->menu_type == 'template')
						 <button class="btn btn-default btn-sm" style="background-color:white;height:33px"  type="button"><span class="glyphicon glyphicon-plus"></span> Enable</button>    
					 @elseif ($menu0->menu_type == 'templatedefault')
                      @endif</a>
					 
                     <a href="<?=asset('/admin/menu/edit/') ?><?php echo '/'.$menu0->mid;?>">
					 <button class="btn btn-default btn-sm" style="background-color:white;height:33px"  type="button"><span class="glyphicon glyphicon-pencil"></span>  Edit </button></a> 
					 
					 <a href="<?=asset('/admin/menu/del/') ?><?php echo '/'.$menu0->mid;?>">   
					 <button class="btn btn-danger" type="button" style="height:33px" onclick="return confirm('Are you sure you want to Delete :: <?php echo  $menu0->menu_name?> ?')"><span class="glyphicon glyphicon-trash"></span> Delete</button></a>
                    
               </td>
               </tr>
               <?php };?>
			</tbody> 
            </table>
			</div>
			</div>
			
         
			
<?php } ?>			
           <div  class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Menu List</h3>
            </div>
			   <div  class="box-body">
            <table id="menu" class="table table-bordered table-hover">
			<thead>
               <tr>
			   <th><center>Mid</th>
               <th><center>Menu_name</th>
               <th><center>Menu_title</th>
               <th><center>Menu_type</th>
               <th><center>Trop_name</th>
               <th><center></th>
               </tr>
			</thead>
			   <tbody>
			    <?php if($trop_tid=="0"){?>
				 <?php
                  foreach($menu1 as $menu){			
                  ?>
               <tr>
                  <td><center><?php echo $menu->mid?></td>
                  <td><center><?php echo $menu->menu_name?></td>
                  <td><center><?php echo $menu->menu_title?></td>
                  <td><center><?php echo $menu->menu_type?></td>
                  <td><center><?php echo $menu->trop_name?></td>
                  <td><center>	 
				  
                  <a href="<?=asset('/admin/menu/edit/') ?><?php echo '/'.$menu->mid;?>"> 
				  <button class="btn btn-default btn-sm" style="background-color:white;height:33px"  type="button"><span class="glyphicon glyphicon-pencil"></span> Edit </button></a> 

				  <a href="<?=asset('/admin/menu/del/') ?><?php echo '/'.$menu->mid;?>">
                  <button class="btn btn-danger"  type="button" style="height:33px" onclick="return confirm('Are you sure you want to Delete :: <?php echo  $menu->menu_name?> ?')"><span class="glyphicon glyphicon-trash"></span> Delete</button></a></center>
				  
                  </td>
               </tr>
				<?php }};?>
				
               <?php
                  foreach($menu1 as $menu){
						
					   if($menu->tid==$trop_tid){
                  ?>
				 
               <tr>
                  <td><center><?php echo $menu->mid?></td>
                  <td><center><?php echo $menu->menu_name?></td>
                  <td><center><?php echo $menu->menu_title?></td>
                  <td><center><?php echo $menu->menu_type?></td>
                  <td><center><?php echo $menu->trop_name?></td>
                  <td><center>	 

                  <a href="<?=asset('/admin/menu/edit/') ?><?php echo '/'.$menu->mid;?>"> 
				  <button class="btn btn-default btn-sm" style="background-color:white;height:33px"  type="button"><span class="glyphicon glyphicon-pencil"></span> Edit </button></a> 

				  <a href="<?=asset('/admin/menu/del/') ?><?php echo '/'.$menu->mid;?>">
                  <button class="btn btn-danger"  type="button" style="height:33px" onclick="return confirm('Are you sure you want to Delete :: <?php echo  $menu->menu_name?> ?')"><span class="glyphicon glyphicon-trash"></span> Delete</button></a></center>
                  </td>
               </tr>
				  <?php }};?>
			   </tbody>
            </table>
   </div>
   </div>
   </div>
</div>
</form>
<script>
 $('#tropselect').hide('500');
 $('#typeselect').click(function(){
   			$(this).val();
   			if($(this).val()=="trop"){
   	     $('#tropselect').show('500');
   			}
   			else
   			{
   				$('#tropselect').hide('500');
   			}
   		});
   	
</script>
<script>
  $(function () {
    $("#menu_template").DataTable();
    $("#menubar").DataTable();
    $("#menu").DataTable();
  });
</script>

<!-- /.row -->
@stop