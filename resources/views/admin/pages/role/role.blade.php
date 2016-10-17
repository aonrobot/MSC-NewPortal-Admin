@extends('admin.admin_template')
@section('content')
<?php $trop_tid = Session::get('trop_id');?>
<form action="<?=asset('/admin/role/insert')?>" method="get">
   <div class="row">
      <div class="col-md-12">
	  <h2><i class="fa fa-clone" aria-hidden="true"></i> Setting Role </h2>
	     <ol class="breadcrumb" style="background-color:white" >
            <li class="active"><font color="black">
			Role Name <input value="" name="Role_Name"  maxlength="100">
			Display Name<input value="" name="Display_Name"  maxlength="100">
			Description<input value="" name="Description"  maxlength="100">
			<INPUT  TYPE="submit" VALUE="Create" class="btn btn-success" style="height:30px" onclick="return confirm('Are you sure you want to create Role?')">
			</li>
         </ol>
      
		 
    <!--    <ol class="breadcrumb" style="background-color:white">
		 <font color="black">
            <li class="active"> 
			  
			  
           
		   
			
             </li>
			</font>
           </ol> -->
	   
         <br>

		 
     <div  class="box box-info">
         
			  <div class="box-body">
         <table id="category" class="table table-bordered">
		  <thead>
            <tr class="w3-blue">
               <th><center>Id</th>
               <th><center>Name</th>
               <th><center>Display_Name</th>
               <th><center>Description</th>
               <th></th>
            </tr>
	      </thead>
	       <tbody>
		
		   <?php 
			foreach($role as $roles){
				   
               ?>  
			   
            <tr>
               <td><center><?php echo $roles->id?></td>
               <td><center><?php echo $roles->name?></center></td>      
               <td><center><?php echo $roles->display_name?></center></td>
               <td> <center><?php echo $roles->description?></td>
				<td>
                  <center>  
				  <a href="<?=asset('/admin/role/showedit/') ?><?php echo '/'.$roles->id;?>">
				  <button class="btn btn-default"  type="button" style="background-color:white;height:33px"><span class="glyphicon glyphicon-pencil"></span>
				 edit 
				  </button>
				  </a>
				
				  </center>
               </td>
            </tr>			
		   <?php  	};?>
		 
           
			
	       </tbody>
		</table>
			</div>
          </div>
		

		 
      </div>
   </div>
</form>

<!-- /.row -->
<script>
   $('#trop_select').hide('500');
   		$('#type_select').click(function(){
   			$(this).val();
   			if($(this).val()=="administrator"){
   	     $('#trop_select').hide('500');
   			}
   			else
   			{
   				$('#trop_select').show('500');
   			}
   		});
   
    
    
     
</script>
<script>
  $(function () {
    $("#category").DataTable();
    $("#category_admin").DataTable();
  });
</script>
@stop
