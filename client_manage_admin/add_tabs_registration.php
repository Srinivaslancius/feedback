<?php include_once 'admin_includes/main_header.php'; ?>
<?php  if (!isset($_POST['submit']))  {
          //If fail
          echo "fail";
        } 
        else  {
            //If success
            $tab_ref_name = $_POST['tab_ref_name'];
            $tab_email = $_POST['tab_email'];
            $tab_location = $_POST['tab_location'];
            $tab_address = $_POST['tab_address'];
            $supervisor_name = $_POST['supervisor_name'];
            $category_name = $_POST['category_name'];
            $floor_no = $_POST['floor_no'];
            $created_client_admin_id = $_SESSION['client_admin_user_id'];
            $status = $_POST['status'];
            $created_at = date("Y-m-d h:i:s");
            
             $sql = "INSERT INTO tabs_registration (`tab_ref_name`, `tab_email`, `tab_location`,`tab_address`, `supervisor_name`,`category_name`,`floor_no`, `created_client_admin_id`, `created_at`,`status`) VALUES ('$tab_ref_name', '$tab_email', '$tab_location', '$tab_address','$supervisor_name','$category_name','$floor_no', '$created_client_admin_id', '$created_at','$status')";
            
              $result = $conn->query($sql);

              if($result == 1){
                echo "<script type='text/javascript'>window.location='tabs_registration.php?msg=success'</script>"; }
              else {
                echo "<script type='text/javascript'>window.location='tabs_registration.php?msg=fail'</script>"; }
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
                  <?php $id = $_SESSION['client_admin_user_id']; $getSupervisors = getDataFromTables('supervisors_admin_users','0','created_client_admin_id',$id,$activeStatus=NULL,$activeTop=NULL);?>
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
                  <?php $getCategories = getDataFromTables('categories','0',$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Category</label>
                    <select id="form-control-3" name="category_name" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Category</option>
                      <?php while($row = $getCategories->fetch_assoc()) {  ?>
                        <option value="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></option>
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