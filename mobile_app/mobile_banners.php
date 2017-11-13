<?php 

require_once('../admin_includes/config.php');
require_once('../admin_includes/common_functions.php');

//Set Array for list
$lists = array();
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){

	if (isset($_REQUEST['tab_id']) && !empty($_REQUEST['tab_id']) && isset($_REQUEST['client_admin_id']) && !empty($_REQUEST['client_admin_id']) )  {

		$tab_id= $_REQUEST['tab_id'];
		$client_admin_id= $_REQUEST['client_admin_id'];

		$getRows = "SELECT * FROM client_admin_users WHERE id= '$client_admin_id' AND client_ads_status= 0 ";
		$cnus = $conn->query($getRows);
		$cntNums = $cnus->num_rows;

		if($cntNums!=0) {

			$getQry  = "SELECT * FROM client_advertisements WHERE tab_id = '$tab_id' AND client_admin_id = '$client_admin_id' AND status=0";
			$result = $conn->query($getQry);
			$getbancnt = $result->num_rows;
			if($getbancnt!=0) {
				$response["lists"] = array();
				while($row = $result->fetch_assoc()) {
				$lists = array();
		    	$lists["id"] = $row["id"];
		    	$lists["title"] = $row["title"];		    	
		    	$lists["image"] = $base_url."uploads/advertisement_images/".$row["image"];
		    	$response["success"] = 0;
				$response["message"] = "Success";
				array_push($response["lists"], $lists);	
				}
			} else {
				$response["success"] = 5;
				$response["message"] = "No Ads Found";

			}
			

		} else {
			$response["success"] = 4;
			$response["message"] = "No Ads Found";
		}		
		
	} else {
		$response["success"] = 3;
		$response["message"] = "Required Fields Missing";
	}
} else {
		$response["success"] = 2;
		$response["message"] = "Invalid Request";
}
echo json_encode($response);
?>