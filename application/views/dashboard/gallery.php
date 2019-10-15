<?php $this->load->view('dashboard/head'); ?>
<?php $this->load->view('dashboard/top-bar'); ?>
<?php $this->load->view('dashboard/left-bar'); ?>

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Gallery</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Gallery</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <!-- Filter -->
                        <div class="row">
                            <div class="alert alert-success" style="display:none"></div>  
                            <div class="col-12">
                                <button id="addImage" type="button" data-toggle="modal" data-target="#imageModal" class="btn btn-sm btn-success waves-effect waves-light float-right">
                                    <i class="mdi mdi-plus-circle"></i> Add Image
                                </button>
                                <button id="addVideo" type="button" data-toggle="modal" data-target="#videoModal" class="btn btn-sm btn-blue waves-effect waves-light float-center">
                                    <i class="mdi mdi-plus-circle"></i> Add Video
                                </button><hr>
                            </div>
                            <div class="col-12">
                                <div class="text-center filter-menu">
                                    <a href="javascript: void(0);" class="filter-menu-item active" data-rel="all">All</a>
                                    <a href="javascript: void(0);" class="filter-menu-item" data-rel="images">Images</a>
                                    <a href="javascript: void(0);" class="filter-menu-item" data-rel="videos">Video</a>
                                </div>
                            </div>
                        </div>
                        <!-- end row-->

                        <div class="row filterable-content">
                        <?php
                            foreach ($gallery_images as $key => $val) {
                        ?>
                            <div class="col-sm-6 col-xl-3 filter-item all images">
                                <div class="card-box product-box">
                                    <div class="product-action">
                                        <a class="btn btn-success btn-xs waves-effect waves-light imageUpdate" id="<?=$val['id']?>"><i class="mdi mdi-pencil"></i></a>
                                        <a class="btn btn-danger btn-xs waves-effect waves-light imageDelete" id="<?=$val['id']?>"><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo base_url(); ?>assets/images/gallery/<?=$val['image']?>" class="image-popup" title="<?=$val['description']?>">
                                            <img src="<?php echo base_url(); ?>assets/images/gallery/<?=$val['image']?>" alt="work-thumbnail" width="200px">
                                        </a><br/><br/>
                                    </div>
                                    <div class="gall-info">
                                    <?php
                                        if($val['status']=='active'){
                                    ?>
                                        <h4 class="font-16 mt-0"><?=$val['description']?>&nbsp;&nbsp;&nbsp;<span class="badge bg-soft-info text-success"><?=$val['status']?></span></h4>
                                    <?php } ?>
                                    <?php
                                        if($val['status']=='inactive'){
                                    ?>
                                    <h4 class="font-16 mt-0"><?=$val['description']?>&nbsp;&nbsp;&nbsp;<span class="badge bg-soft-warning text-danger"><?=$val['status']?></span></h4>
                                    <?php } ?>
                                    </div> <!-- gallery info -->
                                </div> <!-- end gal-box -->
                            </div> <!-- end col -->
                        <?php } ?>
                        <?php
                            foreach ($gallery_videos as $key => $v_val) {
                        ?>
                            <div class="col-sm-6 col-xl-3 filter-item all videos">
                                <div class="card-box product-box">
                                    <div class="product-action">
                                        <a class="btn btn-success btn-xs waves-effect waves-light videoUpdate" id="<?=$v_val['id']?>"><i class="mdi mdi-pencil"></i></a>
                                        <a class="btn btn-danger btn-xs waves-effect waves-light videoDelete" id="<?=$v_val['id']?>"><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <figure class="image-popup">
						                <iframe width="200" src="<?=$v_val['youtube_link']?>" frameborder="0" allowfullscreen></iframe>			
					                </figure>
                                    <div class="gall-info">
                                        <h4 class="font-16 mt-0"><?=$v_val['description']?></h4>
                                    </div> <!-- gallery info -->
                                </div> <!-- end gal-box -->
                            </div> <!-- end col -->
                        <!-- end row -->
                        <?php } ?>
                    </div> <!-- container -->

                </div> <!-- content -->
                <?php $this->load->view('dashboard/footer'); ?>
