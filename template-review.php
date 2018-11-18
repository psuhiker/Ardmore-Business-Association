<?php /* 
Template Name: Business Review Page
*/ ?>

<?php include (TEMPLATEPATH . '/meta.php' ); ?>
<?php include (TEMPLATEPATH . '/google.php' ); ?>

<?php $businessID = $_SERVER['QUERY_STRING']; ?>

<?php // } elseif (false !== strpos($url,'?' . $key )) { ?>

</head>

<body class="secondary page<?php the_ID(); ?>">

	<?php include (TEMPLATEPATH . '/header.php' ); ?>
	
	<div id="content">
	
		<section class="content">
			<div class="container">
			
				<br>
				
				<style><!--
					body {
						background-color: #f3f7eb;
					}
					table {
						background-color: #fff;
					}
					input[type=text] {
						width: 100%;
						padding: 10px;
						font-size: 11pt;
						border: 1px solid #ccc;
					}
					textarea {
						width: 100%;
						padding: 10px;
						height: 300px;
						font-size: 11pt;
						border: 1px solid #ccc;
					}
					td:first-child {
						width: 200px;
						font-size: 11pt;
						padding: 10px;
						text-align: right;
						padding-top: 30px !important;
					}
					td {
						padding:  20px !important;
					}
					dl {
						font-size: 11pt;
						padding-top: 10px;
					}
					dl input {
						margin-bottom: 20px;
					}
					dt {
						font-weight: normal;
					}
				--></style>
				
				<div class="col-sm-12 main">
					
					<?php
						$post_id = $businessID;
						$queried_post = get_post($post_id);
						$title = $queried_post->post_title; 
						$street_address = get_field('street_address', $businessID);
						$street_address_two = get_field('street_address_two', $businessID);
						$city = get_field('city', $businessID);
						$state = get_field('state', $businessID);
						$zip_code = get_field('zip_code', $businessID);
						$website = get_field('website', $businessID);
						$email = get_field('email', $businessID);
						$summary = get_field('summary', $businessID, false);
						$logo = get_field('logo', $businessID);
						$image = get_field('image', $businessID);
						$aba = get_field('aba_membership', $businessID);
						$phone = get_field('numbers', $businessID);
							$phone_one = $phone[0];
							$phone_one_number = $phone_one['number'];
							$phone_two = $phone[1];
							$phone_two_number = $phone_two['number'];
						$social = get_field('social', $businessID);
							$social_one = $social[0];
							$social_one_service = $social_one['service'];
							$social_one_url = $social_one['url'];
							$social_two = $social[1];
							$social_two_service = $social_two['service'];
							$social_two_url = $social_two['url'];
							$social_three = $social[2];
							$social_three_service = $social_three['service'];
							$social_three_url = $social_three['url'];
							$social_four = $social[3];
							$social_four_service = $social_four['service'];
							$social_four_url = $social_four['url'];
							$social_five = $social[4];
							$social_five_service = $social_five['service'];
							$social_five_url = $social_five['url'];
						$hours = get_field('hours', $businessID);
							$hours_one = $hours[0];
							$hours_one_label = $hours_one['label'];
							$hours_one_details = $hours_one['details'];
							$hours_two = $hours[1];
							$hours_two_label = $hours_two['label'];
							$hours_two_details = $hours_two['details'];
							$hours_three = $hours[2];
							$hours_three_label = $hours_three['label'];
							$hours_three_details = $hours_three['details'];
							$hours_four = $hours[3];
							$hours_four_label = $hours_four['label'];
							$hours_four_details = $hours_four['details'];
							$hours_five = $hours[4];
							$hours_five_label = $hours_five['label'];
							$hours_five_details = $hours_five['details'];
							$hours_six = $hours[5];
							$hours_six_label = $hours_six['label'];
							$hours_six_details = $hours_six['details'];
							$hours_seven = $hours[6];
							$hours_seven_label = $hours_seven['label'];
							$hours_seven_details = $hours_seven['details'];
							$hours_eight = $hours[7];
							$hours_eight_label = $hours_eight['label'];
							$hours_eight_details = $hours_eight['details'];
					{ ?>
					
						<h1><?php echo $title; ?></h1>
						<h2><?php the_field('title'); ?></h2>
					
						<p>Below are the business details that we have for <strong><?php echo $title; ?></strong>. If you need to update any of the information below, make your edits and click the 'Update Profile' button.</p>
						
						<br>
					
						<form id="ninja_forms_form_10" enctype="multipart/form-data" method="post" name="" action="" class="ninja-forms-form">
							<input type="hidden" id="_wpnonce" name="_wpnonce" value="563f54d3d3"><input type="hidden" name="_wp_http_referer" value="/review/">	<input type="hidden" name="_ninja_forms_display_submit" value="1">
							<input type="hidden" name="_form_id" id="_form_id" value="10">
							<div class="hp-wrap" style="display: none;">
								<label>If you are a human and are seeing this field, please leave it blank.			<input type="text" value="" name="_AZadH">
									<input type="hidden" value="_AZadH" name="_hp_name">
								</label>
							</div>
					
						<table class="table table-striped">
							
							<tr>
								<td>Business Name:</td>
								<td>
									<input type="hidden" id="ninja_forms_field_22_type" value="text">
									<input id="ninja_forms_field_22" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_22" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $title; ?>" rel="22">
								</td>
							</tr>
							<tr>
								<td>Street Address One:</td>
								<td>
									<input type="hidden" id="ninja_forms_field_23_type" value="text">
									<input id="ninja_forms_field_23" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_23" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $street_address; ?>" rel="23">
								</td>
							</tr>
							<tr>
								<td>Street Address Two:</td>
								<td>
									<input type="hidden" id="ninja_forms_field_24_type" value="text">
									<input id="ninja_forms_field_24" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_24" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $street_address_two; ?>" rel="24">
								</td>
							</tr>
							<tr>
								<td>City:</td>
								<td>
									<input type="hidden" id="ninja_forms_field_25_type" value="text">
									<input id="ninja_forms_field_25" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_25" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $city; ?>" rel="25">
								</td>
							</tr>
							<tr>
								<td>State:</td>
								<td>
									<input type="hidden" id="ninja_forms_field_26_type" value="text">
									<input id="ninja_forms_field_26" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_26" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $state; ?>" rel="26">
								</td>
							</tr>
							<tr>
								<td>Zip Code:</td>
								<td>
									<input type="hidden" id="ninja_forms_field_27_type" value="text">
									<input id="ninja_forms_field_27" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_27" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $zip_code; ?>" rel="27">
								</td>
							</tr>
							<tr>
								<td>Phone:</td>
								<td>
									<input type="hidden" id="ninja_forms_field_34_type" value="text">
									<input id="ninja_forms_field_34" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_34" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $phone_one_number; ?>" rel="34">
								</td>
							</tr>
							<tr>
								<td>Fax:</td>
								<td>
									<input type="hidden" id="ninja_forms_field_35_type" value="text">
									<input id="ninja_forms_field_35" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_35" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $phone_two_number; ?>" rel="35">
								</td>
							</tr>
							<tr>
								<td>Hours:</td>
								<td>
<input type="hidden" id="ninja_forms_field_46_type" value="textarea">
<textarea name="ninja_forms_field_46" id="ninja_forms_field_46" class="ninja-forms-field " rel="46" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left">
<?php echo $hours_one_label; ?> <?php echo $hours_one_details; ?>&#13;&#10;
<?php echo $hours_two_label; ?> <?php echo $hours_two_details; ?>&#13;&#10;
<?php echo $hours_three_label; ?> <?php echo $hours_three_details; ?>&#13;&#10;
<?php echo $hours_four_label; ?> <?php echo $hours_four_details; ?>&#13;&#10;
<?php echo $hours_five_label; ?> <?php echo $hours_five_details; ?>&#13;&#10;
<?php echo $hours_six_label; ?> <?php echo $hours_six_details; ?>&#13;&#10;
<?php echo $hours_seven_label; ?> <?php echo $hours_seven_details; ?>&#13;&#10;
<?php echo $hours_eight_label; ?> <?php echo $hours_eight_details; ?>
</textarea>
								</td>
							</tr>
							
							<?php if ($aba == 1){ ?>
							
							<tr>
								<td>Website:</td>
								<td>
									<input type="hidden" id="ninja_forms_field_28_type" value="text">
									<input id="ninja_forms_field_28" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_28" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $website; ?>" rel="28">
								</td>
							</tr>
							<tr>
								<td>Email:</td>
								<td>
									<input type="hidden" id="ninja_forms_field_29_type" value="text">
									<input id="ninja_forms_field_29" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_29" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $email; ?>" rel="29">
								</td>
							</tr>
							<tr>
								<td>Summary:</td>
								<td>
									<input type="hidden" id="ninja_forms_field_30_type" value="textarea">
									<textarea name="ninja_forms_field_30" id="ninja_forms_field_30" class="ninja-forms-field " rel="30" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left"><?php echo $summary; ?></textarea>
								</td>
							</tr>
							<tr>
								<td>Social Profiles:</td>
								<td>
									<dl class="dl-horizontal">
										<dt>
											<input type="hidden" id="ninja_forms_field_36_type" value="text">
											<input id="ninja_forms_field_36" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_36" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $social_one_service; ?>" rel="36">
										</dt>
										<dd>
											<input type="hidden" id="ninja_forms_field_37_type" value="text">
											<input id="ninja_forms_field_37" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_37" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $social_one_url; ?>" rel="37">
										</dd>
										<dt>
											<input type="hidden" id="ninja_forms_field_38_type" value="text">
											<input id="ninja_forms_field_38" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_38" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $social_two_service; ?>" rel="38">
										</dt>
										<dd>
											<input type="hidden" id="ninja_forms_field_39_type" value="text">
											<input id="ninja_forms_field_39" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_39" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $social_two_url; ?>" rel="39">
										</dd>
										<dt>
											<input type="hidden" id="ninja_forms_field_40_type" value="text">
											<input id="ninja_forms_field_40" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_40" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $social_three_service; ?>" rel="40">
										</dt>
										<dd>
											<input type="hidden" id="ninja_forms_field_41_type" value="text">
											<input id="ninja_forms_field_41" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_41" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $social_three_url; ?>" rel="41">
										</dd>
										<dt>
											<input type="hidden" id="ninja_forms_field_42_type" value="text">
											<input id="ninja_forms_field_42" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_42" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $social_four_service; ?>" rel="42">
										</dt>
										<dd>
											<input type="hidden" id="ninja_forms_field_43_type" value="text">
											<input id="ninja_forms_field_43" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_43" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $social_four_url; ?>" rel="43">
										</dd>
										<dt>
											<input type="hidden" id="ninja_forms_field_44_type" value="text">
											<input id="ninja_forms_field_44" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_44" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $social_five_service; ?>" rel="44">
										</dt>
										<dd>
											<input type="hidden" id="ninja_forms_field_45_type" value="text">
											<input id="ninja_forms_field_45" data-mask="" data-input-limit="" data-input-limit-type="char" data-input-limit-msg="character(s) left" name="ninja_forms_field_45" type="text" placeholder="" class="ninja-forms-field  " value="<?php echo $social_five_url; ?>" rel="45">
										</dd>
									</dl>
								</td>
							</tr>
							<tr>
								<td>Logo:</td>
								<td>
									<div class="col-xs-4">
										<img src="<?php echo $logo; ?>">
									</div>
									<div class="col-xs-8">
										<br>
										<p><strong>Upload a New Logo:</strong></p>
										<input type="hidden" id="ninja_forms_field_32_type" value="upload">
										<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
										<input type="file" name="ninja_forms_field_32[new][]" id="ninja_forms_field_32" class="" maxlength="" rel="32">
										<input type="hidden" name="ninja_forms_field_32[new][]" value="" rel="32">
										<input type="hidden" name="ninja_forms_field_32[]" value="" rel="32">
									</div>
								</td>
							</tr>
							<tr>
								<td>Business Image:</td>
								<td>
									<div class="col-xs-4">
										<img src="<?php echo $image; ?>">
									</div>
									<div class="col-xs-8">
										<br>
										<p><strong>Upload a New Business Image:</strong></p>
										<input type="hidden" id="ninja_forms_field_33_type" value="upload">
										<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
										<input type="file" name="ninja_forms_field_33[new][]" id="ninja_forms_field_33" class="" maxlength="" rel="33">
										<input type="hidden" name="ninja_forms_field_33[new][]" value="" rel="33">
										<input type="hidden" name="ninja_forms_field_33[]" value="" rel="33">
									</div>
								</td>
							</tr>
							
							<?php } ?>
							
						</table>
						
						<input type="hidden" id="ninja_forms_field_31_type" value="submit">
						<input type="submit" name="_ninja_forms_field_31" class="button red large alignright" id="ninja_forms_field_31" value="Update Profile" rel="31">
						
						</form>
						
						<!--
							Need:
							- Hours
						-->
							
					<?php } ?>
				
				</div>
				
			</div>
		</section>
	
	</div>
	
	<?php get_footer(); ?>
	
	<?php include (TEMPLATEPATH . '/meta-footer.php' ); ?>

</body>