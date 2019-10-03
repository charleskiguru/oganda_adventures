<?php $this->load->view('includes/header'); ?>
<!-- Contact section
================================================== -->
<section id="contact" class="parallax-section">
	<div class="container">
		<div class="row">

			<!-- Section title
			================================================== -->
			<div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
				<div class="section-title">
					<h5 class="wow bounceIn">PLAN YOUR TRIP</h5>
					<h1 class="heading">CONTACT US</h1>
					<hr>
					<p>Our customer support services are the best in the bliz, with a 99 % customer satisfaction rating.</p>
				</div>
			</div>

			<!-- Contact form section
			================================================== -->
			<div class="col-md-offset-1 col-md-10 col-sm-12">
				<form action="<?php echo base_url(); ?>contact" method="post" class="wow fadeInUp" data-wow-delay="0.6s">
					<div class="col-md-4 col-sm-6">
						<input type="text" name="name" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>" class="form-control" placeholder="Name">
						<?php echo form_error('name','<p class="field-error">','</p>'); ?>
					</div>
					<div class="col-md-4 col-sm-6">
						<input type="email" name="email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" class="form-control" placeholder="Email">
						<?php echo form_error('email','<p class="field-error">','</p>'); ?>
					</div>
					<div class="col-md-4 col-sm-12">
						<input type="text" name="subject" value="<?php echo !empty($postData['subject'])?$postData['subject']:''; ?>" class="form-control" placeholder="Subject">
						<?php echo form_error('subject','<p class="field-error">','</p>'); ?>
					</div>
					<div class="col-md-12 col-sm-12">
						<textarea class="form-control" name="message" value="<?php echo !empty($postData['message'])?$postData['message']:''; ?>" placeholder="Message" rows="7"></textarea>
						<?php echo form_error('message','<p class="field-error">','</p>'); ?>
					</div>
					<div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8">
						<input type="submit" name="contactSubmit" class="form-control" value="SHOOT MESSAGE">
					</div>
				</form>
			</div>

			<!-- Contact detail section
			================================================== -->
			<div class="contact-detail col-md-12 col-sm-12">
				<div class="col-md-6 col-sm-6">
					<h3><i class="icon-envelope medium-icon wow bounceIn" data-wow-delay="0.6s"></i> EMAIL</h3>
					<p>info@ogandaadventures.com</p>
				</div>
				<div class="col-md-6 col-sm-6">
					<h3><i class="icon-phone medium-icon wow bounceIn" data-wow-delay="0.6s"></i> PHONES</h3>
					<p>0703286210 | 0707434321 | 0797227594</p>
				</div>
			</div>

		</div>
	</div>
</section>
<?php $this->load->view('includes/footer'); ?>