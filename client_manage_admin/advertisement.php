<?php include_once 'admin_includes/main_header.php'; ?>
<?php $getAdvertisementData = getAllDataWithActiveRecent('client_advertisements'); $i=1; ?>
      <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <a href="add_advertisement.php" style="float:right">Add Advertisement</a>
            <h3 class="m-t-0 m-b-5">Advertisements</h3>            
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Add Name</th>
                    <th>Add Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $getAdvertisementData->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['title'];?></td>
                    <td><img src="<?php echo $base_url . 'uploads/advertisement_images/'.$row['image'] ?>" height="100" width="100"/></td>
                    <td><?php if ($row['status']==0) { echo "<span class='label label-outline-success check_active open_cursor' data-incId=".$row['id']." data-status=".$row['status']." data-tbname='client_advertisements'>Active</span>" ;} else { echo "<span class='label label-outline-info check_active open_cursor' data-status=".$row['status']." data-incId=".$row['id']." data-tbname='client_advertisements'>In Active</span>" ;} ?></td>
                    <td> <a href="edit_advertisement.php?bid=<?php echo $row['id']; ?>"><i class="zmdi zmdi-edit"></i></a></td>
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