<div id="imageModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" action="getData" id="image_form" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add image to gallery</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label>Image</label>
                    <input type="file" name="image" id="image">
                    <span id="modal_uploaded_image"></span><br/> <span class="text-danger image"></span><br/>
                    <label>Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea> <span class="text-danger description"></span>
                    <label>Status</label>
                    <div class="status">
                        <select name="status" class="form-control" type="hidden">
                            <option value="inactive">Inactive</option>
                            <option value="active">Active</option>
                        </select> 
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="image_id" id="image_id">
                    <input type="submit" name="action" id="action" value="Add" class="btn btn-sm btn-success">
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="videoModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" action="getData" id="video_form" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title title">Add video to gallery</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label for="link" class="label-control">Youtube link</label>
                    <input type="text" name="y_link" id="y_link" class="form-control"><span class="text-danger y_link"></span> <br/>
                    <label>Description</label>
                    <textarea name="v_description" id="v_description" class="form-control"></textarea> <span class="text-danger v_description"></span>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="video_id" id="video_id">
                    <input type="submit" name="action_v" id="action_v" value="Add" class="btn btn-sm btn-success">
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" language="javascript">
    $(function(){
        $(document).on('submit', '#image_form', function(event){
            event.preventDefault();
            var extension = $('#image').val().split('.').pop().toLowerCase();
            var Description = $('#description').val();

            var result='';

            if(jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1)
            {
                $('.image').text('*Image field is required!');
                //remove it if invalid
                $('#image').val('');
            }
            else{
                $('.image').text('');
                result +='1';
            }
            if(Description=='')
            {
                $('.description').text('*Description field is required!');
            }
            else{
                $('.description').text('');
                result +='2';
            }
            if(result == '12')
            {
                $.ajax({
                    url:baseDir + 'dashboard/dashboard/image_action',
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                        if(data)
                        {
                            if($('#image_id').val()!= '')
                            {
                                $('#image_form')[0].reset();
                                $('#imageModal').modal('hide');
                                window.location.href = "<?php echo base_url(); ?>dashboard/dashboard/gallery";
                                $('.alert-success').html('Image updated into the gallery!').fadeIn().delay(5000).fadeOut('slow');
                            }
                            else{
                                $('#image_form')[0].reset();
                                $('#imageModal').modal('hide');
                                window.location.href = "<?php echo base_url(); ?>dashboard/dashboard/gallery";
                                $('.alert-success').html('Image inserted into the gallery!').fadeIn().delay(5000).fadeOut('slow');
                            }
                        }
                        else{
                            alert('error');
                        }
                    },
                    error:function()
                    {
                        alert('Unable to add slider!');
                    }
                });
            }
        });
        $(document).on('submit', '#video_form', function(event){
            event.preventDefault();
            var Ylink = $('#y_link').val();
            var Description = $('#v_description').val();

            var result='';

            if(Ylink=='')
            {
                $('.y_link').text('*Youtube link is required!');
            }
            else{
                $('.y_link').text('');
                result +='1';
            }
            if(Description=='')
            {
                $('.v_description').text('*Description field is required!');
            }
            else{
                $('.v_description').text('');
                result +='2';
            }
            if(result == '12')
            {
                $.ajax({
                    url:baseDir + 'dashboard/dashboard/video_action',
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                        if(data)
                        {
                            if($('#video_id').val()!= '')
                            {
                                $('#video_form')[0].reset();
                                $('#videoModal').modal('hide');
                                window.location.href = "<?php echo base_url(); ?>dashboard/dashboard/gallery";
                                $('.alert-success').html('Video updated into the gallery!').fadeIn().delay(5000).fadeOut('slow');
                            }
                            else{
                                $('#video_form')[0].reset();
                                $('#videoModal').modal('hide');
                                window.location.href = "<?php echo base_url(); ?>dashboard/dashboard/gallery";
                                $('.alert-success').html('Video inserted into the gallery!').fadeIn().delay(5000).fadeOut('slow');
                            }
                        }
                        else{
                            alert('error');
                        }
                    },
                    error:function()
                    {
                        alert('Unable to add slider!');
                    }
                });
            }
        });
        $(document).on('click', '#addImage', function(){
            $('#image_form' ).each(function(){
                this.reset();
            });
            $('#modal_uploaded_image').html('');                    
            $('.modal-title').text("Add gallery image");
            $('#action').val("Add");   
            $('#image_id').val('');   
        });
        $(document).on('click', '.imageUpdate', function(){
            var image_id = $(this).attr("id");
            $.ajax({
                method:'POST',
                url:baseDir + 'dashboard/dashboard/fetch_single_image_gallery',
                data:{image_id, image_id},
                dataType:'json',
                success: function(data){
                    $('#imageModal').modal('show');
                    $('#modal_uploaded_image').html(data.image);
                    $('#description').val(data.description);
                    $('#image_id').val(image_id);
                    $("div.status select").val(data.status);
                    $('.modal-title').text('Edit gallery image');
                    $('#action').val('Edit');
                },
                error: function(){
                    alert('Unable to update image');
                }
            });
        });
        $(document).on('click', '.videoUpdate', function(){
            var video_id = $(this).attr("id");
            $.ajax({
                method:'POST',
                url:baseDir + 'dashboard/dashboard/fetch_single_video_gallery',
                data:{video_id, video_id},
                dataType:'json',
                success: function(data){
                    $('#videoModal').modal('show');
                    $('#y_link').val(data.youtube_link);
                    $('#v_description').val(data.description);
                    $('#video_id').val(video_id);
                    $('.title').text('Edit gallery video');
                    $('#action_v').val("Edit");
                 }
                // error: function(){
                //     alert('Unable to update video');
                // }
            });
        });
        $(document).on('click', '#addVideo', function(){
            $('#video_form' ).each(function(){
                this.reset();
            });
            $('#modal_uploaded_image').html('');                    
            $('.modal-title').text("Add gallery image");
            $('#action_v').val("Add");   
            $('#video_id').val('');   
        });
        $(document).on('click', '.imageDelete', function(){
            var image_id=$(this).attr("id");
            if(confirm("Are you sure you want to delete?"))
            {
                $.ajax({
                    url:baseDir + 'dashboard/dashboard/delete_gallery_image',
                    method:'POST',
                    data:{image_id: image_id},
                    success: function(data){
                        window.location.href = "<?php echo base_url(); ?>dashboard/dashboard/gallery";
                        $('.alert-success').html('Image details deleted successfully!').fadeIn().delay(5000).fadeOut('slow');
                    }
                });
            }
            else{
                return false;
            }
        });
        $(document).on('click', '.videoDelete', function(){
            var video_id=$(this).attr("id");
            if(confirm("Are you sure you want to delete?"))
            {
                $.ajax({
                    url:baseDir + 'dashboard/dashboard/delete_gallery_video',
                    method:'POST',
                    data:{video_id: video_id},
                    success: function(data){
                        window.location.href = "<?php echo base_url(); ?>dashboard/dashboard/gallery";
                        $('.alert-success').html('Video details deleted successfully!').fadeIn().delay(5000).fadeOut('slow');
                    }
                });
            }
            else{
                return false;
            }
        });
    });
</script>