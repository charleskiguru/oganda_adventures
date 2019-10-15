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

<!-- Plan section
================================================== -->
<section id="plan" class="parallax-section">
	<div class="container">
		<div class="row">

			<!-- Section title
			================================================== -->
			<div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 wow fadeInUp">
				<div class="section-title">
					<h5 class="wow bounceIn">UNIQUE ADVENTURES</h5>
					<h1 class="heading color-white">TRIP PLANS</h1>
					<hr>
					<p class="color-white">When you want to go for a trip, don't do it alone because it can pretty boring. Thats why we have plans to cater for you. Our plans are to ensure everyone is covered and are not left out.</p>
				</div>
			</div>

			<?php
				//print_r($plans);

				foreach ($plans as $key => $val) {
				?>
					<div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
						<div class="plan">
							<h4 class="text-center"><?=$val['plan_name']?></h4>
							<img src="<?php echo base_url(); ?>assets/upload/<?=$val['image']?>" alt="Ngong hills" class="img-responsive"><hr>
							<?=$val['description']?><hr>
							<span>
								<img src="<?php echo base_url(); ?>assets/images/calendar.jpg" alt="Ngong hills" height="18" class="img">
								Date : <?=$val['start_date']?>
							</span><br/>
							<div class="plan-cost">
							Price : <b>KES <?=$val['plan_cost']?></b> per person.
							</div>
							<div class="plan-button">
								<div class="plan_id"></div>
								<button id="addButton" type="button" cost="<?=$val['plan_cost']?>" value="<?=$val['plan_name']?>" data-backdrop="false" class="btn btn-warning btn-block book">Book now</button>
							</div>
						</div>
					</div>
				<?php } ?>

		</div>
	</div>
