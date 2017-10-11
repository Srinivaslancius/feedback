<?php
    error_reporting(1);
    require_once('../admin_includes/config.php');
    require_once('../admin_includes/common_functions.php');
    
$lists = array();
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if (isset($_REQUEST['tab_id']) && !empty($_REQUEST['tab_id']) && !empty($_REQUEST['tab_ref_name']) && !empty($_REQUEST['tab_ref_name']) && !empty($_REQUEST['check_list_name']) && !empty($_REQUEST['emp_id']) && !empty($_REQUEST['emp_name']) && !empty($_REQUEST['category']) )  {

            $tab_id = $_REQUEST['tab_id'];
            $tab_ref_name = $_REQUEST['tab_ref_name'];
            $check_list_name = $_REQUEST['check_list_name'];
            $emp_id = $_REQUEST['emp_id'];
            $emp_name = $_REQUEST['emp_name'];
            $category = $_REQUEST['category'];
            $created_at = date("Y-m-d h:i:s");            

            $saveCheckList = "INSERT INTO save_check_list (tab_id,tab_ref_name,check_list_name,emp_id, emp_name,category,created_at) VALUES ('$tab_id','$tab_ref_name','$check_list_name','$emp_id','$emp_name','$category','$created_at') ";                   
                  
            if ($conn->query($saveCheckList) === TRUE) {
                $response["success"] = 0;
                $response["message"] = "Success"; 

            } else {
                // fail query insert problem
                $response["success"] = 2;
                $response["message"] = "Oops! An error occurred.";           
               
            }
         

    } else {
        $response["success"] = 3;
        $response["message"] = "Required field(s) is missing";

    }        

} else {
    $response["success"] = 4;
    $response["message"] = "Invalid request";
}

echo json_encode($response);

?>