<?php
@extract( $_POST );
$customer_id = $gen->IDdecode( $_REQUEST[ 'CD' ] );


$table_fetch = HOSPITAL . " where id='" . $customer_id . "'";
$x = $conf->singlev( $table_fetch );
?>
<div class="col-md-12">
    <?php include('includes/messages-display.php')?>
</div>
<div class="page-title">
    <div class="title_left">

        <!----------- Page Main Heading ----------->
        <h3>View Hospital Detail</h3>
    </div>
    <button type="button" onClick="window.location.href='hospital.php'" class="btn btn-primary right float-right" name="">Go Back</button>

</div>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <!----------- Page Content ----------->
            <div class="x_content">

                <form id="demo-form2" data-parsley-validate="" method="post" class="form-horizontal form-label-left" novalidate enctype="multipart/form-data">

                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name: </label>

                                <?php echo $x->name; ?>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status: </label>
                                <?php if ($x->status == "1") { echo "Active"; }else{ echo "Inactive";} ?>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>