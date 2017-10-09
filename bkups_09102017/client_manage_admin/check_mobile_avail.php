<?php
include_once('../admin_includes/config.php');
include_once('../admin_includes/common_functions.php');
if(isset($_POST['supervisor_mobile'])) {
	$mobile=$_POST['supervisor_mobile'];
	$checkdata=" SELECT supervisor_mobile FROM supervisors_admin_users WHERE supervisor_mobile='$mobile' ";
	$query=$conn->query($checkdata);
	if($query->num_rows>0) {
	    echo "Mobile Number Already Exist";
	} else {
	}
exit();
}