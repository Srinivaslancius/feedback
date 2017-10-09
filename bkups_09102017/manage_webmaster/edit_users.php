<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
error_reporting(0);
$id = $_GET['uid'];
 if (!isset($_POST['submit'])) {
      //If fail
        echo "fail";
    } else {
    //If success   
    //echo "<pre>"; print_r($_REQUEST); die;         
    $client_name = $_POST['client_name'];
    $client_email = $_POST['client_email'];
    $client_mobile = $_POST['client_mobile'];
    $remember_name = $_POST['remember_name'];
    $no_of_accounts = $_POST['no_of_accounts'];
    $no_of_floors = $_POST['no_of_floors'];
    $client_country_id = $_POST['client_country_id'];
    $client_state_id = $_POST['client_state_id'];
    $client_city_id = $_POST['client_city_id'];
    $client_location_id = $_POST['client_location_id'];
    $status = $_POST['status'];
    $created_super_admin_id = $_SESSION['admin_user_id'];
    
    if($_FILES["client_admin_logo"]["name"]!='') {
              $client_admin_logo = $_FILES["client_admin_logo"]["name"];
              $target_dir = "../uploads/client_logos/";
              $target_file = $target_dir . basename($_FILES["client_admin_logo"]["name"]);
              $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
              $getImgUnlink = getImageUnlink('client_admin_logo','client_admin_users','id',$id,$target_dir);
                //Send parameters for img val,tablename,clause,id,imgpath for image ubnlink from folder
              if (move_uploaded_file($_FILES["client_admin_logo"]["tmp_name"], $target_file)) {
            $sql = "UPDATE `client_admin_users` SET client_name='$client_name', client_email='$client_email', client_mobile='$client_mobile', remember_name='$remember_name', no_of_accounts='$no_of_accounts',no_of_floors = '$no_of_floors' ,client_country_id='$client_country_id', client_state_id='$client_state_id', client_city_id='$client_city_id', client_location_id='$client_location_id',client_admin_logo='$client_admin_logo',created_super_admin_id='$created_super_admin_id',created_at='$created_at', status = '$status' WHERE id = '$id' ";                    
            if($conn->query($sql) === TRUE){    
                       echo "<script type='text/javascript'>window.location='users.php?msg=success'</script>";
                    } else {
                       echo "<script type='text/javascript'>window.location='users.php?msg=fail'</script>";
                    }
                    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }  else {

            $sql  = "UPDATE `client_admin_users` SET client_name='$client_name', client_email='$client_email', client_mobile='$client_mobile', remember_name='$remember_name', no_of_accounts='$no_of_accounts', client_country_id='$client_country_id', client_state_id='$client_state_id', client_city_id='$client_city_id', client_location_id='$client_location_id',created_super_admin_id='$created_super_admin_id', status = '$status' WHERE id = '$id' ";                
            if($conn->query($sql) === TRUE){
                   echo "<script type='text/javascript'>window.location='users.php?msg=success'</script>";
              } else {
                 echo "<script type='text/javascript'>window.location='users.php?msg=fail'</script>";
              }
            }
        $result = $conn->query($sql);
        
        $del = "DELETE FROM client_selected_feedback_options WHERE client_user_id = '$id' ";
        $result = $conn->query($del);
        $category_ids = $_REQUEST['category_id'];
        foreach($category_ids as $key=>$value){
        $category_id = $_REQUEST['category_id'][$key];
        $getcheckList=implode(",", $_REQUEST['feedback_options'][$key]);           
        $sql = "INSERT INTO client_selected_feedback_options ( `client_user_id`,`category_id`,`feedback_options`,`created_at`) VALUES ('$id','$category_id','$getcheckList','$created_at')";
        $result = $conn->query($sql);
    }
        if($result == 1){
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
                    <input type="email" name="client_email" class="form-control" id="client_email" placeholder="Email" onkeyup="checkemail()" data-error="Please enter a valid email address." required value="<?php echo $getUsers1['client_email'];?>">
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
                    <input type="text" name="client_mobile" class="form-control" id="client_mobile" placeholder="Mobile" data-error="Please enter mobile number." required maxlength="10" pattern="[0-9]{10}" onkeypress="return isNumberKey(event)" value="<?php echo $getUsers1['client_mobile'];?>" onkeyup="checkMobile()" >
                    <span id="mobile_status" style="color: red;"></span>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Remember Name</label>
                    <input type="text" name="remember_name" class="form-control" id="form-control-2" placeholder="Remember Name" data-error="Please enter Remember Name" required value="<?php echo $getUsers1['remember_name'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Number Of Accounts</label>
                    <input type="text" name="no_of_accounts" class="form-control" id="form-control-2" placeholder="Number Of Account" data-error="Please enter Number Of Accounts" required value="<?php echo $getUsers1['no_of_accounts'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Number Of Floors</label>
                    <input type="text" name="no_of_floors" class="form-control" id="form-control-2" placeholder="Number Of Floors" data-error="Please enter Number Of Floors" required value="<?php echo $getUsers1['no_of_floors'];?>">
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

                  <?php $id = $_GET['uid'];
                    $sql2 = "SELECT * FROM client_selected_feedback_options where client_user_id = '$id'";
                    $result2 = $conn->query($sql2);
                  ?>
                  <!-- Main div for add more -->
                  <?php $i =0; while($row2 = $result2->fetch_assoc()) { ?>
                    <div style="border:1px solid #333; position:relative; top:5px;" class="col-md-12 new_appen_class addspace">
                    
                    <?php $getCategories = getDataFromTables('categories','0',$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                      <div class="form-group">
                        <label for="form-control-3" class="control-label">Choose your Category</label>
                        <select id="form-control-3" name="category_id[]" class="custom-select" data-error="This field is required.">
                        <?php while($row = $getCategories->fetch_assoc()) {  ?>
                        <option value="<?php echo $row['category_name']; ?>" <?php if($row['category_name'] == $row2['category_id']) { echo "Selected"; } ?>><?php echo $row['category_name']; ?></option>
                      <?php } ?>
                       </select>
                        <div class="help-block with-errors"></div>
                      </div>

                      <style>
                      .addspace{
                        margin-bottom: 5px;
                      }
                      </style>
                      <?php  
                      $getfeedbackOpt = getDataFromTables('feedback_options','0',$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                      <div class="form-group">
                      <label for="form-control-2" class="control-label">Feedback Options : </label><br />
                      <?php  while ($row = $getfeedbackOpt->fetch_assoc()) { 
                          $checked = '';                          
                          $explodeFeedbackOpt=explode(',',$row2['feedback_options']);
                        if (in_array($row['feedback_option'], $explodeFeedbackOpt)) $checked = " checked"; 
                      ?>
                      <input type="checkbox" value="<?php echo $row['feedback_option']; ?>" name='feedback_options[<?php echo $i ?>][]' <?php echo $checked; ?> > <?php echo $row['feedback_option']; ?> &nbsp;&nbsp;
                      <?php  } ?>
                      </div>

                    </div> 
                    <div class="clearfix"></div>
                    <?php $i++; } ?>
                 
                  <div class="form-group" style="float:right; margin-top:5px;">
                     <a href="javascript:void(0);"><img src="add-icon.png" onclick="addInput('dynamicInput');"/></a>
                  </div>
                  <div class="clearfix"></div>
                  <div id="dynamicInput" class="input-field col s12"></div>

                  <div class="form-group">
                    <label for="form-control-4" class="control-label">Client Admin Logo</label>
                    <img src="<?php echo $base_url . 'uploads/client_logos/'.$getUsers1['client_admin_logo'] ?>"  id="output" height="100" width="100"/>
                    <label class="btn btn-default file-upload-btn">
                        Choose file...
                        <input id="form-control-22" class="file-upload-input" type="file" accept="image/*" name="client_admin_logo" id="client_admin_logo"  onchange="loadFile(event)"  multiple="multiple" >
                      </label>
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
<?php
    $sql1 = "SELECT * FROM categories where status = '0'";
    $result1 = $conn->query($sql1);                                    
?>

<?php while($row = $result1->fetch_assoc()) { 
   $choices1[] = $row['id'];
   $choices_names[] = $row['category_name'];
} ?>


<?php
    $sql3 = "SELECT * FROM feedback_options where status = '0'";
    $result3 = $conn->query($sql3);                                    
?>

<?php while($row3 = $result3->fetch_assoc()) { 
   $choices3[] = $row3['id'];
   $choices_names3[] = $row3['feedback_option'];
} ?>
<!--script for allow only numbers-->
<script type="text/javascript">

    function addInput(divName) {
 
    var totalDivInc = $('.new_appen_class').length;
    
    //var totalDivInc = geDivLegn+1;
    var choices = <?php echo json_encode($choices1); ?>; 
    var choices_names = <?php echo json_encode($choices_names); ?>;   

    var choices2 = <?php echo json_encode($choices2); ?>; 
    var choices_names2 = <?php echo json_encode($choices_names2); ?>;

    var choices3 = <?php echo json_encode($choices3); ?>; 
    var choices_names3 = <?php echo json_encode($choices_names3); ?>;

    var newDiv = document.createElement('div');
    newDiv.className = 'new_appen_class addspace';
    var selectHTML = "";   
    var newTextBox = ""; 
    selectHTML="<div style='border:1px solid #333;'><div class='input-field form-group col-md-12'><label for='form-control-3' class='control-label'>Choose your Category</label><select required name='category_id[]' id='form-control-3' class='custom-select' style='display:block !important'><option value=''>Select Category</option>";
    //var newTextBox = "<div class='form-group col-md-4'><label for='form-control-3' class='control-label'>Select Sub Category</label><select required name='sub_category_id[]' id='sub_category_id' class='custom-select' style='display:block !important'><option value=''>Select Sub Category</option>";

    var newCheckBox = "<div class='form-group col-md-12'> <label for='form-control-2' class='control-label'>Feedback Options : </label><br /> ";

    removeBox="<div class='input-field  form-group col-md-2'><a class='remove_button' ><img src='remove-icon.png'/></a></div><div class='clearfix'></div></div><div class='clearfix'></div>";
    for(i = 0; i < choices.length; i = i + 1) {
        selectHTML += "<option value='" + choices_names[i] + "'>" + choices_names[i] + "</option>";
    }
    selectHTML += "</select></div>";
    /*for(i = 0; i < choices2.length; i = i + 1) {
        newTextBox += "<option value='" + choices_names2[i] + "'>" + choices_names2[i] + "</option>";
    }
    newTextBox += "</select></div>";*/
    for(i = 0; i < choices3.length; i = i + 1) {
        newCheckBox += "<input type='checkbox' name='feedback_options["+totalDivInc+"][]' value='" + choices_names3[i] + "'>&nbsp;" + choices_names3[i] + " &nbsp;&nbsp;";
    }
    newCheckBox += "</div>";
    
    newDiv.innerHTML = selectHTML+ " &nbsp;" + newCheckBox +" " +removeBox;
    document.getElementById(divName).appendChild(newDiv);
}

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
      url: "check_email_avail1.php",
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
  function checkMobile() {
    var mobile = document.getElementById("client_mobile").value;
    if (mobile){
      $.ajax({
      type: "POST",
      url: "check_mobile_avail.php",
      data: {
        client_mobile:mobile,
      },
      success: function (response) {
        $( '#mobile_status' ).html(response);
        if (response == "Mobile Number Already Exist"){
          $("#client_mobile").val("");
        }
        }
       });
    }
  }
  $(document).ready(function() {
    $(dynamicInput).on("click",".remove_button", function(e){ //user click on remove text
        e.preventDefault();
        $(this).parent().parent().remove();
    })
    
});
</script>