<?php 
	//include puc
$id = $gen->IDdecode( $_REQUEST[ 'CD' ] );
if(isset($_POST['btnSubmit'])){
	$smallUnit = $_POST['smallUnit'];
	$bigUnit = $_POST['bigUnit'];
	$units = $_POST['units'];

			$table = PUC . " set `small_unit`='" . $smallUnit . "', `big_unit`='" . $bigUnit . "', `units`='" . $units . "' where id='" . $id . "'";
		$recodes = $conf->updateValue( $table );
		if ( $recodes == true ) {
			$success = "Record <strong>Updated</strong> Successfully";

			$gen->redirecttime( 'puc.php', '2000' );
		} else {
			$error = "Item Not inserted";
		}

}

$row_unit = $conf->singlev( PUC . " WHERE id='" . $id . "'" );
?>
<style>
	.mg {
		margin: 10px;
	}
	.center {
		  margin: auto;
		  width: 50%;
		  padding: 10px;
	}
</style>

<body>

<div class="col-md-12">
	<?php include('includes/messages-display.php')?>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="page-title">
			<div class="title_left">
				<h3>Update Unit Price</h3>
			</div>
		</div>

		<div class="x_panel">
			<!----------- Page Content ----------->
			<a href = "puc.php"  class = "btn btn-primary float-right">Go Back</a>
			<div align="center" class = "center" style="">
				<h3>Update Unit</h3>
				<div class = "col-lg-12">
					 <form method="post">
						<div class = "col-lg-12">
							<input type="text" required placeholder="Big Unit" class = "mg form-control col-lg-3" name="bigUnit" value = "<?php echo $row_unit->big_unit;?>"/>
						</div>
						<div class = "col-lg-12">
							<input type = "text" required placeholder="Small Unit" class = "mg form-control col-lg-3" name = "smallUnit" value="<?php echo $row_unit->small_unit?>" />
						</div>
						<div class = "col-lg-12">
							<input type = "number" required placeholder="Unit Against Big Unit" class = "mg form-control col-lg-3" name = "units" value="<?php echo $row_unit->units?>" />
						</div>
						<input type = "submit" class = "mg btn btn-primary" name = "btnSubmit"/>
					</form>
				</div>
			
					<div id = "maindata"></div>

				
			</div>
	</div>
</div>
</body>

