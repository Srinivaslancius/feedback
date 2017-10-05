<?php
include_once('admin_includes/config.php');
include_once('admin_includes/common_functions.php');
if(!empty($_POST["client_email"]) && !empty($_POST["client_mobile"]) ) {

	$mail =$_POST['client_email'];
	$mobile = $_POST['client_mobile'];
	$password = $_POST['client_password'];
	$sql = "SELECT client_email , client_mobile FROM client_admin_users WHERE  client_email = '".$mail."' AND client_mobile = '".$mobile."'";
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