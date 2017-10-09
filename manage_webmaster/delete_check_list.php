<?php include_once 'admin_includes/main_header.php'; ?>
<?php
 $getBannersData = getDataFromTables('check_list',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);
$id = $_GET['uid'];
$qry = "DELETE FROM check_list WHERE id ='$id'";
$result = $conn->query($qry);
if(isset($result)) {
   echo "<script>alert('Check List Deleted Successfully');window.location.href='check_list.php';</script>";
} else {
   echo "<script>alert('Check List Not Deleted');window.location.href='check_list.php';</script>";
}
?>