<?php
//$max_id = $conf->single( CUSTOMERS, ' MAX(id) as max_id' );
//$max_id = $conf->single( CUSTOMERS." where id = (select MAX(id) as max_id from ".CUSTOMERS.")", 'code' );
if ( isset( $_POST[ 'submit' ] ) ) {
	$first_name = $_POST[ 'first_name' ];
	if ( empty( $first_name ) ) {
		$error = "First Name is empty";
	}
	$last_name = $_POST[ 'last_name' ];
	if ( empty( $last_name ) ) {
		$error = "Last Name is empty";
	}
	$email = $_POST[ 'email' ];
	if ( empty( $email ) ) {
		$error = "Email is empty";
	}
    
	$gender = $_POST[ 'gender' ];
	if ( empty( $gender ) ) {
		$error = "Email is empty";
	}
    $username = $_POST[ 'user_name' ];
    if ( empty( $username ) ) {
		$error = "Username is empty";
	}
	$password = $_POST[ 'password' ];
	if ( empty( $password ) ) {
		$error = "Password is empty";
	}
	$status = $_POST[ 'status' ];
	// if ( empty( $status ) ) {
	// 	$error = "Status is empty";
	// }
	$role = $_POST[ 'role' ];
	if ( empty( $role ) ) {
		$error = "Role is empty";
	}

	if ( empty( $error ) ) {
		$data_post = array( 'first_name' => $first_name,'username' =>$username,'last_name' => $last_name, 'email' => $email, 'gender' => $gender, 'password' =>md5($password) , 'status' => $status , 'role' => $role );
		$recodes = $conf->insert( $data_post, USERS );
		if ( $recodes == true ) {
			$success = "Record <strong>Added</strong> Successfully";

			$gen->redirecttime( 'users.php', '2000' );
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
    <input type="text" class="form-control" name="first_name" placeholder="First Name">
  </div></div>

          <div class="col-md-6">
<div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input type="text" class="form-control" name="last_name" placeholder="Last Name">
  </div></div>
  <div class="col-md-6">
<div class="form-group">
    <label for="exampleInputEmail1">UserName</label>
    <input type="text" class="form-control" name="user_name" placeholder="UserName">
  </div></div>
          <div class="col-md-6">
<div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" placeholder="Email">
  </div></div>
          
    <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" name="gender">
                                    	<option value="">Select Gender</option>
                                    	<option value="m">Male</option>
                                    	<option value="f">Female</option>
                                    </select>                                    
                                </div>
                            </div>

          <div class="col-md-6">
<div class="form-group ">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" name="password" class="form-control" placeholder="password">
  </div></div>
          
          <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status"  class="form-control">
                                    	<option value="1" >Active</option>
                                    	<option value="0" >Inactive</option>
                                    </select>                                    
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role"  class="form-control">
                                    	<option value="user">User</option>
                                    	<option value="admin" >Admin</option>
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