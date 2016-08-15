@extends('admin.admin_template')
@section('content')
<div class="box box-info" ng-controller="dashboard.index">
    <div class="box-header with-border">
        <h3 class="box-title">Dashboard</h3>
	 <select id="mark" name="mark">
	  <option value="">--</option>
	  <option value="bmw">BMW</option>
	  <option value="audi">Audi</option>
	</select>
	<select id="series" name="series">
	  <option value="">--</option>
	  <option value="series-3" class="bmw">3 series</option>
	  <option value="series-5" class="bmw">5 series</option>
	  <option value="series-6" class="bmw">6 series</option>
	  <option value="a3" class="audi">A3</option>
	  <option value="a4" class="audi">A4</option>
	  <option value="a5" class="audi">A5</option>
	</select>
    </div>
    <!-- /.box-header -->
</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		alert('444');
		$("#series").chained("#mark");
	});
</script>

@stop


