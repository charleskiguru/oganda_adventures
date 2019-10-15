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

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                <div class="alert alert-success" style="display:none"></div>
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
<div id="bookedModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" action="" id="booked_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm payments</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label>Name</label>
                    <input type="text" readonly="yes" name="first_name" id="first_name" class="form-control">
                    <label>Plan Booked</label>
                    <input type="text" readonly="yes" name="plan_booked" id="plan_booked" class="form-control">
                    <label>Booking ID</label>
                    <input type="text" readonly="yes" name="booking_id" id="booking_id" class="form-control">
                    <label>Total Cost</label>
                    <input type="text" readonly="yes" name="total_cost" id="total_cost" class="form-control">
                    <label>Payment Status</label>
                    <div class="status">
                        <select name="status" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="paid">Paid</option>
                        </select> 
                    </div>                   
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="booked_id" id="booked_id">
                    <input type="hidden" name="phoneno" id="phoneno">
                    <input type="submit" name="confirm" id="confirm" value="Confirm payments" class="btn btn-sm btn-success">
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        var dataTable = $('#booked_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "scrollX": true,
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
        $(document).on('submit', '#booked_form', function(){
            var option=$('.status').find(":selected").text();
            $.ajax({
                    url:baseDir + 'dashboard/dashboard/booked_action',
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                        if(data)
                        { 
                            alert(data);
                            $('#booked_form')[0].reset();
                            $('#bookedModal').modal('hide');
                            dataTable.ajax.reload();
                            $('.alert-success').html('Payment details updated successfully!').fadeIn().delay(5000).fadeOut('slow');
                        }
                        else{
                            alert('Error');
                        }
                        
                    },
                    error:function()
                    {
                        alert('Payment details not updated');
                    }
                });
            
        });
    });
    $(document).on('click', '.update', function(){
            var booked_id=$(this).attr("id");
            $.ajax({
                url:baseDir + 'dashboard/dashboard/fetch_single_booked_plan',
                method:"POST",
                data:{booked_id, booked_id},
                dataType:"json",
                success:function(data){
                    $('#bookedModal').modal('show');
                    $('#first_name').val(data.first_name);
                    $('#plan_booked').val(data.plan_booked);
                    $('#booking_id').val(data.booking_id);
                    $('#total_cost').val(data.total_cost);
                    $("div.status select").val(data.booking_status);
                    $("#phoneno").val(data.phoneno)
                    $('#booked_id').val(booked_id);

                }
            });
        });
    $(document).on('click', '.delete', function(){
        var booked_id = $(this).attr("id");
        if(confirm("Are you sure you want to delete?"))
        {
            $.ajax({
            url:baseDir + 'dashboard/dashboard/delete_booked_plan',
            method:'POST',
            data:{booked_id:booked_id},
            success: function(data){
                alert(data);
                dataTable.ajax.reload();
                $('.alert-success').html('Booked plan details deleted successfully!').fadeIn().delay(5000).fadeOut('slow');
            }
        });
        }
        else{
            return false;
        }
    });
</script>