<?php include_once 'admin_includes/main_header.php'; ?>

      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading" id="change_password">
            <h3 class="m-y-0">Change Password</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="post" id="form_id">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Email</label>
                    <input type="text" name="client_email" class="form-control" id="client_email" placeholder="Email" data-error="Please enter Email" required>
                    <span  id="email_status"></span>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Mobile</label>
                    <input type="text" name="client_mobile" class="form-control" id="form-control-2" placeholder="Mobile" data-error="Please enter mobile number." required maxlength="10" pattern="[0-9]{10}">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">New Password</label>
                    <input type="text" name="email" class="form-control" id="form_control_password" placeholder="New Password" data-error="Please enter New Password" required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div id="content"></div>
                  <button type="submit" id="submit"name="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
              </div>
            </div>
            <hr>
          </div>
        </div>
      </div>
  
<?php include_once 'admin_includes/footer.php'; ?>

<script>
$(document).ready(function(){
    $("#submit").click(function(){
        alert("hai");
    });
});
</script>
