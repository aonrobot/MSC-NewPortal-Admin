@extends('admin.admin_template') @section('content')
<input type="hidden" id="trop_id" value="{{ Session::get('trop_id') }}">
<!-- Main Content -->
<form class="form-horizontal" method="POST" action="<?=asset('/admin/menu/update')?>">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
   <div class="container-fluid">
<h2><i class="fa  fa-edit" aria-hidden="true"></i> Menu Edit</h2>
      <h4>

	     <?php
foreach ($menu as $menu1) {
	$menutype = $menu1->menu_type;
	?>

		 Name : <input type="text" name="menu_name" size="12" value="<?Php echo $menu1->menu_name; ?>" >
		 Title : <input type="text" name="title" size="13" value="<?Php echo $menu1->menu_title; ?>" >
	     <?php }?>
		 @if($template_name)
		    Template Name : <input type="text" name="title" size="13" value="<?Php echo $template_name; ?>" disabled >
	     @endif
        </i>
      </h4>

      <input type="text" name="mid"  value="<?php echo $mid ?>" hidden>
      <h5>
         <div class="row">
		 <div  class="box box-info">

			  <table id="menu_table" class="table table-bordered">
			   <thead>
			      <tr height="20" valign="bottom">
				<th colspan="6">
			    <center><font size="5">
				Item List
				</font>
				</center>
				</th>
				 </tr>
               </thead>
			  <tbody>

            <?php
foreach ($menuitem as $menuitem1) {
	?>
			  <tr>
			  <td width="10%"><center>
               Name
               <input type="text" name="item_name[<?Php echo $menuitem1->mtid; ?>][]"  size="15" value="<?Php echo $menuitem1->item_name; ?>"  @if($menuitem1->item_type=="template" and  $menutype=="trop")style="background-color:gray;" readonly @endif />
			   </center>
			   </td>
			   <td width="18%">
			   <center>
               Type
               <select id="type" name="type[<?Php echo $menuitem1->mtid; ?>][]" class="type" style="width: 80px" >
			   <?php $check_link = explode("/", $menuitem1->item_link);?>
                  <option value="">--</option>
                  <option value="category" <?php if ($check_link[0] == "category") {echo "selected";}?>>Category</option>
                  <option value="post_option" <?php if ($check_link[0] == "post") {echo "selected";}?>>Post</option>
				  <option value="trop" <?php if ($check_link[0] == "trop") {echo "selected";}?>>Trop</option>
                  <option value="other"<?php if ($check_link[0] == "http:") {echo "selected";}?>>Other</option>
               </select>

               <select id="type_name" name="type_name[<?Php echo $menuitem1->mtid; ?>][]" class="series" style="width: 70px">
                  <option value="A">--</option>
                  <?php foreach ($category as $category1) {?>
                  <option value="<?php echo $category1->catid; ?>" class="category" <?php if ($check_link[0] == "category" and $check_link[1] == $category1->catid) {echo "selected";}?>>
				  <?php echo $category1->cat_name; ?></option>
                  <?php }?>
                  <?php foreach ($post as $post1) {?>
                  <option value="<?php echo $post1->pid; ?>" class="post_option" <?php if ($check_link[0] == "post" and $check_link[1] == $post1->pid) {echo "selected";}?>>
				  <?php echo $post1->post_name; ?></option>
                  <?php }?>
				   <?php foreach ($trop1 as $trop0) {?>
                  <option value="<?php echo $trop0->tid; ?>" class="trop" <?php if ($check_link[0] == "trop" and $check_link[1] == $trop0->tid) {echo "selected";}?>><?php echo $trop0->trop_name; ?></option>
                  <?php }?>
                  <option value="B" class="other"><?php echo $menuitem1->item_link; ?> </option>
               </select>

			   <input id="link" type="text" name="link[<?Php echo $menuitem1->mtid; ?>][]"  value="<?php echo $menuitem1->item_link; ?>"size="12" >
			   </center>
			   </td>

			   <td width="18%">

               Description
               <input type="text" name="description[<?Php echo $menuitem1->mtid; ?>][]" size="40" value="<?php echo $menuitem1->item_description; ?>"@if($menuitem1->item_type=="template" and  $menutype=="trop")style="background-color:gray;" readonly @endif />

			   </td>
			   <td width="15%">
			   <center>

				<img id="image{{$menuitem1->mtid}}" src="{{asset($menuitem1->item_image)}}" width="20%"> <!-- Image ID -->

				@if($menuitem1->item_type!="template" or  $menutype!="trop")

				<span class="btn btn-primary fileinput-button" >
                    <i class="glyphicon glyphicon-plus"></i>
                        <span> Choose new image</span>
                        <input class="menuImageUpload" id="{{$menuitem1->mtid}}" type="file" name="files"> <!-- Upload Btn ID -->
                </span><br><br>

                <div id="progress{{$menuitem1->mtid}}" class="progress"> <!-- Progress ID -->
                    <div class="progress-bar progress-bar-success"></div>
                </div>

                @endif

               	<input id="imageInput{{$menuitem1->mtid}}" type="hidden" type="text" name="image[<?Php echo $menuitem1->mtid; ?>][]" value="<?php echo $menuitem1->item_image; ?>" size="18"/> <!-- Input File Name ID -->


			   </center>
			   </td>
			   <td width="10%">
			   <center>
               Icon
               <input type="text" name="icon[<?Php echo $menuitem1->mtid; ?>][]" value="<?php echo $menuitem1->item_icon; ?>"size="12" @if($menuitem1->item_type=="template" and  $menutype=="trop")style="background-color:gray;" readonly @endif />
			   </center>
			   </td>
			   <td width="5%">
			   <center>
			   Sort
               <input type="text" name="sort[<?Php echo $menuitem1->mtid; ?>][]" size="3" value="<?php echo $menuitem1->item_sort; ?>"@if($menuitem1->item_type=="template" and  $menutype=="trop")style="background-color:gray;" readonly @endif />
			   </center>
			   </td>

			   </tr>


            <?php
}
?>
			    </tbody>
			   </table>

			   </div>

            <div id="ctrl-exmple" ng-controller="menu.edit as menu">
               <button ng-click="menu.addMenu()" id="addbutton" type="button"class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></button> <button TYPE="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to update?')"> <span class="glyphicon glyphicon-floppy-disk"></span></button>
			   <a href="<?=asset('/admin/menu/listitemdel/')?><?php echo '/' . $mid; ?>">
			   <button class="btn btn-danger"   type="button" style="height:33px" ><span class="glyphicon glyphicon-trash" ></span> </font></button>
			   </a>
               <ul ng-repeat="contact in menu.contacts">


                     <div class="col-sm-12 col-md-12" style="margin:10px";>
					  <h3>
                        Name
                        <input type="text" name="item_name2[]" size="30">


                        <button type="button" ng-click="menu.del(contact)" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-remove"></span></button>
					 </h3>
                     </div>


               </ul>
            </div>
         </div>
   </div>
   </h5>
