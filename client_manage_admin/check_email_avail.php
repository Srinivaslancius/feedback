<?php
include_once('../admin_includes/config.php');
include_once('../admin_includes/common_functions.php');
if(isset($_POST['supervisor_email'])) {
	$email=$_POST['supervisor_email'];
	$checkdata=" SELECT supervisor_email FROM supervisors_admin_users WHERE supervisor_email='$email' ";
	$query=$conn->query($checkdata);
	if($query->num_rows>0) {
	    echo "Email Already Exist";
	} else {
	}
exit();
}