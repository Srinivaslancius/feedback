<?php
    error_reporting(0);
    require_once('../admin_includes/config.php');
    require_once('../admin_includes/common_functions.php');
    
$lists = array();
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if (isset($_REQUEST['category']) && !empty($_REQUEST['category']) )  {         

            $category_name = $_REQUEST['category'];
            $getCkId = getDataFromTables('categories',$status=NULL,'category_name',$category_name,$activeStatus=NULL,$activeTop=NULL); 
            $ckId = $getCkId->fetch_assoc();
            $catId = $ckId['id'];

            $getOptions = "SELECT * FROM assign_check_list WHERE category_id='$catId'";
            $result1 = $conn->query($getOptions);
            $row = $result1->fetch_assoc();            
            $response["lists"] = array();            
            $expCheckOp = explode(",",$row["checklist_id"]);
            for($i=0; $i<count($expCheckOp); $i++) {
                $lists["id"] = $row["id"];
                $lists["category_id"] = $row["category_id"];
                $ck_id = $expCheckOp[$i];   
                $getCkList = getDataFromTables('check_list',$status=NULL,'id',$ck_id,$activeStatus=NULL,$activeTop=NULL); $getck = $getCkList->fetch_assoc();
                $lists["checklist_option"] = $getck['check_list_name'];
                array_push($response["lists"], $lists);
            }           
            $response["success"] = 0;
            $response["message"] = "Success";         

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