<?php
error_reporting(0);
include_once('../admin_includes/config.php');
include_once('../admin_includes/common_functions.php');
//session_start();

if($_SERVER["REQUEST_METHOD"]=="POST") {

	$supervisor_email = $_POST["supervisor_email"];
	$supervisor_mobile = $_POST["supervisor_mobile"];
	$sql = "SELECT * FROM supervisors_admin_users WHERE supervisor_email = '$supervisor_email' AND supervisor_mobile = '$supervisor_mobile' ";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	if($row) {
	    $_SESSION['supervisor_admin_user_id'] = $row['id'];
	    $_SESSION['supervisor_admin_user_name'] = $row['supervisor_name'];
	    $_SESSION['supervisor_admin_user_flag'] = 0;
	    //Assign the current timestamp as the user's
		//latest activity
		$_SESSION['last_action'] = time();
	    if(isset($_SESSION["supervisor_admin_user_name"])) {
		    echo "<script type='text/javascript'>window.location='dashboard.php'</script>";
		}
	} else {
	    //echo "<script language=javascript>alert('Entered Username or Password is incorrect!')</script>";
	    echo "<script type='text/javascript'>window.location='index.php?error=fail'</script>";
	}
} else {
	//echo "<script language=javascript>alert('Invalid Request!')</script>";
    echo "<script type='text/javascript'>window.location='index.php?error=invalid'</script>";
}
?>
