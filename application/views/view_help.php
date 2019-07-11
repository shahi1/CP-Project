<?php $this->load->view('public/partials/public_header.php'); ?>
<style type="text/css">
	.container-fluid{
		padding-top: 50px;
		background: #FFFFF0;
	}

	#query{
		padding-left: 30px;
	}

	#query a{
		color: black;
	}
</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-6" id="query">
			<div class="row">
				<a class="" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample"><h2>How to buy?</h2></a>
	            <div class="col-xs-12">
		            <div class="collapse" id="collapseExample1">
		            	<h2>How to buy?</h2>
	            
	            	</div>
	        	</div> <!-- /row --> 
				<br>
				<a class="" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample"><h2>How to sell or book?</h2></a>
	            <div class="col-xs-12">
		            <div class="collapse" id="collapseExample2">
		            	<h2>How to sell or book?</h2>
	            	</div>
	        	</div> <!-- /row --> 
	        	<br>
				<a class="" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample"><h2>How to create account?</h2></a>
	            <div class="col-xs-12">
		            <div class="collapse" id="collapseExample3">
		            	<h2>How to create account?</h2>
	            
	            	</div>
	        	</div> <!-- /row --> 
			</div>
		</div>

		<div class="col-xs-6">
			<h4>Need more help?</h4>
			<p>If your query is not present in our help topics, then kindly ask your questions through this form.</p>
			<br>
			<div class="row">
	            <div class="col-md-8 col-md-offset-2">
			            <?php echo validation_errors(); ?> 
						<?php echo form_open_multipart('helps/add'); ?>
			                <fieldset>                            
			                    <br>
			                    <div class="row">
			                        <div class="col-xs-12">
			                         <input type="text"class="form-control" name="name" placeholder="Name" required>
			                        </div>
			                        <br>
			                        <br><br>

			                        <div class="col-xs-12">
			                         <input type="text"class="form-control" name="email" placeholder="E-mail" required>
			                        </div>
			                        <br>
			                        <br><br>
			                        <div class="col-xs-12">
			                            <label class="control-label">Question</label>
			        					<textarea class="form-control white_bg" name="message" rows="6" required=""></textarea>
			                        </div>
			                    </div>
			                    <br>
			                    <input class="btn btn-primary" type="submit" name="buttonSubmit" value="Comment" />
			                                                            
			                </fieldset>         
			            </form>
	            	<br>
	            </div>
	        </div> 
		</div>
		
	</div>
	
</div>
<br><br><br>

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
    

