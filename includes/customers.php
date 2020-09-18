<?php
@extract( $_POST );

//--------------Delete User-------------

if ( isset( $_POST[ 'deleteid' ] ) ) {
	$count = $conf->countme(CUSTOMER_FUNDS . " where customer_id = " . $gen->IDdecode($deleteid));	
	if($count > 0){
		 $del_item = $conf->updateValue(CUSTOMERS . " SET is_deleted = '1' where id = ". $gen->IDdecode($deleteid));
	}
	else{
		$table_fetch_un = CUSTOMERS . " where id='" . $gen->IDdecode($deleteid) . "'";
		$del_item = $conf->delme( CUSTOMERS, $gen->IDdecode($deleteid) , " id " );
	
	}
	if ( $del_item ) {
		$success = "<p>Record <strong>Deleted</strong> Successfully</p>";
	}
}
$results = $conf->fetchall( CUSTOMERS ." ORDER BY `id` DESC");
?>
<style>
	.right {
		float: right;
		margin: 10px;
	}
</style>

<div class="col-md-12">
	<?php include('includes/messages-display.php')?>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">



		<div class="page-title">
			<div class="title_left">


				<h3>All Customers</h3>
			</div>
		</div>
		<div class="x_panel">
			<button type="submit" onClick="window.location.href='add_customer.php'" class="btn btn-primary right" name="">Add Customer</button>
			<!----------- Page Content ----------->
			<div class="x_content">
				<div class="table-responsive">
					<table class="table table-striped table-bordered bulk_action" id="datatable-checkbox">
						<thead>
							<tr>
								<th width="4%">Code</th>
								<th>Name</th>
								<th>Contact Person</th>
								<th>Contact no</th>
								<th>City</th>
								<th width="6%">View</th>
								<th width="6%">Edit</th>
								<th width="6%">Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($results as $x) {if($x->is_deleted == 1){continue;} ?>
							<tr>
								<td>
									<?php echo $x->code; ?>
								</td>
								<td>
									<?php echo $x->name; ?>
								</td>
								<td>
									<?php echo $x->contact_person; ?>
								</td>
								<td>
									<?php echo $x->contact_no; ?>
								</td>
								<td>
									<?php echo $x->city; ?>
								</td>
								<td>
									<form action="view_customer.php?CD=<?php echo $gen->IDencode($x->id); ?>" method="post">
										<button type="submit" class="btn btn-success"><i class="fa fa-eye"></i></button>
									</form>
								</td>
								<td>
									<form action="edit_customer.php?CD=<?php echo $gen->IDencode($x->id); ?>" method="post">
										<button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>
									</form>
								</td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="deleteid" value="<?php echo $gen->IDencode($x->id); ?>">
										<button type="submit" class="btn btn-danger" onclick="javascript:return confirm('Are you sure, you want to delete this user?')" ><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
									</form>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>