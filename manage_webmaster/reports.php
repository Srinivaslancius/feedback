<?php include_once 'admin_includes/main_header.php'; ?>
<?php $getUsersData = getAllDataWithActiveRecent('client_admin_users'); $i=1; ?>
     
      <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <h3 class="m-t-0 m-b-5">Reports</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Client Name</th>
                    <th>Mobile No.</th>
                    <th>Remember Name</th>
                    <th>Good</th>
                    <th>Average</th>
                    <th>Poor</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $getUsersData->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['client_name'];?></td>
                    <td><?php echo $row['client_mobile'];?></td>
                    <td><?php echo $row['remember_name'];?></td>
                    <td><?php $sql="SELECT * from tab_mobile_feedbacks WHERE client_admin_id = '".$row['id']."' AND feedback_status  = 'Good'";
                  $result = $conn->query($sql);
                  $noRows = $result->num_rows;
                  echo $noRows?></td>
                    <td><?php $sql="SELECT * from tab_mobile_feedbacks WHERE  client_admin_id = '".$row['id']."' AND feedback_status  = 'Average'";
                  $result = $conn->query($sql);
                  $noRows = $result->num_rows;
                  echo $noRows?></td>
                    <td><?php $sql="SELECT * from tab_mobile_feedbacks WHERE  client_admin_id = '".$row['id']."' AND feedback_status  = 'Poor' ";
                  $result = $conn->query($sql);
                  $noRows = $result->num_rows;
                  echo $noRows?></td>
                  <td><a href="tabs_list.php?cid=<?php echo $row['id']; ?>"><i class="zmdi zmdi-eye zmdi-hc-fw" data-toggle="modal" data-target="#<?php echo $row['id']; ?>" class=""></i></a></td>
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
  