<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="../plugins/croppic/croppic.css" rel="stylesheet">
	
	<style type="text/css">
		#yourId {
			width: 880px;
			height: 200px;
			position:relative; /* or fixed or absolute */
		}
	</style>
</head>
<body>

<div id="yourId"></div>

<script type="text/javascript" src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="../plugins/croppic/croppic.js"></script>

<script type="text/javascript">
	
	var cropperOptions = {
		uploadUrl:'img_save_to_file.php',
		cropUrl:'img_crop_to_file.php',
		modal:true
	}		
		
	var cropperHeader = new Croppic('yourId', cropperOptions);

</script>

</body>
</html>

