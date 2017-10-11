@extends('admin.admin_template') @section('content')
<!--
<style>

html {
    /* IE */
    filter: progidXImageTransform.Microsoft.BasicImage(grayscale=1);
    /* Chrome, Safari */
    -webkit-filter: grayscale(1);
    /* Firefox */
    filter: grayscale(1);
    filter: grayscale(100%);
    filter: gray; 
    -moz-filter: grayscale(100%);
    -webkit-filter: grayscale(100%);
}

</style>
-->
<script>
// IE 10 only CSS properties
var ie10Styles = [
'msTouchAction',
'msWrapFlow'];

var ie11Styles = [
'msTextCombineHorizontal'];

/*
* Test all IE only CSS properties
*/

var d = document;
var b = d.body;
var s = b.style;
var brwoser = null;
var property;

// Tests IE10 properties
for (var i = 0; i <ie10Styles.length; i++) {
    property = ie10Styles[i];
    if (s[property] != undefined) {
        brwoser = "ie10";
    }
}

// Tests IE11 properties
for (var i = 0; i <ie11Styles.length; i++) {
    property = ie11Styles[i];
    if (s[property] != undefined) {
        brwoser = "ie11";
    }
}

 //Grayscale images only on browsers IE10+ since they removed support for CSS grayscale filter
 if(brwoser == "ie10" || brwoser == "ie11" ){
    $('body').addClass('ie11'); // Fixes marbin issue on IE10 and IE11 after canvas function on images
    $('.grayscale img').each(function(){
        var el = $(this);
        el.css({"position":"absolute"}).wrap("<div class='img_wrapper' style='display: inline-block'>").clone().addClass('img_grayscale ieImage').css({"position":"absolute","z-index":"5","opacity":"0"}).insertBefore(el).queue(function(){
            var el = $(this);
            el.parent().css({"width":this.width,"height":this.height});
            el.dequeue();
        });
        this.src = grayscaleIe(this.src);
    });

    // Quick animation on IE10+ 
    $('.grayscale img').hover(
        function () {
            $(this).parent().find('img:first').stop().animate({opacity:1}, 200);
        }, 
        function () {
            $('.img_grayscale').stop().animate({opacity:0}, 200);
        }
    );

    // Custom grayscale function for IE10 and IE11
    function grayscaleIe(src){
        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');
        var imgObj = new Image();
        imgObj.src = src;
        canvas.width = imgObj.width;
        canvas.height = imgObj.height; 
        ctx.drawImage(imgObj, 0, 0); 
        var imgPixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
        for(var y = 0; y <imgPixels.height; y++){
            for(var x = 0; x <imgPixels.width; x++){
                var i = (y * 4) * imgPixels.width + x * 4;
                var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;
                imgPixels.data[i] = avg; 
                imgPixels.data[i + 1] = avg; 
                imgPixels.data[i + 2] = avg;
            }
        }
        ctx.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
        return canvas.toDataURL();
    };
 };
</script>
<!-- Main Content -->
<form class="form-horizontal" method="POST" action="<?=asset('/admin/menu/delall')?>">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
   <div class="container-fluid">
<h2><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> Menu Delete</h2>
      <h4>
         
	     <?php
foreach ($menu as $menu1) {
	$menutype = $menu1->menu_type;
	?>

		 Name : <input type="text" name="menu_name" size="12" value="<?Php echo $menu1->menu_name; ?>" disabled>
		 Title : <input type="text" name="title" size="13" value="<?Php echo $menu1->menu_title; ?>" disabled>

	     <?php }?>
		 @if($template_name)
		    Template Name : <input type="text" name="title" size="13" value="<?Php echo $template_name; ?>" disabled >
	     @endif
        </i>
	    <button TYPE="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to Delete?')"> <span class="glyphicon glyphicon-trash" ></span> Delete</button>
      </h4>

      <input type="text" name="mid"  value="<?php echo $mid ?>" hidden>
      <h5>
         <div class="row">
		 <div  class="box box-info">

			  <table id="menu_table" class="table table-bordered">
			   <thead>
			    <tr>
						<th></th>
						<th><center>Name</center></th>
                        <th><center>Type</center></th>
                        <th><center>Description</center></th>
                        <th><center>Image</center></th>
						<th><center>Icon</center></th>
						<th><center></th>
						<th></th>
						<th></th>
				  </tr>
               </thead>
			  <tbody>

            <?php
