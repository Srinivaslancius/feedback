<?php
include_once('../admin_includes/config.php');
include_once('../admin_includes/common_functions.php');
if(isset($_POST['supervisor_name'])) {
	$email=$_POST['supervisor_name'];
	$checkdata=" SELECT supervisor_name FROM supervisors_admin_users WHERE supervisor_name='$email' ";
	$query=$conn->query($checkdata);
	if($query->num_rows>0) {
	    echo "User Already Exist";
	} else {
	}
exit();
}