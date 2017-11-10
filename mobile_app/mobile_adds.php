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
		$getQry  = "SELECT * FROM client_advertisements WHERE tab_id = '$tab_id' AND client_admin_id = '$client_admin_id' AND status=0";
		$result = $conn->query($getQry);
		if ($result->num_rows > 0) {
			$response["lists"] = array();
			while($row = $result->fetch_assoc()) {
				//Chedck the condioton for emptty or not		
				$lists = array();
		    	$lists["id"] = $row["id"];
		    	$lists["title"] = $row["title"];		    	
		    	$lists["image"] = $base_url."uploads/advertisement_images/".$row["image"];
				array_push($response["lists"], $lists);		 
			}
			$response["success"] = 0;
			$response["message"] = "Success";				
		} else {
	    	$response["success"] = 1;
	    	$response["message"] = "No Records found";	   
		}
	} else {
		$response["success"] = 3;
		$response["message"] = "Invalid request";
	}
}
echo json_encode($response);
?>