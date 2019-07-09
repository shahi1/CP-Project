<?php $this->load->view('public/partials/login.php'); ?>

<style type="text/css">
	.container-fluid{
		margin-top: 10px;	
		background: #FFFFF0;
	}
	table
	{
		margin-left: 40px;
	}
</style>

<div class="container-fluid">
	<div class="right_col" role="main">
	    <div class="container-fluid">
	        <div class="page-title">
	            <div class="title_left">
	                <h3>Blogs</h3>
	            </div>
	        </div>
	        <div class="clearfix"></div>

	        <hr>
	        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Add A new blog</a>

	        <div class="row">
	            <div class="col-md-8 col-md-offset-2">
	            <div class="collapse" id="collapseExample">
	            <?php echo validation_errors(); ?> 
				<?php echo form_open_multipart('blogs/add'); ?>
	                <fieldset>                            
	                    <br>
	                    <div class="row">
	                        <div class="col-xs-12">
	                         <input type="text"class="form-control" name="name" placeholder="Name" required>
	                        </div>
	                        <br>
	                        <br>
	                        <div class="col-xs-12">
	                            <label class="control-label">Comment</label>
	        					<textarea class="form-control white_bg" name="message" rows="6" required=""></textarea>
	                        </div>
	                    </div>
	                    <br>
	                    <input class="btn btn-primary" type="submit" name="buttonSubmit" value="Comment" />
	                                                            
	                </fieldset>         
	            </form>
	            <br>
	            </div>
	        </div> <!-- /row --> 
	        <!-- all models --> 
	        <br>
	        <div class="row">
	            <div class="col-xs-11">
	                <div class="x_panel">
	                    <div class="x_title">
	                        <h2>All Comments</h2>
	                        <div class="clearfix"></div>
	                    </div>
	                    <br>
	                    <div class="x_content">
	                        <table id="datatable-responsive" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="80%">
	                            <thead>
	                                 <tr>
	                                    <th>Commentor</th>
	                                     <th>Comments</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                                <?php foreach($blogs as $blog) : ?> 
	                                    <tr>
	                                        <td><?php echo $blog['name']; ?></td>
	                                        <td><?php echo $blog['message']; ?></td>
	                                       
	                                    </tr>
	                                <?php endforeach; ?>     
	                            </tbody>
	                        </table>
	                    </div> <!-- /content --> 
	                </div><!-- /x-panel --> 
	            </div> <!-- /col -->
	        </div> <!-- /row --> 


	    </div>
	</div> 
</div><!-- /.col-right --> 
<!-- /page content -->
<?php $this->load->view('admin/partials/admin_footer'); ?>

    <script src="<?php echo base_url("assets/vendors/datatables.net/js/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.print.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-scroller/js/datatables.scroller.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/jszip/dist/jszip.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/pdfmake/build/pdfmake.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/pdfmake/build/vfs_fonts.js"); ?>"></script>
    

