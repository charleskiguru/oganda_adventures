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
                                <div class="card-box text-center">
                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Profile picture</h5>
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
                                <br><br><input type="submit" id="updatePicture" name="updatePicture" value="Set profile picture" class="btn btn-blue">
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-8">
                                <div class="card-box">
                                        <div class="tab-pane" id="settings">
                                            <form id="profileForm">
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="useremail">Email Address</label>
                                                            <input type="email" readonly="true" class="form-control" id="useremail" value="<?php echo $user->email?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="user_name">Username</label>
                                                            <input type="username" readonly="true" class="form-control" id="username" value="<?php echo $user->username?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="firstname">First Name</label>
                                                            <input type="text" class="form-control" id="first_name" placeholder="Enter first name" value="<?php echo $user->first_name?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastname">Last Name</label>
                                                            <input type="text" class="form-control" id="lastname" placeholder="Enter last name" value="<?php echo $user->last_name?>">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="useremail">Phone number</label>
                                                            <input type="phone_no" class="form-control" id="phone_no" placeholder="Enter phone number" value="<?php echo $user->phone_number?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="userpassword">Change Password</label>
                                                            <input type="password" class="form-control" id="userpassword" placeholder="Enter New password">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->                                               
                                                <div class="text-right">
                                                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $user->id?>">
                                                    <button type="submit" class="btn btn-blue waves-effect waves-light update"><i class="mdi mdi-content-save"></i> Update</button>
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
    $(document).on('submit', '#profileForm', function(){
        alert('Hello Nerd');
    });
</script>

