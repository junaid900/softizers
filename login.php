<?php
include( 'setup/config.php' );
$conf = new config();
$conf->site_settings();
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
	@extract( $_POST );
	include_once 'setup/loginmodel.php';
	$log = new loginmodel();
	$check = $log->loginme( $username, $password );
    if ( $check == "user" ) {
		echo "<script>window.location='index.php';</script>";
	}
 else if ( $check == "admin" ) {
		echo "<script>window.location='index.php';</script>";
	}  
     else {
		$error = "Invalid username or password";
	}



}

?>

<!DOCTYPE html>

<html lang="en">

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<!-- Meta, title, CSS, favicons, etc. -->

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">


	<?php include 'includes/header.php'; ?>
	<title>
		<?=SITE_NAME?> | Login</title>


<style>
	.login_content form div a {
    font-size: 16px !important;
}
	</style>
</head>



<body class="login">

	<div>

		<a class="hiddenanchor" id="signup"></a>

		<a class="hiddenanchor" id="signin"></a>



		<div class="login_wrapper">

			<div class="animate form login_form">

				<section class="login_content">

					<div class="">

						<?php include('includes/messages-display.php')?>

					</div>

					<form id="form-signin" action="" method="post">

						<h1>Login</h1>

						<div>

							<input type="text" name="username" class="form-control" placeholder="Username" required=""/>

						</div>

						<div>

							<input type="password" name="password" class="form-control" placeholder="Password" required=""/>

						</div>

						<div>

							<button type="submit" name="login" class="btn btn-default submit">Login</button>

							<!--<a class="reset_pass" href="#">Lost your password?</a>-->

						</div>



						<div class="clearfix"></div>



						<div class="separator">

							<!--<p class="change_link">New to site?

                  <a href="#signup" class="to_register"> Create Account </a>

                </p>-->



							<div class="clearfix"></div>

							<br/>



							<div>

								<h1>
									<?php 
						

		
						if(!empty(SITE_LOGO)){
						echo '<img src="uploads/site/' . SITE_LOGO . '" style="width: 250px;"/>';
						}else{ echo '<img src="images/login_banner.jpg" style="width: 250px;"/>';}
						?>

								</h1>     

								<p>©
									<?php echo date('Y')?> All Rights Reserved By <a href="<?=SITE_URL;?>"><?=SITE_NAME;?></a>
								</p>

							</div>

						</div>

					</form>

				</section>

			</div>

		</div>

	</div>

</body>

</html>