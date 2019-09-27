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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                                            <li class="breadcrumb-item active">Booked plans</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Booked plans</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="alert alert-success" style="display:none"></div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <table class="table table-responsive table-bordered table-stripped" id="booked_data">
                                        <thead>
                                        <tr>
                                            <th>Plan booked</th>
                                            <th>Booking ID</th>
                                            <th>Booking status</th>
                                            <th>Name</th>
                                            <th>Phone No</th>
                                            <th>Adults</th>
                                            <th>Kids</th>
                                            <th>Total cost</th>
                                            <th>Date</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

            <?php $this->load->view('dashboard/footer'); ?>

<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        var dataTable = $('#booked_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
                url:baseDir + 'dashboard/dashboard/fetch_booked_plans',
                type:"POST"
            },
            "columnDefs":[
                {
                    "targets":[0, 3, 4],
                    "orderable":false
                }
            ]
        });
    });
</script>