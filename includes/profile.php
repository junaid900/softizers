<?php

$Mngid = $_SESSION[ 'user_reg' ];

$frow = $conf->singlev( Users . " where id='$Mngid'" );

?>

<div class="col-md-12">

	<?php include('includes/messages-display.php')?>

</div>

<div class="page-title">

	<div class="title_left">

		<!----------- Page Main Heading ----------->

		<h3>Personal Details</h3>

	</div>

</div>

<div class="row">

	<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="x_panel">

			<div class="x_content">

				<div class="form-group">

					<div class="col-md-9 col-sm-12 col-xs-12" style="margin-top: 5%;">
						<div class="col-xs-6">
							<label for="input01" class="col-md-4 col-sm-6 col-xs-12 control-label"> Full Name:</label>

							<div class="col-md-8 col-sm-6 col-xs-12">

								<p>

									<?php echo $frow->full_name; ?>

								</p>

							</div>
						</div>
						<div class="col-xs-6">
							<label for="input01" class="col-md-4 col-sm-6 col-xs-12 control-label"> Username:</label>

							<div class="col-md-8 col-sm-6 col-xs-12">

								<p>

									<?php echo $frow->login; ?>

								</p>

							</div>
						</div>
						<div class="col-xs-6">
							<label for="input01" class="col-md-4 col-sm-6 col-xs-12 control-label"> Email:</label>

							<div class="col-md-8 col-sm-6 col-xs-12">

								<p>

									<?php echo $frow->email; ?>

								</p>

							</div>
						</div>
		<!--				<div class="col-xs-6">
							<label for="input01" class="col-md-4 col-sm-6 col-xs-12 control-label"> Site Name:</label>

							<div class="col-md-8 col-sm-6 col-xs-12">

								<p>

									<?php echo $frow->site_name; ?>

								</p>

							</div>
						</div>
						<div class="col-xs-6">
							<label for="input01" class="col-md-4 col-sm-6 col-xs-12 control-label"> Url:</label>

							<div class="col-md-8 col-sm-6 col-xs-12">

								<p>

									<?php echo $frow->site_url; ?>

								</p>

							</div>
						</div>-->
						<div class="col-xs-6">

							<label for="input01" class="col-md-4 col-sm-6 col-xs-12 control-label"> Date Issued:</label>

							<div class="col-md-8 col-sm-6 col-xs-12">

								<p>

									<?php echo $gen->date_to_display($frow->registeration_date); ?>

								</p>

							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-12 col-xs-12">






						<?php 

									if(!empty($frow->image)){

										$image ='images/'.$frow->image;

									}else{

										$image = 'images/no-image.png';

									}
								?>
						<img class="img-icon" style="width:100%;height: 200px;" alt="" src="<?php echo $image; ?>">




					</div>

				</div>

				<div class="col-md-12 col-sm-12 col-xs-12">

					<form action="user_update.php" method="post">

						<input type="hidden" name="client_update" value="<?php echo $frow->id; ?>">

						<button type="submit" class="btn btn-success">Update Profile</button>

					</form>

				</div>



			</div>



		</div>

	</div>

</div>