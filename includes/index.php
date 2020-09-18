<?php
 $date=date('Y-m-d');
$ydate=date('Y-m-d',strtotime("-1 days"));
$count_users = $conf->countme( USERS . " WHERE role='user'" );
$count_customers = $conf->countme( CUSTOMERS );
$count_vandrs = $conf->countme( VENDORS );
$count_purchase_invoice = $conf->countme( PURCHASE_INV );
$count_item = $conf->countme( ITEMS );
$count_companies = $conf->countme( COMPANIES );
$cont_sale_invoices = $conf->countme( SALES_INV ." where date Like '". $date ."%' ");
$count_sale_ret_inv = $conf->countme( SALES_RETURN_INV ." where date Like '". $date ."%' ");
$cont_sale_invoices_y = $conf->countme( SALES_INV ." where date Like '". $ydate ."%' ");
$count_sale_ret_inv_y = $conf->countme( SALES_RETURN_INV ." where date Like '". $ydate ."%' ");
$count_purchase_ret_inv = $conf->countme( PURCHASE_RETURN_INV_DETAILS );
$monthName = date("F", strtotime($date));
//$conf->QueryRunsimple("ALTER TABLE `sales_invoice` ADD `bilty_no` VARCHAR(100) NOT NULL AFTER `clien_name`, ADD `cargo` VARCHAR(500) NOT NULL AFTER `bilty_no`");
 ?>
 <style type="text/css">
	 h3 {
		 color:#FFFFFF !important;
 	}
	 .primary-01{
		     color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
	 }
	 .tile-stats .icon {
    color: #FFFFFF !important;
}
#short_report_area{
  display: none;
}
 </style>

 
  
  
<div class="row">
 <div class="x_panel">
              <div class="row x_title">
                    <div class="col-md-12">
                      <h2><strong>New</strong></h2>
                    </div>
                  </div>
               <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <a href="sale_invoice.php">
                <button type="button" class="btn btn-info btn-lg" style="width: 100%;">New Sale</button></a>
                
              </div>
           
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <a href="add_item.php">
                <button type="button" class="btn btn-info btn-lg" style="width: 100%;">New Item</button>
                </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <a href="add_customer.php">
                
                <button type="button" class="btn btn-info btn-lg" style="width: 100%;">New Customer</button>
                </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <a href="purchase_invoice.php">
               
                <button type="button" class="btn btn-info btn-lg" style="width: 100%;">New Purchase</button>
                </a>
              </div>
            </div>
</div>

 
<div class="x_panel" id="short_reports">
  <div class="row x_title">
    <div class="col-md-12">
      <h2><strong>Short Reports</strong></h2>
    </div>
  </div>


<div id="short_report_area" >
 <div class="row">

  
<div class="col-md-4 col-sm-12 col-xs-12">
 <div class="x_panel">
             
             <div class="row x_title">
                    <div class="col-md-12">
                      <h2><strong>Today Summary</strong></h2>
                    </div>
                  </div>
              
               <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="tile-stats alert-success">
                  <div class="icon"><i class="fa fa-file-text"></i></div>
                  <div class="count"><?php echo $conf->DailySale(date('Y-m-d')); ?></div>
                  <h3>Total Sale</h3>
                  <p></p>
                </div>
              </div>
           
              <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="tile-stats alert-info">
                  <div class="icon"><i class="fa fa-file-text"></i></div>
                  <div class="count"><?php echo $conf->DailyCash(date('Y-m-d')); ?></div>
                  <h3> Cash Recieved</h3>
                  <p></p>
                </div>
              </div>
              <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="tile-stats alert-warning">
                  <div class="icon"><i class="fa fa-file-text"></i></div>
                  <div class="count"><?php echo $cont_sale_invoices; ?></div>
                  <h3>Sale Invoices</h3>
                  <p></p>
                </div>
              </div>
              <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="tile-stats primary-01">
                  <div class="icon"><i class="fa fa-file-text"></i></div>
                  <div class="count"><?php echo $count_sale_ret_inv; ?></div>
                  <h3>Sale Return Invoices</h3>
                  <p></p>
                </div>
              </div>
            </div>
	 </div>
	 
<div class="col-md-8 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><strong><?=$monthName?> Detail</strong></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <canvas id="homeChart" style="height:250px"></canvas>
                </div>
              </div>
</div>                        
 </div>

        
 <div class="row">

 <div class="x_panel">
              <div class="row x_title">
                    <div class="col-md-12">
                      <h2><strong>Yesterday Summary</strong></h2>
                    </div>
                  </div>
                  
               <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats alert-success">
                  <div class="icon"><i class="fa fa-file-text"></i></div>
                  <div class="count"><?php echo $conf->DailySale($ydate); ?></div>
                  <h3>Total Sale</h3>
                  <p></p>
                </div>
              </div>
           
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats alert-info">
                  <div class="icon"><i class="fa fa-file-text"></i></div>
                  <div class="count"><?php echo $conf->DailyCash($ydate); ?></div>
                  <h3> Cash Recieved</h3>
                  <p></p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats alert-warning">
                  <div class="icon"><i class="fa fa-file-text"></i></div>
                  <div class="count"><?php echo $cont_sale_invoices_y; ?></div>
                  <h3>Sale Invoices</h3>
                  <p></p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats primary-01">
                  <div class="icon"><i class="fa fa-file-text"></i></div>
                  <div class="count"><?php echo $count_sale_ret_inv_y; ?></div>
                  <h3>Sale Return Invoices</h3>
                  <p></p>
                </div>
              </div>
            </div>
 </div>
  
  </div>      
  </div> 

 <div class="row">
 <div class="x_panel">
              <div class="row x_title">
                    <div class="col-md-12">
                      <h2><strong>Reports</strong></h2>
                    </div>
                  </div>
               <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <a href="sales_report.php?type=date">
                <button type="button" class="btn btn-success btn-lg" style="width: 100%;">Sale Report</button></a>
                
              </div>
           
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <a href="purchase_report.php?type=pdate">
                <button type="button" class="btn btn-success btn-lg" style="width: 100%;">Purchase Report</button>
                </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <a href="stock.php">
                
                <button type="button" class="btn btn-success btn-lg" style="width: 100%;">Stock Report</button>
                </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <a href="customers.php">
               
                <button type="button" class="btn btn-success btn-lg" style="width: 100%;">Customers Report</button>
                </a>
              </div>
            </div>
 </div>