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
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control border-white" id="dash-daterange">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text bg-blue border-blue text-white">
                                                            <i class="mdi mdi-calendar-range font-13"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </a>
                                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-1">
                                                <i class="mdi mdi-filter-variant"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                                <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup">127</span></h3>
                                                <p class="text-muted mb-1 text-truncate">Bookings</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                                <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup">0.58</span>%</h3>
                                                <p class="text-muted mb-1 text-truncate">Conversion</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                                <i class="fe-eye font-22 avatar-title text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup">78.41</span>k</h3>
                                                <p class="text-muted mb-1 text-truncate">Today's Visits</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->
                    <div class="row">
                            <div class="col-xl-4">
                                <div class="card-box">
                                    <h4 class="header-title mb-3">Total Revenue</h4>

                                    <div class="widget-chart text-center" dir="ltr">
                                        <input data-plugin="knob" data-width="160" data-height="160" data-linecap=round data-fgColor="#f1556c" value="60" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".12"/>
                                        <h5 class="text-muted mt-3">Total sales made today</h5>
                                        <h2>$178</h2>

                                        <p class="text-muted w-75 mx-auto sp-line-2">Traditional heading elements are designed to work best in the meat of your page content.</p>

                                        <div class="row mt-3">
                                            <div class="col-4">
                                                <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                                <h4><i class="fe-arrow-down text-danger mr-1"></i>$7.8k</h4>
                                            </div>
                                            <div class="col-4">
                                                <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                                <h4><i class="fe-arrow-up text-success mr-1"></i>$1.4k</h4>
                                            </div>
                                            <div class="col-4">
                                                <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                                                <h4><i class="fe-arrow-down text-danger mr-1"></i>$15k</h4>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col-->

                            <div class="col-xl-8">
                                <div class="card-box">
                                    <h4 class="header-title mb-3">Sales Analytics</h4>

                                    <div id="sales-analytics" class="flot-chart mt-4 pt-1" style="height: 375px;"></div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->

                </div> <!-- content -->
                <?php $this->load->view('dashboard/footer'); ?>
