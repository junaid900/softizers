<?php
@extract( $_POST );
$customer_id = $gen->IDdecode( $_REQUEST[ 'CD' ] );


$table_fetch = USERS . " where id='" . $customer_id . "'";
$x = $conf->singlev( $table_fetch );
?>
<div class="col-md-12">
	<?php include('includes/messages-display.php')?>
</div>
<div class="page-title">
	<div class="title_left">

		<!----------- Page Main Heading ----------->
		<h3>View User Detail</h3>
	</div>
	<button type="button" onClick="window.location.href='users.php'" class="btn btn-primary right float-right" name="">Go Back</button>

</div>
<div class="row">

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">

			<!----------- Page Content ----------->
			<div class="x_content">

				<form id="demo-form2" data-parsley-validate="" method="post" class="form-horizontal form-label-left" novalidate enctype="multipart/form-data">

					<div class="col-md-12">
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleInputEmail1">First Name: </label>

								<?php echo $x->first_name; ?>

							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleInputEmail1">Last Name: </label>
								<?php echo $x->last_name; ?>
							</div>
						</div>
                        <div class="col-md-6">
							<div class="form-group">
								<label for="exampleInputEmail1">UserName: </label>
								<?php echo $x->username; ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleInputEmail1">Email address: </label>
								<?php echo $x->email; ?>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="gender">Gender: </label>
								<?php if ($x->gender == "m") { echo "Male"; }else{ echo "Female";} ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="status">Status: </label>
								<?php if ($x->status == "1") { echo "Active"; }else{ echo "Inactive";} ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Role: </label>
								<?php if ($x->role == "user") { echo "User"; }else{ echo "Admin";} ?>

							</div>
						</div>

					</div>
				</form>

			</div>
		</div>
	</div>
</div>