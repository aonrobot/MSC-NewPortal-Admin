@extends('front_template') @section('head_image')
<header class="intro-header-empty">
</header>
@stop
@section('content')
	<style>
		.cd-main-content{
			width: 1250px;
		}
		iframe{
			overflow-x:hidden;
			border: 0px;
			height: 800px;
		}
		body{
			 overflow-y:hidden;
		}
	</style>
	<script>
		$(function(){

		});
	</script>

    <iframe id="purchase_frame" src="http://appmsc.metrosystems.co.th/mscportal/purchase.php?iframe=true" width="100%" height="100%"></iframe>


@stop