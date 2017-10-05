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
      //$supervisor_floor_no = $_POST['supervisor_floor_no'];
      $supervisor_floor_no = implode(',',$_POST['supervisor_floor_no']);
      $string1 = str_shuffle('abcdefghijklmnopqrstuvwxyz');
      $random1 = substr($string1,0,3);
      $string2 = str_shuffle('1234567890');
      $random2 = substr($string2,0,3);
      $contstr = "SUPEVIS";
      $supervisors_random_id = $contstr.$random1.$random2;
      $status = $_POST['status'];
      $created_supervisor_admin_id = $_SESSION['client_admin_user_id'];
      $created_at = date("Y-m-d h:i:s");
        echo $sql = "UPDATE `supervisors_admin_users` SET supervisor_name='$supervisor_name', supervisor_email='$supervisor_email', supervisor_mobile='$supervisor_mobile', supervisor_floor_no='$supervisor_floor_no',supervisors_random_id='$supervisors_random_id', created_client_admin_id='$created_supervisor_admin_id',status = '$status' WHERE id = '$id' ";die;
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
                    <input type="text" name="supervisor_name" class="form-control" id="form-control-2" placeholder="User Name" data-error="Please enter user name" required value="<?php echo $getUsers1['supervisor_name'];?>">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Email</label>
                    <input type="email" name="supervisor_email" class="form-control" id="supervisor_email" placeholder="Email" onkeyup="checkemail();" data-error="Please enter a valid email address." required value="<?php echo $getUsers1['supervisor_email'];?>">
                    <span id="email_status" style="color: red;"></span>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Mobile</label>
                    <input type="text" name="supervisor_mobile" class="form-control" id="form-control-2" placeholder="Mobile" data-error="Please enter mobile number." required maxlength="10" pattern="[0-9]{10}" onkeypress="return isNumberKey(event)" value="<?php echo $getUsers1['supervisor_mobile'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <?php $getNumberOfFloors = getDataFromTables('client_admin_users','0',$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);
                    $row = $getNumberOfFloors->fetch_assoc();
                    $HiddenFloors = explode(',',$row['supervisor_floor_no']);
                    ?>
                    <div class="form-group">
                      <label for="form-control-3" class="control-label">Choose Your Floor Number</label>
                      <select id="form-control-3" name="supervisor_floor_no[]" multiple="multiple" class="custom-select" data-error="This field is required." required>
                        <option value="">Select Floor Number</option>
                        <?php for($i = 1; $i <= $row['no_of_floors']; $i++){ 

                         ?>
                          <option value="<?php echo $i; ?>" <?php if($i == in_array($i, $HiddenFloors)) { echo "selected=selected"; }?> >  <?php echo "Floor - ".$i; ?></option>
                          
                        <?php } ?>
                     </select>
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
</script>