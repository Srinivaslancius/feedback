<?php include_once 'admin_includes/main_header.php'; ?>
<?php 
  error_reporting(0);
  if (!isset($_POST['submit']))  {
    //If fail
    echo "fail";
  } else  { 
      // //If success
    $client_name = $_POST['client_name'];
    $client_email = $_POST['client_email'];
    $client_mobile = $_POST['client_mobile'];
    $client_country_id = $_POST['client_country_id'];
    $client_state_id = $_POST['client_state_id'];
    $client_city_id = $_POST['client_city_id'];
    $client_location_id = $_POST['client_location_id'];
    //$user_password = encryptPassword($_POST['user_password']);
    //$user_address = $_POST['user_address'];
    $status = $_POST['status'];
    $created_super_admin_id = $_SESSION['created_super_admin_id'];
    $created_at = date("Y-m-d h:i:s");
      $sql = "INSERT INTO client_admin_users (`client_name`, `client_email`, `client_mobile`, `client_country_id`, `client_state_id`, `client_city_id`, `client_location_id`,`status`,`created_super_admin_id`, `created_at`, `status`) VALUES ('$client_name', '$client_email', '$client_mobile', '$client_country_id', '$client_state_id', '$client_city_id', '$client_location_id','$created_super_admin_id', '$created_at', $status)";
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
            <h3 class="m-y-0">Client Admin</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Name</label>
                    <input type="text" name="client_name" class="form-control" id="form-control-2" placeholder="User Name" data-error="Please enter Name" required>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Email</label>
                    <input type="email" name="client_email" class="form-control" id="client_email" placeholder="Email" data-error="Please enter valid email address." required>
                    <div class="help-block with-errors"></div>
                  </div>

                  <!-- <div class="form-group">
                    <label for="form-control-2" class="control-label">Password</label>
                    <input type="password" name="user_password" class="form-control" id="form-control-2" placeholder="Password" data-error="Please enter Password." required>
                    <div class="help-block with-errors"></div>
                  </div> -->

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Mobile</label>
                    <input type="text" name="client_mobile" class="form-control" id="form-control-2" placeholder="Mobile" data-error="Please enter mobile number." required maxlength="10" pattern="[0-9]{10}" onkeypress="return isNumberKey(event)">
                    <div class="help-block with-errors"></div>
                  </div>

                  <?php $getCountries = getDataFromTables('lkp_countries',$status='0',$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Select Country</label>
                    <select id="client_country_id" name="client_country_id" class="custom-select" data-error="This field is required." required onChange="getState(this.value);">
                      <option value="">Select Country</option>
                      <?php while($row = $getCountries->fetch_assoc()) { ?>
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['country_name']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Select State</label>
                    <select id="client_state_id" name="client_state_id" class="custom-select" data-error="This field is required." required onChange="getCities(this.value);">
                      <option value="">Select Country</option>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Select City</label>
                    <select id="client_city_id" name="client_city_id" class="custom-select" data-error="This field is required." required onChange="getLocations(this.value);">
                      <option value="">Select City</option>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Select Location</label>
                    <select id="client_location_id" name="client_location_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Location</option>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  <!-- Main div for add more -->
                  <div style="border:1px solid red;">

                    <?php $getCategories = getDataFromTables('categories','0',$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                    <div class="form-group col-md-6">
                      <label for="form-control-3" class="control-label">Choose your Category</label>
                      <select id="form-control-3" name="category_id" class="custom-select" data-error="This field is required." required onChange="getSubCategories(this.value);">
                        <option value="">Select Category</option>
                        <?php while($row = $getCategories->fetch_assoc()) {  ?>
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                        <?php } ?>
                     </select>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="form-control-3" class="control-label">Select Sub Category</label>
                      <select id="sub_category_id" name="sub_category_id" class="custom-select" data-error="This field is required." required onChange="getFeedBackOptions(this.value);">
                        <option value="">Select Sub Category</option>
                     </select>
                      <div class="help-block with-errors"></div>
                    </div>                 
                    <!-- display feed back options -->
                    <div class="form-group" id="get_feed_back_options">                    
                    </div>

                  </div>
                  <div class="form-group">
                     <a href="javascript:void(0);"  ><img src="add-icon.png" onclick="addInput('dynamicInput');"/></a>
                  </div>
                  <div id="dynamicInput" class="input-field col s12"></div>
                  <!-- End Main div for add more -->

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

                  <!-- <div class="form-group">
                    <label for="form-control-4" class="control-label">Address</label>
                    <textarea type="text" name="user_address" class="form-control" id="form-control-2" placeholder="Address" data-error="This field is required." required></textarea>
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

<?php
    $sql1 = "SELECT * FROM categories where status = '0'";
    $result1 = $conn->query($sql1);                                    
?>

<?php while($row = $result1->fetch_assoc()) { 
   $choices1[] = $row['id'];
   $choices_names[] = $row['category_name'];
} ?>

<?php
    $sql2 = "SELECT * FROM sub_categories where status = '0'";
    $result2 = $conn->query($sql2);                                    
?>

<?php while($row2 = $result2->fetch_assoc()) { 
   $choices2[] = $row2['id'];
   $choices_names2[] = $row2['sub_category_name'];
} ?>

<script type="text/javascript">

function addInput(divName) {
 
    var choices = <?php echo json_encode($choices1); ?>; 
    var choices_names = <?php echo json_encode($choices_names); ?>;   

    var choices2 = <?php echo json_encode($choices2); ?>; 
    var choices_names2 = <?php echo json_encode($choices_names2); ?>;

    var newDiv = document.createElement('div');
    newDiv.className = 'new_appen_class';
    var selectHTML = "";   
    var newTextBox = ""; 
    selectHTML="<div class='input-field form-group col-md-6'><select required name='weight_type_id[]' id='form-control-3' class='custom-select' style='display:block !important'><option value=''>Select Category</option>";
    var newTextBox = "<div class='form-group col-md-4'><select required name='' id='sub_category_id' class='custom-select' style='display:block !important'><option value=''>Select Sub Category</option>";
    removeBox="<div class='input-field  form-group col-md-2'><a class='remove_button' ><img src='remove-icon.png'/></a></div><div class='clearfix'></div>";
    for(i = 0; i < choices.length; i = i + 1) {
        selectHTML += "<option value='" + choices[i] + "'>" + choices_names[i] + "</option>";
    }
    selectHTML += "</select></div>";
    for(i = 0; i < choices2.length; i = i + 1) {
        newTextBox += "<option value='" + choices2[i] + "'>" + choices_names2[i] + "</option>";
    }

    newTextBox += "</select></div>";
    newDiv.innerHTML = selectHTML+ " &nbsp;" +newTextBox +" "+ removeBox;
    document.getElementById(divName).appendChild(newDiv);
}

function getState(val) {
    $.ajax({
    type: "POST",
    url: "get_state.php",
    data:'country_id='+val,
    success: function(data){
        $("#client_state_id").html(data);
    }
    });
}

function getCities(val) { 
    $.ajax({
    type: "POST",
    url: "get_cities.php",
    data:'state_id='+val,
    success: function(data){
        $("#client_city_id").html(data);
    }
    });
}

function getLocations(val) { 
    $.ajax({
    type: "POST",
    url: "get_locations.php",
    data:'city_id='+val,
    success: function(data){
        $("#client_location_id").html(data);
    }
    });
}
  function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
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
  function getSubCategories(val) {
    $.ajax({
    type: "POST",
    url: "get_sub_categories.php",
    data:'category_id='+val,
    success: function(data){
        $("#sub_category_id").html(data);
    }
    });
}
function getFeedBackOptions(val) {
    $.ajax({
    type: "POST",
    url: "ajax_get_feedback_options.php",
    data:'sub_category_id='+val,
    success: function(data){      
        $("#get_feed_back_options").html(data);
    }
    });
}
</script>