</form>

    <script>
	    //$('[id="type"]').click(function(){
	      $('[id="link"]').hide(500);
	    	$('[id="type"]').each(function(index){
	    		var el_index = index;
				if($('[id="type"]:eq('+ el_index +')').val()=='other')
				{
					$('[id="link"]:eq('+ el_index +')').show(500);
				    $('[id="type_name"]:eq('+ el_index +')').hide(500);
				}

	    		$(this).change(function(){
	    			if($(this).val() != 'other'){
	    				$('[id="link"]:eq('+ el_index +')').hide(500);
						$('[id="type_name"]:eq('+ el_index +')').show(500);
	    			}
	    			else{
	    				$('[id="link"]:eq('+ el_index +')').show(500);
						$('[id="type_name"]:eq('+ el_index +')').hide(500);
	    			}
	    		});
	    	});


	    //});
    </script>
<script type="text/javascript">
   $(function() {

   $(".series").each(function()  {
   	$(this).chained($(".type", $(this).parent()));
   	});

   });

   var tropId = $('#trop_id').val().split('/');
   var objectId = {{Request::segment(4)}};
   var object = "menu";
   var url = '/newportal/admin/upload/thumbnail/' + object + '/' + tropId + '/' + objectId;

   $('.menuImageUpload').click(function(){
   	$('#progress'+$(this).attr('id')+' .progress-bar').css('width','0%');
   	var id = $(this).attr('id');
   });
   $('.menuImageUpload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('#imageInput'+e['target']['id']).val('/uploads/trop/' + tropId + '/' + object + '/' + objectId + '/thumbnail/' + file.name);
                $('#image'+e['target']['id']).attr('src',file.url)
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress'+$(this).attr('id')+' .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');



   // //jQuery(document).ready(function($) {
   //	$("[id='type_name']").chained("[id='type']");
   //	});

</script>

@stop