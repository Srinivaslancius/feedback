<?php include_once 'admin_includes/main_header.php'; ?>
<?php $sql = "SELECT * From assign_check_list GROUP BY category_id"; $i = 1;
    $result = $conn->query($sql);
?>
     <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <a href="add_assign_check_list.php" style="float:right">Add Assign Check List</a>
            <h3 class="m-t-0 m-b-5">Assign Check List</h3>            
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $result->fetch_assoc()) { ?>
                  <tr>
                     <td><?php echo $i;?></td>
                     <td><?php $getCategories = getDataFromTables('categories',$status=NULL,'id',$row['category_id'],$activeStatus=NULL,$activeTop=NULL);
                      $getCategory = $getCategories->fetch_assoc(); echo $getCategory['category_name']; ?></td>
                    <!-- <td><?php if ($row['status']==0) { echo "<span class='label label-outline-success check_active open_cursor' data-incId=".$row['id']." data-status=".$row['status']." data-tbname='assign_check_list'>Active</span>" ;} else { echo "<span class='label label-outline-info check_active open_cursor' data-status=".$row['status']." data-incId=".$row['id']." data-tbname='assign_check_list'>In Active</span>" ;} ?></td> -->
                    <td> <a href="edit_assign_check_list.php?bid=<?php echo $row['id']; ?>"> <i class="zmdi zmdi-edit"></i> &nbsp; </a> <!-- <a href="#"><i class="zmdi zmdi-eye zmdi-hc-fw" data-toggle="modal" data-target="#<?php echo $row['id']; ?>" class=""></i></a> --> <a href="delete_assign_check_list.php?uid=<?php echo $row['id']; ?>"><i class="zmdi zmdi-delete zmdi-hc-fw" onclick="return confirm('Are you sure you want to delete?')"></i></a></td>
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