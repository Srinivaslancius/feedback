<?php include_once 'admin_includes/main_header.php'; ?>

      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading" id="change_password">
            <h3 class="m-y-0">Change Password</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                
                <form method="post">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Email</label>
                    <input type="email" name="client_email" class="form-control" id="client_email" placeholder="Email" data-error="Please enter Email" required>
                    <span  id="email_status"></span>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Mobile</label>
                    <input type="password" name="client_mobile" class="form-control" id="client_mobile" placeholder="Mobile" required maxlength="10" pattern="[0-9]{10}">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">New Password</label>
                    <input type="text" name="client_new_password" class="form-control" id="client_new_password" placeholder="New Password" required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div id="content"></div>
                  <button type="button" id="submit" name="submit" class="btn btn-primary btn-block" onClick="checkChangePwd();">Submit</button>
               </form>                  
              </div>
            </div>
            <hr>
          </div>
        </div>
      </div>
  <script type="text/javascript">
 function checkChangePwd() {

    var client_email = document.getElementById("client_email").value;
    var client_mobile = document.getElementById("client_mobile").value;
    var client_new_password = document.getElementById("client_new_password").value;
   
    if (client_email!='' && client_mobile!='' && client_new_password!=''){
      $.ajax({
      type: "POST",
      url: "ajax_change_password.php",
      data: {
        client_email:client_email,client_mobile:client_mobile,client_new_password:client_new_password
      },
      success: function (response) {
        alert(response);
        location.reload();  
       }
    });
  } else {
    alert("Please fill all fields!");
    return false;
  }
}
</script>
<?php include_once 'admin_includes/footer.php'; ?>


