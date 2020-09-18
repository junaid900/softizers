<?php
@extract( $_POST );

//--------------Delete User-------------
if ( isset( $_POST[ 'deleteid' ] ) ) {

	$table_fetch_un = USERS . " where id='" . $gen->IDdecode($deleteid) . "'";


	$flagmain = $conf->delme( USERS, $gen->IDdecode($deleteid), "id" );
	if ( $flagmain ) {
		$success = "<p>Record <strong>Deleted</strong> Successfully</p>";
	}
}
$results = $conf->fetchall( USERS ." ORDER BY `id` DESC");
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


				<h3>All Users</h3>
			</div>
		</div>
		<div class="x_panel">
			<button type="submit" onClick="window.location.href='add_user.php'" class="btn btn-primary right" name="">Add User</button>
			<!----------- Page Content ----------->
			<div class="x_content">
				<div class="table-responsive">
					<table class="table table-striped table-bordered bulk_action" id="datatable-checkbox">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
                                <th>UserName</th>
								<th>Email</th>
								<th>Gender</th>
								<th>Status</th>
								<th>Role</th>
								<th width="6%">View</th>
								<th width="6%">Edit</th>
								<th width="6%">Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($results as $x) { ?>
							<tr>
								<td>
									<?php echo $x->first_name; ?>
								</td>
								<td>
									<?php echo $x->last_name; ?>
								</td>
                                <td>
									<?php echo $x->username; ?>
								</td>
								<td>
									<?php echo $x->email; ?>
								</td>
								<td>
									<?php if ($x->gender == "f") { echo "Fmale"; } else { echo "Male"; } ?>
								</td>
								<td>
									<?php if ($x->status == "1") { echo "Active"; } else { echo "Inactive"; } ?>
								</td>
								<td>
									<?php if ($x->role == "admin") { echo "Admin"; } else { echo "User"; } ?>
								</td>
								<td>
									<form action="view_user.php?CD=<?php echo $gen->IDencode($x->id); ?>" method="post">
										<button type="submit" class="btn btn-success"><i class="fa fa-eye"></i></button>
									</form>
								</td>
								<td>
									<form action="edit_user.php?CD=<?php echo $gen->IDencode($x->id); ?>" method="post">
										<button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>
									</form>
								</td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="deleteid" value="<?php echo $gen->IDencode($x->id); ?>">
										<button type="submit" class="btn btn-danger" onclick="javascript:return confirm('Are you sure, you want to delete this user?')"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
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