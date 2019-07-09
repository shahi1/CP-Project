<?php $this->load->view('public/partials/view_public_header.php'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Customer</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                            
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped">
                            <tr>
                                <th>
                                    Employee Id
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Mobile
                                </th>
                                
                                <th>
                                    Position
                                </th>
                                <th>
                                    Gender
                                </th>
                                <th>
                                    Access
                                </th>

                            </tr>
                            
                            {emp}
                            <tr>
                                <td>{id}</td>
                                <td>{first_name} {last_name}</td>
                                <td>{email}</td>
                                <td>{mobile}</td>
                                <td>{position}</td>
                                <td>{gender}</td>
                                <td>{type}</td>
                                
                            </tr>
                            {/emp}
                        </table>
                    </div> <!-- /content --> 
                </div><!-- /x-panel --> 
            </div> <!-- /col --> 
        </div> <!-- /row --> 
    </div>
</div> <!-- /.col-right --> 
<!-- /page content -->

<?php $this->load->view('public/partials/view_public_footer'); ?>

<?php if($this->session->flashdata('message') != NULL) : ?>
<script>
    swal({
      title: "Success",
      text: "<?php echo $this->session->flashdata('message'); ?>",
      type: "success",
      timer: 1500,
      showConfirmButton: false
    });
</script>
<?php endif ?>