<?php include_once 'admin_includes/main_header.php'; ?>
<?php $getAdv = "SELECT * FROM client_advertisements"; $getBannersData = $conn->query($getAdv); $i=1; ?>
     <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <!-- <a href="add_banners.php" style="float:right">Add Banners</a> -->
            <h3 class="m-t-0 m-b-5">Advertisements</h3>            
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Client Name</th>
                    <th>Add</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $getBannersData->fetch_assoc()) { ?>

                  <?php $clntId = $row['client_admin_id']; 
                        $clientName = "SELECT * FROM client_admin_users WHERE id='$clntId' "; 
                        $getCntName = $conn->query($clientName); 
                        $getClient = $getCntName->fetch_assoc();                         
                  ?>
                  <tr>
                     <td><?php echo $i;?></td>
                    <td><?php echo $getClient['client_name'];?></td>
                    <td><img src="<?php echo $base_url . 'uploads/advertisement_images/'.$row['banner'] ?>" height="100" width="100"/></td>
                    <td><?php if ($row['status']==0) { echo "<span class='label label-outline-success check_active open_cursor' data-incId=".$row['id']." data-status=".$row['status']." data-tbname='banners'>Active</span>" ;} else { echo "<span class='label label-outline-info check_active open_cursor' data-status=".$row['status']." data-incId=".$row['id']." data-tbname='banners'>In Active</span>" ;} ?></td>
                    <td> <!-- <a href="edit_banners.php?bid=<?php echo $row['id']; ?>"> <i class="zmdi zmdi-edit"></i> &nbsp; </a>  <a href="delete_banners.php?bid=<?php echo $row['id']; ?>"><i class="zmdi zmdi-delete zmdi-hc-fw" onclick="return confirm('Are you sure you want to delete?')"></i></a> --></td>
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