<?php
//$max_id = $conf->single( CUSTOMERS, ' MAX(id) as max_id' );
//$max_id = $conf->single( CUSTOMERS." where id = (select MAX(id) as max_id from ".CUSTOMERS.")", 'code' );
if ( isset( $_POST[ 'submit' ] ) ) {
    $first_name = $_POST[ 'name' ];
    if ( empty( $first_name ) ) {
        $error = "Name is empty";
    }
    $status = $_POST['status'];
    if ( empty( $error ) ) {
        $data_post = array( 'name' => $first_name, 'status' => $status  );
        $recodes = $conf->insert( $data_post, HOSPITAL );
        if ( $recodes == true ) {
            $success = "Record <strong>Added</strong> Successfully";

            $gen->redirecttime( 'hospital.php', '2000' );
        }
    }
}

?>
<div class="col-md-12">
    <?php include('includes/messages-display.php')?>
</div>
<div class="page-title">
    <div class="title_left">

        <!----------- Page Main Heading ----------->
        <h3>Add User </h3>
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
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status"  class="form-control">
                                    <option value="1" >Active</option>
                                    <option value="0" >Inactive</option>
                                </select>
                            </div>
                        </div>
                        <center><div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="submit" name="submit" class="btn btn-primary">
                            </div></center>

                    </div>


                </form>

            </div>
        </div>
    </div>
</div>