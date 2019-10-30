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
                            <div class="col-lg-4 col-xl-4">
                                <form id="picForm">
                                    <div class="card-box text-center">
                                        <h5 class="mb-4 text-uppercase">Profile picture</h5>
                                    <?php
                                        if($user->image==''){
                                    ?>
                                        <img src="<?php echo base_url(); ?>assets1/images/users/user-icon.png" class="rounded-circle" alt="profile-image" height="230px">
                                    <?php } ?>
                                    <?php
                                        if($user->image!=''){
                                    ?>
                                        <img src="<?php echo base_url(); ?>assets1/images/users/<?php echo $user->image?>" class="rounded-circle" alt="profile-image" height="230px">
                                    <?php } ?>
                                    <input type="hidden" name="pic_id" id="pic_id" value="<?php echo $user->id?>">
                                    <br><br><input type="submit" id="updatePicture" name="updatePicture" value="Set profile picture" class="btn btn-blue">
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-8 col-xl-8">
                                <div class="card-box">
                                        <div class="tab-pane" id="settings">
                                            <div class="alert alert-success" style="display:none"></div>
                                            <div class="alert alert-danger" style="display:none"></div>
                                            <form id="profileForm" action="" method="post">
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="useremail">Email Address *</label>
                                                            <input type="email" readonly="true" class="form-control" id="useremail" value="<?php echo $user->email?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="user_name">Username *</label>
                                                            <input type="username" readonly="true" class="form-control" id="username" value="<?php echo $user->username?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="firstname">First Name *</label>
                                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name" value="<?php echo $user->first_name?>">
                                                            <span class="text-danger first_name"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastname">Last Name *</label>
                                                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name" value="<?php echo $user->last_name?>">
                                                            <span class="text-danger last_name"></span>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="userphone">Phone number *</label>
                                                            <input type="phone_no" class="form-control" name="phone_number" id="phone_number" placeholder="Enter phone number" value="<?php echo $user->phone_number?>">
                                                            <span class="text-danger phone_number"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="usergender">Gender</label>
                                                            <div class="gender">
                                                                <select name="gender" id="gender" class="form-control">
                                                                <?php 
                                                                    if($user->gender=='male'){
                                                                ?>
                                                                    <option value="male">Male</option>
                                                                    <option value="female">Female</option>
                                                                <?php } ?>
                                                                <?php 
                                                                    if($user->gender=='female'){
                                                                ?>
                                                                    <option value="female">Female</option>
                                                                    <option value="male">Male</option>
                                                                <?php } ?>
                                                                <?php 
                                                                    if($user->gender==''){
                                                                ?>
                                                                    <option value=""></option>
                                                                    <option value="male">Male</option>
                                                                    <option value="female">Female</option>
                                                                <?php } ?>
                                                                </select> 
                                                            </div>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->                                               
                                                <div class="text-right">
                                                    <input type="hidden" name="profile_id" id="profile_id" value="<?php echo $user->id?>">
                                                    <input type="submit" id="updateProfile" name="updateProfile" value="Update" class="btn btn-blue update_pro">
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end settings content-->

                                    </div> <!-- end tab-content -->
                                </div> <!-- end card-box-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->
                <?php $this->load->view('dashboard/footer'); ?>
<div id="picModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" action="" id="pic_form" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Set profile picture</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label>Profile picture</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <span id="pic_uploaded_image"></span><span class="text-danger image"></span>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="picture_id" id="picture_id">
                    <input type="submit" name="action" id="action" value="Submit" class="btn btn-sm btn-blue">
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function(){
        $(document).on('submit', '#picForm', function(event){
            event.preventDefault();
            var id=$('#pic_id').val();
            $('#picModal').modal('show');
            $('#picture_id').val(id);
        });
        $(document).on('submit', '#pic_form', function(e){
            e.preventDefault();
            var extension=$('#image').val().split('.').pop().toLowerCase();
            var result = '';

            if(jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1)
            {
                $('.image').text('*Please choose file select a picture!');
                //remove it if invalid
                $('#image').val('');
            }
            else{
                $('.image').text('');
                result +='1';
            }
            if(result=='1')
            {
                $.ajax({
                    url:baseDir + 'dashboard/dashboard/update_profile_picture',
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success: function(data){
                        $('#pic_form')[0].reset();
                        $('#picModal').modal('hide');
                        window.location.href = "<?php echo base_url(); ?>dashboard/dashboard/profile";
                    }
                });
            }
        });
        $(document).on('submit', '#profileForm', function(e){
            e.preventDefault();
            var profile_id = $('#profile_id').val();
            var Firstname = $('#first_name').val();
            var Lastname = $('#last_name').val();
            var Phone = $('#phone_number').val();
            
            var result = '';
            if(Firstname==''){
                $('.first_name').text('* First name is required!')
            }
            else{
                $('.first_name').text('');
                result +='1';
            }
            if(Lastname==''){
                $('.last_name').text('* Last name is required!')
            }
            else{
                $('.last_name').text('');
                result +='2';
            }
            if(Phone==''){
                $('.phone_number').text('* Phone number is required!')
            }
            else{
                $('.phone_number').text('');
                result +='3';
            }
            if(result=='123')
            {
                $.ajax({
                    url:baseDir + 'dashboard/dashboard/update_profile_details',
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success: function(data){
                        $('.alert-success').html('Personal details updated successfully.').fadeIn().delay(6000).fadeOut('slow');
                    },
                    error: function()
                    {
                        $('.alert-danger').html('An error has occured. Please try again.').fadeIn().delay(5000);
                    }
                });
            }

        });
    });
</script>

