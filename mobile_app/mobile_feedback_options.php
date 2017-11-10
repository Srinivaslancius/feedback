<?php
    error_reporting(0);
    require_once('../admin_includes/config.php');
    require_once('../admin_includes/common_functions.php');
    
$lists = array();
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if (isset($_REQUEST['supervisor_name']) && !empty($_REQUEST['supervisor_name']) && !empty($_REQUEST['category']) && !empty($_REQUEST['client_id']) && !empty($_REQUEST['feedback_status']) && !empty($_REQUEST['tab_id']))  {

        if($_REQUEST['feedback_status'] == "Good") {
            //First option good then no options just SAVE DATA
            $tab_id = $_REQUEST['tab_id'];
            //$category = $_REQUEST['category'];
            $feedback_status = $_REQUEST['feedback_status'];
            $created_at = date("Y-m-d h:i:s");
            $client_id= $_REQUEST['client_id'];
            $supervisor_name= $_REQUEST['supervisor_name'];
            $sqlIns = "INSERT INTO tab_mobile_feedbacks (tab_id,feedback_status,created_at,client_admin_id,supervisor_admin_id) VALUES ('$tab_id','$feedback_status','$created_at','$client_id','$supervisor_name')"; 
          
            if ($conn->query($sqlIns) === TRUE) {
                $response["success"] = 0;
                $response["message"] = "Thank you for your valuable feedback."; 
                
            } else {
                // fail query insert problem
                $response["success"] = 2;
                $response["message"] = "Oops! An error occurred.";           
            
          }
        
            
        } else {                

            $category_name = $_REQUEST['category'];               
            $clientId =  $_REQUEST['client_id'];

            $getOptions = "SELECT * FROM client_selected_feedback_options WHERE client_user_id='$clientId' AND category_id='$category_name' ";
            $result1 = $conn->query($getOptions);
            $row = $result1->fetch_assoc();
            $response["lists"] = array();
            $feedBackOptList = array();
            $feedBackOptList = explode(",",$row["feedback_options"]);
            for($i=0; $i<count($feedBackOptList); $i++) {
                $lists = array();
                $lists["id"] = $row["id"];
                $lists["category_id"] = $row["category_id"];
                $feedback_name = $feedBackOptList[$i];
                $lists["feedback_option"] = $feedback_name;
                $feedBackOptImgQuery = "SELECT * FROM feedback_options WHERE feedback_option= '$feedback_name'";
                $getImg = $conn->query($feedBackOptImgQuery);
                $imageResult = $getImg ->fetch_assoc(); 
                $lists["image"] = $base_url."uploads/feedback_images/".$imageResult["feedback_option_image"];   
                array_push($response["lists"], $lists);   
            }
            $response["success"] = 0;
            $response["message"] = "Success";
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