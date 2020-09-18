<?php
include_once 'setup/config.php';
include( 'Authenticate.php' );
include( 'setup/General.php' );
$gen = new General();
$conf = new config();
$page = "view_customer";
$conf->site_settings();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'includes/header.php'; ?>
	<title>
		<?=SITE_NAME?> | View Customer</title>

</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<!-- sidebar menu -->
					<?php include 'includes/sidebar.php'; ?>
				</div>
			</div>

			<!-- /top navigation -->

			<?php include 'includes/top-bar.php';?>

			<!-- page content -->
			<div class="right_col" role="main">
				<?php include 'includes/view_customer.php'; ?>
			</div>

			<!-- footer content -->
			<?php include 'includes/footer.php'; ?>
		</div>
	</div>
	<?php include 'includes/footer-includes.php'; ?>
</body>

</html>