<?php include_once 'admin_includes/main_header.php'; ?>
<?php
$id = $_GET['lid'];
$qry = "DELETE FROM lkp_locations WHERE id ='$id'";
$result = $conn->query($qry);
if(isset($result)) {
   echo "<script>alert('Location Deleted Successfully');window.location.href='lkp_locations.php';</script>";
} else {
   echo "<script>alert('Location Not Deleted');window.location.href='lkp_locations.php';</script>";
}
?>