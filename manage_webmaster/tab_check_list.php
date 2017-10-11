<?php include_once 'admin_includes/main_header.php'; 
  $sql = "SELECT tab_ref_name, check_list_name, emp_id, emp_name, category, created_at From save_check_list "; $i = 1;
  $result = $conn->query($sql);
?>

     <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <!-- <a href="add_categories.php" style="float:right"></a> -->
            <h3 class="m-t-0 m-b-5">Tab Check List</h3>            
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Tab reference Name</th>
                    <th>Check List Name</th>
                    <th>Employee Id</th>
                    <th>Employee Name</th>
                    <th>Category</th>
                    <th>Created At</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $result->fetch_assoc()) { ?>
                  <tr>
                     <td><?php echo $i;?></td>
                    <td><?php echo $row['tab_ref_name'];?></td>
                    <td><?php echo $row['check_list_name'];?></td>
                    <td><?php echo $row['emp_id'];?></td>
                    <td><?php echo $row['emp_name'];?></td>
                    <td><?php echo $row['category'];?></td>
                    <td><?php echo $row['created_at'];?></td>
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