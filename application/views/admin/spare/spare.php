<link href="<?= base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?> " rel="stylesheet" type="text/css" media="all" />
<?php $this->load->view('admin/partials/admin_header.php'); ?>

<div class="right_col" role="main">
<?php if($this->session->userdata('type') == "admin" ) : ?>
    <div class="">
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Add new Vehicle Parts</a>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <div class="collapse" id="collapseExample">
            <?php echo validation_errors(); ?> 
            <?php echo form_open_multipart('admin/spare/add'); ?>
                <fieldset>
                  <div class="row">
                        <div class="col-xs-6">
                             <input type="text"class="form-control" name="name" placeholder="name of parts" required>
                         </div>
                             <div class="col-xs-6">
                             <input type="text"class="form-control" name="price" placeholder="cost" required>
                         </div>
                    </div>
                            
                    <br>
                        
                    <div class="row">
                            <div class="col-xs-6">
                                <label class="control-label">Description</label>
                                <textarea class="form-control white_bg" name="description" rows="6" required=""></textarea>
                            </div>
                    </div>
                    <br>
                        
                    <div class="row">
                        <div class="col-xs-6">
                            <label>Created In</label>
                            <input type="Date"class="form-control" name="created"  value="<?php echo date("Y-m-d"); ?>" >
                        </div>
                        <div class="col-xs-6">
                            <label>Modified In</label>
                            <input type="Date"class="form-control" name="modified"  value="<?php echo date("Y-m-d"); ?>" >
                        </div>
                    </div>
                    <br>
                            
                    <div class="row">
                        <div class="col-xs-6">
                            <input type="file" class="form-control" name="image" >
                        </div>
                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" name="buttonSubmit" value="Add vehicle parts" />
                                                            
                </fieldset>         
            </form>
            <br>
            </div>
        </div> <!-- /row --> 
<?php endif;?>
        <hr>
    <div class="container-fluid">
        <div class="page-title">
            <div class="title_left">
                <h3>All Vehicle Parts</h3>
            </div>
        </div>      
                <div class="clearfix"></div>
        <hr>    
        <!-- Cart info -->
        <div class="row">

                <a href="<?php echo base_url('admin/cart'); ?>" class="cart-link" title="View Cart">
                    <i class="glyphicon glyphicon-shopping-cart"></i>
                    <span>(<?php echo $this->cart->total_items(); ?>)</span>
                </a>

                <!-- List all products -->
                <div class="row">
                    <div class="col-xs-12">
                        <?php if(!empty($spare)){ foreach($spare as $row){ ?>
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="thumbnail" style="height: 350px;">
                                    <img src="<?php echo base_url()."uploads/".$row['image']; ?>" style="height: 180px; width: 100%"/>
                                    <div class="caption">
                                        <h4 class="pull-right">$<?php echo $row['price']; ?> USD</h4>
                                        <h4><?php echo $row['name']; ?></h4>
                                        <p><?php echo $row['description']; ?></p>
                                    </div>
                                    <div class="atc">
                                        <a href="<?php echo base_url('admin/spare/addToCart/'.$row['id']); ?>" class="btn btn-success">
                                            Add to Cart
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } }else{ ?>
                            <p>Product(s) not found...</p>
                        <?php } ?>
                    </div>
                </div>
        </div>
    </div>
</div>
