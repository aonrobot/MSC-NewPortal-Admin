@extends('admin.admin_template') @section('content')
<div ng-controller="post.create">
    <!-- form start -->
    <form role="form">
        <!-- Step 1 -->
        <h3>Step 1 | Select Your Template <small>Please Choose Your Template By Check Radio Button</small></h3>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Template 1 <input type="radio" name="r1" class="minimal" checked></h3>
                    </div>
                    <div class="box-body">
                        <img src="<?=asset('pages/admin/content/images/template1.png')?>" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Template 2 <input type="radio" name="r1" class="minimal"></h3>
                    </div>
                    <div class="box-body">
                        <img src="<?=asset('pages/admin/content/images/template1.png')?>" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Template 3 <input type="radio" name="r1" class="minimal"></h3>
                    </div>
                    <div class="box-body">
                        <img src="<?=asset('pages/admin/content/images/template1.png')?>" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- Step 2 -->
        <h3>Step 2 | Fill Post Data & Finish <small>If you don't have any data you can don't fill it.</small></h3>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">General</h3>
                    </div>
                    <div class="box-body ">
                        <div class="form-group">
                            <label>Post Title</label>
                            <input type="text" class="form-control input-lg" placeholder="Enter ..." ng-model="title">
                        </div>
                        <div class="form-group">
                            <label>Post Name</label>
                            <input type="text" class="form-control" placeholder="Enter ..." value="<%title%>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Post Description</label>
                            <input type="text" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Post Status</label>
                            <select class="form-control">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Post Type</label>
                            <select class="form-control">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Component</h3>
                    </div>
                    <div class="box-body ">
                        <div class="form-group">
                            <label>
                                <h4><b>Content</b></h4></label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>
                                <h4><b>Image</b></h4></label>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <addimagebutton></addimagebutton>
                                </div>
                                <div class="col-md-10">
                                    <div id="chooseImageZone">
                                    </div>
                                </div>
                            </div>
                            <!--/.row-->
                        </div>
                    </div>
                </div>
            </div>
            <!--/. col-md-12-->
        </div>
        <!-- /.row -->
        <h3>Step 3 | Choose Category & Finish <small>Choose category what you want.</small></h3>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Choose Category</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputName" class="control-label">Category Name</label>
                            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                <option>Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Create New Post Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-md-->
        </div>
        <!--/.row-->
    </form>
</div>
<script type="text/javascript">
</script>
@stop
