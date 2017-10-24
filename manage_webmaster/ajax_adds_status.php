<?php
include "../admin_includes/config.php";
if(!empty($_POST['check_adds_id']) && !empty($_POST['check_adds_id']))  {
	//echo "<pre>"; print_r($_POST); die;
	$check_adds_id = $_POST['check_adds_id'];
	$table_name = $_POST['table_name'];
	$send_status = $_POST['send_status'];
	$sql="UPDATE $table_name SET client_ads_status = '$send_status' WHERE id='$check_adds_id' ";
	if($conn->query($sql) === TRUE){
		$succ = "1";
	} else {
		$succ = "0";
	}
	echo $succ;
}
?>