</section>
<div id="bookModal" data-backdrop="false" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
		<h4 class="modal-title">Book Tour</h4>
      </div>
      <div class="modal-body">
		<div class="alert alert-success" style="display: none;"></div>
        <form id="bookForm" action="" method="post" value="" class="form-horizontal">
			<input id="plan_nam" type="hidden" name="plan_name" value="">
			<input id="plan_cos" type="hidden" name="plan_cost" value="">
			<div class="form-group">
				<label for="firstname" class="label-control col-md-4">First Name <span style="color: red !important; display: inline; float: none;">*</span> </label>
				<div class="col-md-8">
					<input type="text" name="first_name" class="form-control">
					<span class="text-danger f_name"></span>
				</div>
			</div>
			<div class="form-group">
				<label for="lastname" class="label-control col-md-4">Last Name <span style="color: red !important; display: inline; float: none;">*</span> </label>
				<div class="col-md-8">
					<input type="text" name="last_name" class="form-control">
					<span class="text-danger l_name"></span>
				</div>
			</div>
			<div class="form-group">
				<label for="address" class="label-control col-md-4">Email Address <span style="color: red !important; display: inline; float: none;">*</span> </label>
				<div class="col-md-8">
					<input type="email" name="email" class="form-control">
					<span class="text-danger email"></span>
				</div>
			</div>
			<div class="form-group">
				<label for="phone" class="label-control col-md-4">Phone Number <span style="color: red !important; display: inline; float: none;">*</span> </label>
				<div class="col-md-8">
					<input type="number" name="phoneno" class="form-control">
					<span class="text-danger phoneno"></span>
				</div>
			</div>
			<div class="form-group">
				<label for="adults" class="label-control col-md-4">No of adults <span style="color: red !important; display: inline; float: none;">*</span> </label>
				<div class="col-md-8">
					<input id="no_adult" type="number" name="no_adults" class="form-control">
					<span class="text-danger adults"></span>
				</div>
			</div>
			<div class="form-group">
				<label for="kids" class="label-control col-md-4">No of kids <span style="color: red !important; display: inline; float: none;">*</span> </label>
				<div class="col-md-8">
					<input id="no_kid" type="number" name="no_kids" class="form-control">
					<span class="text-danger kids"></span>
				</div>
			</div>
			<div class="form-group">
				<label for="nation" class="label-control col-md-4">Nationality <span style="color: red !important; display: inline; float: none;">*</span> </label>
				<div class="col-md-8">
					<select id="nationality" name="nationality" class="form-control">
					<option value="Afghanistan">Afghanistan</option>
					<option value="Åland Islands">Åland Islands</option>
					<option value="Albania">Albania</option>
					<option value="Algeria">Algeria</option>
					<option value="American Samoa">American Samoa</option>
					<option value="Andorra">Andorra</option>
					<option value="Angola">Angola</option>
					<option value="Anguilla">Anguilla</option>
					<option value="Antarctica">Antarctica</option>
					<option value="Antigua and Barbuda">Antigua and Barbuda</option>
					<option value="Argentina">Argentina</option>
					<option value="Armenia">Armenia</option>
					<option value="Aruba">Aruba</option>
					<option value="Australia">Australia</option>
					<option value="Austria">Austria</option>
					<option value="Azerbaijan">Azerbaijan</option>
					<option value="Bahamas">Bahamas</option>
					<option value="Bahrain">Bahrain</option>
					<option value="Bangladesh">Bangladesh</option>
					<option value="Barbados">Barbados</option>
					<option value="Belarus">Belarus</option>
					<option value="Belgium">Belgium</option>
					<option value="Belize">Belize</option>
					<option value="Benin">Benin</option>
					<option value="Bermuda">Bermuda</option>
					<option value="Bhutan">Bhutan</option>
					<option value="Bolivia">Bolivia</option>
					<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
					<option value="Botswana">Botswana</option>
					<option value="Bouvet Island">Bouvet Island</option>
					<option value="Brazil">Brazil</option>
					<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
					<option value="Brunei Darussalam">Brunei Darussalam</option>
					<option value="Bulgaria">Bulgaria</option>
					<option value="Burkina Faso">Burkina Faso</option>
					<option value="Burundi">Burundi</option>
					<option value="Cambodia">Cambodia</option>
					<option value="Cameroon">Cameroon</option>
					<option value="Canada">Canada</option>
					<option value="Cape Verde">Cape Verde</option>
					<option value="Cayman Islands">Cayman Islands</option>
					<option value="Central African Republic">Central African Republic</option>
					<option value="Chad">Chad</option>
					<option value="Chile">Chile</option>
					<option value="China">China</option>
					<option value="Christmas Island">Christmas Island</option>
					<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
					<option value="Colombia">Colombia</option>
					<option value="Comoros">Comoros</option>
					<option value="Congo">Congo</option>
					<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
					<option value="Cook Islands">Cook Islands</option>
					<option value="Costa Rica">Costa Rica</option>
					<option value="Cote D'ivoire">Cote D'ivoire</option>
					<option value="Croatia">Croatia</option>
					<option value="Cuba">Cuba</option>
					<option value="Cyprus">Cyprus</option>
					<option value="Czech Republic">Czech Republic</option>
					<option value="Denmark">Denmark</option>
					<option value="Djibouti">Djibouti</option>
					<option value="Dominica">Dominica</option>
					<option value="Dominican Republic">Dominican Republic</option>
					<option value="Ecuador">Ecuador</option>
					<option value="Egypt">Egypt</option>
					<option value="El Salvador">El Salvador</option>
					<option value="Equatorial Guinea">Equatorial Guinea</option>
					<option value="Eritrea">Eritrea</option>
					<option value="Estonia">Estonia</option>
					<option value="Ethiopia">Ethiopia</option>
					<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
					<option value="Faroe Islands">Faroe Islands</option>
					<option value="Fiji">Fiji</option>
					<option value="Finland">Finland</option>
					<option value="France">France</option>
					<option value="French Guiana">French Guiana</option>
					<option value="French Polynesia">French Polynesia</option>
					<option value="French Southern Territories">French Southern Territories</option>
					<option value="Gabon">Gabon</option>
					<option value="Gambia">Gambia</option>
					<option value="Georgia">Georgia</option>
					<option value="Germany">Germany</option>
					<option value="Ghana">Ghana</option>
					<option value="Gibraltar">Gibraltar</option>
					<option value="Greece">Greece</option>
					<option value="Greenland">Greenland</option>
					<option value="Grenada">Grenada</option>
					<option value="Guadeloupe">Guadeloupe</option>
					<option value="Guam">Guam</option>
					<option value="Guatemala">Guatemala</option>
					<option value="Guernsey">Guernsey</option>
					<option value="Guinea">Guinea</option>
					<option value="Guinea-bissau">Guinea-bissau</option>
					<option value="Guyana">Guyana</option>
					<option value="Haiti">Haiti</option>
					<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
					<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
					<option value="Honduras">Honduras</option>
					<option value="Hong Kong">Hong Kong</option>
					<option value="Hungary">Hungary</option>
					<option value="Iceland">Iceland</option>
					<option value="India">India</option>
					<option value="Indonesia">Indonesia</option>
					<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
					<option value="Iraq">Iraq</option>
					<option value="Ireland">Ireland</option>
					<option value="Isle of Man">Isle of Man</option>
					<option value="Israel">Israel</option>
					<option value="Italy">Italy</option>
					<option value="Jamaica">Jamaica</option>
					<option value="Japan">Japan</option>
					<option value="Jersey">Jersey</option>
					<option value="Jordan">Jordan</option>
					<option value="Kazakhstan">Kazakhstan</option>
					<option value="Kenya">Kenya</option>
					<option value="Kiribati">Kiribati</option>
					<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
					<option value="Korea, Republic of">Korea, Republic of</option>
					<option value="Kuwait">Kuwait</option>
					<option value="Kyrgyzstan">Kyrgyzstan</option>
					<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
					<option value="Latvia">Latvia</option>
					<option value="Lebanon">Lebanon</option>
					<option value="Lesotho">Lesotho</option>
					<option value="Liberia">Liberia</option>
					<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
					<option value="Liechtenstein">Liechtenstein</option>
					<option value="Lithuania">Lithuania</option>
					<option value="Luxembourg">Luxembourg</option>
					<option value="Macao">Macao</option>
					<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
					<option value="Madagascar">Madagascar</option>
					<option value="Malawi">Malawi</option>
					<option value="Malaysia">Malaysia</option>
					<option value="Maldives">Maldives</option>
					<option value="Mali">Mali</option>
					<option value="Malta">Malta</option>
					<option value="Marshall Islands">Marshall Islands</option>
					<option value="Martinique">Martinique</option>
					<option value="Mauritania">Mauritania</option>
					<option value="Mauritius">Mauritius</option>
					<option value="Mayotte">Mayotte</option>
					<option value="Mexico">Mexico</option>
					<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
					<option value="Moldova, Republic of">Moldova, Republic of</option>
					<option value="Monaco">Monaco</option>
					<option value="Mongolia">Mongolia</option>
					<option value="Montenegro">Montenegro</option>
					<option value="Montserrat">Montserrat</option>
					<option value="Morocco">Morocco</option>
					<option value="Mozambique">Mozambique</option>
					<option value="Myanmar">Myanmar</option>
					<option value="Namibia">Namibia</option>
					<option value="Nauru">Nauru</option>
					<option value="Nepal">Nepal</option>
					<option value="Netherlands">Netherlands</option>
					<option value="Netherlands Antilles">Netherlands Antilles</option>
					<option value="New Caledonia">New Caledonia</option>
					<option value="New Zealand">New Zealand</option>
					<option value="Nicaragua">Nicaragua</option>
					<option value="Niger">Niger</option>
					<option value="Nigeria">Nigeria</option>
					<option value="Niue">Niue</option>
					<option value="Norfolk Island">Norfolk Island</option>
					<option value="Northern Mariana Islands">Northern Mariana Islands</option>
					<option value="Norway">Norway</option>
					<option value="Oman">Oman</option>
					<option value="Pakistan">Pakistan</option>
					<option value="Palau">Palau</option>
					<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
					<option value="Panama">Panama</option>
					<option value="Papua New Guinea">Papua New Guinea</option>
					<option value="Paraguay">Paraguay</option>
					<option value="Peru">Peru</option>
					<option value="Philippines">Philippines</option>
					<option value="Pitcairn">Pitcairn</option>
					<option value="Poland">Poland</option>
					<option value="Portugal">Portugal</option>
					<option value="Puerto Rico">Puerto Rico</option>
					<option value="Qatar">Qatar</option>
					<option value="Reunion">Reunion</option>
					<option value="Romania">Romania</option>
					<option value="Russian Federation">Russian Federation</option>
					<option value="Rwanda">Rwanda</option>
					<option value="Saint Helena">Saint Helena</option>
					<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
					<option value="Saint Lucia">Saint Lucia</option>
					<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
					<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
					<option value="Samoa">Samoa</option>
					<option value="San Marino">San Marino</option>
					<option value="Sao Tome and Principe">Sao Tome and Principe</option>
					<option value="Saudi Arabia">Saudi Arabia</option>
					<option value="Senegal">Senegal</option>
					<option value="Serbia">Serbia</option>
					<option value="Seychelles">Seychelles</option>
					<option value="Sierra Leone">Sierra Leone</option>
					<option value="Singapore">Singapore</option>
					<option value="Slovakia">Slovakia</option>
					<option value="Slovenia">Slovenia</option>
					<option value="Solomon Islands">Solomon Islands</option>
					<option value="Somalia">Somalia</option>
					<option value="South Africa">South Africa</option>
					<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
					<option value="Spain">Spain</option>
					<option value="Sri Lanka">Sri Lanka</option>
					<option value="Sudan">Sudan</option>
					<option value="Suriname">Suriname</option>
					<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
					<option value="Swaziland">Swaziland</option>
					<option value="Sweden">Sweden</option>
					<option value="Switzerland">Switzerland</option>
					<option value="Syrian Arab Republic">Syrian Arab Republic</option>
					<option value="Taiwan, Province of China">Taiwan, Province of China</option>
					<option value="Tajikistan">Tajikistan</option>
					<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
					<option value="Thailand">Thailand</option>
					<option value="Timor-leste">Timor-leste</option>
					<option value="Togo">Togo</option>
					<option value="Tokelau">Tokelau</option>
					<option value="Tonga">Tonga</option>
					<option value="Trinidad and Tobago">Trinidad and Tobago</option>
					<option value="Tunisia">Tunisia</option>
					<option value="Turkey">Turkey</option>
					<option value="Turkmenistan">Turkmenistan</option>
					<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
					<option value="Tuvalu">Tuvalu</option>
					<option value="Uganda">Uganda</option>
					<option value="Ukraine">Ukraine</option>
					<option value="United Arab Emirates">United Arab Emirates</option>
					<option value="United Kingdom">United Kingdom</option>
					<option value="United States">United States</option>
					<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
					<option value="Uruguay">Uruguay</option>
					<option value="Uzbekistan">Uzbekistan</option>
					<option value="Vanuatu">Vanuatu</option>
					<option value="Venezuela">Venezuela</option>
					<option value="Viet Nam">Viet Nam</option>
					<option value="Virgin Islands, British">Virgin Islands, British</option>
					<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
					<option value="Wallis and Futuna">Wallis and Futuna</option>
					<option value="Western Sahara">Western Sahara</option>
					<option value="Yemen">Yemen</option>
					<option value="Zambia">Zambia</option>
					<option value="Zimbabwe">Zimbabwe</option>
				</select>
				</div>     
			</div>
			<input type="hidden" id="cost" readonly="true" name="total_cost" class="form-control">
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnBook" class="btn btn-primary">Book</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
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
<script>
	$(function(){
		$('.book').click(function(){
			var name = $(this).attr("value");
			var cost = $(this).attr("cost");
			$('#bookModal').modal('show');
			$('#bookModal').find('.modal-title').text(name);
			$('#bookModal').find('#plan_nam').val(name);
			$('#bookModal').find('#plan_cos').val(cost);
			$('#bookForm').attr('action','<?php echo base_url(); ?>welcome/booking');
		});
		$('#btnBook').click(function(){
			var adultCost = $('#plan_cos').val();
			var kidCost = (adultCost)/2;
			var noAd = $('#no_adult').val();
			var noKi = $('#no_kid').val();
			var total_adults= (noAd * adultCost);
			var total_kids= (noKi * kidCost);
			var total = (total_adults + total_kids);
			$('#bookModal').find('#cost').val(total);
			
			var url = $('#bookForm').attr('action');
			var data = $('#bookForm').serialize();
			var planName = $('input[name=plan_name]');
			var firstName = $('input[name=first_name]');
			var lastName = $('input[name=last_name]');
			var Email = $('input[name=email]');
			var phoneNumber = $('input[name=phoneno]');
			var noAdults = $('input[name=no_adults]');
			var noKids = $('input[name=no_kids]');
			var TotalCost = $('input[name=total_cost]');
			var Nation = $('select[name=nationality]');

			var result = '';
			if(firstName.val()==''){
				firstName.parent().parent().addClass('has-error');
				$('.f_name').text('This field is required.');
			}
			else{
				firstName.parent().parent().removeClass('has-error');
				$('.f_name').text('');
				result +='1';
			}
			if(lastName.val()==''){
				lastName.parent().parent().addClass('has-error');
				$('.l_name').text('This field is required.');
			}
			else{
				lastName.parent().parent().removeClass('has-error');
				$('.l_name').text('');
				result += '2';
			}
			if(Email.val()==''){
				Email.parent().parent().addClass('has-error');
				$('.email').text('This field is required.');
			}
			else{
				Email.parent().parent().removeClass('has-error');
				$('.email').text('');
				result += '3';
			}
			if(phoneNumber.val()==''){
				phoneNumber.parent().parent().addClass('has-error');
				$('.phoneno').text('This field is required.');
			}
			else{
				phoneNumber.parent().parent().removeClass('has-error');
				$('.phoneno').text('');
				result += '4';
			}
			if(noAdults.val()==''){
				noAdults.parent().parent().addClass('has-error');
				$('.adults').text('This field is required.');
			}
			else{
				noAdults.parent().parent().removeClass('has-error');
				$('.adults').text('');
				result += '5';
			}
			if(noKids.val()==''){
				noKids.parent().parent().addClass('has-error');
				$('.kids').text('This field is required.');
			}
			else{
				noKids.parent().parent().removeClass('has-error');
				$('.kids').text('');
				result += '6';
			}
			if(Nation.val()==''){
				Nation.parent().parent().addClass('has-error');
			}
			else{
				Nation.parent().parent().removeClass('has-error');
				result += '7';
			}
			if(result=='1234567'){
				$.ajax({
					type:'ajax',
					method:'post',
					url:url,
					data:data,
					async:false,
					dataType:'json',
					success: function(response){
						if(response.success){
							$('#bookForm')[0].reset();
							$('.alert-success').html('Booking Successful!. Please confirm the payments, Thankyou.').fadeIn().delay(4000).fadeOut('slow');
						}
						else{
							alert('error');
						}
					},
					error: function(){
						alert('Unable to book tour');
					}
				});
			}
		});
        $(document).on('click', '#addButton', function(){
            $('#bookForm' ).each(function(){
                this.reset();
            });
        });
	});
</script>