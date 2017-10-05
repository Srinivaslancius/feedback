<?php include_once 'admin_includes/main_header.php'; ?>
<?php $getUsersData = getAllDataWithActiveRecent('supervisors_admin_users'); $i=1; ?>
     
      <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <a href="add_users.php" style="float:right">Add Supervisor Admin</a>
            <h3 class="m-t-0 m-b-5">Supervisor Admin</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <?php $sql = "SELECT client_admin_users.client_country_id, lkp_countries.country_name FROM client_admin_users LEFT JOIN lkp_countries ON client_admin_users.client_country_id=lkp_countries.id GROUP BY client_admin_users.client_country_id";
                  $result = $conn->query($sql);

                  $sql1 = "SELECT client_admin_users.client_state_id, lkp_states.state_name FROM client_admin_users LEFT JOIN lkp_states ON client_admin_users.client_state_id=lkp_states.id GROUP BY client_admin_users.client_state_id";
                  $result1 = $conn->query($sql1);

                  $sql2 = "SELECT client_admin_users.client_city_id, lkp_cities.city_name FROM client_admin_users LEFT JOIN lkp_cities ON client_admin_users.client_city_id=lkp_cities.id GROUP BY client_admin_users.client_city_id";
                  $result2 = $conn->query($sql2);
              ?>

                <!-- <div class="col s12 m12 l12">                  

                  <div class="form-group col-md-4">                    
                    <select id="select-country" class="custom-select">
                       <option value="">Select Country</option>
                        <?php while ($getAllCountries = $result->fetch_assoc()) { ?>
                          <option value="<?php echo $getAllCountries['country_name']; ?>"><?php echo $getAllCountries['country_name']; ?></option>
                        <?php } ?>
                    </select>                    
                  </div>

                  <div class="form-group col-md-4">                    
                    <select id="select-state" class="custom-select">
                       <option value="">Select State</option>
                        <?php while ($getAllStates = $result1->fetch_assoc()) { ?>
                          <option value="<?php echo $getAllStates['state_name']; ?>"><?php echo $getAllStates['state_name']; ?></option>
                        <?php } ?>
                    </select>                    
                  </div>

                  <div class="form-group col-md-4">                    
                    <select id="select-cities" class="custom-select">
                        <option value="">Select City</option>
                        <?php while ($getAllCities = $result2->fetch_assoc()) { ?>
                          <option value="<?php echo $getAllCities['city_name']; ?>"><?php echo $getAllCities['city_name']; ?></option>
                        <?php } ?>
                    </select>                    
                  </div>

                </div> -->

                <div class="clear_fix"></div>

                <div class="form-group col-md-4">
                  <div class="custom-controls-stacked checkbox_new_div">
                    <label class="custom-control custom-control-primary custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="test5" name="type" onchange="filterme()" value="Active">
                      <span class="custom-control-indicator"></span>
                      <span class="custom-control-label" for="test5">Verified Client Admins</span>
                    </label>
                    <label class="custom-control custom-control-primary custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="test6" name="type" onchange="filterme()" value="In Active">
                      <span class="custom-control-indicator"></span>
                      <span class="custom-control-label" for="test6">Non Verified Client Admins</span>
                    </label>
                  </div>
                </div>
              
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Created Date</th>
                    <!-- <th>Address</th> -->
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $getUsersData->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['supervisor_name'];?></td>
                    <td><?php echo $row['supervisor_email'];?></td>
                    <td><?php echo $row['supervisor_mobile'];?></td>
                    <td><?php echo $row['created_at'];?></td>
                    
                    
                    <td><?php if ($row['status']==0) { echo "<span class='label label-outline-success check_active open_cursor' data-incId=".$row['id']." data-status=".$row['status']." data-tbname='supervisors_admin_users'>Active</span>" ;} else { echo "<span class='label label-outline-info check_active open_cursor' data-status=".$row['status']." data-incId=".$row['id']." data-tbname='supervisors_admin_users'>In Active</span>" ;} ?></td>
                    <td> <a href="edit_users.php?uid=<?php echo $row['id']; ?>"><i class="zmdi zmdi-edit"></i></a> &nbsp; <a href="#"><i class="zmdi zmdi-eye zmdi-hc-fw" data-toggle="modal" data-target="#<?php echo $row['id']; ?>" class=""></i></a></td>
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
                            <center><h4 class="modal-title">Client Admin Information</h4></center>
                          </div>
                        <div class="modal-body" id="modal_body">
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Name: </div>
                            <div class="col-sm-6"><?php echo $row['supervisor_name'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Email: </div>
                            <div class="col-sm-6"><?php echo $row['supervisor_email'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Mobile: </div>
                            <div class="col-sm-6"><?php echo $row['supervisor_mobile'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Date: </div>
                            <div class="col-sm-6"><?php echo $row['created_at'];?></div>
                          </div>
                          
                          <!-- <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">City: </div>
                            <div class="col-sm-6"><?php $getCityData =  getDataFromTables('lkp_cities',$status=NULL,'id',$row['client_city_id'],$activeStatus=NULL,$activeTop=NULL); $city = $getCityData->fetch_assoc(); echo $city['city_name']?></div>
                          </div> -->
                          <!-- <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Address: </div>
                            <div class="col-sm-6"><?php echo $row['user_address'];?></div>
                          </div> -->
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Status: </div>
                            <div class="col-sm-6"><?php if($row['status'] == 0 ){ echo "Active";} else{ echo "InActive";}?></div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!--<button type="button" data-dismiss="modal" class="btn btn-success">Continue</button>-->
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
  