<?php
include_once('../admin_includes/config.php');
include_once('../admin_includes/common_functions.php');
if(isset($_POST['tab_email'])) {
	$email=$_POST['tab_email'];
	$checkdata=" SELECT tab_email FROM tabs_registration WHERE tab_email='$email' ";
	$query=$conn->query($checkdata);
	if($query->num_rows>0) {
	    echo "Email Already Exist";
	} else {
	}
exit();
}