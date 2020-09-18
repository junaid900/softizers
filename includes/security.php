<?php
$id = $_SESSION[ 'user_reg' ];
if ( isset( $_POST[ 'update_password' ] ) ) {
	$error = "";
	$o_password = $_POST[ 'o_password' ];
	$old_password = $_POST[ 'old_password' ];
	$password = $_POST[ 'password' ];
	$c_password = $_POST[ 'c_password' ];
	if ( empty( $old_password ) ) {
		$error = "Please enter old password";
	}
	if ( !empty( $password ) ) {
		if ( $password == $c_password ) {
			$password = md5( $password );
			$old_password = md5( $old_password );
		} else {
			$error = "Password and Confirm password should be same.";
		}
	}
	if ( empty( $error ) ) {
		$table = users . " WHERE id = '" . $id . "' and password='" . $old_password . "'";
		$count = $conf->countme( $table );
		if ( $count == '1' ) {
			$fields = " `password`='" . $password . "' ";
			$where = " id='" . $id . "'";
			if ( $conf->updateRecords( users, $fields, $where ) ) {
				$success = "Password update successfully";
			}

		} else {
			$error = "Wrong Old Password";
		}
	}
}
$table_fetch = users . " where id='" . $_SESSION[ 'reg_id' ] . "'";
$row = $conf->singlev( $table_fetch );
?>
<div class="">
	<div class="page-title">
		<div class="title_left">

			<!----------- Page Main Heading ----------->
			<h3>Update Password</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php include('messages-display.php')?>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">


				<!----------- Page Content ----------->
				<div class="x_content">
					<form id="demo-form2" data-validate="parsley" method="post" class="form-horizontal form-label-left">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="old_password">Old Password</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<input type="password" name="old_password" id="old_password" data-required="true" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<input type="password" name="password" id="password" data-required="true" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="c_password">Confirm Password</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<input type="password" name="c_password" id="c_password" data-required="true" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<input type="hidden" name="o_password" value="<?php echo $row->password;?>">
								<button type="submit" name="update_password" class="btn btn-success">Update Details</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>