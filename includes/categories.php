<?php
$category_id = $gen->IDdecode( $_REQUEST[ 'CD' ] );
if ( isset( $_POST[ 'add_category' ] ) ) {
	$error = '';
	$category = $_POST[ 'category' ];
	if ( empty( $category ) ) {
		$error = "Category is empty";
	}
	if ( empty( $error ) ) {
		$data_post = array( 'category_name' => $category );
		$recodes = $conf->insert( $data_post, CATEGORIES );
		if ( $recodes == true ) {
			$success = "<p>Record <strong>Added</strong> Successfully</p>";
			$gen->redirecttime( 'categories.php', '2000' );
		} else {
			$error = "Record Not Updated";
		}

	}

}

if ( isset( $_POST[ 'update' ] ) ) {
	$error = '';
	$category1 = $_POST[ 'category1' ];
	if ( empty( $category1 ) ) {
		$error = "Category is empty";
	}
	if ( empty( $error ) ) {

		$table = CATEGORIES . " set `category_name`='" . $category1 . "' where id='" . $category_id . "'";
		$recodes = $conf->updateValue( $table );
		if ( $recodes == true ) {
			$success = "Record <strong>Updated</strong> Successfully";
			$gen->redirecttime( 'categories.php', '2000' );
		} else {
			$error = "Record Not Updated";
		}


	}

}
if ( isset( $_POST[ 'deleteid' ] ) ) {
	$deleteid = $gen->IDdecode( $_POST[ 'deleteid' ] );
	$table_fetch_un = CATEGORIES . " where id='" . $deleteid . "'";

	$flagmain = $conf->delme( CATEGORIES, $deleteid, "id" );
	if ( $flagmain ) {
		$success = "<p>Record <strong>Deleted</strong> Successfully</p>";
	}
}
$results = $conf->fetchall( CATEGORIES );

$table_fetch = CATEGORIES . " where id='" . $category_id . "'";
$x = $conf->singlev( $table_fetch );
?>


<style>
	.x_panel {
		min-height: 600px;
	}
	
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
		<div class="x_panel">

			<!----------- Page Content ----------->
			<?php if($_REQUEST['ED']=='1'){?>
			<div class="x_content">

				<form action="" method="post" class="form-group form-horizontal">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> Edit Category</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control" name="category1" required value="<?php echo $x->category_name;?>">
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group">
						<div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-3 ">
							<button type="button" onClick="window.location.href='categories.php'" class="btn btn-alert" name="">Cancel</button>
							<input type="submit" name="update" class="btn btn-primary" value="Update">
						</div>
					</div>

				</form>
			</div>
			<?php } else{ ?>
			<div class="x_content">

				<form action="" method="post" class="form-group form-horizontal">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> ADD New Category</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control" name="category" required>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group">
						<div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-3 ">

							<input type="submit" name="add_category" class="btn btn-primary" value="Add New Categroy">
						</div>
					</div>

				</form>
			</div>
			<?php }?>

			<div class="page-title">
				<div class="title_left">
					<h3>All Categories</h3>
				</div>
			</div>
			<!----------- Page Content ----------->
			<div class="x_content">
				<div class="table-responsive">
					<table class="table table-striped table-bordered bulk_action" id="datatable-checkbox">
						<thead>
							<tr>
								<th width="4%">ID</th>
								<th>Category name</th>
								<th width="6%">Edit</th>
								<th width="6%">Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($results as $x) { ?>
							<tr>
								<td>
									<?php echo $x->id; ?>
								</td>

								<td>
									<?php echo $x->category_name; ?>
								</td>
								<td>
									<form action="categories.php?CD=<?php echo $gen->IDencode($x->id); ?>&ED=1" method="post">
										<input type="hidden" name="category_id" value="<?php echo $gen->IDencode($x->id); ?>">
										<button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></button>
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