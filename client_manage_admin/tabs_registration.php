<?php include_once 'admin_includes/main_header.php'; ?>
<?php $id = $_SESSION['client_admin_user_id'];
  $sql = "SELECT * from tabs_registration where created_client_admin_id = '$id' ORDER BY status, id DESC";
  $getTabsRegistrationsData = $conn->query($sql); $i=1; ?>
     
      <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <a href="add_tabs_registration.php" style="float:right">Add Tabs</a>
            <h3 class="m-t-0 m-b-5">Tabs Registrations</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">            
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Tab Ref Name</th>
                    <th>Email</th>
                    <th>Loaction</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $getTabsRegistrationsData->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['tab_ref_name'];?></td>
                    <td><?php echo $row['tab_email'];?></td>
                    <td><?php echo $row['tab_location'];?></td>
                    <td><?php echo $row['tab_address'];?></td>
                    <td><?php if ($row['status']==0) { echo "<span class='label label-outline-success check_active open_cursor' data-incId=".$row['id']." data-status=".$row['status']." data-tbname='tabs_registration'>Active</span>" ;} else { echo "<span class='label label-outline-info check_active open_cursor' data-status=".$row['status']." data-incId=".$row['id']." data-tbname='tabs_registration'>In Active</span>" ;} ?></td>
                    <td> <a href="edit_tabs_registration.php?uid=<?php echo $row['id']; ?>"><i class="zmdi zmdi-edit"></i></a> &nbsp; <!--<a href="delete_tabs_registration.php?uid=<?php echo $row['id']; ?>"><i class="zmdi zmdi-delete zmdi-hc-fw" onclick="return confirm('Are you sure you want to delete?')"></i></a> -->&nbsp;<a href="#"><i class="zmdi zmdi-eye zmdi-hc-fw" data-toggle="modal" data-target="#<?php echo $row['id']; ?>" class=""></i></a></td>
                    <!-- Open Modal Box  here -->
                    <div id="<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content animated flipInX">
                          <div class="modal-header bg-success">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">
                                <i class="zmdi zmdi-close"></i>
                              </span>
                            </button>
                            <center><h4 class="modal-title">Tabs Information</h4></center>
                          </div>
                        <div class="modal-body" id="modal_body">
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Name: </div>
                            <div class="col-sm-6"><?php echo $row['tab_ref_name'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Email: </div>
                            <div class="col-sm-6"><?php echo $row['tab_email'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Username: </div>
                            <div class="col-sm-6"><?php echo $row['tab_user_name'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Password: </div>
                            <div class="col-sm-6"><?php echo $row['tab_password'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Location: </div>
                            <div class="col-sm-6"><?php echo $row['tab_location'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Address: </div>
                            <div class="col-sm-6"><?php echo $row['tab_address'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Supervisor Name: </div>
                            <div class="col-sm-6"><?php echo $row['supervisor_name'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Category Name: </div>
                            <div class="col-sm-6"><?php echo $row['category_name'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Status: </div>
                            <div class="col-sm-6"><?php if($row['status'] == 0 ){ echo "Active";} else{ echo "InActive";}?></div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" data-dismiss="modal" class="btn btn-success">Close</button>
                          <style>
                            #modal_body{
                              font-size:14px;
                              padding-top:30px;
                              padding-left: 0px;
                              font-family:Roboto,sans-serif;
                            }
                          </style>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal Box  here -->
                  </tr>
                  <?php  $i++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>      
      </div>
   <?php include_once 'admin_includes/footer.php'; ?>
   <script src="js/tables-datatables.min.js"></script>
  