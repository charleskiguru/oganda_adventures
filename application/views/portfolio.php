<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>Oganda Adventures</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
	<!-- Bootstrap CSS
   ================================================== -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

	<!-- Animate CSS
   ================================================== -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">

	<!-- Font Icons
   ================================================== -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/et-line-font.css">

	<!-- Nivo Lightbox CSS
   ================================================== -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nivo-lightbox.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nivo_themes/default/default.css">

	<!-- Owl Carousel CSS
   ================================================== -->
   	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">

	<!-- BxSlider CSS
   ================================================== -->
   	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bxslider.css">

   	<!-- Main CSS
   	================================================== -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

	<!-- Google web font
   ================================================== -->
	<link href='https://fonts.googleapis.com/css?family=Raleway:700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" >
        var baseDir = '<?php echo base_url(); ?>';
    </script>
	
</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


<!-- Preloader section
================================================== -->
<section  class="preloader">

	<div class="sk-rotating-plane"></div>

</section>


<!-- Navigation section
================================================== -->
<section class="navbar navbar-fixed-top custom-navbar" role="navigation">
	<div class="container">

		<div class="navbar-header">
			<a href="<?php echo base_url(); ?>" class="navbar-brand"><img src="<?php echo base_url(); ?>assets/images/logo.jpg" /></a>
		</div>
	</div>
</section>

<!-- Portfolio section
================================================== -->
<section id="portfolio" class="parallax-section">
	<div class="container">
		<div class="row">

			<!-- Section title
			================================================== -->
			<div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
				<div class="section-title">
					<h2 class="heading">Our Gallery</h2>
				</div>
			</div>
			<?php
				foreach ($gallery_images as $key => $val) {
			?>
            <div class="col-md-4 col-sm-6">
				<div class="grid">
              		<figure class="effect-zoe">
						<img src="<?php echo base_url(); ?>assets/images/gallery/<?=$val['image']?>" alt="portfolio img"/>
							<figcaption>
								<h2>Camping</h2>
								<p class="icon-links">
									<a href="<?php echo base_url(); ?>assets/images/gallery/<?=$val['image']?>" data-lightbox-gallery="portfolio-gallery" title="<?=$val['description']?>"><span class="icon icon-attachment"></span></a>
								</p>
							</figcaption>			
					</figure>
				</div>
            </div>   
				<?php } ?>			

            <!-- Portfolio bottom section
			================================================== -->  

		</div>
		<div class="row">
			<?php 
				foreach ($gallery_videos as $key => $v_val) {
			?>
			<div class="col-md-4 col-sm-6">
				<div class="grid">
              		<figure class="effect-zoe">
						<iframe height="250" src="<?=$v_val['youtube_link']?>" frameborder="0" allowfullscreen></iframe>			
					</figure>
				</div>
			</div> 
			<?php } ?>
		</div>
	</div>
</section>

<!-- Footer section
================================================== -->
<footer class="footer">
	<div class="container" background-color="white">
		<div class="row">
					<div class="col-md-8 col-sm-7">
					<p></p>
						<small><a rel="nofollow" href="#">Copyright &copy; 2019 Oganda Adventures</a></small>
					</div>
					<div class="col-md-4 col-sm-5">
						<ul class="social-icon">
							<li><a href="#" class="fa fa-facebook"></a></li>
							<li><a href="#" class="fa fa-twitter"></a></li>
							<li><a href="#" class="fa fa-instagram"></a></li>
							<li><a href="#" class="fa fa-google"></a></li>
						</ul>
					</div>
				</div>
	</div>
</footer>


<!-- Javascript 
================================================== -->
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/smoothscroll.js"></script>
<script src="<?php echo base_url(); ?>assets/js/nivo-lightbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.easing-1.3.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.parallax.js"></script>
<script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

</body>
</html>