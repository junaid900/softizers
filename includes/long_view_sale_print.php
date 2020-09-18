<?php
$invoice_id = $gen->IDdecode( $_REQUEST[ 'CD' ] );

$row_invoice = $conf->singlev( SALES_INVOICE . " WHERE id='" . $invoice_id . "'" );

$table_cust = CUSTOMERS . " where id='" . $row_invoice->clien_id . "'";
$cust_row = $conf->singlev( $table_cust );

$table_in_det = $conf->fetchAll( SALES_INVOICE_DETAILS . " where invoice_id='" . $invoice_id . "'" );

$table_fetch = SITE_SETTINGS . " where id='1'";
$row = $conf->singlev( $table_fetch );
?>
<style>
	#demo-form2 .m-b {
		margin-bottom: 10px;
	}
	
	.addFldTbl td {
		padding: 0 !important;
	}
	
	.p-0 {
		padding: 0 !important;
	}
	
	.search-box,
	.search-box-contact {
		width: 50% !important;
	}
	
	.result,
	.resultnum {
		padding-right: 10px;
		padding-left: 10px;
	}
	
	.ust-font-size {
		font-size: 11px;
	}
	
	.ust-th th {
		border-top: 1px solid #ddd !important;
		border-bottom: 1px solid #ddd !important;
	}
	
	tr td {
		border: none !important;
	}
	
	.td-border {
		border-top: 1px solid #ddd !important;
	}
	
	@page {
		size: auto;
		margin: 0mm;
	}
	
	@media print {
		#Header,
		#Footer {
			display: none !important;
		}
	}
	
	.form-horizontal .control-label {
		padding-top: 0px !important;
	}
	
	.form-group {
		margin-bottom: 0px !important;
	}
	
	.x_panel {
		padding: 5px 5px !important;
	}
	
	hr {
		margin-top: 10px;
		margin-bottom: 10px;
	}
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 5px;
    line-height: 1.2;
		    font-size: 11px !important;
	}
	.tb-right {
    text-align: right;
}
</style> <!--onafterprint="window.location.href='view_sale_invoice.php?CD=<?=$_REQUEST[ 'CD']?>'"-->
<body>
	<div class="row">

		<div class="col-md-3 col-sm-3 col-xs-3">
			<div class="x_panel">
				<div class="x_content">
					<form id="demo-form2" data-parsley-validate="" method="post" class="form-horizontal form-label-left" novalidate enctype="multipart/form-data">

						<div class="row">
							<div class="col-xs-12">
								<!--<div class="form-group">
									<center>
										<?php 
									/*if ( !empty( SITE_LOGO ) ) {

									echo '<img src="uploads/site/'.SITE_LOGO.'" style="width: 70%;margin-bottom:5px;" />';
									}else{ echo '<img src="images/login_banner.jpg" >';} */?>
									</center>
								</div>-->
								<div class="form-group">
									<label class="control-label">Site Name:</label>
									<?php echo $row->site_name; ?>
								</div>
								<div class="form-group">
									<label class="control-label">Phone:</label>
									<?php echo $row->site_phone; ?>
								</div>
								<div class="form-group">
									<label class="control-label">Address:</label>
									<?php echo $row->site_address; ?>
								</div>
								<hr>
							</div>

							<div class="col-xs-6">
								<label class="control-label">Invoice #</label>
								<?php echo $row_invoice->invoice_no;?><br>
							</div>
							<div class="col-xs-6">
								<label class="control-label">Date :</label>
								<?php echo date("m/d/Y", strtotime($row_invoice->date)); ?><br>
							</div>

							<div class="col-xs-6">
								<label class="control-label">Name :</label>
								<?php echo "(".$cust_row->id.") ".$cust_row->name; ?><br>
							</div>
							<div class="col-xs-6">
								<label class="control-label">Term :</label>
								<?php if($row_invoice->term=="cr"){ echo "Credit";} else { echo "Debit";}?>
							</div>

						</div>

				</div>
				<div class="clearfix"></div>
				<div class="table-responsive">
					<table class="table table-hover" id="invoiceTable">
						<thead class="ust-th">
							<tr>

								<th width="5%">#</th>
								<th width="55%">Item</th>
								<th width="20%">Price</th>
								<th width="5%">Qty</th>
								<th width="15%">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($table_in_det as $row) {?>
							<tr>

								<td>
									<?php echo $row->item_code;?>

								</td>
								<td>
									<?php echo $row->item_name; ?>
								</td>
								<td>
									<?php echo $row->price; ?>
								</td>
								<td>
									<?php echo $row->quantity; ?>
								</td>
								<td>
									<?php echo $row->total; ?>
								</td>
							</tr>
							<?php }?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="1" class="td-border"></td>
								<td colspan="3" class="td-border tb-right"><label class="ust-font-size">Subtotal: &nbsp;</label>
								</td>
								<td class="td-border"><?php echo $row_invoice->invoice_subtotal; ?></td>
							</tr>

							<tr>
								<td colspan="1"></td>
								<td colspan="3" class="tb-right"><label class="ust-font-size">Tax: &nbsp;</label>
								</td>
								<td>
									<?php echo $row_invoice->tax_percent; ?>
								</td>
							</tr>

							<tr>
								<td colspan="1"></td>
								<td colspan="3" class="tb-right"><label class="ust-font-size">Tax Amount: &nbsp;</label>
								</td>
								<td>
									<?php echo $row_invoice->tax; ?>
								</td>
							</tr>
							<tr>
								<td colspan="1"></td>
								<td colspan="3" class="tb-right"><label class="ust-font-size">Discount % &nbsp;</label>
								</td>
								<td>
									<?php echo $row_invoice->discount; ?>
								</td>
							</tr>

							<tr>
								<td colspan="1"></td>
								<td colspan="3" class="tb-right"><label class="ust-font-size">Discount Amt: &nbsp;</label>
								</td>
								<td>
									<?php echo $row_invoice->discount_amount; ?>
								</td>
							</tr>

							<tr>
								<td colspan="1"></td>
								<td colspan="3" class="tb-right"><label class="ust-font-size">Total: &nbsp;</label>
								</td>
								<td>
									<?php echo $row_invoice->invoice_total; ?>
								</td>
							</tr>

							<tr>
								<td colspan="1"></td>
								<td colspan="3" class="tb-right td-border"><label class="ust-font-size">Amount Paid: &nbsp;</label>
								</td>
								<td class="td-border">
									<?php echo $row_invoice->amount_paid; ?>
								</td>
							</tr>

							<tr>
								<td colspan="1"></td>
								<td colspan="3" class="td-border tb-right"><label class="ust-font-size">Amount Due: &nbsp;</label>
								</td>
								<td class="td-border">
									<?php echo $row_invoice->amount_due; ?>
								</td>
							</tr>

						</tfoot>
					</table>
				</div>
				</ form>

			</div>
		</div>
	</div>
	</div>

</body>