<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
if (!isset($_POST['submit']))  {
  //If fail
  echo "fail";
}else  {
  //If success
  $category_id = $_POST['category_id'];
  $sub_category_name = $_POST['sub_category_name'];
  $status = $_POST['status'];
  $feedbackOpt = implode(',',$_POST['feedback_options']);
  
  $sql = "INSERT INTO `sub_categories` (`category_id`, `sub_category_name`, `status`,`subcat_feedback_options`) VALUES ('$category_id','$sub_category_name', '$status','$feedbackOpt')";
  if($conn->query($sql) === TRUE){
    echo "<script type='text/javascript'>window.location='sub_categories.php?msg=success'</script>";
  }else {
    echo "<script type='text/javascript'>window.location='sub_categories.php?msg=fail'</script>";
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
                 <?php $getfeedbackOpt = getDataFromTables('feedback_options','0',$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Feedback Options : </label><br />
                   
                  <ul>
                    <?php while ($row = $getfeedbackOpt->fetch_assoc()) { ?>
                    <?php $image=$row ['feedback_option_image']; ?>
                      <li>
                      <input type="checkbox" value="<?php echo $row['id']; ?>" id="<?php echo $row['id']; ?>" name="feedback_options[]"><?php echo $row['feedback_option']; ?>&nbsp;&nbsp;
                      <?php echo '<label for="cb1"><img src="../uploads/feedback_images/'.$image.'" width="50px" height="50px"></label>';?>
                      </li>
                      <?php } ?>
                   </ul>
                   

                    <style>
                      ul {
                        list-style-type: none;
                      }

                      li {
                        display: inline-block;
                      }

                      input[type="checkbox"][id="<?php echo $row['id']; ?>"] {
                        display: none;
                      }

                      label {
                        border: 1px solid #fff;
                        padding: 10px;
                        display: block;
                        position: relative;
                        margin: 10px;
                        cursor: pointer;
                      }

                      label:before {
                        background-color: white;
                        color: white;
                        content: " ";
                        display: block;
                        border-radius: 50%;
                        border: 1px solid grey
                        position: absolute;
                        top: -5px;
                        left: -5px;
                        width: 25px;
                        height: 25px;
                        text-align: center;
                        line-height: 28px;
                        transition-duration: 0.4s;
                        transform: scale(0);
                      }
                        label img {
                          height: 100px;
                          width: 100px;
                          transition-duration: 0.2s;
                          transform-origin: 50% 50%;
                        }

                        :checked + label {
                          border-color: #ddd;
                        }

                        :checked + label:before {
                          content: "✓";
                          background-color: grey;
                          transform: scale(1);
                        }

                        :checked + label img {
                          transform: scale(0.9);
                          box-shadow: 0 0 5px #333;
                          z-index: -1;
                        }
                    </style>

                    <!-- <img src="<?php echo $row['id']; ?>" name="feedback_option_image[]>" alt="" value="<?php echo $row['id']; ?>" name="feedback_option_image[]>"/> -->
                    
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
     