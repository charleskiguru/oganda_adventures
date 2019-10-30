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
                            <div class="col-lg-6 col-xl-6">
                                <div class="card-box">
                                        <div class="tab-pane" id="settings">
                                            <div class="alert alert-success" style="display:none"></div>
                                            <div class="alert alert-danger" style="display:none"></div>
                                            <form id="passwordForm" action="" method="post">
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-lock"></i>  Change Password</h5>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="oldpassword">Old Password *</label>
                                                            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter old password">
                                                            <span class="text-danger old_password"></span>
                                                        </div>
                                                    </div>
                                                </div> <!-- end row -->
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="newpassword">New Password *</label>
                                                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password">
                                                            <span class="text-danger new_password"></span>
                                                        </div>
                                                    </div>
                                                </div> <!-- end row -->
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="conformpassword">Confirm Password *</label>
                                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter confirm password">
                                                            <span class="text-danger confirm_password"></span>
                                                        </div>
                                                    </div>
                                                </div> <!-- end row -->                                                 
                                                <div class="text-center">
                                                    <input type="hidden" name="old_pass" id="old_pass" value="<?php echo $user->password?>">
                                                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user->id?>">
                                                    <input type="submit" id="changePassword" name="changePassword" value="Change Password" class="btn btn-blue change_pass">
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
<script>
    $(function(){
        $(document).on('submit', '#passwordForm', function(e){
            e.preventDefault();
            var Password = $('#old_pass').val();
            var user_id = $('#user_id').val();
            var Oldpass = $('#old_password').val();
            var Newpass = $('#new_password').val();
            var Confirmpass = $('#confirm_password').val();
            
            var result = '';
            if(Oldpass.trim()==''){
                $('.old_password').text('* This field is required.')
            }
            else{
                $('.old_password').text('');
                result +='1';
            }
            if(Newpass.trim()==''){
                $('.new_password').text('* This field is required.')
            }
            else{
                $('.new_password').text('');
                result +='2';
            }
            if(Confirmpass.trim()==''){
                $('.confirm_password').text('* This field is required.')
            }
            else{
                $('.confirm_password').text('');
                result +='3';
            }
            if(result=='123')
            {
                if(Newpass == Confirmpass){
                    $('.confirm_password').text('');
                    $.ajax({
                        url:baseDir + 'dashboard/dashboard/change_pass',
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success: function(data){
                            alert(data);
                            $('#passwordForm')[0].reset();
                            //$('.alert-success').html('Personal details updated successfully.').fadeIn().delay(6000).fadeOut('slow');
                        },
                        error: function()
                        {
                            $('.alert-danger').html('An error has occured. Please try again.').fadeIn().delay(5000);
                        }
                    });
                }
                else{
                    $('.confirm_password').text('* Password does not match.')
                }
            }

        });
    });
</script>

