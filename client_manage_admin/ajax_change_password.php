<?php
include_once('admin_includes/config.php');
include_once('admin_includes/common_functions.php');
if(!empty($_POST["client_email"]) && !empty($_POST["client_mobile"]) ) {

	$mail =$_POST['email'];
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];
	$sql = "SELECT client_email , client_mobile FROM client_admin_users WHERE  client_email = '$mail' AND client_mobile = '$mobile' ";
	$result = $conn->query($sql);
	if($result != "")
	{
		echo "success";
	}
	else
	{
		echo "failure";
	}
}	