<?php
include_once 'setup/config.php';
include( 'Authenticate.php' );
include( 'setup/General.php' );
$gen = new General();
$conf = new config();
$page = "dashboard";
$conf->site_settings();
$date=date('Y-m-d');
$ydate=date('Y-m-d',strtotime("-1 days"));
$all_dates_sale=array();
$all_dates_cash=array();
$daysInMonth=cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));
for($i=01;$i<=$daysInMonth;$i++)
{
    if($i<10){
        $day_date = '0'.$i;
    }
    else{
        $day_date = $i;
    }
    $date=date('Y-m-'."".$day_date."");
    $all_dates_sale[]=$conf->DailySale($date);
     $all_dates_cash[]=$conf->DailyCash($date);
	$days[] = $i;
}
$CMall_dates_sale=implode(',',$all_dates_sale);
$CMall_dates_cash=implode(',',$all_dates_cash);
$daysOfMonth=implode(',',$days);

?>

<!DOCTYPE html>

<html lang="en">



<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include 'includes/header.php'; ?>

	<title><?=SITE_NAME?> | Dashboard</title>


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

				<?php include 'includes/index.php'; ?>

			</div>



			<!-- footer content -->

			<?php include 'includes/footer.php'; ?>

		</div>

	</div>

	<?php include 'includes/footer-includes.php'; ?>
    <script src="js/chart/Chart.js"></script>
    <script>
    
      if ($("#homeChart").length) {
            var f = document.getElementById("homeChart");
            new Chart(f, {
                type: "bar",
                data: {
                    labels: [<?=$daysOfMonth?>],
                    datasets: [{
                        label: "Sale",
                        backgroundColor: "#26B99A",
                        data: [<?=$CMall_dates_sale?>]
                    }, {
                        label: "Cash",
                        backgroundColor: "#03586A",
                        data: [<?=$CMall_dates_cash?>]
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: !0
                            }
                        }]
                    }
                }
            })
        }
    </script>

</body>



</html>