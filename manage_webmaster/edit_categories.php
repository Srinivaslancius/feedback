<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
$id = $_GET['bid'];
if (!isset($_POST['submit'])) {
      //If fail
        echo "fail";
    } else {
    //If success            
    $category_name = $_POST['category_name'];
    $category_feedback_options = implode(',', $_POST['category_feedback_options']);
    $status = $_POST['status'];
        $sql = "UPDATE `categories` SET category_name = '$category_name', category_feedback_options = '$category_feedback_options', status='$status' WHERE id = '$id' ";
        if($conn->query($sql) === TRUE){
           echo "<script type='text/javascript'>window.location='categories.php?msg=success'</script>";
        } else {
           echo "<script type='text/javascript'>window.location='categories.php?msg=fail'</script>";
        }
    }   
?>
      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Categories</h3>
          </div>
          <div class="panel-body">            
            <div class="row">
              <?php $getContents = getDataFromTables('categories',$status=NULL,'id',$id,$activeStatus=NULL,$activeTop=NULL);
              $getContents1 = $getContents->fetch_assoc(); ?>   
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Category Name</label>
                    <input type="text" class="form-control" id="form-control-2" name="category_name" required value="<?php echo $getContents1['category_name'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  
                  <?php  $getfeedbackOpt = getDataFromTables('feedback_options','0',$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                  <label for="form-control-2" class="control-label">Feedback Options : </label><br />
                  <?php  while ($row = $getfeedbackOpt->fetch_assoc()) { 
                      $checked = '';                          
                      $explodeCheckListOpt=explode(',',$getContents1['category_feedback_options']);
                    if (in_array($row['feedback_option'], $explodeCheckListOpt)) $checked = " checked"; 
                  ?>
                  <?php $image=$row ['feedback_option_image']; ?>
                  <input type="checkbox" value="<?php echo $row['feedback_option']; ?>" class="check-with-label" name="category_feedback_options[]" <?php echo $checked; ?>>
                  <label for="img<?php echo $row['id']; ?>">
                    <img class="img" src="../uploads/feedback_images/<?php echo $image; ?>" width="150px" height="150px"/>
                  </label>
                  <?php  } ?>
                  </div>

                  <?php $getStatus = getDataFromTables('user_status',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your status</label>
                    <select id="form-control-3" name="status" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Status</option>
                      <?php while($row = $getStatus->fetch_assoc()) {  ?>
                          <option <?php if($row['id'] == $getContents1['status']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></option>
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
<!-- <script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script> -->
<script src="//cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' ); 
</script>
<style type="text/css">
    .cke_top, .cke_contents, .cke_bottom {
        border: 1px solid #333;
    }
</style>