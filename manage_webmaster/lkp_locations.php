<?php include_once 'admin_includes/main_header.php'; ?>
<?php $getUsersData = getAllDataWithActiveRecent('lkp_locations'); $i=1; ?>
     
      <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <a href="add_lkp_locations.php" style="float:right">Add Locations</a>
            <h3 class="m-t-0 m-b-5">Locations</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $getUsersData->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php $getStateData =  getDataFromTables('lkp_states',$status=NULL,'id',$row['lkp_state_id'],$activeStatus=NULL,$activeTop=NULL); $state = $getStateData->fetch_assoc(); echo $state['state_name']?></td>
                    <td><?php $getCityData =  getDataFromTables('lkp_cities',$status=NULL,'id',$row['lkp_city_id'],$activeStatus=NULL,$activeTop=NULL); $city = $getCityData->fetch_assoc(); echo $city['city_name']?></td>
                    <td><?php echo $row['location_name'];?></td>
                    <td><?php if ($row['status']==0) { echo "<span class='label label-outline-success check_active open_cursor' data-incId=".$row['id']." data-status=".$row['status']." data-tbname='lkp_locations'>Active</span>" ;} else { echo "<span class='label label-outline-info check_active open_cursor' data-status=".$row['status']." data-incId=".$row['id']." data-tbname='lkp_locations'>In Active</span>" ;} ?></td>
                    <td> <a href="edit_lkp_locations.php?uid=<?php echo $row['id']; ?>"><i class="zmdi zmdi-edit"></i></a></td>
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
  