<?php include_once 'admin_includes/main_header.php'; ?>
<?php
$id = $_GET['bid'];
 if (!isset($_POST['submit']))  {
            echo "fail";
    } else  {
            $feedbackoption = $_POST['feedback_option'];
            $status = $_POST['status'];
            if($_FILES["feedback_option_image"]["name"]!='') {
              $feedback_option_image = $_FILES["feedback_option_image"]["name"];
              $target_dir = "../uploads/feedback_images/";
              $target_file = $target_dir . basename($_FILES["feedback_option_image"]["name"]);
              $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
              $getImgUnlink = getImageUnlink('feedback_option_image','feedback_options','id',$id,$target_dir);
                //Send parameters for img val,tablename,clause,id,imgpath for image ubnlink from folder
              if (move_uploaded_file($_FILES["feedback_option_image"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE `feedback_options` SET feedback_option = '$feedbackoption', feedback_option_image = '$feedback_option_image', status='$status' WHERE id = '$id' ";
                    if($conn->query($sql) === TRUE){
                       echo "<script type='text/javascript'>window.location='feedback_options.php?msg=success'</script>";
                    } else {
                       echo "<script type='text/javascript'>window.location='feedback_options.php?msg=fail'</script>";
                    }
                    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }  else {
                $sql = "UPDATE `feedback_options` SET feedback_option = '$feedbackoption', status='$status' WHERE id = '$id' ";
                if($conn->query($sql) === TRUE){
                   echo "<script type='text/javascript'>window.location='feedback_options.php?msg=success'</script>";
                } else {
                   echo "<script type='text/javascript'>window.location='feedback_options.php?msg=fail'</script>";
                }
            }
          }
?>
<div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Feedback Options</h3>
          </div>
          <div class="panel-body">            
            <div class="row">
              <?php $getContents = getDataFromTables('feedback_options',$status=NULL,'id',$id,$activeStatus=NULL,$activeTop=NULL);
              $getContents1 = $getContents->fetch_assoc(); ?>   
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Feedback Options</label>
                    <input type="text" name="feedback_option" class="form-control" id="form-control-2" data-error="Please enter Feedback Option" required value="<?php echo $getContents1['feedback_option'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-4" class="control-label">Feedback Image</label>
                    <img src="<?php echo $base_url . 'uploads/feedback_images/'.$getContents['feedback_option_image'] ?>"  id="output" height="100" width="100"/>
                    <label class="btn btn-default file-upload-btn">
                        Choose file...
                        <input id="form-control-22" class="file-upload-input" type="file" accept="image/*" name="fileToUpload" id="fileToUpload"  onchange="loadFile(event)"  multiple="multiple" >
                      </label>
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