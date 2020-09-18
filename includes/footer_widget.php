<?php
if ( isset( $_POST[ 'update_record' ] ) ) {
	$error = "";
	$w_one = addslashes( $_POST[ 'w_one' ] );
	$w_two = addslashes( $_POST[ 'w_two' ] );
	$w_three = addslashes( $_POST[ 'w_three' ] );


	if ( empty( $error ) ) {
		$table = FOOTER_WIDGET . " set `widget_one`='" . $w_one . "',`widget_two`='" . $w_two . "',`widget_three`='" . $w_three . "' where id=1";
		$recodes = $conf->updateValue( $table );

		$success = "Widgets <strong>Updated</strong> Successfully";
	}
	$gen->redirecttime( 'footer_widget.php', '1000' );
}
$table_fetch = FOOTER_WIDGET . " WHERE id=1";
$row = $conf->singlev( $table_fetch );
?>
<div class="">
	<div class="page-title">
		<div class="title_left">

			<!----------- Page Main Heading ----------->
			<h3>Footer Widgets</h3>
		</div>
		<div class="col-md-12">
			<?php include('includes/messages-display.php')?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">

				<!----------- Page Sub Heading ----------->


				<!----------- Page Content ----------->
				<div class="x_content">
					<form id="demo-form2" data-validate="parsley" method="post" class="form-horizontal form-label-left">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Widget One</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea id="usttinymce" name="w_one" class="form-control col-md-7 col-xs-12">
									<?php echo stripslashes ($row->widget_one);?>
								</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Widget Two</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea id="usttinymce1" name="w_two" class="form-control col-md-7 col-xs-12">
									<?php echo stripslashes ($row->widget_two);?>
								</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Widget Three</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea id="usttinymce2" name="w_three" class="form-control col-md-7 col-xs-12">
									<?php echo stripslashes ($row->widget_three);?>
								</textarea>
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="submit" name="update_record" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>