<?php
@extract( $_POST );
$customer_id = $gen->IDdecode( $_REQUEST[ 'CD' ] );

if ( isset( $_POST[ 'update' ] ) ) {
	$first_name = $_POST[ 'first_name' ];
	if ( empty( $first_name ) ) {
		$error = "First Name is empty";
	}
	$last_name = $_POST[ 'last_name' ];
	if ( empty( $last_name ) ) {
		$error = "Last Name Person is empty";
	}
    $user_name = $_POST[ 'user_name' ];
	if ( empty( $user_name ) ) {
		$error = "userName is empty";
	}
	$email = $_POST[ 'email' ];
	if ( empty( $email ) ) {
		$error = "Email is empty";
	}
	$gender = $_POST[ 'gender' ];
	$status = $_POST[ 'status' ];
	$role = $_POST[ 'role' ];
	 $table = USERS . " set `first_name`='" . $first_name . "',`username`='" . $user_name . "',  `last_name`='" . $last_name . "', `email`='" . $email . "', `gender`='" . $gender . "', `status`='" . $status . "' , `role`='" . $role . "' where id='" . $customer_id . "'";
	$recodes = $conf->updateValue( $table );
	if ( $recodes == true ) {
		$success = "Record <strong>Updated</strong> Successfully";
		$gen->redirecttime( 'users.php', '2000' );
	} else {
		$error = "Record Not Updated";
	}

	
}
$table_fetch = USERS . " where id='" . $customer_id . "'";
$x = $conf->singlev( $table_fetch );


// chane password

//$id = $_SESSION[ 'Mngid' ];
if ( isset( $_POST[ 'update_password' ] ) ) {
    $error = "";
   // $o_password = $_POST[ 'o_password' ];
    $old_password = $_POST[ 'old_password' ];
    $password = $_POST[ 'n_password' ];
    $c_password = $_POST[ 'c_password' ];
    if ( empty( $old_password ) ) {
        $error = "Please enter old password";
    }
    if ( !empty( $password ) ) {
        if ( $password == $c_password ) {
            $password = md5( $password );
            $old_password = md5( $old_password );
        } else {
            $error = "Password and Confirm password should be same.";
        }
    }
    if ( empty( $error ) ) {
      echo   $table = USERS . " WHERE id = '" . $customer_id . "' and password='" . $old_password . "'";
        $count = $conf->countme( $table );
        if ( $count == '1' ) {
            $fields = " `password`='" . $password . "' ";
            $where = " id='" . $id . "'";
            if ( $conf->updateRecords( USERS, $fields, $where ) ) {
                $success = "Password update successfully";
            }

        }  else {
             $error = "Wrong Old Password";
         }
    }
}
$table_fetch = USERS . " where id='" . $_SESSION[ 'customer_id' ] . "'";
$row = $conf->singlev( $table_fetch );




?>


<div class="col-md-12">
	<?php include('includes/messages-display.php')?>
</div>
<div class="page-title">
	<div class="title_left">

		<!----------- Page Main Heading ----------->
		<h3>Update User</h3>
	</div>
	<button type="button" onClick="window.location.href='users.php'" class="btn btn-primary right float-right" name="">Go Back</button>

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
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" class="form-control" name="first_name" value="<?php echo $x->first_name; ?>" placeholder="First Name">
  </div></div>

          <div class="col-md-6">
<div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input type="text" class="form-control" name="last_name" value="<?php echo $x->last_name; ?>" placeholder="Last Name">
  </div></div>
  <div class="col-md-6">
<div class="form-group">
    <label for="exampleInputEmail1">userName</label>
    <input type="text" class="form-control" name="user_name" value="<?php echo $x->username; ?>" placeholder="Last Name">
  </div></div>
          <div class="col-md-6">
<div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" value="<?php echo $x->email; ?>" placeholder="Email">
  </div></div>
          
    <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" name="gender">
                                    	<option value="m" <?php if ($x->gender == "m") { echo "selected"; } ?>>Male</option>
                                    	<option value="f" <?php if ($x->gender == "f") { echo "selected"; } ?>>Female</option>
                                    </select>                                    
                                </div>
                            </div>       
          <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status"  class="form-control">
                                    	<option value="1" <?php if ($x->status == "1") { echo "selected"; } ?>>Active</option>
                                    	<option value="0" <?php if ($x->status == "0") { echo "selected"; } ?>>Inactive</option>
                                    </select>                                    
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role"  class="form-control">
                                    	<option value="user" <?php if ($x->role == "user") { echo "selected"; } ?>>User</option>
                                    	<option value="admin" <?php if ($x->role == "0") { echo "selected"; } ?>>Admin</option>
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


<div class="page-title">
    <div class="title_left">
        <h3>Change Password</h3>
    </div>
</div>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <!----------- Page Content ----------->
            <div class="x_content">

                <form id="demo-form2" data-parsley-validate="" method="post" class="form-horizontal form-label-left" novalidate enctype="multipart/form-data">
<div class="row">
<div class="col-md-6">
<div class="form-group">
    <label>Old Password</label>
    <input type="password" class="form-control" name="old_password" placeholder="Old Password">
  </div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
    <label>New Password</label>
    <input type="password" class="form-control" id="pass1" name="n_password" placeholder="New Password">
  </div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
    <label>Confirm Password</label>
    <input type="password" class="form-control" id="pass2" name="c_password" onkeyup="checkPass(); return false;" placeholder="Confirm Password">
    <span id="confirmMessage" class="confirmMessage"></span>
  </div>
</div>
</div>
<div class="row"> 
<div class="col-md-12 col-sm-12 col-xs-12">
              <input type="submit" value="Update Password" name="update_password" class="btn btn-primary">
            </div>

</div>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
    
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  

</script>