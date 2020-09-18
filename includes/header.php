<?php
if ( !empty( SITE_FAVICON ) ) {
 echo '<link rel="icon" type="image/png" href="uploads/site/' . SITE_FAVICON . '" sizes="32x32">';
}
?>
<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<link href="vendors/nprogress/nprogress.css" rel="stylesheet">
<link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<link href="build/css/custom.min.css" rel="stylesheet">
<link href="css/mstyle.css" rel="stylesheet">
<style>
	* {
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box
	}
	
	:after,
	:before {
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box
	}
	
	@media (min-width: 768px) {
		div.dataTables_wrapper div.dataTables_filter .form-inline .form-control {
			width: 100% !important;
			max-width: 86%;
		}
	}
	
	div.dataTables_wrapper div.dataTables_filter {
		text-align: left !important;
	}
	
	.dataTables_filter {
		width: auto !important;
		float: right !important;
		text-align: right;
	}
	
	div.dataTables_wrapper div.dataTables_filter label {
		text-align: left !important;
		width: 400px !important;
		max-width: 100% !important;
	}
	
	div.dataTables_wrapper div.dataTables_filter input {
		width: 100% !important;
		max-width: 86% !important;
	}
	
	.white {
		color: #fff !important;
	}
	
	.bisque {
		color: bisque !important;
	}
	
	.tomato {
		color: tomato !important;
	}
	
	.red {
		color: red !important;
	}
	
	.orange {
		color: orange !important;
	}
	
	.blue {
		color: blue !important;
	}
	
	.cyan {
		color: cyan !important;
	}
	
	.darkkhaki {
		color: darkkhaki !important;
	}
	
	.chocolate {
		color: chocolate !important;
	}
	
	.yellow {
		color: yellow !important;
	}
	
	.green {
		color: #A7CD39 !important;
	}
	
	footer {
		padding: 10px 20px;
	}
	
	.copy-rights {
		margin-top: 15px;
		text-align: right;
	}
	
	.copy-left {
		margin-top: 15px;
		text-align: left;
	}
	.ui-widget-content {
    border: 1px solid #ddd;
    background: #eee url(assets/ui-bg_highlight-soft_100_eeeeee_1x100.png) 50% top repeat-x;
    color: #333;
}
.nav .fa.white {
    color: #a7cd3a !important;
}
</style>
<?php 
		$table_fetch_manager = MANAGER . " where id='1'";
		$row_mng = $conf->singlev( $table_fetch_manager );
?>