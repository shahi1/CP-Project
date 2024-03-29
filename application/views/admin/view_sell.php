<?php $this->load->view('admin/partials/admin_header.php'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>You can sell or book vehicle here</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Details</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php echo validation_errors(); ?> 
                        <form method="post">
                            <fieldset>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input name="cf_name" type="text" value="<?php echo set_value('cf_name'); ?>" class="form-control" placeholder="First Name" >
                                    </div>
                                    <div class="col-xs-6">
                                        <input name="cl_name" type="text" value="<?php echo set_value('cl_name'); ?>" class="form-control" placeholder="Last Name" >
                                    </div>
                                </div>
                                <br>
                                
                                <div class="row">
                                
                                    <div class="col-xs-6">
                                        <input name="c_email" class="form-control" value="<?php echo set_value('c_email'); ?>"  placeholder="Email Address(User Name)" >
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="number" min="0" max=""class="form-control" name="c_quantity" placeholder="Quantity of vehicle" required="" value="<?php echo set_value('c_quantity'); ?>">
                                    </div>
                    
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <br>
                                        <input  class="form-control" name="s_price" value="<?php echo set_value('s_price'); ?>" placeholder="Payment Amount" >
                                    </div>
                                    <div class="col-xs-6">
                                        <br>
                                        <select class="form-control" name="s_status" >
                                            <option value="book">Book</option>
                                            <option value="sold">Sell</option>
                                        </select>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" name="c_mobile"  value="<?php echo set_value('c_mobile'); ?>" placeholder="Mobile No" >
                                    </div>
                                    <div class="col-xs-6">
                                        <h5>Payment Method</h5>
                                        <select class="form-control" name="payment_type" required>
                                            <option value="Cash">Cash</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="Visa/Master Card">Visa/Master Card</option>
                                            <option value="Wire Transfer">Wire Transfer</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <br>
                                <div class="row">
                                    <div class="col-xs-6">
                                        Warranty Start Date:
                                        <input type="date" class="form-control" name="w_start" value="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        Warranty End Date:
                                        <input type="date" class="form-control" name="w_end" >
                                    </div>
                                </div>
                                <br>
                                <br/><br/>
								<input type="hidden" name="v_id" value="<?php if(isset($cid)){echo $cid; }?> <?php echo set_value('v_id'); ?>">
                                <input type="submit" name="buttonSubmits" value="Confirm" class="btn btn-success" />
                                
                            </fieldset>
                        </form>
                        <br/>
                        <label><?php //echo $message; ?></label>
                                
                    </div> <!-- /content --> 
                </div><!-- /x-panel --> 
            </div> <!-- /col --> 
        </div> <!-- /row --> 
    </div>
</div> <!-- /.col-right --> 
<!-- /page content -->

<?php $this->load->view('admin/partials/admin_footer'); ?>

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
