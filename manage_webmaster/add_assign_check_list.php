<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
if (!isset($_POST['submit']))  {
  //If fail
  echo "fail";
}else  {
  //If success
  $category_id = $_POST['category_id'];
  $checklist_id = $_POST['checklist_id'];
  $status = $_POST['status'];
  
  $sql = "INSERT INTO assign_check_list (`category_id`,  `checklist_id`,`status`) VALUES ('$category_id', '$checklist_id','$status')";
  if($conn->query($sql) === TRUE){
    echo "<script type='text/javascript'>window.location='assign_check_list.php?msg=success'</script>";
  }else {
    echo "<script type='text/javascript'>window.location='assign_check_list.php?msg=fail'</script>";
  }
}
?>
      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Assign Check List</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Category Id</label>
                    <input type="text" class="form-control" id="form-control-2" name="category_id" placeholder="Category Id" data-error="Please enter Category Id." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Checklist Id</label>
                    <input type="text" class="form-control" id="form-control-2" name="checklist_id" placeholder="Category Id" data-error="Please enter Checklist Id." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <?php $getStatus = getDataFromTables('user_status',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your status</label>
                    <select id="form-control-3" name="status" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Status</option>
                      <?php while($row = $getStatus->fetch_assoc()) {  ?>
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>
                
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
              </div>
            </div>
            <hr>
          </div>
        </div>
      </div>
  
<?php include_once 'admin_includes/footer.php'; ?>
<!-- Below script for ck editor -->
<script src="//cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' ); 
</script>
<style type="text/css">
    .cke_top, .cke_contents, .cke_bottom {
        border: 1px solid #333;
    }
</style>