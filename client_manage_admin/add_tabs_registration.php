<?php include_once 'admin_includes/main_header.php'; ?>
<?php  if (!isset($_POST['submit']))  {
          //If fail
          echo "fail";
        } 
        else  {
          //If success
          $tab_ref_name = $_POST['tab_ref_name'];
          $tab_email = $_POST['tab_email'];
          $tab_user_name = $_POST['tab_email'];
          $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
          $tab_password = substr( str_shuffle( $chars ), 0, 8 );
          $tab_location = $_POST['tab_location'];
          $tab_address = $_POST['tab_address'];
          $supervisor_name = $_POST['supervisor_name'];
          $category_name = $_POST['category_name'];
          $floor_no = $_POST['floor_no'];
          $created_client_admin_id = $_SESSION['client_admin_user_id'];
          $status = $_POST['status'];
          $created_at = date("Y-m-d h:i:s");
          
           $sql = "INSERT INTO tabs_registration (`tab_ref_name`, `tab_email`, `tab_user_name`,`tab_password`,`tab_location`,`tab_address`, `supervisor_name`,`category_name`,`floor_no`, `created_client_admin_id`, `created_at`,`status`) VALUES ('$tab_ref_name', '$tab_email', '$tab_user_name','$tab_password','$tab_location', '$tab_address','$supervisor_name','$category_name','$floor_no', '$created_client_admin_id', '$created_at','$status')";
          
            $result = $conn->query($sql);
           
            // Check whether submitted data is not empty
           
            // Recipient email
            $toEmail = '<?php echo $tab_email; ?>';
            $emailSubject = 'Contact Request Submitted by '.$tab_ref_name;
            $htmlContent = '<h2>Contact Request Submitted</h2>
              <h4>Name: </h4><p>'.$tab_ref_name.'</p>
              <h4>Email: </h4><p>'.$tab_email.'</p>
              <h4>Location: </h4><p>'.$tab_location.'</p>
              <h4>Address: </h4><p>'.$tab_address.'</p>
              <h4>Supervisor Name: </h4><p>'.$supervisor_name.'</p>
              <h4>Category Name: </h4><p>'.$category_name.'</p>
              <h4>Floor No: </h4><p>'.$floor_no.'</p>
              <h4>Status: </h4><p>'.$status.'</p>';
            
            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // Additional headers
            $headers .= 'From: '.$tab_ref_name.'<'.$tab_email.'>'. "\r\n";

            mail($toEmail,$emailSubject,$htmlContent);
                    
            if($result == 1){
              echo "<script type='text/javascript'>window.location='tabs_registration.php?msg=success'</script>"; 
            }
            else {
              echo "<script type='text/javascript'>window.location='tabs_registration.php?msg=fail'</script>"; 
            }   
            
        }
    ?>
      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Tabs Registration</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST" enctype="multipart/form-data" autocomplete="off">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Name</label>
                    <input type="text" name="tab_ref_name" class="form-control" id="form-control-2" placeholder="Tab Name" data-error="Please enter Name" required>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Email</label>
                    <input type="email" name="tab_email" class="form-control" id="tab_email" placeholder="Email" data-error="Please enter valid email address." required onkeyup="checkemail()" >
                    <span id="email_status" style="color: red;"></span>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Location</label>
                    <input type="text" name="tab_location" class="form-control" id="form-control-2" placeholder="Location" data-error="Please enter Location" required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-4" class="control-label">Address</label>
                    <textarea type="text" name="tab_address" class="form-control" id="form-control-2" placeholder="Address" data-error="This field is required." required></textarea>
                  </div>
                  <?php $id = $_SESSION['client_admin_user_id']; $sql = "SELECT * from supervisors_admin_users where created_client_admin_id = '$id' AND status = 0";
                    $getSupervisors = $conn->query($sql);?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Supervisor</label>
                    <select id="form-control-3" name="supervisor_name" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Supervisor</option>
                      <?php while($row = $getSupervisors->fetch_assoc()) {  ?>
                        <option value="<?php echo $row['supervisor_name']; ?>"><?php echo $row['supervisor_name']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>
                  <?php $id = $_SESSION['client_admin_user_id']; $getCategories = getDataFromTables('client_selected_feedback_options',$status=NULL,'client_user_id',$id,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Category</label>
                    <select id="form-control-3" name="category_name" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Category</option>
                      <?php while($row = $getCategories->fetch_assoc()) {  ?>
                        <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_id']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>
                  <?php $getNumberOfFloors = getDataFromTables('client_admin_users','0',$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);
                    $row = $getNumberOfFloors->fetch_assoc();
                    ?>
                    <div class="form-group">
                      <label for="form-control-3" class="control-label">Choose Your Floor Number</label>
                      <select id="form-control-3" name="floor_no" class="custom-select" data-error="This field is required." required>
                        <option value="">Select Floor Number</option>
                        <?php for($i = 1; $i <= $row['no_of_floors']; $i++){ 

                         ?>
                          <option value="<?php echo $i; ?>"><?php echo "Floor - ".$i; ?></option>
                        <?php } ?>
                     </select>
                      <div class="help-block with-errors"></div>
                    </div>
                  <?php $getStatus = getDataFromTables('user_status',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your status</label>
                    <select id="form-control-3" name="status" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Status</option>
                      <?php while($row = $getStatus->fetch_assoc()) { ?>
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
<script>
  function checkemail() {
    var email1 = document.getElementById("tab_email").value;
    if (email1){
      $.ajax({
      type: "POST",
      url: "check_email_avail_tabs.php",
      data: {
        tab_email:email1,
      },
      success: function (response) {
        $( '#email_status' ).html(response);
        if (response == "Email Already Exist"){
          $("#tab_email").val("");
        }
        }
       });
    }
  }
</script>