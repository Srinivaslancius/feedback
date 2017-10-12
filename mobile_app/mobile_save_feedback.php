<?php
    error_reporting(1);
    require_once('../admin_includes/config.php');
    require_once('../admin_includes/common_functions.php');
    
$lists = array();
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if (isset($_REQUEST['supervisor_name']) && !empty($_REQUEST['supervisor_name']) && !empty($_REQUEST['category']) && !empty($_REQUEST['client_id']) && !empty($_REQUEST['feedback_status']) && !empty($_REQUEST['tab_id']) && !empty($_REQUEST['feedback_option']))  {

            $tab_id = $_REQUEST['tab_id'];
            $category = $_REQUEST['category'];
            $feedback_status = $_REQUEST['feedback_status'];
            $created_at = date("Y-m-d h:i:s");
            $client_id= $_REQUEST['client_id'];
            $supervisor_name= $_REQUEST['supervisor_name'];
            $feedback_option= $_REQUEST['feedback_option'];    

            //Check poor status 5 times a day
            if($_REQUEST['feedback_status'] == "Poor") {
                
                $getCntStatus = "SELECT COUNT(feedback_status) AS totalCnt FROM save_poor_notifications_view_count WHERE  MONTH(created_date) = MONTH(CURDATE()) AND YEAR(created_date) = YEAR(CURDATE()) AND feedback_status= '$feedback_status' ";
                $res = $conn->query($getCntStatus);
                $cntTotal = $res->fetch_assoc();
                $getTotalCnt = $cntTotal['totalCnt'];
                if($getTotalCnt == 5) {

                    $delPoorFeedback = "DELETE FROM save_poor_notifications_view_count ";
                    $conn->query($delPoorFeedback);

                    $savePoorSucFeedback = "INSERT INTO save_poor_notifications_view (tab_id,feedback_status,created_date) VALUES ('$tab_id','$feedback_status','$created_at') ";
                    $conn->query($savePoorSucFeedback);
                    //Send email
                    $to      = 'phanendrakumar@lanciussolutions.com';
                    $subject = 'Feedback Status For Poor ';
                    $message = 'Hi , <br /> Poor feedback status 5 times submitted today';
                    $headers = 'From: srinivas@lanciussolutions.com' . "\r\n" .
                        'Reply-To: srinivas@lanciussolutions.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                    mail($to, $subject, $message, $headers);
                    
                } else {

                    $savePoorFeedback = "INSERT INTO save_poor_notifications_view_count (tab_id,feedback_status,created_date) VALUES ('$tab_id','$feedback_status','$created_at') ";
                    $conn->query($savePoorFeedback);
                }

            }
            //End 

            $sqlIns = "INSERT INTO tab_mobile_feedbacks (tab_id,feedback_status,category,created_at,client_admin_id,supervisor_admin_id,feedback_option) VALUES ('$tab_id','$feedback_status','$category','$created_at','$client_id','$supervisor_name','$feedback_option')";  
                  
            if ($conn->query($sqlIns) === TRUE) {
                $response["success"] = 0;
                $response["message"] = "Thanks for your feeback"; 

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