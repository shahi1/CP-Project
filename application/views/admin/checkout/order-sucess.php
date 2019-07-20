<?php $this->load->view('admin/partials/admin_header.php'); ?>

<div class="right_col" role="main">
        <div class="row">
            <div class="col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Your order is sucessfull</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="row col-lg-12 ord-addr-info">
            <div class="col-sm-6 adr">
                <div class="hdr">Shipping Address</div>
                <br>
                <p><?php echo $order['name']; ?></p>
                <p><?php echo $order['email']; ?></p>
                <p><?php echo $order['phone']; ?></p>
                <p><?php echo $order['address']; ?></p>
            </div>
            <div class="col-sm-6 info">
                <div class="hdr">Order Info</div>
                <p><b>Reference ID</b> #<?php echo $order['id']; ?></p>
                <p><b>Total</b> <?php echo '$'.$order['grand_total'].' USD'; ?></p>
            </div>
        </div>

        <!-- Order items -->
        <div class="row ord-items">
            <?php if(!empty($order['items'])){ foreach($order['items'] as $item){ ?>
            <div class="col-lg-12 item">
                <div class="col-sm-2">
                    <div class="img" style="height: 75px; width: 75px;">
                        <?php $imageURL = !empty($item["image"])?base_url("uploads/".$item['image']):base_url('assets/images/pro-demo-img.jpeg'); ?>
                        <img src="<?php echo $imageURL; ?>" width="75"/>
                    </div>
                </div>
                <div class="col-sm-4" style="margin-left: 40px;">
                    <p><b><?php echo $item["name"]; ?></b></p>
                    <p><?php echo '$'.$item["price"].' USD'; ?></p>
                    <p>QTY: <?php echo $item["quantity"]; ?></p>
                </div>
                <div class="col-sm-2">
                    <p><b><?php echo '$'.$item["sub_total"].' USD'; ?></b></p>
                </div>
            </div>
            <?php } } ?>
        </div>
                        </div>
                    </div> <!-- /content --> 
                </div><!-- /x-panel --> 
            </div> <!-- /col -->
        </div> <!-- /row --> 


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