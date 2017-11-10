<?php
    require_once('../admin_includes/config.php');
    require_once('../admin_includes/common_functions.php');
    
if($_SERVER['REQUEST_METHOD']=='POST'){

    if (isset($_REQUEST['user_name']) && !empty($_REQUEST['user_name']) && !empty($_REQUEST['password']) && isset($_REQUEST['password']) && isset($_REQUEST['status']) && isset($_REQUEST['tab_id']) )  {

            $user_name= $_REQUEST['user_name'];
            $password = $_REQUEST['password'];  
            $status= $_REQUEST['status'];  
$tab_id= $_REQUEST['tab_id']; 
       
            $sql = "SELECT * FROM tabs_registration WHERE tab_user_name = '$user_name' AND tab_password = '$password' AND id='$tab_id' AND status=0 "; 
            $result = $conn->query($sql);   

            if($result->num_rows > 0) {

                $row = $result->fetch_assoc();                               

                
                 //status - 0(active) 1- inactive
                   
                   $ups= "UPDATE tabs_registration SET login_flag = '1' WHERE tab_user_name = '$user_name' AND tab_password = '$password' AND id='$tab_id' ";
                   $re = $conn->query($ups);
                    
                   $response["success"] = 0;
                   $response["message"] = "Success.";

                

               
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