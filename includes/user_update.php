<?php
$client_ID = '1'; //$_REQUEST[ 'client_update' ];
if ( isset( $_POST[ 'update_record' ] ) ) {
	$error = "";
	$client_ID = $_POST[ 'client_ID' ];
	$full_name = $_POST[ 'full_name' ];
	$site_name = $_POST[ 'site_name' ];
	$site_url = $_POST[ 'site_url' ];
	$login = $_POST[ 'login' ];
	if ( empty( $login ) ) {
		$error = "Username is empty";
	} /**/
	$email = $_POST[ 'email' ];
	if ( empty( $email ) ) {
		$error = "Email is empty";
	}

	$password = $_POST[ 'password' ];
	$img_var = $_FILES[ "image" ][ "name" ];
	$img_var_logo = $_FILES[ "logo" ][ "name" ];
	if ( !empty( $password ) )
		$password = md5( $password );
	$admin_type = $_POST[ 'admin_type' ];

	if ( empty( $error ) ) {
		$table = MANAGER . " set `full_name`='" . $full_name . "', `login`='" . $login . "', `site_name`='" . $site_name . "', `site_url`='" . $site_url . "', `phone`='" . $phone . "', `email`='" . $email . "', `admin_type`='" . $admin_type . "' where id='" . $client_ID . "'";
		$recodes = $conf->updateValue( $table );
		$recodes = $client_ID;
		if ( !empty( $img_var ) ) {
			$img_var_check = $conf->image_upload_check( 'image' );
			if ( $img_var_check != "OK" ) {
				$error = $img_var_check;
			} else {

				$table_fetch_un = MANAGER . " where id='" . $recodes . "'";
				$chk_row = $conf->single( $table_fetch_un, '`image`' );

				if ( !empty( $chk_row->image ) ) {
					unlink( "images/" . $chk_row->image );
				}

				$img = preg_replace( "/[^a-z0-9._]/", "", str_replace( " ", "-", str_replace( "%20", "-", strtolower( $img_var ) ) ) );
				$filename = "mn-" . $recodes . "-" . $img;
				$savefile = 'images/' . $filename;

				move_uploaded_file( $_FILES[ 'image' ][ 'tmp_name' ], $savefile );
				//( 240, 180)


				$table = MANAGER . " set `image`='" . $filename . "' where id='" . $recodes . "'";
				$recodes = $conf->updateValue( $table );

			}
		}

		if ( !empty( $img_var_logo ) ) {
			$img_var_logo_check = $conf->image_upload_check( 'logo' );
			if ( $img_var_logo_check != "OK" ) {
				$error = $img_var_logo_check;
			} else {

				$table_fetch_un = MANAGER . " where id='" . $recodes . "'";
				$chk_row = $conf->single( $table_fetch_un, '`logo`' );

				if ( !empty( $chk_row->logo ) ) {
					unlink( "images/" . $chk_row->logo );
				}

				$img = preg_replace( "/[^a-z0-9._]/", "", str_replace( " ", "-", str_replace( "%20", "-", strtolower( $img_var_logo ) ) ) );
				$filename = "mn-logo-" . $recodes . "-" . $img;
				$savefile = 'images/' . $filename;

				move_uploaded_file( $_FILES[ 'logo' ][ 'tmp_name' ], $savefile );
				//( 240, 180)


				$table = MANAGER . " set `logo`='" . $filename . "' where id='" . $recodes . "'";
				$recodes = $conf->updateValue( $table );

			}
		}

		$success = "Record <strong>Updated</strong> Successfully";
	}
	$gen->redirecttime( 'profile.php', '1000' );
}
$table_fetch = MANAGER . " where id='" . $client_ID . "'";
$row = $conf->singlev( $table_fetch );
?>
<div class="col-md-12">
	<?php include('includes/messages-display.php')?>
</div>
<div class="page-title">
	<div class="title_left">

		<!----------- Page Main Heading ----------->
		<h3>Update Profile</h3>
	</div>
	<button type="button" onClick="window.location.href='profile.php'" class="btn btn-primary right float-right" name="">Go Back</button>

</div>
<div class="row">

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">

			<!----------- Page Content ----------->
			<div class="x_content">
				<form id="demo-form2" data-parsley-validate="" method="post" class="form-horizontal form-label-left" novalidate enctype="multipart/form-data">

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="client_name"> Full Name:</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="full_name" id="full_name" value="<?php echo $row->full_name;?>" data-required="true" class="form-control col-md-7 col-xs-12">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="login">Login Name:</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<!--<label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left;"  for="login"><?php //echo $row->login;?></label>-->
							<input type="text" name="login" id="login" value="<?php echo $row->login;?>" data-required="true" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
<!--					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="client_name"> Site Name:</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="site_name" id="site_name" value="<?php echo $row->site_name;?>" data-required="true" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="client_name"> Url:</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="url" name="site_url" id="site_url" value="<?php echo $row->site_url;?>" data-required="true" class="form-control col-md-7 col-xs-12">
						</div>
					</div>-->
					<!--<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone"> Phone #</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="phone" id="phone" value="<?php echo $row->phone;?>" data-required="true" class="form-control col-md-7 col-xs-12">
						</div>
					</div>-->
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email:</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="email" name="email" id="email" value="<?php echo $row->email;?>" data-required="true" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">

						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Profile Image:

                        </label>

						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php 
						if(!empty($row->image)){
						echo '<img src="images/'.$row->image.'" style="width:150px;height:150px" /><br>';
						}
						?>
							<input type="file" multiple name="image" id="image" class="form-control col-md-7 col-xs-12">
							<span>Image Definition ( 240x180 )</span>

						</div>

					</div>
					<!--<div class="form-group">

						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Logo:

                        </label>

						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php 
						if(!empty($row->logo)){
						echo '<img src="images/'.$row->logo.'" style="width: 40%;height: auto;" /><br>';
						}
						?>
							<input type="file" name="logo" id="logo" class="form-control col-md-7 col-xs-12">
							<span>Image Definition ( 340x180 )</span>

						</div>

					</div>-->
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<input type="hidden" value="<?php echo $client_ID; ?>" name="client_ID">
							<button type="submit" name="update_record" class="btn btn-primary">Update</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>