foreach ($menuitem as $menuitem1) {
	?>
			  <tr>
			  <td><center>
			   @if($menuitem1->item_type!="template" or $menutype!="trop" )
               <input type="checkbox" name="item_id[]" value="<?php echo $menuitem1->mtid ?>">
			   @endif
			 
			  </center>
			  </td>
			  <td><center>
               Name
               <input type="text" name="item_name[<?Php echo $menuitem1->mtid; ?>][]"  size="15" value="<?Php echo $menuitem1->item_name; ?>"  @if($menuitem1->item_type=="template" and  $menutype=="trop")style="background-color:gray;" readonly @endif />
			   </center>
			   </td>
			   <td>
			   <center>
               Type
               <select id="type" name="type[<?Php echo $menuitem1->mtid; ?>][]" class="type" style="width: 80px" >
			   <?php $check_link = explode("/", $menuitem1->item_link);?>
                  <option value="">--</option>
                  <option value="category" <?php if ($check_link[0] == "category") {  echo"selected"; } ?>>Category</option>
                  <option value="post_option" <?php if ($check_link[0] == "post")  { echo "selected"; } ?>>Post</option>
				  <option value="trop" <?php if ($check_link[0] == "trop") {echo "selected"; }?>>Trop</option>
                  <option value="other"<?php  if ($check_link[0] == "http:"){echo  "selected";} ?>>Other</option>
               </select>
			   
               <select id="type_name" name="type_name[<?Php echo $menuitem1->mtid; ?>][]" class="series" style="width: 70px">
                  <option value="A">--</option>
                  <?php foreach ($category as $category1) {?>
                  <option value="<?php echo $category1->catid; ?>" class="category" <?php if ($check_link[0] == "category" and $check_link[1] == $category1->catid){echo "selected";}?>>
				  <?php echo $category1->cat_name; ?></option>
                  <?php }?>
                  <?php foreach ($post as $post1) {?>
                  <option value="<?php echo $post1->pid; ?>" class="post_option" <?php if ($check_link[0] == "post" and $check_link[1] == $post1->pid){echo "selected";}?>>
				  <?php echo $post1->post_name; ?></option>
                  <?php }?>
				   <?php foreach ($trop1 as $trop0) {?>
                  <option value="<?php echo $trop0->tid; ?>" class="trop" <?php if ($check_link[0] == "trop" and $check_link[1] == $trop0->tid){echo "selected";}?>><?php echo $trop0->trop_name; ?></option>
                  <?php }?>
                  <option value="B" class="other"><?php echo $menuitem1->item_link; ?> </option>
               </select>
			   
			   <input id="link" type="text" name="link[<?Php echo $menuitem1->mtid; ?>][]"  value="<?php echo $menuitem1->item_link; ?>"size="12" >
			   </center>
			   </td>

			   <td>
			   <center>
               Description
               <input type="text" name="description[<?Php echo $menuitem1->mtid; ?>][]" size="15" value="<?php echo $menuitem1->item_description; ?>"@if($menuitem1->item_type=="template" and  $menutype=="trop")style="background-color:gray;" readonly @endif />
			   </center>
			   </td>
			   <td>
			   <center>
          
			   <img id="image{{$menuitem1->mtid}}" src="{{asset($menuitem1->item_image)}}" width="20%">
           
			   </center>
			   </td>
			   <td>
			   <center>
               Icon
               <input type="text" name="icon[<?Php echo $menuitem1->mtid; ?>][]" value="<?php echo $menuitem1->item_icon; ?>"size="12" @if($menuitem1->item_type=="template" and  $menutype=="trop")style="background-color:gray;" readonly @endif />
			   </center>
			   </td>
			   <td>
			   <center>
               <input type="text" name="txt[<?Php echo $menuitem1->mtid; ?>][]" size="12"@if($menuitem1->item_type=="template" and  $menutype=="trop")style="background-color:gray;" readonly @endif />
			   </center>
               </td>
			   <td>
			   <center>
			   Sort
               <input type="text" name="sort[<?Php echo $menuitem1->mtid; ?>][]" size="3" value="<?php echo $menuitem1->item_sort; ?>"@if($menuitem1->item_type=="template" and  $menutype=="trop")style="background-color:gray;" readonly @endif />
			   </center>
			   </td>
			   <td>
			   <center>
               @if($menuitem1->item_type!="template" or $menutype!="trop" )
               <a href="<?=asset('/admin/menu/delitem/')?><?php echo '/' . $menuitem1->mtid; ?><?php echo ',' . $mid; ?>"class="btn btn-danger" role="button" style="height:30px"
		       onclick="return confirm('Are you sure you want to Delete :: <?php echo  $menuitem1->item_name?> ?')">
               <span class="glyphicon glyphicon-remove"></span></a>
			      
			   @else
				 <font color="red"><b>Template</b></font>
               @endif
			   </center>
               </td>
			   </tr>


            <?php
}
?>
			    </tbody>
			   </table>
 <a href="<?=asset('/admin/menu/edit/') ?><?php echo '/'.$mid;?>"> 
			   </div>
<button class="btn btn-primary"   type="button" style="height:33px"> 
						   <span class="glyphicon glyphicon-arrow-left"></span></font>
						   </button>
						   </a>
      
         </div>
   </div>
   </h5>
</form>

    <script>
	    //$('[id="type"]').click(function(){

	       $('[id="link"]').hide(500);		   
	    	$('[id="type"]').each(function(index){
	    		var el_index = index;
				
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
			
			
			$('[id="type_new1"]').each(function(index){
	    		var el_index = index;
				
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


   function select2(){
   //alert('before each');
   		var i = 0;
   		//console.log($(".object_new"));
                     $(".object_new").each(function()  {

   			 //alert($('.object_new').size());
   			 //alert(i);
   			 if(i+1 == $('.object_new').size()){
   				 //alert('ok');

   				$(this).chained($(".type_new", $(this).parent()));
   				return false;
   			 }

   			i++;
   		});
   }



   // //jQuery(document).ready(function($) {
   //	$("[id='type_name']").chained("[id='type']");
   //	});

</script>

@stop