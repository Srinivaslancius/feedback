<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
error_reporting(0);
$id = $_GET['uid'];
 if (!isset($_POST['submit'])) {
      //If fail
        echo "fail";
    } else {
    //If success            
      $supervisor_name = $_POST['supervisor_name'];
      $supervisor_email = $_POST['supervisor_email'];
      $supervisor_mobile = $_POST['supervisor_mobile'];
      $supervisor_location = $_POST['supervisor_location'];
      $supervisor_ref_name = $_POST['supervisor_ref_name'];
      $supervisor_branch = $_POST['supervisor_branch'];
      $string1 = str_shuffle('abcdefghijklmnopqrstuvwxyz');
      $random1 = substr($string1,0,3);
      $string2 = str_shuffle('1234567890');
      $random2 = substr($string2,0,3);
      $contstr = "SUPEVIS";
      $supervisors_random_id = $contstr.$random1.$random2;    
      $status = $_POST['status'];
      $created_supervisor_admin_id = $_SESSION['client_admin_user_id'];

      $sql = "UPDATE `supervisors_admin_users` SET supervisor_name='$supervisor_name', supervisor_email='$supervisor_email', supervisor_mobile='$supervisor_mobile', supervisor_location= '$supervisor_location', supervisor_ref_name = '$supervisor_ref_name' ,supervisor_branch = '$supervisor_branch',supervisors_random_id='$supervisors_random_id', created_client_admin_id='$created_supervisor_admin_id', status = '$status' WHERE id = '$id' ";
        if($conn->query($sql) === TRUE){
           echo "<script type='text/javascript'>window.location='users.php?msg=success'</script>";
        } else {
           echo "<script type='text/javascript'>window.location='users.php?msg=fail'</script>";
        }
      }
?>
      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Supervisor Admin</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <?php $getUsers = getDataFromTables('supervisors_admin_users',$status=NULL,'id',$id,$activeStatus=NULL,$activeTop=NULL);
              $getUsers1 = $getUsers->fetch_assoc(); ?>		
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST" autocomplete="off">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Name</label>
                    <input type="text" name="supervisor_name" class="form-control" id="form-control-2" placeholder="User Name" data-error="Please enter user name" required value="<?php echo $getUsers1['supervisor_name'];?>" onkeyup="checkUserName()">
                    <span id="user_status" style="color: red;"></span>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Email</label>
                    <input type="email" name="supervisor_email" class="form-control" id="supervisor_email" placeholder="Email" onkeyup="checkemail()" data-error="Please enter a valid email address." required value="<?php echo $getUsers1['supervisor_email'];?>">
                    <span id="email_status" style="color: red;"></span>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Mobile</label>
                    <input type="text" name="supervisor_mobile" class="form-control" id="supervisor_mobile" placeholder="Mobile" data-error="Please enter mobile number." required maxlength="10" pattern="[0-9]{10}" onkeypress="return isNumberKey(event)" value="<?php echo $getUsers1['supervisor_mobile'];?>" onkeyup="checkMobile()" >
                    <span id="mobile_status" style="color: red;"></span>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Location</label>
                    <input type="text" name="supervisor_location" class="form-control" id="form-control-2" placeholder="Supervisor Location" data-error="Please enter Supervisor Location." required value="<?php echo $getUsers1['supervisor_location'];?>" >
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Reference Name</label>
                    <input type="text" name="supervisor_ref_name" class="form-control" id="form-control-2" placeholder="Supervisor Location" data-error="Please enter Supervisor Reference Name." required value="<?php echo $getUsers1['supervisor_ref_name'];?>" >
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Branch</label>
                    <input type="text" name="supervisor_branch" class="form-control" id="form-control-2" placeholder="Supervisor Branch" data-error="Please enter Supervisor Branch." required value="<?php echo $getUsers1['supervisor_branch'];?>" >
                    <div class="help-block with-errors"></div>
                  </div>
                  <?php $getStatus = getDataFromTables('user_status',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your status</label>
                    <select id="form-control-3" name="status" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Status</option>
                      <?php while($row = $getStatus->fetch_assoc()) {  ?>
                        <option <?php if($row['id'] == $getUsers1['status']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></option>
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
<!--script for allow only numbers-->
<script type="text/javascript">
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
   function checkUserName() {
    var user1 = document.getElementById("supervisor_name").value;
    if (user1){
      $.ajax({
      type: "POST",
      url: "ajax_check_username.php",
      data: {
        supervisor_name:user1,
      },
      success: function (response) {
        $( '#user_status' ).html(response);
        if (response == "User Already Exist"){
          $("#supervisor_name").val("");
        }
        }
       });
    }
  } 
  function checkemail() {
    var email1 = document.getElementById("supervisor_email").value;
    if (email1){
      $.ajax({
      type: "POST",
      url: "check_email_avail.php",
      data: {
        supervisor_email:email1,
      },
      success: function (response) {
        $( '#email_status' ).html(response);
        if (response == "Email Already Exist"){
          $("#supervisor_email").val("");
        }
        }
       });
    }
  }
  function checkMobile() {
    var mobile = document.getElementById("supervisor_mobile").value;
    if (mobile){
      $.ajax({
      type: "POST",
      url: "check_mobile_avail.php",
      data: {
        supervisor_mobile:mobile,
      },
      success: function (response) {
        $( '#mobile_status' ).html(response);
        if (response == "Mobile Number Already Exist"){
          $("#supervisor_mobile").val("");
        }
        }
       });
    }
  }
</script>