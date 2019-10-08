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
                                            <li class="breadcrumb-item active">Team</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Team</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <button id="addButton" type="button" data-toggle="modal" data-target="#teamModal" class="btn btn-sm btn-success waves-effect waves-light float-right">
                                        <i class="mdi mdi-plus-circle"></i> Add team
                                    </button>
                                    <h4 class="header-title mb-4">Manage team</h4>
                                    <div class="alert alert-success" style="display:none"></div>  
                                </div>
                            </div><!-- end col -->
                        <?php
                            foreach ($teams as $key => $val) { 
                        ?>
                            <div class="col-md-6 col-xl-3">
                                <div class="card-box product-box">
                                    <div class="product-action">
                                        <a class="btn btn-success btn-xs waves-effect waves-light update" id="<?=$val['id']?>"><i class="mdi mdi-pencil"></i></a>
                                        <a class="btn btn-danger btn-xs waves-effect waves-light delete" id="<?=$val['id']?>"><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <div>
                                        <img src="<?php echo base_url(); ?>assets/images/team/<?=$val['image']?>" alt="product-pic" class="img-fluid" />
                                    </div>
                                    <div class="product-info">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4 class="m-0"><?=$val['full_name']?></h4>
                                                <p class="m-0"><?=$val['role']?></p>
                                                <span class="badge bg-soft-danger text-danger"><?=$val['status']?></span>
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
<div id="teamModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" action="getData" id="team_form" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add team member</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label for="name" class="label-control">Full name</label>
                    <input type="text" name="full_name" id="full_name" class="form-control"><span class="text-danger full_name"></span> <br/>
                    <label>Image</label>
                    <input type="file" name="image" id="image">
                    <span id="team_uploaded_image"></span><br/> <span class="text-danger image"></span><br/>
                    <label>Role</label>
                    <input type="text" name="role" id="role" class="form-control"><span class="text-danger role"></span> <br/>
                    <label>Facebook link</label>
                    <input type="text" name="facebook" id="facebook" class="form-control"><span class="text-danger facebook"></span> <br/>
                    <label>Twitter account</label>
                    <input type="text" name="twitter" id="twitter" class="form-control"><span class="text-danger twitter"></span> <br/>
                    <label>Instagram</label>
                    <input type="text" name="instagram" id="instagram" class="form-control"><span class="text-danger instagram"></span>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="team_id" id="team_id">
                    <input type="submit" name="action" id="action" value="Add" class="btn btn-sm btn-success">
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" language="javascript">
    $(function(){
        $(document).on('submit', '#team_form', function(event){
            event.preventDefault();
            var Name = $('#full_name').val();
            var extension = $('#image').val().split('.').pop().toLowerCase();
            var Role = $('#role').val();
            var Facebook = $('#facebook').val();
            var Twitter = $('#twitter').val();
            var Instagram = $('#instagram').val();

            var result='';

            if(Name=='')
            {
                $('.full_name').text('*Name field is required!');
            }
            else{
                $('.full_name').text('');
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
            if(Role=='')
            {
                $('.role').text('*Role field is required!');
            }
            else{
                $('.role').text('');
                result +='3';
            }
            if(Facebook=='')
            {
                $('.facebook').text('*Facebook field is required!');
            }
            else{
                $('.facebook').text('');
                result +='4';
            }
            if(Twitter=='')
            {
                $('.twitter').text('*Twitter field is required!');
            }
            else{
                $('.twitter').text('');
                result +='5';
            }
            if(Instagram=='')
            {
                $('.instagram').text('*Instagram field is required!');
            }
            else{
                $('.instagram').text('');
                result +='6';
            }
            if(result == '123456')
            {
                $.ajax({
                    url:baseDir + 'dashboard/dashboard/team_action',
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                        if(data)
                        {
                            if($('#team_id').val()!= '')
                            {
                                $('#team_form')[0].reset();
                                $('#teamModal').modal('hide');
                                $('.alert-success').html('Member details updated successfully!').fadeIn().delay(5000).fadeOut('slow');
                                dataTable.ajax.reload();
                            }
                            else{
                                $('#team_form')[0].reset();
                                $('#teamModal').modal('hide');
                                $('.alert-success').html('Member details added successfully!').fadeIn().delay(5000).fadeOut('slow');
                            }
                        }
                        else{
                            alert('error');
                        }
                    },
                    error:function()
                    {
                        alert('Unable to add team!');
                    }
                });
            }
        });
        $(document).on('click', '#addButton', function(){
            $('#team_form' ).each(function(){
                this.reset();
            });
            $('#team_uploaded_image').html('');                    
            $('.modal-title').text("Add team member");
            $('#action').val("Add");   
            $('#team_id').val('');    
        });
        $('.update').click(function(){
            var team_id=$(this).attr("id");
            $.ajax({
                url:baseDir + 'dashboard/dashboard/fetch_single_team',
                method:"POST",
                data:{team_id, team_id},
                dataType:"json",
                success:function(data){
                    $('#teamModal').modal('show');
                    $('#full_name').val(data.full_name);
                    $('#team_uploaded_image').html(data.image);
                    $('#role').val(data.role);
                    $('#facebook').val(data.facebook);
                    $('#twitter').val(data.twitter);
                    $('#instagram').val(data.instagram);
                    $('.modal-title').text("Edit member details");
                    $('#team_id').val(team_id);
                    $('#action').val("Edit");

                }
            });
        });
        $(document).on('click', '.delete', function(){
            var team_id=$(this).attr("id");
            if(confirm("Are you sure you want to delete?"))
            {
                $.ajax({
                    url:baseDir + 'dashboard/dashboard/delete_team',
                    method:'POST',
                    data:{team_id: team_id},
                    success: function(data){
                        $('.alert-success').html('Member details deleted successfully!').fadeIn().delay(5000).fadeOut('slow');
                    }
                });
            }
            else{
                return false;
            }
        });
    });
</script>