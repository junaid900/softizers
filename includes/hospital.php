<?php
@extract( $_POST );

//--------------Delete User-------------
if ( isset( $_POST[ 'deleteid' ] ) ) {

    $deleteid = $_POST['deleteid'];
    $table_fetch_un = HOSPITAL . " where id='" . $gen->IDdecode($deleteid) . "'";


    $flagmain = $conf->delme( HOSPITAL, $gen->IDdecode($deleteid), "id" );
    if ( $flagmain ) {
        $success = "<p>Record <strong>Deleted</strong> Successfully</p>";
    }
}
$results = $conf->fetchall( HOSPITAL ." ORDER BY `id` DESC");
?>
<style>
    .right {
        float: right;
        margin: 10px;
    }
</style>

<div class="col-md-12">
    <?php include('includes/messages-display.php')?>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">



        <div class="page-title">
            <div class="title_left">


                <h3>All Users</h3>
            </div>
        </div>
        <div class="x_panel">
            <button type="submit" onClick="window.location.href='add_hospital.php'" class="btn btn-primary right" name="">Add Hospital</button>
            <!----------- Page Content ----------->
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered bulk_action" id="datatable-checkbox">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th width="6%">View</th>
                            <th width="6%">Edit</th>
<!--                            <th width="6%">Delete</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($results as $x) { ?>
                            <tr>
                                <td>
                                    <?php echo $x->id; ?>
                                </td>
                                <td>
                                    <?php echo $x->name; ?>
                                </td>
                                <td>
                                    <form action="view_hospital.php?CD=<?php echo $gen->IDencode($x->id); ?>" method="post">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-eye"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="edit_hospital.php?CD=<?php echo $gen->IDencode($x->id); ?>" method="post">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>
                                    </form>
                                </td>
<!--                                <td>-->
<!--                                    <form action="" method="post">-->
<!--                                        <input type="hidden" name="deleteid" value="--><?php //echo $gen->IDencode($x->id); ?><!--">-->
<!--                                        <button type="submit" class="btn btn-danger"-->
<!--                                                onclick="javascript:return confirm('Are you sure, you want to delete this user?')">-->
<!--                                            <i class="fa fa-trash-o" aria-hidden="true"></i> </button>-->
<!--                                    </form>-->
<!--                                </td>-->
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>