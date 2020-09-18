<?php
@extract($_POST);
$hsId = $gen->IDdecode($_REQUEST['CD']);

if (isset($_POST['update'])) {
    $first_name = $_POST['first_name'];
    if (empty($first_name)) {
        $error = "Name is empty";
    }

    $gender = $_POST['name'];
    $status = $_POST['status'];
    $table = HOSPITAL . " set `name`='" . $first_name . "',`status`='" . $status . "' where id='" . $hsId . "'";
    $recodes = $conf->updateValue($table);
    if ($recodes == true && empty($error)) {
        $success = "Record <strong>Updated</strong> Successfully";
        $gen->redirecttime('hospital.php', '2000');
    } else {
        $error = "Record Not Updated";
    }

}
$table_fetch = HOSPITAL . " where id='" . $hsId . "'";
$x = $conf->singlev($table_fetch);


// chane password

//$id = $_SESSION[ 'Mngid' ];

//if (empty($error)) {
//    echo $table = USERS . " WHERE id = '" . $customer_id . "' and password='" . $old_password . "'";
//    $count = $conf->countme($table);
//    if ($count == '1') {
//        $where = " id='" . $id . "'";
//        if ($conf->updateRecords(USERS, $fields, $where)) {
//            $success = "Password update successfully";
//        }
//
//    } else {
//        $error = "Wrong Old Password";
//    }
//}

$table_fetch = HOSPITAL . " where id='" . $hsId. "'";
$row = $conf->singlev($table_fetch);


?>


<div class="col-md-12">
    <?php include('includes/messages-display.php') ?>
</div>
<div class="page-title">
    <div class="title_left">

        <!----------- Page Main Heading ----------->
        <h3>Update User</h3>
    </div>
    <button type="button" onClick="window.location.href='hospital.php'" class="btn btn-primary right float-right" name="">
        Go Back
    </button>

</div>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <!----------- Page Content ----------->
            <div class="x_content">

                <form id="demo-form2" data-parsley-validate="" method="post" class="form-horizontal form-label-left"
                      novalidate enctype="multipart/form-data">

                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control" name="first_name"
                                       value="<?php echo $x->name; ?>" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" <?php if ($x->status == "1") {
                                        echo "selected";
                                    } ?>>Active
                                    </option>
                                    <option value="0" <?php if ($x->status == "0") {
                                        echo "selected";
                                    } ?>>Inactive
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="submit" name="update" value="Update" class="btn btn-primary">
                        </div>

                    </div>


                </form>

            </div>
        </div>
    </div>
</div>
