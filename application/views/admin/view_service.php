<?php $this->load->view('admin/partials/admin_header.php'); ?>

<div class="right_col" role="main">
    <?php if($this->session->userdata('type') != "admin" ) : ?>
    <hr>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> See nearest location</a>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="collapse" id="collapseExample">
                    <br>
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d386950.6511603643!2d-73.70231446529533!3d40.738882125234106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNueva+York!5e0!3m2!1ses-419!2sus!4v1445032011908" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                    <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=motor%2Cservices%2Ckathmandu&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                <br>
                </div>
            </div>
        </div>
        <br>
    <?php endif;?>
    <div class="">
    <?php if($this->session->userdata('type') != "admin" ) : ?>
        <div class="page-title">
            <div class="title_left">
                <h3>Register to service vehicle</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <?php echo validation_errors(); ?> 
			<?php echo form_open_multipart('admin/services/add'); ?>
                <fieldset>
                    <div class="row">
                        <div class="col-xs-6">
                            <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-xs-6">
                            <label>Vehicle Category</label>
                            <select class="form-control" name="category" >
                                <option value="car">Car</option>
                                <option value="bike">Bike</option>
                            </select>
                        </div>
                    </div>
                            
                    <br>
                    <div class="row">
                        <div class="col-xs-6">
                            <input type="text" class="form-control" name="name" placeholder="Model" required>
                        </div>
                    </div>     
                    <br>
                    <div class="row">
                        <div class="col-xs-6">
                            <input type="text" class="form-control" name="location" placeholder="Location" required>
                        </div>
                    </div>
                    <br>
                        
                    <div class="row">
                        <div class="col-xs-6">
                            <label>Servicing Date</label>
                            <input type="Date"class="form-control" name="from"  value="<?php echo date("Y-m-d"); ?>" >
                        </div>
                    </div>                           
                    <br>
                    <div class="row">
                        <div class="col-xs-6">
                            <input type="text"class="form-control" name="timing" placeholder="Available time">
                        </div>
                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" name="buttonSubmit" value="Confirm" />
                                                            
                </fieldset>         
            </form>
            <br>
            </div>
        </div> <!-- /row --> 
    <?php endif; ?>
        <!-- all models --> 

  <?php if($this->session->userdata('type') == "admin" ) : ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All request for servicing vehicle</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                 <tr>
                                    <th>E-mail</th>
                                     <th>Vehicle Category</th>
                                    <th>Model Name</th>
                                    <th>Location</th>
                                    <th>Servicing Date</th>
                                    <th>Available Time</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($services as $service) : ?>
                                    
                                    <tr class="<?php echo 'success'?>">
                                
                                        <td><?php echo $service['email']; ?></td>
                                        <td><?php echo $service['category']; ?></td>
                                        <td><?php echo $service['name']; ?></td>
                                        <td><?php echo $service['location']; ?></td>
                                        <td><?php echo $service['from']; ?></td>                                 
                                        <td><?php echo $service['timing']; ?></td>                                                    
                                    </tr>
                                <?php endforeach; ?>     
                            </tbody>
                        </table>
                    </div> <!-- /content --> 
                </div><!-- /x-panel --> 
            </div> <!-- /col -->
        </div> <!-- /row --> 

    <?php endif;?>
    </div>
</div> <!-- /.col-right --> 
<!-- /page content -->

<?php $this->load->view('admin/partials/admin_footer.php'); ?>



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
    
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-responsive").length) {
            $("#datatable-responsive").DataTable({
            aaSorting: [[0, 'desc']],
            
              dom: "Blfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm",
				  exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
                },
                {
                  extend: "csv",
                  className: "btn-sm",
				  exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
                },
                {
                  extend: "excel",
                  className: "btn-sm",
				  exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
                },
                {
                  extend: "pdf",
                  className: "btn-sm",
				  exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
                },
                {
                  extend: "print",
                  className: "btn-sm",
				  exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
                },
              ],
              responsive: true,
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
          
            init: function() {
              handleDataTableButtons();
            }
          };
        }();    
                    
        TableManageButtons.init();
      });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
    
    $("#parent_cat").change(function() {
        $(this).after();
        $.get('<?php echo base_url(); ?>controller_vehicle/getsub/' + $(this).val(), function(data) {
            $("#sub_cat").html(data);
            $('#loader').slideUp(200, function() {
                $(this).remove();
            });
        }); 
    });

});
</script>

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