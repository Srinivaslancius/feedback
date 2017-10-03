<?php include_once 'admin_includes/main_header.php'; ?>
<style type="text/css">
.nopad {
  padding-left: 0 !important;
  padding-right: 0 !important;
}
/*image gallery*/
.image-checkbox {
  cursor: pointer;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  border: 4px solid transparent;
  margin-bottom: 0;
  outline: 0;
}
.image-checkbox input[type="checkbox"] {
  display: none;
}

.image-checkbox-checked {
  border-color: #4783B0;
}
.image-checkbox .fa {
  position: absolute;
  color: #4A79A3;
  background-color: #fff;
  padding: 10px;
  top: 0;
  right: 0;
}
.image-checkbox-checked .fa {
  display: block !important;
}
</style>

<?php  if (!isset($_POST['submit']))  {
          //If fail
          echo "fail";
        } else  {
            //If success
            $category_id = $_POST['category_id'];
            $sub_category_name = $_POST['sub_category_name'];
            $fileToUpload = $_FILES["fileToUpload"]["name"];
            $status = $_POST['status'];
            $feedbackOpt = implode(',',$_POST['feedback_options']);
            
            if($fileToUpload!='') {

                $target_dir = "../uploads/sub_category_images/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $sql = "INSERT INTO `sub_categories` (`category_id`, `sub_category_name`,`sub_category_image`, `status`,`subcat_feedback_options`) VALUES ('$category_id','$sub_category_name', '$fileToUpload','$status','$feedbackOpt')";
                    if($conn->query($sql) === TRUE){
                       echo "<script type='text/javascript'>window.location='sub_categories.php?msg=success'</script>";
                    } else {
                       echo "<script type='text/javascript'>window.location='sub_categories.php?msg=fail'</script>";
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
            <h3 class="m-y-0"> Sub Categories</h3>
          </div>
          <div class="panel-body">            
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="post" enctype="multipart/form-data">
                  <?php $getCategories = getDataFromTables('categories','0',$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Category</label>
                    <select id="form-control-3" name="category_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Category</option>
                      <?php while($row = $getCategories->fetch_assoc()) {  ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Sub Category Name</label>
                    <input type="text" class="form-control" id="form-control-2" name="sub_category_name" placeholder="Sub Category Name" data-error="Please enter Category Name." required>
                    <div class="help-block with-errors"></div>
                  </div>
				          <div class="form-group">
                    <label for="form-control-4" class="control-label">Sub Category Image</label>
                    <img id="output" height="100" width="100"/>
                    <label class="btn btn-default file-upload-btn">
						          Choose file...
                        <input id="form-control-22" class="file-upload-input" type="file" accept="image/*" name="fileToUpload" id="fileToUpload"  onchange="loadFile(event)"  multiple="multiple" required >
                      </label>
                  </div>
                  <?php $getfeedbackOpt = getDataFromTables('feedback_options','0',$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Feedback Options : </label><br />
                   
                    <!-- <?php while ($row = $getfeedbackOpt->fetch_assoc()) { ?>
                    <input type="checkbox" value="<?php echo $row['id']; ?>" name="feedback_options[]"> <?php echo $row['feedback_option']; ?> &nbsp;&nbsp;
                    <?php } ?> -->

                    <div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
                      <label class="image-checkbox">
                        <img class="img-responsive" src="https://dummyimage.com/600x400/000/fff" />
                        <input type="checkbox" name="feedback_options[]" value="<?php echo $row['id']; ?>" />
                        <i class="fa fa-check hidden"></i>
                      </label>
                    </div>

                  </div>
                  <div class="clearfix"></div>
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

                  <button type="submit" name="submit" value="Submit"  class="btn btn-primary btn-block">Submit</button>
                </form>
              </div>
            </div>
            <hr>
          </div>
        </div>
      </div>
      <?php include_once 'admin_includes/footer.php'; ?>
      <script src="js/tables-datatables.min.js"></script>
      <script type="text/javascript">
      // image gallery
      // init the state from the input
      $(".image-checkbox").each(function () {
        if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
          $(this).addClass('image-checkbox-checked');
        }
        else {
          $(this).removeClass('image-checkbox-checked');
        }
      });

      // sync the state to the input
      $(".image-checkbox").on("click", function (e) {
        $(this).toggleClass('image-checkbox-checked');
        var $checkbox = $(this).find('input[type="checkbox"]');
        $checkbox.prop("checked",!$checkbox.prop("checked"))

        e.preventDefault();
      });
      </script>

      
       

      
      

      






