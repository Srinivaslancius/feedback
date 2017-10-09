<?php
error_reporting(0);
include_once('../admin_includes/config.php');
include_once('../admin_includes/common_functions.php');
//session_start();

if($_SERVER["REQUEST_METHOD"]=="POST") {

	$client_admin_email = $_POST["client_admin_email"];
	$client_admin_mobile = $_POST["client_admin_mobile"];		
	$sql = "SELECT * FROM client_admin_users WHERE client_email = '$client_admin_email' AND client_mobile = '$client_admin_mobile' AND status=0";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	if($row) {
	    $_SESSION['admin_user_id'] = $row['id'];
	    $_SESSION['admin_user_name'] = $row['client_name'];
	    $_SESSION['admin_user_flag'] = 1;
	    //Assign the current timestamp as the user's
		//latest activity
		$_SESSION['last_action'] = time();
	    if(isset($_SESSION["admin_user_name"])) {
		    echo "<script type='text/javascript'>window.location='client_admin_dashboard.php'</script>";
		}
	} else {
	    //echo "<script language=javascript>alert('Entered Username or Password is incorrect!')</script>";
	    echo "<script type='text/javascript'>window.location='client_admin_login.php?error=fail'</script>";
	}
} else {
	//echo "<script language=javascript>alert('Invalid Request!')</script>";
    echo "<script type='text/javascript'>window.location='client_admin_login.php?error=invalid'</script>";
}
?>
