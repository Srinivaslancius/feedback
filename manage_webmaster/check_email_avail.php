<?php
include_once('../admin_includes/config.php');
include_once('../admin_includes/common_functions.php');
if(isset($_POST['admin_email'])) {
	$email=$_POST['admin_email'];
	$checkdata=" SELECT admin_email FROM admin_users WHERE admin_email='$email' ";
	$query=$conn->query($checkdata);
	if($query->num_rows>0) {
	    echo "Email Already Exist";
	} else {
	}
exit();
}