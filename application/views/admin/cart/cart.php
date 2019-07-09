<link href="<?= base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?> " rel="stylesheet" type="text/css" media="all" />
<?php $this->load->view('admin/partials/admin_header.php'); ?>
<style>


</style>
<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
/* Update item quantity */
function updateCartItem(obj, rowid){
	$.get("<?php echo base_url('admin/cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
		if(resp == 'ok'){
			location.reload();
		}else{
			alert('Cart update failed, please try again.');
		}
	});
}
</script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Cart</h3>
                <p>Make quantity zero to remove item from cart</p>
            </div>
        </div>      
                <div class="clearfix"></div>
        <hr>    

    <div class="row cart">
        <table class="table">
        <thead>
            <tr>
                <th width="20%">Image</th>
                <th width="20%">Product</th>
                <th width="20%">Price</th>
                <th width="20%">Quantity</th>
                <th width="20%">Subtotal</th>
                <th width="12%"></th>
            </tr>
        </thead>

        <tbody>
            <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>
            <tr>
                <td>
                    <?php $imageURL = !empty($item["image"])?base_url("uploads/".$item['image']):base_url('assets/images/pro-demo-img.jpeg'); ?>
                    <img src="<?php echo $imageURL; ?>" width="100px"/>
                </td>
                <td><?php echo $item["name"]; ?></td>
                <td><?php echo '$'.$item["price"].' USD'; ?></td>
                <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                <td><?php echo '$'.$item["subtotal"].' USD'; ?></td>
            </tr>
            <?php } }else{ ?>
            <tr><td colspan="6"><p>Your cart is empty.....</p></td>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td><a href="<?php echo base_url('admin/products/'); ?>" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
                <td colspan="3"></td>
                <?php if($this->cart->total_items() > 0){ ?>
                <td class="text-left">Grand Total: <b><?php echo '$'.$this->cart->total().' USD'; ?></b></td>
                <td><a href="<?php echo base_url('admin/checkout/'); ?>" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
                <?php } ?>
            </tr>
        </tfoot>
        </table>
    </div>
</div>