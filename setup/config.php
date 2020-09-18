<?php

session_start();

date_default_timezone_set( 'Asia/Karachi' );

include_once 'db-tables.php';

error_reporting(0);

$cDateTime = date("Y-m-d H:i:s");

$_SESSION['$cDateTime'] = date("Y-m-d H:i:s");

class config {

	private $link;

	function __construct() {

		$conect_pagename = $_SESSION[ 'checkdb' ];

		require_once( 'config_access.php' );

		$this->link = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABSE );

		if ( !$this->link ) {

			echo "Error: Unable to connect to MySQL." . PHP_EOL;

			echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;

			echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;

			exit;

		}

	}

	//Select all from table.

	function fetchall( $table ) {

		$sql = "select * from $table";

		//echo $sql;

		$result = mysqli_query( $this->link, $sql );

		$arr = array();

		while ( $rs = mysqli_fetch_object( $result ) ) {

			//echo $sql;

			$arr[] = $rs;

		}

		return $arr;

	}



 // select all with limit 100 records ...

  	function fetchalllimit( $table,$limit=100 ) {

		$sql = "select * from $table Order by id desc limit $limit";

		//echo $sql;

		$result = mysqli_query( $this->link, $sql );

		$arr = array();

		while ( $rs = mysqli_fetch_object( $result ) ) {

			//echo $sql;

			$arr[] = $rs;

		}

		return $arr;

	}



	//function for total joining at that level.

	function getotUser( $table, $userid, $level ) {

		$sql = "select count(*) as cnt from $table where refrenceid='$userid' and level='$level'";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		return $rs->cnt;

	}

	//function for total joining from refrence.

	function joining( $table, $userid ) {

		$sql = "select count(*) as cnt from $table where refrenceid='$userid'";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		return $rs->cnt;

	}

	function insertValue( $table, $column, $value ) {

		$sql = "insert into $table ($column) values($value)";

		$result = mysqli_query( $this->link, $sql );

		$val = mysqli_insert_id( $this->link );

		return $val;

	}

	function checkAvailablity( $table ) {

		$sql = "select count(*) as cnt from $table";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		return $rs->cnt;

	}

	function updateValue( $table ) {

		  $sql = "update $table";

		if (mysqli_query( $this->link, $sql )){

			

			return true;

		}else{

			return false;

		}

	}

	function updateRecords( $table, $fields, $where = '' ) {

		if ( $where != '' )$where = " WHERE $where";

		$query =

			mysqli_query( $this->link, "UPDATE $table SET $fields" . $where )or

		die( "Update Error - UPDATE $table SET $fields" . $where . " - " . mysql_error( $this->link ) );

		if ( $query ) {

			return true;

		}

		return false;

	}

	function updateme( $table, $value, $where = null ) {

		$sql = "update $table set $value $where";

		mysqli_query( $this->link, $sql )or die( mysqli_error( $this->link ) );

	}

	//getting single value

	function single( $table, $column ) {

		$sql = "select $column from $table";

		//echo $sql;

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		//return $rs->$column;

		return $rs;

	}

	function singlev( $table ) {

    	$sql = "select * from $table";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		return $rs;

	}

	function delme( $table, $del, $field = 'id', $limit = NULL ) {

		if ( !empty( $del ) ) {

			$sql = "delete from $table where $field='$del' $limit";

			if ( mysqli_query( $this->link, $sql ) )

				return true;

			else

				return false;

		} else

			return false;

	}

	function countme( $table ) {

		$sql = "select count(*) as cnt from $table";

		//echo "<br>".$sql;

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		return $rs->cnt;

	}

	function joinme( $column, $table1, $table2, $where = null ) {

		$sql = "select $column from $table1 join $table2 $where";

		$result = mysqli_query( $this->link, $sql );

		$arr = array();

		while ( $rs = mysqli_fetch_object( $result ) ) {

			$arr[] = $rs;

		}

		return $arr;

	}

	//------------Special DB functions--------------

	public function insert( $values, $table ) {

		if ( empty( $values ) || empty( $table ) ) {

			// Noting to do

			return "";

		}

		$list = array();

		foreach ( $values as $k => $v )

			if ( $v == 'NOW()' )

				$list[] = "`" . $k . "` = " . $v;

		else

			$list[] = "`" . $k . "` = '" . mysqli_real_escape_string( $this->link, $v ) . "'";

		$list = implode( ",", $list );

		$query = "INSERT INTO `" . $table . "` SET " . $list;

		//echo "<br>".$query;

		if ( mysqli_query( $this->link, $query ) )

			return mysqli_insert_id( $this->link );

		else {

			echo mysqli_error( $this->link );

			return false;

		}

	}

	public function select( $fields, $table, $where = '', $orderby = '', $limit = '' ) {

		if ( $where != '' )$where = " WHERE $where";

		if ( $orderby != '' )$orderby = " ORDER BY $orderby";

		if ( $limit != '' )$limit = " LIMIT $limit";

	  // echo "SELECT $fields FROM $table" . $where . $orderby . $limit;

		$recordSet =

			mysqli_query( $this->link,

				"SELECT $fields FROM $table" . $where . $orderby . $limit // Set the SELECT for the query

			)or die(

				"Error - SELECT $fields FROM $table" . $where . $orderby . $limit .

				" - " . mysqli_error()

			);

		if ( !$recordSet ) // A quick check to see if the query failed. This is a backup to the previos die()

			return "Record Set Error";

		else

			while ( $rs = mysqli_fetch_object( $recordSet ) ) {

			$arr[] = $rs;

		}

		return $arr;

		//return $recordSet; // Return the $recordSet whether it passed or now.

	}

	public function update( $table, $fields, $where = '' ) {

		if ( $where != '' )$where = " WHERE $where";

		$query =

			mysqli_query( $this->link,

				"UPDATE $table SET $fields" . $where

			)or die(

				"Update Error - UPDATE $table SET $fields" . $where . " - " . mysqli_error()

			);

		if ( $query ) {

			return true;

		}

		return false;

	}

	// This function gets the last mysql insert Id.

	public function getInsertId() {

		return mysqli_insert_id( $this->link );

	}

	//------------New Functions by UST--------------	

	public function QueryRun( $sql, $prnt = '' ) {

		if ( $prnt == 1 )

			echo "<br>" . $sql;

		$result = mysqli_query( $this->link, $sql );

		$arr = array();

		while ( $rs = mysqli_fetch_object( $result ) ) {

			$arr[] = $rs;

		}

		return $arr;

	}

	//function for total joining from refrence.

	public function CountRecords( $table, $where = '' ) {

		$sql = "select count(*) as cnt from $table $where";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		return $rs->cnt;

	}

	public function delete( $table, $where ) {

		$query = mysqli_query( $this->link, "DELETE FROM $table WHERE $where" )or

		die( "Delete Error - DELETE FROM $table WHERE $where" . " - " . mysqli_query( $this->link ) );

		if ( $query )

			return true;

		return false;

	}

	public function QueryRunArray( $sql, $prnt = '' ) {

		if ( $prnt == 1 )

			echo "<br>" . $sql;

		$result = mysqli_query( $this->link, $sql );

		$arr = array();

		while ( $rs = mysqli_fetch_object( $result ) ) {

			$arr[] = $rs;

		}

		return $arr;

	}

	public function QueryRunsimple( $sql, $prnt = '' ) {

		if ( $prnt == 1 )

			echo "<br>" . $sql;

		$result = mysqli_query( $this->link, $sql );

		return $result;

	}

	/*User Registration check email*/

	public function user_reg_ch_email( $user_email, $uid = '' ) {

		$sql = "SELECT email FROM " . USER . " WHERE email = '" . $user_email . "'";

		$result = mysqli_query( $this->link, $sql );

		$rows = $result->num_rows;

		if ( $rows > 0 )

			return false;

		else

			return true;

	}

	/*User Registration check username*/

	public function user_reg_ch_username( $username, $uid = '' ) {

		$sql = "SELECT username FROM " . USER . " WHERE username = '" . $username . "'";

		$result = mysqli_query( $this->link, $sql );

		$rows = $result->num_rows;

		if ( $rows > 0 )

			return false;

		else

			return true;

	}

	/*Admin Registration check email*/

	public function admin_reg_ch_email( $admin_email, $uid = '' ) {

		$sql = "SELECT email FROM " . MANAGER . " WHERE email = '" . $admin_email . "'";

		$result = mysqli_query( $this->link, $sql );

		$rows = $result->num_rows;

		if ( $rows > 0 )

			return false;

		else

			return true;

	}

	/*Admin Registration check username*/

	public function admin_reg_ch_username( $username, $uid = '' ) {

		$sql = "SELECT login FROM " . MANAGER . " WHERE login = '" . $username . "'";

		$result = mysqli_query( $this->link, $sql );

		$rows = $result->num_rows;

		if ( $rows > 0 )

			return false;

		else

			return true;

	}

	/*Staff Registration check email*/

	public function staff_reg_ch_email( $user_email, $uid = '' ) {

		$sql = "SELECT email FROM " . USER . " WHERE email = '" . $user_email . "'";

		$result = mysqli_query( $this->link, $sql );

		$rows = $result->num_rows;

		if ( $rows > 0 )

			return false;

		else

			return true;

	}

	/*Staff Registration check username*/

	public function staff_reg_ch_username( $username, $uid = '' ) {

		$sql = "SELECT username FROM " . MANAGER . " WHERE login = '" . $username . "'";

		$result = mysqli_query( $this->link, $sql );

		$rows = $result->num_rows;

		if ( $rows > 0 )

			return false;

		else

			return true;

	}

	/*Un-set post*/

	public function unset_post() {

		foreach ( $_POST as $k => $v ) {

			unset( $_POST[ $k ] );

		}

	}

	/*SMTP*/

	public static function SendSMTP_admin( $from_name, $from_address, $to_name, $to_address, $subject_admin, $message_admin ) {

		$headers = "MIME-Version: 1.0\n";

		$headers .= "Content-type: text/html; charset=iso-8859-1\n";

		$headers .= "X-Priority: 3\n";

		$headers .= "X-MSMail-Priority: Normal\n";

		$headers .= "X-Mailer: php\n";

		$headers .= "From: \"" . $from_name . "\" <" . $from_address . ">\n";

		return mail( $to_address, $subject_admin, $message_admin, $headers );

	}

	/*Email Conformation*/

	public function account_verified( $id ) {

		$sql = "SELECT * FROM " . USER . " WHERE id = '" . $id . "'";

		$results = mysqli_query( $this->link, $sql );

		$user_data = mysqli_fetch_object( $results );

		$no_rows = $results->num_rows;

		if ( $no_rows == 1 ) {

			//, `account_info_status`='active'

			$fields = "`status`='active'";

			$sql_update = "update " . USER . " set " . $fields . " where id = '" . $id . "'";

			mysqli_query( $this->link, $sql_update )or die( mysqli_error() );

			return true;

		} else {

			return false;

		}

	}

	/*User Login*/

	public function user_Login( $username, $password ) {

		$sql = "SELECT * FROM " . USER . " WHERE user_password = '" . md5( $password ) . "' AND username = '" . $username . "' ";

		$results = mysqli_query( $this->link, $sql );

		$user_data = mysqli_fetch_object( $results );

		$no_rows = $results->num_rows;

		if ( $no_rows > 0 )

		{

			if ( $user_data->status == 'de-active' ) {

				return "de-active";

				$this->unset_post();

			}

			$ip = addslashes( $_SERVER[ 'SERVER_ADDR' ] );

			$data_post = array( 'user_id' => $user_data->id, 'login_time' => 'NOW()', 'ip' => $ip );

			$recodes = $this->insert( $data_post, USER_LOGS );

			$_SESSION[ 'login' ] = true;

			$_SESSION[ 'reg_id' ] = $user_data->id;

			$_SESSION[ 'username' ] = $user_data->username;

			return true;

			$this->RedirectUser();

		} else {

			return false;

			$this->unset_post();

		}

	}

	//image upload size and format check

	public function image_upload_check( $filename ) {

		$maxsize = 2097152; //1048576;//1097152;

		$format = array( 'image/jpg', 'image/jpeg', 'image/png' );

		if ( $_FILES[ $filename ][ 'size' ] >= $maxsize ) {

			return 'File Size too large upload limit only 2 MB';

		} elseif ( $_FILES[ $filename ][ 'size' ] == 0 ) {

			return 'Invalid File';

		}

		elseif ( !in_array( $_FILES[ $filename ][ 'type' ], $format ) ) {

			return 'Format Not Supported Only .jpeg files are accepted ' . $_FILES[ $filename ][ 'type' ];

		} else {

			return "OK";

		}

	}

	/*Check User Session*/

	public function SessionCheck() {

		if ( $_SESSION[ 'login' ] == true and isset( $_SESSION[ 'reg_id' ] ) )

			return true;

		else

			return false;

	}

	/*Check User suspended or not*/

	public function Check_account_info_status() {

		$table_fetch = USER . " where id='" . $_SESSION[ 'reg_id' ] . "'";

		$row = $this->singlev( $table_fetch );

		if ( $row->account_info_status == "suspended" )

			return true;

		else

			return false;

	}

	/*Get site settings*/

	public function site_settings() {

		$sqlset = "SELECT * FROM " . SITE_SETTINGS . " WHERE id = '1'";

		$results_set = mysqli_query( $this->link, $sqlset );

		$get_setting = mysqli_fetch_object( $results_set );

		$rows_set = $results_set->num_rows;

		if ( $rows_set == 1 ) {

			define( "SITE_NAME", $get_setting->site_name );

			define( "SITE_TAGLINE", $get_setting->site_tagline );

			define( "SITE_URL", $get_setting->site_url );

			define( "SITE_EMAIL", $get_setting->site_email );

			define( "SITE_PHONE", $get_setting->site_phone );

			define( "SITE_SKYPE", $get_setting->site_skype );

			define( "SITE_ADDRESS", $get_setting->site_address );

			define( "SITE_COPY_RIGHTS", $get_setting->site_copyrights );

			define( "SITE_LOGO", $get_setting->site_logo );

			define( "SITE_FAVICON", $get_setting->site_favicon );

			define( "SITE_HEADER_CODE", $get_setting->site_header_code );

			define( "SITE_FOOTER_CODE", $get_setting->site_footer_code );

		}

	}

	/*Session*/

	public function session() {

		if ( isset( $_SESSION[ 'MngLogin' ] ) ) {

			return $_SESSION[ 'MngLogin' ];

		} else {

			return false;

		}

	}

	public function AdminSession() {

		if ( isset( $_SESSION[ 'MngLogin' ] ) ) {

			return $_SESSION[ 'MngLogin' ];

		} else {

			return false;

		}

	}

	/*Logout*/

	public function logout() {

		unset( $_SESSION[ 'MngLogin' ] );

		unset( $_SESSION[ 'login' ] );

		session_destroy();

		return true;

	}

	/*User Registration*/

	public function insert_user_reg( $data_post ) {

		$full_name = $data_post[ 'full_name' ];

		$username = $data_post[ 'username' ];

		$user_password = $data_post[ 'user_password' ];

		$sql = "INSERT INTO " . MANAGER . " (full_name, username, user_password, registeration_date) values('" . $full_name . "','" . $username . "','" . $user_password . "',NOW())";

		$result = mysqli_query( $this->link, $sql );

		return true;

	}

	/*froget password*/

	public function frogetpassword( $email ) {

		$sql = "SELECT * FROM " . USER . " WHERE email = '" . $email . "'";

		$results = mysqli_query( $this->link, $sql );

		$user_data = mysqli_fetch_object( $results );

		$no_rows = $results->num_rows;

		if ( $no_rows == 1 ) {

			$fields = "`p_request`='active',`p_req_date`=NOW()";

			$sql_update = "update " . USER . " set " . $fields . " where email = '" . $email . "'";

			mysqli_query( $this->link, $sql_update )or die( mysqli_error() );

			$id = $user_data->id;

			$password = $a_rand;

			$newemail = $user_data->email;

			$username = $user_data->full_name;

			$prid = base64_encode( $id . '--' . mt_rand( 100000, 999999 ) );

			$from_name = "Quality Foods � Password Update";

			$from_address = "web@qfoods.com.au";

			$to_name = $username;

			$to_address = $newemail; //	ADMIN MAIL ADDRESS IS REQUIRED...!

			$subject_admin = "Account Recovery";

			$message_admin = "

		<table cellpadding='5' cellspacing='5'>

			<tr>

				<td colspan='100%' align='center'><h3>Password Change Request</h3></td>

			</tr>

			<tr>

				<td>For changing your password </td>

				<td><a href='http://www.fyi.net.au/changepassword.php?jd=" . $prid . "'>Click Here</a></td>

			</tr>

		</table>";

			$this->SendSMTP_admin( $from_name, $from_address, $to_name, $to_address, $subject_admin, $message_admin );

			return true;

		} else {

			return FALSE;

		}

	}

	/*Update password*/

	public function updatepassword( $password, $id ) {

		$sql = "SELECT * FROM " . USER . " WHERE id = '" . $id . "' and p_request='active' and p_req_date > NOW() - INTERVAL 1 HOUR";

		$results = mysqli_query( $this->link, $sql );

		$user_data = mysqli_fetch_object( $results );

		$no_rows = $results->num_rows;

		if ( $no_rows == 1 ) {

			$password = md5( $password );

			$fields = "`user_password`='$password',`p_request`='de-active'";

			$sql_u = "update " . USER . " set $fields where id='" . $id . "'";

			mysqli_query( $this->link, $sql_u )or die( mysqli_error() );

			return true;

		} else {

			return false;

		}

	}

	/*Update old password*/

	public function update_old_password( $old_password, $user_password, $id ) {

		$sql = "SELECT * FROM " . USER . " WHERE id = '" . $id . "' and user_password='" . $old_password . "'";

		$results = mysqli_query( $this->link, $sql );

		$user_data = mysqli_fetch_object( $results );

		$no_rows = $results->num_rows;

		if ( $no_rows == 1 ) {

			$sql_u = "update " . USER . " set `user_password`='" . $user_password . "' where id='" . $id . "'";

			mysqli_query( $this->link, $sql_u )or die( mysqli_error() );

			return true;

		} else {

			return false;

		}

	}

	/* Redirect User */

	public function RedirectUser() {

		General::redirect( "dashboard" );

	}

	/* Redirect User */

	public function PinVerify( $uid, $pin ) {

		$table_fetch = USER . " where user_id='" . $uid . "'";

		$chk_pin = $this->single( $table_fetch, pin_no );

		if ( $chk_pin->pin_no != hash( 'ripemd160', $pin ) )

			return false;

		else

			return true;

	}

	/* Slug*/

	public function slug_create( $string )

	{

		$text = strip_tags( $string );

		$text = preg_replace( '~[^\\pL\d]+~u', '-', $text );

		$text = trim( $text, '-' );

		$text = strtolower( $text );

		$text = preg_replace( '~[^-\w]+~', '', $text );

		return $text;

	}

	function SlugToID( $tablename, $slugtoid, $idfield )

	{

		$sql = "select " . $idfield . " from " . $tablename . " where slug = '" . $slugtoid . "'";

		$result = mysqli_query( $this->link, $sql );

		$rowslug = mysqli_fetch_array( $result );

		return $rowslug[ $idfield ];

	}

	function IDToSlug( $tablename, $idtoslug, $idfield )

	{

		$sqlslug = "select slug from " . $tablename . " where " . $idfield . " = '" . $idtoslug . "'";

		$result = mysqli_query( $this->link, $sqlslug );

		$rowslug = mysqli_fetch_array( $result );

		return $rowslug[ 'slug' ];

	}

	

	function get_max( $tablename, $get_colom,$get_max_id )

	{

	$max_id = $this->single( $tablename . " where id = (select MAX($get_max_id) as max_id from " . $tablename . ")", "'.$get_colom.'" );

		

		return $max_id->max_id;

	}

	

	function product_stock( $product_id )

	{

	$pstock = $this->single( STOCK_HISTORY." where stock_id = (select MAX(stock_id) as max_id from " . STOCK_HISTORY . " where cache=0  AND product_id = " . $product_id . ")", "total_Stock_qty" );

		

		return $pstock->total_Stock_qty;

	}



	function current_product_stock($qty_zero=0)

	{

		

	$sql = "SELECT stock_id, `product_id`, `total_Stock_qty` FROM " . STOCK_HISTORY . " WHERE `stock_id` IN (SELECT MAX(stock_id) FROM " . STOCK_HISTORY . " WHERE `cache`=0 GROUP BY product_id )";

	if($qty_zero==0){ $sql.=" AND total_Stock_qty>0"; }



		$result = mysqli_query( $this->link, $sql );

		$arr = array();

		while ( $rs = mysqli_fetch_object( $result ) ) {

			$arr[$rs->product_id] = $rs->total_Stock_qty;

		}

		return $arr;

	}





	function get_max_in_stock( $tablename, $get_colom,$get_max_id,$product_id )

	{

	$max_id = $this->single( $tablename . " where stock_id = (select MAX(stock_id) as max_id from " . $tablename . " where product_id = " . $product_id . ")", $get_colom );

		

		return $max_id->stock_id;

	}

	

	

		function pcode_to_id( $code ) {

		$sql = "select id from ".ITEMS." WHERE item_code='$code'";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		return $rs->id;

	}

    public function CustomerFunds( $des, $usd, $uid, $crdb,$invoiceID='' ) {

		$previous_balance = 0;

		$parent_id = 0;

		$current_blance = 0;

		$pbalance_type = '';

//		if ( $crdb == 'db' ) {

//			$usd = -1 * $usd;

//		}

		$where = " id = (SELECT MAX(id) from " . CUSTOMER_FUNDS . " where customer_id = '" . $uid . "')";

		$preRecord = $this->singlev( CUSTOMER_FUNDS . " WHERE " . $where );

		if ( count( $preRecord ) > 0 ) {

			$previous_balance = $preRecord->current_balance;

			$pbalance_type = $preRecord->cbalance_type;

			$parent_id = $preRecord->id;

			

//			echo "<br> previous balance ".$preRecord->current_balance; 

//			echo "<br> current amount ".$usd; 

//			echo "<br> previous type ".$preRecord->cbalance_type; 

//			echo "<br> current type ".$crdb; 

			

			if ( $preRecord->cbalance_type == 'cr' and $crdb== 'cr') {

				$current_blance = $preRecord->current_balance + $usd;

				$cbalance_type = 'cr';

			} elseif( $preRecord->cbalance_type == 'db' and $crdb== 'cr') {

				$current_blance = $usd - $preRecord->current_balance;

				

			} elseif($preRecord->cbalance_type == 'cr' and $crdb== 'db'){

				$current_blance = $preRecord->current_balance - $usd;

				

			} elseif($preRecord->cbalance_type == 'db' and $crdb== 'db'){

				$current_blance = -($preRecord->current_balance + $usd);

			}

			

			if ( $current_blance < 0 ) {

					$cbalance_type = 'db';

					$current_blance = -1 * $current_blance;

				} else

					$cbalance_type = 'cr';

			

			if ( $usd < 0 )

			$usd = -1 * $usd;

			

		} else {

		  if ( $usd < 0 )

			$usd = -1 * $usd;

            

			$current_blance = $usd;

			$cbalance_type = $crdb;

		}

		

		$data_post = array('Description'=>$des,'t_amount' => $usd, 'customer_id' => $uid, 'parent_id' => $parent_id, 'previous_balance' => $previous_balance, 'pbalance_type' => $pbalance_type, 'current_balance' => $current_blance, 't_type' => $crdb, 'cbalance_type' => $cbalance_type, 't_datetime' => $_SESSION['$cDateTime'], 'invoice_id' => $invoiceID );

		$recodes = $this->insert( $data_post, CUSTOMER_FUNDS );

	}

    public function CustomerBalance( $uid ) {

		$where = " id = (SELECT MAX(id) from " . CUSTOMER_FUNDS . " where customer_id = '" . $uid . "')";

		$preRecord = $this->singlev( CUSTOMER_FUNDS . " WHERE " . $where );

		$balance = $preRecord->current_balance;

		if ( empty( $balance ) )

			return 0;

		if ( $preRecord->cbalance_type == 'db' )

			$balance = -1 * $balance;

		return $balance;

	}

	

	    public function VendorFunds( $des, $usd, $uid, $crdb,$invoiceID='' ) {

		$previous_balance = 0;

		$parent_id = 0;

		$current_blance = 0;

		$pbalance_type = '';

//		if ( $crdb == 'db' ) {

//			$usd = -1 * $usd;

//		}

		$where = " id = (SELECT MAX(id) from " . VENDOR_FUNDS . " where customer_id = '" . $uid . "')";

		$preRecord = $this->singlev( VENDOR_FUNDS . " WHERE " . $where );

		if ( count( $preRecord ) > 0 ) {

			$previous_balance = $preRecord->current_balance;

			$pbalance_type = $preRecord->cbalance_type;

			$parent_id = $preRecord->id;

			

//			echo "<br> previous balance ".$preRecord->current_balance; 

//			echo "<br> current amount ".$usd; 

//			echo "<br> previous type ".$preRecord->cbalance_type; 

//			echo "<br> current type ".$crdb; 

			

			if ( $preRecord->cbalance_type == 'cr' and $crdb== 'cr') {

				$current_blance = $preRecord->current_balance + $usd;

				$cbalance_type = 'cr';

			} elseif( $preRecord->cbalance_type == 'db' and $crdb== 'cr') {

				$current_blance = $usd - $preRecord->current_balance;

				

			} elseif($preRecord->cbalance_type == 'cr' and $crdb== 'db'){

				$current_blance = $preRecord->current_balance - $usd;

				

			} elseif($preRecord->cbalance_type == 'db' and $crdb== 'db'){

				$current_blance = -($preRecord->current_balance + $usd);

			}

			

			if ( $current_blance < 0 ) {

					$cbalance_type = 'db';

					$current_blance = -1 * $current_blance;

				} else

					$cbalance_type = 'cr';

			

			if ( $usd < 0 )

			$usd = -1 * $usd;

			

		} else {

		  if ( $usd < 0 )

			$usd = -1 * $usd;

            

			$current_blance = $usd;

			$cbalance_type = $crdb;

		}

		

		$data_post = array('Description'=>$des,'t_amount' => $usd, 'customer_id' => $uid, 'parent_id' => $parent_id, 'previous_balance' => $previous_balance, 'pbalance_type' => $pbalance_type, 'current_balance' => $current_blance, 't_type' => $crdb, 'cbalance_type' => $cbalance_type, 't_datetime' => $_SESSION['$cDateTime'], 'invoice_id' => $invoiceID );

		$recodes = $this->insert( $data_post, VENDOR_FUNDS );

	}

    public function VendorBalance( $uid ) {

		$where = " id = (SELECT MAX(id) from " . VENDOR_FUNDS . " where customer_id = '" . $uid . "')";

		$preRecord = $this->singlev( VENDOR_FUNDS . " WHERE " . $where );

		$balance = $preRecord->current_balance;

		if ( empty( $balance ) )

			return 0;

		if ( $preRecord->cbalance_type == 'db' )

			$balance = -1 * $balance;

		return $balance;

	}

	

     public function DailySale( $date ) {

        $sql = " SELECT Sum(invoice_total) AS total_sale from " . SALES_INV . " where date Like '". $date ."%'";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		if($rs->total_sale=="")

        return 0;

        else 

		return $rs->total_sale;

	}



      public function sumofdates($field,$date_to,$date_from,$table) {

       $sql = " SELECT Sum($field) AS sum_total_sale from " . $table . " where date between '$date_to' AND '$date_from'";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		if($rs->sum_total_sale=="")

        return 0;

        else 

		return $rs->sum_total_sale;

	}



    

      public function sumofitems($field,$date_to,$date_from,$table,$table2,$product_id) {

      $sql = "SELECT Sum($field) AS sum_total_items from " . $table . " as si INNER JOIN " . $table2 . " as sid ON si.id = sid.invoice_id WHERE si.date between '$date_to' AND '$date_from' AND sid.item_code = $product_id";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		if($rs->sum_total_items=="")

        return 0;

        else 

		return $rs->sum_total_items;

	}



      public function sumofclients($field,$date_to,$date_from,$table,$client_id) {

      $sql = " SELECT Sum($field) AS sum_total_client from " . $table . " where date between '$date_to' AND '$date_from' AND clien_id = $client_id";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

		if($rs->sum_total_client=="")

        return 0;

        else 

		return $rs->sum_total_client;

	}





    public function DailyCash( $date ) {

        $sql = " SELECT Sum(amount_paid) AS total_cash from " . SALES_INV . " where date Like '". $date ."%'";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

        if($rs->total_cash=="")

        return 0;

        else 

		return $rs->total_cash;

	}

	 public function DailyExpense( $date ) {

        $sql = " SELECT Sum(total) AS total_expense from " . expense_head . " where date Like '". $date ."%'";

		$result = mysqli_query( $this->link, $sql );

		$rs = mysqli_fetch_object( $result );

        if($rs->total_expense=="")

        return 0;

        else 

		return $rs->total_expense;

	}

}

?>