@extends('admin.admin_template') @section('content')
<!-- Main Content -->
<form class="form-horizontal" method="POST" action="<?=asset('/admin/slide/update')?>">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
   <div class="container-fluid">
    <h2><i class="fa  fa-edit" aria-hidden="true"></i> Slide Edit</h2>
      <h4>
		  Name <input type="text" name="slide_name" size="12" value="<?Php echo $slide1[0]->slide_name; ?>" >
		  Slide_speed : <input type="text" name="slide_speed" size="12" value="<?Php echo $slide1[0]->slide_speed; ?>" >
		  Slide_delay : <input type="text" name="slide_delay" size="12" value="<?Php echo $slide1[0]->slide_delay; ?>" >
		  @if($settingtrop[0]->trop_name)
		  Trop_Name : <input type="text" name="" size="12" value="<?Php echo $settingtrop[0]->trop_name; ?>" readonly >
		  @endif
		  <button TYPE="submit" class="btn btn-success"  onclick="return confirm('Are you sure you want to update slide?')"> <span class="glyphicon glyphicon-floppy-disk"></span></button>
		   <input type=button value="Refresh"class="btn btn-primary"  onClick="javascript:location.reload();">
     </h4>
      <input type="text" name="item_id1"  value="<?php echo $item_id ?>" hidden/>
      <h5>
         <div class="row">
		  <div  class="box box-info">
		   <table id="menu_table" class="table table-bordered">
			   <thead>
			    <tr>
				   <th><center>Name</center></th>
                        <th><center>Imge</center></th>
                        <th><center>Link</center></th>
                        <th><center>Title</center></th>
						<th><center>Subtitle</center></th>
						<th><center>Content</center></th>
						<th><center>Sort</center></th>
						<th></th>
				  </tr>
               </thead>
			  <tbody>
            <?php
foreach ($item_slide as $item_slide1) {
	?>
			   <tr>
			   <td width="10%"><center>

               <input type="text" name="item_name[<?Php echo $item_slide1->slide_item_id; ?>][]"  size="15" value="<?Php echo $item_slide1->slide_item_name; ?>">
               </center>
			   </td>

			   <td  width="20%">
			   <center>

            <!-- Image ID -->
            <img id="image{{$item_slide1->slide_item_id}}" src="{{asset($item_slide1->slide_item_img_url)}}" width="100%">
            <br><br>
            @if($menuitem1->item_type!="template" or  $menutype!="trop")

               <span class="btn btn-primary fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                        <span> Choose new image</span>

                        <!-- Upload Btn ID -->
                        <input class="slideImageUpload" id="{{$item_slide1->slide_item_id}}" type="file" name="files">
                </span>
               <!-- Progress ID -->
               <div id="progress{{$item_slide1->slide_item_id}}" class="progress">
                    <div class="progress-bar progress-bar-success"></div>
                </div>

            @endif

            <!-- Input File Name ID -->
            <input id="imageInput{{$item_slide1->slide_item_id}}" type="hidden" type="text" name="item_url[<?Php echo $item_slide1->slide_item_id; ?>][]"  size="15" value="<?Php echo $item_slide1->slide_item_img_url; ?>"/>

			   </center>
			   </td>
			   <td align="center">

			   <input type="text" name="item_link[<?Php echo $item_slide1->slide_item_id; ?>][]"  size="15" value="<?Php echo $item_slide1->slide_item_content_link; ?>">

			   </td>
			   <td align="center">

			   <input type="text" name="item_title[<?Php echo $item_slide1->slide_item_id; ?>][]"  size="15" value="<?Php echo $item_slide1->slide_item_title; ?>">
			   </td>
			   <td align="center">

               <input type="text" name="item_subtitle[<?Php echo $item_slide1->slide_item_id; ?>][]"  size="15" value="<?Php echo $item_slide1->slide_item_subtitle; ?>">
			   </td>
			   <td align="center">

               <textarea class="ckeditor" type="text" name="item_content[<?Php echo $item_slide1->slide_item_id; ?>][]"  size="15" >{{$item_slide1->slide_item_content}}</textarea>
			   </td>
			   <td align="center">

               <input type="text" name="item_sort[<?Php echo $item_slide1->slide_item_id; ?>][]"  size="15" value="<?Php echo $item_slide1->slide_item_sort; ?>">
			   </td>
			   <td align="center">
               <a href="<?=asset('/admin/slide/delitem/')?><?php echo '/' . $item_slide1->slide_item_id; ?><?php echo ',' . $item_id; ?>"class="btn btn-danger" role="button" style="height:30px"
			   onclick="return confirm('Are you sure you want to Delete ::<?php echo $item_slide1->slide_item_name ?>?')">
               <span class="glyphicon glyphicon-remove"></span></a>
               </td>
               </tr>
            <?php
}
?>
			    </tbody>
				</table>
			</div>
            <div id="ctrl-exmple" ng-controller="menu.edit as menu">
               <button ng-click="menu.addMenu()" id="addbutton" type="button"class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></button> 
               <ul ng-repeat="contact in menu.contacts">

               <div class="col-sm-12 col-md-12" style="margin:10px";>
			   Name
               <input type="text" name="item_name_in[]"  size="15" value="">
              
               <button type="button" ng-click="menu.del(contact)" class="btn btn-danger" role="button">
               <span class="glyphicon glyphicon-remove"></span></button>
                     </div>


               </ul>
            </div>
         </div>

      </h5>
   </div>
</form>
<script type="text/javascript">
   $(function() {


      var slideId = {{Request::segment(4)}};
      var url = '/newportal/admin/upload/slide/' + slideId;

      $('.slideImageUpload').click(function(){
         $('#progress'+$(this).attr('id')+' .progress-bar').css('width','0%');
         var id = $(this).attr('id');
      });

      $('.slideImageUpload').fileupload({
           url: url,
           dataType: 'json',
           done: function (e, data) {
               $.each(data.result.files, function (index, file) {
                   $('#imageInput'+e['target']['id']).val('/uploads/slide/' + slideId + '/image/' + file.name);
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


   });
   // //jQuery(document).ready(function($) {
   //	$("[id='type_name']").chained("[id='type']");
   //	});

</script>
@stop