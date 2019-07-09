<link href="<?= base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?> " rel="stylesheet" type="text/css" media="all" />
<?php $this->load->view('admin/partials/admin_header.php'); ?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Your Order is Successfull</h3>
            </div>
        </div>      
                <div class="clearfix"></div>
        <hr>
    <div class="row">

        <p class="ord-succ">Your order has been placed successfully.</p>

        <!-- Order status & shipping info -->
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
</div>