<?php
    require_once('../admin_includes/config.php');
    require_once('../admin_includes/common_functions.php');
    
if($_SERVER['REQUEST_METHOD']=='POST'){

    if (isset($_REQUEST['user_name']) && !empty($_REQUEST['user_name']) && !empty($_REQUEST['password']) && isset($_REQUEST['password']) )  {

            $user_name= $_REQUEST['user_name'];
            $password = $_REQUEST['password'];           
            $sql = "SELECT * FROM tabs_registration WHERE tab_user_name = '$user_name' AND tab_password = '$password' AND status=0 "; 
            $result = $conn->query($sql);   

            if($result->num_rows > 0) {

                $row = $result->fetch_assoc();                               

                if($row["login_flag"] == 1) { 
                 //status - 0(active) 1- inactive
                  

                   $response["tab_id"] = $row["id"];
                   $response["tab_ref_name"] = $row["tab_ref_name"];
                   $response["category"] = $row["category_name"];
                   $response["supervisor_name"] = $row["supervisor_name"];                
                   $response["client_id"] = $row["created_client_admin_id"];
                   $response["email"] = $row["tab_email"];  
                   $response["success"] = 0;
                   $response["message"] = "Success.";

                   $uid = $row["id"];
                   $ups= "UPDATE tabs_registration SET login_flag = '0' WHERE id = '$uid' ";
                   $re = $conn->query($ups);

                } else { 

                  $response["success"] = 5;
                  $response["message"] = "Already User Logged in Another Device.";                   
                }

               
            } else {
                $response["success"] = 1;
                $response["message"] = "Invalid Credentials.";
            }            

    }  else {
        $response["success"] = 3;
        $response["message"] = "Required field(s) is missing";

    } 
    
} else {
    $response["success"] = 4;
    $response["message"] = "Invalid request";

}

echo json_encode($response);

?>