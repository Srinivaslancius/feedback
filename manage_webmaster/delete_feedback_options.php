<?php include_once 'admin_includes/main_header.php'; ?>
<?php
 $getBannersData = getDataFromTables('feedback_options',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);
$id = $_GET['bid'];
$qry = "DELETE FROM feedback_options WHERE id ='$id'";
$result = $conn->query($qry);
if(isset($result)) {
   echo "<script>alert('Feedback Options Deleted Successfully');window.location.href='feedback_options.php';</script>";
} else {
   echo "<script>alert('Feedback Options Not Deleted');window.location.href='feedback_options.php';</script>";
}
?>