<?php
include_once('../admin_includes/config.php');
include_once('../admin_includes/common_functions.php');
if(!empty($_POST["client_email"]) && !empty($_POST["client_mobile"]) ) {

	$client_email =$_POST['client_email'];
	$client_mobile = $_POST['client_mobile'];
	$client_new_password = $_POST['client_new_password'];
	$sql = "SELECT client_email , client_mobile FROM client_admin_users WHERE  client_email = '$client_email' AND client_mobile = '$client_mobile' ";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		//Update query write here
		$update =" UPDATE client_admin_users SET client_mobile ='$client_new_password' WHERE client_email = '$client_email' AND client_mobile  = '$client_mobile' ";
		if ($conn->query($update) === TRUE) {
    	echo "Record updated successfully";
		} else {
    	echo "Error updating record:";
		}
		//echo "Your new password updated successfully!";
	} else {
		echo "Please enter valid email and pwd!";
	}
	exit();
}	