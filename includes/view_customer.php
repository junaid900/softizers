<?php
@extract( $_POST );
$customer_id = $gen->IDdecode( $_REQUEST[ 'CD' ] );


$table_fetch = CUSTOMERS . " where id='" . $customer_id . "'";
$x = $conf->singlev( $table_fetch );
?>
<div class="col-md-12">
	<?php include('includes/messages-display.php')?>
</div>
<div class="page-title">
	<div class="title_left">

		<!----------- Page Main Heading ----------->
		<h3>View Customer Details</h3>
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
							<label class="control-label">
								<?php echo $x->code;?>
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="custom-id">Name: </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<label class="control-label">
								<?php echo $x->name; ?>
							</label>

						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="custom-id">Address: </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<label class="control-label">
								<?php echo $x->address; ?>
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="custom-id">City: </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<label class="control-label">
								<?php echo $x->city; ?>
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="custom-id">Contact Person: </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<label class="control-label">
								<?php echo $x->contact_person; ?>
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="custom-id">Contact # </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<label class="control-label">
								<?php echo $x->contact_no; ?>
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="custom-id">Limit Amount: </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<label class="control-label">
								<?php echo $x->limit_amount; ?>
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="custom-id">Credit Limit Days: </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<label class="control-label">
								<?php echo $x->credit_limit_days; ?>
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="custom-id">GL Acct: </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control" name="gl_accnt" disabled>

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

				</form>

			</div>
		</div>
	</div>
</div>