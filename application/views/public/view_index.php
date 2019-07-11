<?php $this->load->view('public/partials/view_public_header.php'); ?>
<div class="banner">
	<div class="container">
		<script src="<?= base_url('assets/js/responsiveslides.min.js'); ?>"></script>
		<script>
		$(function () {
		$("#slider").responsiveSlides({
			auto: true,
			nav: true,
			speed: 700,
		namespace: "callbacks",
		pager: true,
		});
		});
		</script>

		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider">
				<li>	
					<div class="banner-text">
						<h3>Easy Comparision</h3>
						<p>With this site you can easily compare different vehicles in list</p>
							<ul>
								<li><a class="color4" href="<?php echo base_url('compare'); ?>">Compare</a></li>			
						  </ul> 
						  <div class="clearfix"> </div>
					</div>
					
				</li>
				<li>
					
					<div class="banner-text">
						<h3>Sign UP</h3>
						<p>For buying and selling different vehicles and their part and to service your vehicle You need to sign up your own account in this site</p>
							<ul>
								<li><a class="color8" href="<?php echo base_url('employee/add'); ?>">SignUp</a></li>
						  </ul> 
						  <div class="clearfix"> </div>
					</div>
					
				</li>
				<li>
					<div class="banner-text">
						<h3>Sign In</h3>
						<p>If you have account You can sign In and can take benefit of this site</p>
							<ul>
								<li><a class="color4" href="<?php echo base_url('login'); ?>">LogIn</a></li>
						  </ul> 
						  <div class="clearfix"> </div>
					</div>
					
				</li>
			</ul>
		</div>
	</div>
</div>
<!--content-->
<div class="container">
	<div class="cont">
		<div class="content">
			<div class="content-top-bottom">
				<h2>Featured PRODUCTS</h2>
				<?php foreach($featured as $feature) : ?>
					<div class="col-md-4 men">
						<a href="<?php echo base_url('pages/show') . '/' . $feature['vehicle_id']; ?> " class="b-link-stripe b-animate-go  thickbox">
							<img style="height: 260px;" class="img-responsive" src="<?= base_url('uploads'); ?>/<?php echo $feature['image']; ?>" alt="">
							<div class="b-wrapper">
								<h3 class="b-animate b-from-top top-in   b-delay03 ">
								<span><?php echo $feature['model_name']; ?></span>
								</h3>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
				<div class="clearfix"> </div>
			</div>
			<div class="content-top" id="new">
				<h1>NEW PRODUCTS</h1>
				
				<div class="grid-in">
					{vehicles}
						<div class="col-md-3 grid-top simpleCart_shelfItem">
							<a href="<?= base_url(); ?>pages/show/{vehicle_id}" class="b-link-stripe b-animate-go  thickbox">
							<img class="img-responsive" src="<?= base_url('uploads/'); ?>/{image}" alt="">
								<div class="b-wrapper">
									<h3 class="b-animate b-from-left    b-delay03 ">
									<span>{model_name}</span>
									
									</h3>
								</div>
							</a>
							
							<p><a href="single.html">{model_name}</a></p>
						</div>
					{/vehicles}
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>	
	
</div>
<?php $this->load->view('public/partials/view_public_footer.php'); ?>