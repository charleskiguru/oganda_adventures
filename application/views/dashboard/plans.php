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

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <button id="addButton" type="button" data-toggle="modal" data-target="#planModal" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                                        <i class="mdi mdi-plus-circle"></i> Add Plan
                                    </button>
                                    <h4 class="header-title mb-4">Manage Plans</h4>
                                    <div class="alert alert-success" style="display:none"></div>
                                    <table class="table table-bordered table-stripped" id="plan_data">
                                        <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Start date</th>
                                            <th>End date</th>
                                            <th>Cost</th>
                                            <th width="15%">Description</th>
                                            <th>Edit</th>
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

<div id="planModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" action="getData" id="plan_form" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add plan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label for="name" class="label-control">Plan name</label>
                    <input type="text" name="plan_name" id="plan_name" class="form-control"><span class="text-danger name"></span> <br/>
                    <label>Image</label>
                    <input type="file" name="image" id="image">
                    <span id="plan_uploaded_image"></span><br/> <span class="text-danger image"></span><br/>
                    <label>Start date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control"><span class="text-danger s_date"></span> <br/>
                    <label>End date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control"> <span class="text-danger e_date"></span> <br/>
                    <label>Plan Cost</label>
                    <input type="text" name="plan_cost" id="plan_cost" class="form-control"><span class="text-danger cost"></span> <br/>
                    <label>Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea> <span class="text-danger description"></span>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="plan_id" id="plan_id">
                    <input type="submit" name="action" id="action" value="Add" class="btn btn-sm btn-success">
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        var dataTable = $('#plan_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
                url:baseDir + 'dashboard/dashboard/fetch_plans',
                type:"POST"
            },
            "columnDefs":[
                {
                    "targets":[0, 3, 4],
                    "orderable":false
                }
            ]
        });
        $(document).on('submit', '#plan_form', function(event){
            event.preventDefault();
            var planName = $('#plan_name').val();
            var extension = $('#image').val().split('.').pop().toLowerCase();
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();
            var planCost = $('#plan_cost').val();
            var planDescription = $('#description').val();

            var result='';

            if(planName=='')
            {
                $('.name').text('*Plan Name field is required!');
            }
            else{
                $('.name').text('');
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
            if(startDate=='')
            {
                $('.s_date').text('*Start date field is required!');
            }
            else{
                $('.s_date').text('');
                result +='3';
            }
            if(endDate=='')
            {
                $('.e_date').text('*End date field is required!');
            }
            else{
                $('.e_date').text('');
                result +='4';
            }
            if(planCost=='')
            {
                $('.cost').text('*Plan Cost field is required!');
            }
            else{
                $('.cost').text('');
                result +='5';
            }
            if(planDescription=='')
            {
                $('.description').text('*Description field is required!');
            }
            else{
                $('.description').text('');
                result +='6';
            }
            if(result == '123456')
            {
                $.ajax({
                    url:baseDir + 'dashboard/dashboard/plan_action',
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                        if(data)
                        {
                            if($('#plan_id').val()!= '')
                            {
                                $('#plan_form')[0].reset();
                                $('#planModal').modal('hide');
                                $('.alert-success').html('Plan details updated successfully!').fadeIn().delay(5000).fadeOut('slow');
                                dataTable.ajax.reload();
                            }
                            else{
                                $('#plan_form')[0].reset();
                                $('#planModal').modal('hide');
                                $('.alert-success').html('Plan details added successfully!').fadeIn().delay(5000).fadeOut('slow');
                                dataTable.ajax.reload();
                            }
                        }
                        else{
                            alert('error');
                        }
                    },
                    error:function()
                    {
                        alert('Unable to add plan!');
                    }
                });
            }
        });
        $(document).on('click', '#addButton', function(){
            $('#plan_form' ).each(function(){
                this.reset();
            });
            $('#plan_uploaded_image').html('');                    
            $('.modal-title').text("Add Plan");
            $('#action').val("Add");   
            $('#plan_id').val('');    
        });

        $(document).on('click', '.update', function(){
            var plan_id = $(this).attr("id");
            $.ajax({
                url:baseDir + 'dashboard/dashboard/fetch_single_plan',
                method:"POST",
                data:{plan_id, plan_id},
                dataType:"json",
                success:function(data){
                    $('#planModal').modal('show');
                    $('#plan_name').val(data.plan_name);
                    $('#plan_uploaded_image').html(data.image);
                    $('#start_date').val(data.start_date);
                    $('#end_date').val(data.end_date);
                    $('#plan_cost').val(data.plan_cost);
                    $('#description').val(data.description);
                    $('.modal-title').text("Edit plan");
                    $('#plan_id').val(plan_id);
                    $('#action').val("Edit");

                }
            })
        });
    });
</script>