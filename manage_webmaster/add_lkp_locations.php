<?php include_once 'admin_includes/main_header.php'; ?>
<?php  if (!isset($_POST['submit']))  {
          //If fail
          echo "fail";
        } 
        else  {
            //If success
            $lkp_country_id = $_POST['lkp_country_id'];
            $lkp_state_id = $_POST['lkp_state_id'];
            $lkp_city_id = $_POST['lkp_city_id'];
            $location_name = $_POST['location_name'];
            $status = $_POST['status'];
            $sql = "INSERT INTO lkp_locations (`lkp_country_id`, `lkp_state_id`, `lkp_city_id`, `location_name`, `status`) VALUES ('$lkp_country_id', '$lkp_state_id', '$lkp_city_id','$location_name','$status')";
            if($conn->query($sql) === TRUE){
               echo "<script type='text/javascript'>window.location='lkp_locations.php?msg=success'</script>";
            } else {
               echo "<script type='text/javascript'>window.location='lkp_locations.php?msg=fail'</script>";
            }
          }
    ?>
      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Locations</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST"  autocomplete="off">
                  <?php $getCountries = getDataFromTables('lkp_countries',$status='0',$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Select Country</label>
                    <select id="client_country_id" name="lkp_country_id" class="custom-select" data-error="This field is required." required onChange="getState(this.value);">
                      <option value="">Select Country</option>
                      <?php while($row = $getCountries->fetch_assoc()) { ?>
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['country_name']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Select State</label>
                    <select id="client_state_id" name="lkp_state_id" class="custom-select" data-error="This field is required." required onChange="getCities(this.value);">
                      <option value="">Select Country</option>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Select City</label>
                    <select id="client_city_id" name="lkp_city_id" class="custom-select" data-error="This field is required." required onChange="getLocations(this.value);">
                      <option value="">Select City</option>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Location</label>
                    <input type="text" name="location_name" class="form-control" id="form-control-2" placeholder="Location Name" data-error="Please enter location name" required>
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

<script type="text/javascript">
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
</script>