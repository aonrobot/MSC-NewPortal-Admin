@extends('admin.admin_template') @section('content')
<!-- Main Content -->


   <form class="form-horizontal" method="GET" action="<?=asset('/admin/menu/update')?>">
<div class="container-fluid">   
<?php 
foreach($menu as $menu1){
?>
            <h3><i class="fa fa-newspaper-o" aria-hidden="true"> <INPUT name="sum" TYPE="submit" VALUE="Save" class="btn btn-success" > 
			 Title <input type="text" name="title" size="8" value="<?Php echo $menu1->menu_title;?>" ></i></h1>
			 <?php } ?>	
                <input type="text" name="mid"  value="<?php echo $mid?>" hidden>
			
            <h5> 
			 <div class="row">
	
<?php 
foreach($menuitem as $menuitem1){
?>
														 
<div class="col-sm-12 col-md-12">
													
                                                             Name
                                                              <input type="text" name="item_name[]"  size="15" value="<?Php echo $menuitem1->item_name;?>"  @if($menuitem1->item_type=="template")style="background-color:gray;" readonly @endif />
                                                             Type
                                                             <select name="type[]">
                                                                   <option>category</option>
                                                                   <option>post</option>
                                                             </select>
                                                             	
                                                              <select name="type_name[]">
                                                                   <option>category</option>
                                                                   <option>post</option>
                                                             </select>
															  Link
														      <input type="text" name="link[]"  value="<?php echo $menuitem1->item_link;?>"size="12">
													         Description
															 <input type="text" name="description[]" size="15" value="<?php echo $menuitem1->item_description;?>">
															 image
															 <input type="text" name="image[]" value="<?php echo $menuitem1->item_image;?>"size="12">
															 Icon
                                                              <input type="text" name="icon[]" value="<?php echo $menuitem1->item_icon;?>"size="12">
                                                              <input type="text" name="txt[]"style="background-color:gray;" size="12" readonly>
															  Sort
															  <input type="text" name="sort[]" size="3" value="<?php echo $menuitem1->item_sort;?>">
														@if($menuitem1->item_type!="template")
										         <a href="<?=asset('/admin/menu/delitem/') ?><?php echo '/'.$menuitem1->mtid;?><?php echo ','.$mid;?>"class="btn btn-danger" role="button" style="height:30px">
                                                     	X</a>
												     	@endif
													
                                                     </div>
													
													 	 <br> <br>
                                                     
                                                          <?php  
                                                          }
                                                          ?>

<div id="ctrl-exmple" ng-controller="menu.edit as menu">
 

 <button ng-click="menu.addMenu()"   type="button"class="btn btn-primary">+</button> 

  
                                   <ul ng-repeat="contact in menu.contacts">
								  <div class="col-sm-12 col-md-12" style="margin:10px";>
                                              <li>
                                                           Name
                                                              <input type="text" name="item_name2[]" size="12">
                                                             Type
                                                             <select name="type2[]">
                                                                   <option>category</option>
                                                                   <option>post</option>
                                                             </select>
																	
                                                              <select name="name4[]">
                                                                   <option>phone20</option>
                                                                   <option>email1</option>
                                                             </select>						
															  Link
														     <input type="text" name="link1[]"   size="12">
															  Description
															 <input type="text" name="description1[]"  size="15">
															  image
															 <input type="text" name="image1[]" size="12">
															  Icon
                                                              <input type="text" name="icon1[]"size="12">
                                                              <input type="text" name="txt1[]" style="background-color:gray;" size="12" >
															  Sort
															  <input type="text" name="sort1[]" size="3">
															  
                                                     		  <button type="button" ng-click="menu.del(contact)" class="btn btn-danger" role="button">X</button>	
														
														  </li>
														  	         </div>
														  </div>
														  
									</ul>														  
          </div>                    

</div>

   
	</form>
@stop
