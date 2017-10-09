<?php include_once 'admin_includes/main_header.php'; ?>
<?php
 $getBannersData = getDataFromTables('tabs_registration',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);
$id = $_GET['uid'];
$qry = "DELETE FROM tabs_registration WHERE id ='$id'";
$result = $conn->query($qry);
if(isset($result)) {
   echo "<script>alert('Tabs Registration Deleted Successfully');window.location.href='tabs_registration.php';</script>";
} else {
   echo "<script>alert('Tabs Registration Not Deleted');window.location.href='tabs_registration.php';</script>";
}
?>