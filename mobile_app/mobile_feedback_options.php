<?php
    error_reporting(0);
    require_once('../admin_includes/config.php');
    require_once('../admin_includes/common_functions.php');
    
$lists = array();
$response = array();

//if($_SERVER['REQUEST_METHOD']=='POST'){
    
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
            $response["message"] = "Thanks for your feedback."; 
            }
            
            else {
            // fail query insert problem
            $response["success"] = 2;
            $response["message"] = "Oops! An error occurred.";           
            
          }
        
            
        } else {
            //Else 
            $user_name = $_REQUEST['user_name'];
            $category_name = $_REQUEST['category'];               
            $clientId =  $_REQUEST['client_id'];

            $getFeedbackOptions = getAllDataWithActiveRecent('feedback_options');
            $response["lists"] = array();
            while($row = $getFeedbackOptions->fetch_assoc()) {
                $lists = array();
                $lists["id"] = $row["id"];
                $lists["feedback_option"] = $row["feedback_option"];  
                $lists["image"] = $base_url."uploads/feedback_images/".$row["feedback_option_image"];  
                array_push($response["lists"], $lists);      
            }            

            //Get Feed back options
            /*$getOptions = "SELECT * FROM client_selected_feedback_options WHERE client_user_id='$clientId' AND category_id='$category_name' ";
            $result1 = $conn->query($getOptions);
            $response["lists"] = array();
            $row = $result1->fetch_assoc();
            $lists["category"] = $row["category_id"];
            //$lists["feedback_options"] = $row["feedback_options"];
            $imgExp = array();
            $imgExp = explode(",",$row["feedback_options"]);
            $productsCount = count($imgExp);
            $getImg = array();*/       
              
            /*while($row = $result1->fetch_assoc()) {   
                $lists["id"] = $row["id"];
                $lists["category"] = $row["category_id"];  
                $lists["feedback_options"] = $row["feedback_options"];
                $imgExp = array();
                $imgExp = explode(",",$row["feedback_options"]);
                //print_r($imgExp); die;
                $productsCount = count($imgExp);
                $getImgDet = array();               
                for($i=0;$i<$productsCount;$i++) {
                    $fedOpt =  $imgExp[$i];
                    $getImgDetails = getAllDataWhere('feedback_options','feedback_option',$fedOpt);
                    while($getImg = $getImgDetails->fetch_assoc()) {
                        $lists["image"] .= $base_url."uploads/feedback_images/".$getImg['feedback_option_image'].",";;
                    }
                    
                }                
                array_push($response["lists"], $lists);      
            }*/
            //array_push($response["lists"], $lists);
            $response["success"] = 0;
            $response["message"] = "Success"; 

        }
         

    } else {
        $response["success"] = 3;
        $response["message"] = "Required field(s) is missing";

    }        

/*} else {
    $response["success"] = 4;
    $response["message"] = "Invalid request";
}*/

echo json_encode($response);

?>