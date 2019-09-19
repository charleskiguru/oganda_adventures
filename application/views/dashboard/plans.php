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
                                            <li class="breadcrumb-item active">Plans</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Plans</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="alert alert-success" style="display:none"></div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <button type="button" data-toggle="modal" data-target="#planModal" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                                        <i class="mdi mdi-plus-circle"></i> Add Plan
                                    </button>
                                    <h4 class="header-title mb-4">Manage Plans</h4>

                                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                        <thead>
                                        <tr>
                                            <th>
                                                ID
                                            </th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Start date</th>
                                            <th>End date</th>
                                            <th>Cost</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th class="hidden-sm">Action</th>
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

<div id="planModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="plan_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add plan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label>Plan name</label>
                    <input type="text" name="plan_name" id="plan_name" class="form-control"> <br/>
                    <label>Image</label>
                    <input type="file" name="image" id="image"> <br/>
                    <label>Start date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control"> <br/>
                    <label>End date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control"> <br/>
                    <label>Plan Cost</label>
                    <input type="text" name="plan_cost" id="plan_cost" class="form-control"> <br/>
                    <label>Description</label>
                    <input type="textarea" name="description" id="description" class="form-control"> <br/>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="action" value="Add" class="btn btn-sm btn-success">
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        $(document).on('submit', '#plan_form', function(event){
            event.preventDefault();
            var planName = $('#plan_name').val();
            var extension = $('#image').val().split('.').pop().toLowerCase();
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();
            var planCost = $('#plan_cost').val();
            var planDescription = $('#description').val();

            if(jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1)
            {
                alert('Invalid image file');
                //remove it if invalid
                $('#image').val('');
                return false;
            }
            if(planName != '' && startDate != '' && endDate != '' && planCost != '' && planDescription != '')
            {
                $.ajax({
                    url:baseDir + 'dashboard/dashboard/plan_action',
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                        alert(data);
                        $('#plan_form')[0].reset();
                        $('#planModal').modal('hide');
                    }
                });
            }
            else
            {
                alert('All fields are required');
            }
        });
    });
</script>