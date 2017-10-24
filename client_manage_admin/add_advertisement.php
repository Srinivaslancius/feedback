<?php include_once 'admin_includes/main_header.php'; ?>

<?php  if (!isset($_POST['submit']))  {
          //If fail
          echo "fail";
        } else  {
            //If success
            $tab_id = $_POST['tab_id'];
            $title = $_POST['title'];
            $image = $_FILES["image"]["name"];
            $status = $_POST['status'];
            $created_client_admin_id = $_SESSION['client_admin_user_id'];
            $created_at = date("Y-m-d h:i:s");
            
            if($image!='') {

                $target_dir = "../uploads/advertisement_images/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $sql = "INSERT INTO client_advertisements (`tab_id`,`title`, `image`, `status`,`client_admin_id`,`created_at`) VALUES ('$tab_id','$title', '$image','$status','$created_client_admin_id','$created_at')";
                    if($conn->query($sql) === TRUE){
                       echo "<script type='text/javascript'>window.location='advertisement.php?msg=success'</script>";
                    } else {
                       echo "<script type='text/javascript'>window.location='advertisement.php?msg=fail'</script>";
                    }
                    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }   
        }
?>
    <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Advertisements</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST" enctype="multipart/form-data">
                  <?php $id = $_SESSION['client_admin_user_id']; $getTabReference = getDataFromTables('tabs_registration',$status=NULL,'created_client_admin_id',$id,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Tab Reference</label>
                    <select id="form-control-3" name="tab_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Tab Reference</option>
                      <?php while($row = $getTabReference->fetch_assoc()) {  ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['tab_ref_name']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Advertisement Title</label>
                    <input type="text" name="title" class="form-control" id="form-control-2" placeholder="Add Title" data-error="Please enter Feedback Option" required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-4" class="control-label">Advertisement Title Image</label>
                    <img id="output" height="100" width="100"/>
                    <label class="btn btn-default file-upload-btn">
                      Choose file...
                        <input id="form-control-22" class="file-upload-input" type="file" accept="image/*" name="image" id="image"  onchange="loadFile(event)"  multiple="multiple" required >
                      </label>
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

      
       

      
      

      






