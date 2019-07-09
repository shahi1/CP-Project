<link href="<?= base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?> " rel="stylesheet" type="text/css" media="all" />
<?php $this->load->view('admin/partials/admin_header.php'); ?>



<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Checkout</h3>
            </div>
        </div>      
                <div class="clearfix"></div>
        <hr>
    <div class="row checkout">
        <!-- Order items -->
        <div class="col-lg-8 col-md-8 col-sm-12">
            <table class="table">
            <thead>
                <tr>
                    <th width="13%"></th>
                    <th width="34%">Product</th>
                    <th width="18%">Price</th>
                    <th width="13%">Quantity</th>
                    <th width="22%">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){ ?>
                <tr>
                    <td>
                       <?php $imageURL = !empty($item["image"])?base_url("uploads/".$item['image']):base_url('assets/images/pro-demo-img.jpeg'); ?>
                        <img src="<?php echo $imageURL; ?>" width="100"/>
                    </td>
                    <td><?php echo $item["name"]; ?></td>
                    <td><?php echo '$'.$item["price"].' USD'; ?></td>
                    <td><?php echo $item["qty"]; ?></td>
                    <td><?php echo '$'.$item["subtotal"].' USD'; ?></td>
                </tr>
                <?php } }else{ ?>
                <tr>
                    <td colspan="5"><p>No items in your cart...</p></td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <?php if($this->cart->total_items() > 0){ ?>
                    <td class="text-center">
                        <strong>Total <?php echo '$'.$this->cart->total().' USD'; ?></strong>
                    </td>
                    <?php } ?>
                </tr>
            </tfoot>
            </table>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12">
            <!-- Shipping address -->
            <form class="form-horizontal" method="post">
            <div class="ship-info">
                <h4>Shipping Info</h4>
                <div class="form-group">
                    <label class="control-label col-sm-2">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="<?php echo !empty($custData['name'])?$custData['name']:''; ?>" placeholder="Enter name">
                        <?php echo form_error('name','<p class="help-block error">','</p>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="<?php echo !empty($custData['email'])?$custData['email']:''; ?>" placeholder="Enter email">
                        <?php echo form_error('email','<p class="help-block error">','</p>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Phone:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone" value="<?php echo !empty($custData['phone'])?$custData['phone']:''; ?>" placeholder="Enter contact no">
                        <?php echo form_error('phone','<p class="help-block error">','</p>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Address:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" value="<?php echo !empty($custData['address'])?$custData['address']:''; ?>" placeholder="Enter address">
                        <?php echo form_error('address','<p class="help-block error">','</p>'); ?>
                    </div>
                </div>
            </div>
            <div class="footBtn">
                <a href="<?php echo base_url('admin/cart/'); ?>" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Back to Cart</a>
                <button type="submit" name="placeOrder" class="btn btn-success orderBtn">Place Order <i class="glyphicon glyphicon-menu-right"></i></button>
            </div>
            </form>

        </div>
    </div>
</div>