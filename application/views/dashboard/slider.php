<?php $this->load->view('dashboard/head'); ?>
<?php $this->load->view('dashboard/top-bar'); ?>
<?php $this->load->view('dashboard/left-bar'); ?>
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
                                            <li class="breadcrumb-item active">Sliders</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Sliders</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <button id="addButton" type="button" data-toggle="modal" data-target="#sliderModal" class="btn btn-sm btn-success waves-effect waves-light float-right">
                                        <i class="mdi mdi-plus-circle"></i> Add Slider
                                    </button>
                                    <h4 class="header-title mb-4">Manage Slider images</h4>
                                    <div class="alert alert-success" style="display:none"></div>  
                                </div>
                            </div><!-- end col -->
                            <?php
                                foreach ($sliders as $key => $val) { 
                            ?>
                            <div class="col-md-6 col-xl-3">
                                <div class="card-box product-box">
                                    <div class="product-action">
                                        <a class="btn btn-success btn-xs waves-effect waves-light update" id="<?=$val['id']?>"><i class="mdi mdi-pencil"></i></a>
                                        <a class="btn btn-danger btn-xs waves-effect waves-light"><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <div>
                                        <img src="<?php echo base_url(); ?>assets/images/slider/<?=$val['image']?>" alt="product-pic" class="img-fluid" />
                                    </div>
                                    <div class="product-info">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4 class="m-0"><?=$val['title']?></h4>
                                                <p><?=$val['description']?></p>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end product info-->
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        <?php } ?>
                        </div>
                        <!-- end row -->
                </div> <!-- content -->

            <?php $this->load->view('dashboard/footer'); ?>
<div id="sliderModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" action="getData" id="slider_form" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add slider image</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label for="name" class="label-control">Image title</label>
                    <input type="text" name="title" id="title" class="form-control"><span class="text-danger title_error"></span> <br/>
                    <label>Image</label>
                    <input type="file" name="image" id="image">
                    <span id="slider_uploaded_image"></span><br/> <span class="text-danger image"></span><br/>
                    <label>Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea> <span class="text-danger description"></span>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="slider_id" id="slider_id">
                    <input type="submit" name="action" id="action" value="Add" class="btn btn-sm btn-success">
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" language="javascript">
    $(function(){
        $(document).on('submit', '#slider_form', function(event){
            event.preventDefault();
            var Title = $('#title').val();
            var extension = $('#image').val().split('.').pop().toLowerCase();
            var Description = $('#description').val();

            var result='';

            if(Title=='')
            {
                $('.title_error').text('*Description field is required!');
            }
            else{
                $('.title_error').text('');
                result +='1';
            }
            if(jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1)
            {
                $('.image').text('*Image field is required!');
                //remove it if invalid
                $('#image').val('');
            }
            else{
                $('.image').text('');
                result +='2';
            }
            if(Description=='')
            {
                $('.description').text('*Description field is required!');
            }
            else{
                $('.description').text('');
                result +='3';
            }
            if(result == '123')
            {
                $.ajax({
                    url:baseDir + 'dashboard/dashboard/slider_action',
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                        if(data)
                        {
                            if($('#slider_id').val()!= '')
                            {
                                $('#slider_form')[0].reset();
                                $('#sliderModal').modal('hide');
                                $('.alert-success').html('Slider details updated successfully!').fadeIn().delay(5000).fadeOut('slow');
                                dataTable.ajax.reload();
                            }
                            else{
                                $('#slider_form')[0].reset();
                                $('#sliderModal').modal('hide');
                                $('.alert-success').html('Slider details added successfully!').fadeIn().delay(5000).fadeOut('slow');
                                dataTable.ajax.reload();
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
        $(document).on('click', '#addButton', function(){
            $('#slider_form' ).each(function(){
                this.reset();
            });
            $('#slider_uploaded_image').html('');                    
            $('.modal-title').text("Add slider image");
            $('#action').val("Add");   
            $('#slider_id').val('');    
        });
        $('.update').click(function(){
            var slider_id=$(this).attr("id");
            $.ajax({
                url:baseDir + 'dashboard/dashboard/fetch_single_slider',
                method:"POST",
                data:{slider_id, slider_id},
                dataType:"json",
                success:function(data){
                    $('#sliderModal').modal('show');
                    $('#plan_uploaded_image').html(data.image);
                    $('#title').val(data.title);
                    $('#description').val(data.description);
                    $('.modal-title').text("Edit plan");
                    $('#slider_id').val(slider_id);
                    $('#action').val("Edit");

                }
            });
        });
    });
</script>