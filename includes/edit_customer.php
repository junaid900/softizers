<?php
@extract( $_POST );
$customer_id = $gen->IDdecode( $_REQUEST[ 'CD' ] );

if ( isset( $_POST[ 'update' ] ) ) {
	$name = $_POST[ 'name' ];
    $city = $_POST[ 'city' ];
	$Address = $_POST[ 'address' ];
	$cntct_person = $_POST[ 'cntct_person' ];
    $cntct_no = $_POST[ 'cntct_no' ];
    	$lmit_amount = $_POST[ 'lmit_amount' ];
	$credit_lmt_dys = $_POST[ 'crdt_lmt_dys' ];
	$gl_accnt = $_POST[ 'gl_accnt' ];
	if ( empty( $name ) ) {
		$error = "Name is empty";
	}
	
  else if ( empty( $cntct_person ) ) {
		$error = "Contact Person is empty";
	}
	
	else if ( empty( $cntct_no ) ) {
		$error = "Contact no is empty";
	}
else{

	 $table = CUSTOMERS . " set `name`='" . $name . "', `address`='" . $Address . "', `city`='" . $city . "', `contact_person`='" . $cntct_person . "', `contact_no`='" . $cntct_no . "', `limit_amount`='" . $lmit_amount . "', `credit_limit_days`='" . $credit_lmt_dys . "', `gl_acct`='" . $gl_accnt . "' where id='" . $customer_id . "'";
	$recodes = $conf->updateValue( $table );
	if ( $recodes == true ) {
		$success = "Record <strong>Updated</strong> Successfully";
		$gen->redirecttime( 'customers.php', '2000' );
	} else {
		$error = "Record Not Updated";
	}
}
	
}
$table_fetch = CUSTOMERS . " where id='" . $customer_id . "'";
$x = $conf->singlev( $table_fetch );
?>
<div class="col-md-12">
	<?php include('includes/messages-display.php')?>
</div>
<div class="page-title">
	<div class="title_left">

		<!----------- Page Main Heading ----------->
		<h3>Update Customer</h3>
	</div>
	<button type="button" onClick="window.location.href='customers.php'" class="btn btn-primary right float-right" name="">Go Back</button>

</div>
<div class="row">

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">

			<!----------- Page Content ----------->
			<div class="x_content">

				<form id="demo-form2" data-parsley-validate="" method="post" class="form-horizontal form-label-left" novalidate enctype="multipart/form-data">

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Code: </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control" name="custmer_id" disabled value="<?php echo $x->code;?>">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="custom-id">Name <span class="red">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control" name="name" required data-required="true" value="<?php echo $x->name; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="custom-id">Address: </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control" name="address" value="<?php echo $x->address; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="custom-id">City: </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control" name="city" value="<?php echo $x->city; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="custom-id">Contact Person <span class="red">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="number" class="form-control" name="cntct_person" required data-required="true" value="<?php echo $x->contact_person; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="custom-id">Contact # <span class="red">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="number" class="form-control" name="cntct_no" required data-required="true" value="<?php echo $x->contact_no; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="custom-id">Limit Amount: </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="number" class="form-control" name="lmit_amount" value="<?php echo $x->limit_amount; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="custom-id">Credit Limit Days: </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="number" class="form-control" name="crdt_lmt_dys" value="<?php echo $x->credit_limit_days; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="custom-id">GL Acct: </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control" name="gl_accnt">

								<?php $tran_accnt=$conf->fetchAll(tbl_chart_accounts." WHERE transaction_acct='1'"); 
                                foreach($tran_accnt as $tc){
                                ?>
								<option value="<?=$tc->acc_id?>" <?php if($tc->acc_id==$x->gl_acct){echo "selected"; }?> >
									<?=$tc->title?>
								</option>
								<?php } ?>

							</select>
						</div>
					</div>


					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<input type="submit" name="update" class="btn btn-primary" value="Update">
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>