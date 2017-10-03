<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
error_reporting(0);
$id = $_GET['uid'];
 if (!isset($_POST['submit'])) {
      //If fail
        echo "fail";
    } else {
    //If success            
      $client_name = $_POST['client_name'];
      $client_email = $_POST['client_email'];
      $client_mobile = $_POST['client_mobile'];
      $client_country_id = $_POST['client_country_id'];
      $client_state_id = $_POST['client_state_id'];
      $client_city_id = $_POST['client_city_id'];
      $client_location_id = $_POST['client_location_id'];
/*      $user_password = encryptPassword($_POST['user_password']);
      $user_address = $_POST['user_address'];*/
      $status = $_POST['status'];
        $sql = "UPDATE `client_admin_users` SET client_name='$client_name', client_email='$client_email', client_mobile='$client_mobile', client_country_id='$client_country_id', client_state_id='$client_state_id', client_city_id='$client_city_id', client_location_id='$client_location_id',status = '$status' WHERE id = '$id' ";
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
            <h3 class="m-y-0">Users</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <?php $getUsers = getDataFromTables('client_admin_users',$status=NULL,'id',$id,$activeStatus=NULL,$activeTop=NULL);
              $getUsers1 = $getUsers->fetch_assoc(); ?>		
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST" autocomplete="off">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Name</label>
                    <input type="text" name="client_name" class="form-control" id="form-control-2" placeholder="User Name" data-error="Please enter user name" required value="<?php echo $getUsers1['client_name'];?>">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Email</label>
                    <input type="email" name="client_email" class="form-control" id="client_email" placeholder="Email" onkeyup="checkemail();" data-error="Please enter a valid email address." required value="<?php echo $getUsers1['client_email'];?>">
                    <span id="email_status" style="color: red;"></span>
                    <div class="help-block with-errors"></div>
                  </div>

                  <!-- <div class="form-group">
                    <label for="form-control-2" class="control-label">Password</label>
                    <input type="password" name="user_password" class="form-control" id="form-control-2" placeholder="Password" data-error="Please enter password." required value="<?php echo decryptPassword($getUsers1['user_password']);?>">
                    <div class="help-block with-errors"></div>
                  </div> -->

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Mobile</label>
                    <input type="text" name="client_mobile" class="form-control" id="form-control-2" placeholder="Mobile" data-error="Please enter mobile number." required maxlength="10" pattern="[0-9]{10}" onkeypress="return isNumberKey(event)" value="<?php echo $getUsers1['client_mobile'];?>">
                    <div class="help-block with-errors"></div>
                  </div>

                  <?php $getCountries = getDataFromTables('lkp_countries',$status='0',$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);  ?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Select Country</label>
                      <select name="client_country_id" id="client_country_id" class="custom-select" required onChange="getState(this.value);">
                          <option value="">Select Country</option>
                          <?php while($row = $getCountries->fetch_assoc()) {  ?>
                              <option <?php if($row['id'] == $getUsers1['client_country_id']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['country_name']; ?></option>
                          <?php } ?>
                      </select> 
                  </div>

                  <?php $getStates =  getDataFromTables('lkp_states',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL); ?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Select State</label>
                    <select id="client_state_id" name="client_state_id" class="custom-select" data-error="This field is required." required onChange="getCities(this.value);">
                       <option value="">Select State</option>
                      <?php while($row = $getStates->fetch_assoc()) {  ?>
                      <option <?php if($row['id'] == $getUsers1['client_state_id']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['state_name']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  <?php $getCities =  getDataFromTables('lkp_cities',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL); ?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Select City</label>
                    <select id="client_city_id" name="client_city_id" class="custom-select" data-error="This field is required." required onChange="getLocations(this.value);">
                       <option value="">Select City</option>
                      <?php while($row = $getCities->fetch_assoc()) {  ?>
                      <option <?php if($row['id'] == $getUsers1['client_city_id']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['city_name']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  <?php $getLocations =  getDataFromTables('lkp_locations',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL); ?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Select Location</label>
                    <select id="client_location_id" name="client_location_id" class="custom-select" data-error="This field is required." required>
                       <option value="">Select Location</option>
                      <?php while($row = $getLocations->fetch_assoc()) {  ?>
                      <option <?php if($row['id'] == $getUsers1['client_location_id']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['location_name']; ?></option>
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

                  <!-- <div class="form-group">
                    <label for="form-control-2" class="control-label">Address</label>
                    <textarea type="text" name="user_address" class="form-control" id="form-control-2" placeholder="Address" data-error="This field is required." required><?php echo $getUsers1['user_address'];?></textarea>
                    <div class="help-block with-errors"></div>
                  </div> -->

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
    function getState(val) {
    $.ajax({
    type: "POST",
    url: "get_state.php",
    data:'country_id='+val,
    success: function(data){
        $("#user_state_id").html(data);
    }
    });
  }

  function getCities(val) { 
      $.ajax({
      type: "POST",
      url: "get_cities.php",
      data:'state_id='+val,
      success: function(data){
          $("#user_city_id").html(data);
      }
      });
  }

  function getLocations(val) { 
      $.ajax({
      type: "POST",
      url: "get_locations.php",
      data:'city_id='+val,
      success: function(data){
          $("#user_location_id").html(data);
      }
      });
  }
  function checkemail() {
    var email1 = document.getElementById("client_email").value;
    if (email1){
      $.ajax({
      type: "POST",
      url: "check_email_avail.php",
      data: {
        client_email:email1,
      },
      success: function (response) {
        $( '#email_status' ).html(response);
        if (response == "Email Already Exist"){
          $("#client_email").val("");
        }        
        }
       });          
    }
  }
</script>