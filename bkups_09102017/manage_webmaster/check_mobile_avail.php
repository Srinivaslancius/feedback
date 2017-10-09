<?php
include_once('../admin_includes/config.php');
include_once('../admin_includes/common_functions.php');
if(isset($_POST['client_mobile'])) {
	$mobile=$_POST['client_mobile'];
	$checkdata=" SELECT client_mobile FROM client_admin_users WHERE client_mobile='$mobile' ";
	$query=$conn->query($checkdata);
	if($query->num_rows>0) {
	    echo "Mobile Number Already Exist";
	} else {
	}
exit();
}