<?php
include_once('../admin_includes/config.php');
include_once('../admin_includes/common_functions.php');
if(isset($_POST['client_email'])) {
	$email=$_POST['client_email'];
	$checkdata=" SELECT client_email FROM client_admin_users WHERE client_email='$email' ";
	$query=$conn->query($checkdata);
	if($query->num_rows>0) {
	    echo "Email Already Exist";
	} else {
	}
exit();
}