<?php include_once 'admin_includes/main_header.php'; ?>
<?php
 /*$getBannersData = getDataFromTables('supervisors_admin_users',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);*/
$id = $_GET['uid'];
$qry = "DELETE FROM supervisors_admin_users WHERE id ='$id'";
$result = $conn->query($qry);
if(isset($result)) {
   echo "<script>alert('Supervisor Admin Deleted Successfully');window.location.href='users.php';</script>";
} else {
   echo "<script>alert('Supervisor Admin Not Deleted');window.location.href='users.php';</script>";
}
?>