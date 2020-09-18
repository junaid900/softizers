<?php

$cat_id = $_REQUEST['category_id'];

if ( isset( $_POST[ 'update_record' ] ) ) {
	$error = "";
	$category_id = $_POST['cat_id'];
	$cat_name = $_POST[ 'cate_name' ];
   
	if ( empty( $error ) ) {
		$table = CATEGORIES . " set `category_name`='" . $cat_name . "' where id='" . $category_id . "'";
		$recodes = $conf->updateValue( $table );
        
        
		if ($recodes==true){
            $success = "Record <strong>Updated</strong> Successfully";
            $gen->redirecttime( 'add_category.php' );
        }else{
            $danger = "Not Updated";
        }
	
}
}
$table_fetch = CATEGORIES . " where id='" . $cat_id . "'";
$row = $conf->singlev( $table_fetch );
?>
    <div class="col-md-12">
        <?php include('includes/messages-display.php')?>
    </div>
    <div class="page-title">
        <div class="title_left">

            <!----------- Page Main Heading ----------->
            <h3>Update Category</h3>
        </div>
        <button type="button" onClick="window.location.href='add_category.php'" class="btn btn-primary right float-right" name="">Go Back</button>

    </div>
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <!----------- Page Content ----------->
                <div class="x_content">
                    <form id="demo-form2" data-parsley-validate="" method="post" class="form-horizontal form-label-left" novalidate enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cate_name"> Category Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="cate_name" id="cate_name" value="<?php echo $row->category_name;?>" data-required="true" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" value="<?php echo $cat_id ?>" name="cat_id">
                                <button type="submit" name="update_record" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
