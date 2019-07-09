<link href="<?= base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?> " rel="stylesheet" type="text/css" media="all" />
<?php $this->load->view('public/partials/public_header.php'); ?>

<div class="container-fluid">
    <div class="row">
                <div class="col-xs-12">
                    <div class="x_panel">
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                     <tr>
                                        <th>Model</th>
                                        <th>Make</th>
                                        <th>Category</th>
                                        <th>Added on</th>
                                        <th>Mileage</th>
                                        <th>Color</th>
                                        <th>Gear</th>
                                        <th>Tank Capacity(lt)</th>
                                        <th>Price</th>
                                        <th>Image</th>

                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php foreach($vehicles as $vehicle) : ?>
                                        
                                        <tr class="<?php echo 'success'?>">
                                
                                            <td><?php echo $vehicle['model_name']; ?></td>
                                            <td><?php echo $vehicle['manufacturer_name']; ?></td>
                                            <td><?php echo $vehicle['category']; ?></td>
                                            <td><?php $date = new DateTime($vehicle['add_date']); echo $date->format('m/d/Y'); ?></td>
                                            
                                            <td><?php echo $vehicle['mileage']; ?></td>
                                            <td><?php echo $vehicle['color']; ?></td>
                                            <td><?php echo $vehicle['gear']; ?></td>
                                            <td><?php echo $vehicle['tank']; ?></td>
                                            <td><?php echo $vehicle['buying_price']; ?></td>
                                            <td width="100">
                                                <img class="img-responsive" src="<?php echo base_url()."uploads/".$vehicle['image']; ?>"></td>
                                            
                                                        
                                        </tr>
                                    <?php endforeach; ?>     
                                </tbody>
                            </table>
                        </div> <!-- /content --> 
                    </div><!-- /x-panel --> 
                </div> <!-- /col -->
            </div> <!-- /row --> 
</div>
