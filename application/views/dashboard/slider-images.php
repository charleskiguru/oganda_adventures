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
                                            <li class="breadcrumb-item active">Slider images</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Slider images</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-xl-4">
                                <!-- Portlet card -->
                                <div class="card">
                                    <div class="card-body">
                                    <img class="card-img-middle img-fluid" src="<?php echo base_url(); ?>assets1/images/attached-files/img1.jpg" alt="Card image cap"><br/><br/>
                                    <input type="file" name="picture" accept="image/*">
                                    <div class="form-group">
                                        Heading
                                        <input type="text" name="heading" class="form-control">
                                        Description
                                        <input type="text" name="description" class="form-control">
                                    </div>
                                        <a href="javascript:void(0);" class="btn btn-success">Update</a>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xl-4">
                                <!-- Portlet card -->
                                <div class="card">
                                    <div class="card-body">
                                    <img class="card-img-middle img-fluid" src="<?php echo base_url(); ?>assets1/images/attached-files/img2.jpg" alt="Card image cap"><br/><br/>
                                    <input type="file" name="picture" accept="image/*">
                                    <div class="form-group">
                                        Heading
                                        <input type="text" name="heading" class="form-control">
                                        Description
                                        <input type="text" name="description" class="form-control">
                                    </div>
                                        <a href="javascript:void(0);" class="btn btn-success">Update</a>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xl-4">
                                <!-- Portlet card -->
                                <div class="card">
                                    <div class="card-body">
                                    <img class="card-img-middle img-fluid" src="<?php echo base_url(); ?>assets1/images/attached-files/img3.jpg" alt="Card image cap"><br/><br/>
                                    <input type="file" name="picture" accept="image/*">
                                    <div class="form-group">
                                        Heading
                                        <input type="text" name="heading" class="form-control">
                                        Description
                                        <input type="text" name="description" class="form-control">
                                    </div>
                                        <a href="javascript:void(0);" class="btn btn-success">Update</a>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->

                </div> <!-- content -->
                <?php $this->load->view('dashboard/footer'); ?>
                