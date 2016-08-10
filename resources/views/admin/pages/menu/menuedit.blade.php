@extends('admin.admin_template') @section('content')
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-md-15">
            <h1><i class="fa fa-newspaper-o" aria-hidden="true"> <INPUT name="sum" TYPE="submit" VALUE="Save"> </i></h1>
            <hr>
            <h1> 
<?php 
                                                          foreach($menuitem as $menuitem1){
                                                          ?>
                                                          <div>
                                                           Name
                                                              <input type="text" name="name1[]">
                                                             Type
                                                             <select name="type[]">
                                                                   <option>phone20</option>
                                                                   <option>email1</option>
                                                             </select>
                                                             
                                                              <select name="name2[]">
                                                                   <option>phone20</option>
                                                                   <option>email1</option>
                                                             </select>
                                                          </div>  
                                                          <br>
                                                          <?php  
                                                          }
                                                          ?>
<br>
<div id="ctrl-exmpl" ng-controller="menu.edit as menu">
 
<button ng-click="menu.greet()">greet</button><br/>
 <button ng-click="menu.addMenu()"   type="button">+</button> 
<br>
<br>

  
                                   <div ng-repeat="contact in menu.contacts">
                                                                        <div col-md-"12" >
                                                           Name
                                                              <input type="text" name="name3[]">
															  </div>
															  <div>
                                                             Type
                                                             <select name="type2[]">
                                                                   <option>phone20</option>
                                                                   <option>email1</option>
                                                             </select>
																	
                                                              <select name="name4[]">
                                                                   <option>phone20</option>
                                                                   <option>email1</option>
                                                             </select>
															 	 </div>
																 <div>
															  Name
                                                              <input type="text" name="name3[]">
															  </div>
															  <div>
															   Name
                                                              <input type="text" name="name3[]">
                                                          </div>                          
                                </div>
</div>
</div>

        </div>
  
    
    </div>
@stop
