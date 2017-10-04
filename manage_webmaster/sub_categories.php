<?php include_once 'admin_includes/main_header.php'; ?>
<?php $getSubCategoriesData = getAllDataWithActiveRecent('sub_categories'); $i=1; ?>
     <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <a href="add_sub_categories.php" style="float:right">Add Sub Categories</a>
            <h3 class="m-t-0 m-b-5">Sub Categories</h3>            
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Category Name</th>
                    <th>Sub Category Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $getSubCategoriesData->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php $getCategories = getDataFromTables('categories',$status=NULL,'id',$row['category_id'],$activeStatus=NULL,$activeTop=NULL);
                    $getCategory = $getCategories->fetch_assoc(); echo $getCategory['category_name']; ?></td>
                    <td><?php echo $row['sub_category_name'];?></td>
                    <td><?php if ($row['status']==0) { echo "<span class='label label-outline-success check_active open_cursor' data-incId=".$row['id']." data-status=".$row['status']." data-tbname='sub_categories'>Active</span>" ;} else { echo "<span class='label label-outline-info check_active open_cursor' data-status=".$row['status']." data-incId=".$row['id']." data-tbname='sub_categories'>In Active</span>" ;} ?></td>
                    <td> <a href="edit_sub_categories.php?bid=<?php echo $row['id']; ?>"> <i class="zmdi zmdi-edit"></i> &nbsp; </a> <a href="#"><i class="zmdi zmdi-eye zmdi-hc-fw" data-toggle="modal" data-target="#<?php echo $row['id']; ?>" class=""></i></a></td>
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
                            <center><h4 class="modal-title">Sub Category Information</h4></center>
                          </div>
                        <div class="modal-body" id="modal_body">
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Sub Category Name: </div>
                            <div class="col-sm-6"><?php echo $row['sub_category_name'];?></div>
                          </div>
                          <?php
                          if(!empty($_POST["sub_category_id"])) {
                            $query ="SELECT * FROM sub_categories WHERE id = '" . $_POST["sub_category_id"] . "'";
                            $results = $conn->query($query);
                            $getFOptions = $results->fetch_assoc();
                            $getAllOptions = $getFOptions['subcat_feedback_options'];
                            $expOpt = explode(",",$getAllOptions);
                            //echo "<pre>"; print_r($expOpt); die;
                          ?>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Feedback Options: </div>
                            <div class="col-sm-6"><?php foreach ($expOpt as $key => $value) { 
                            $getfeedbackOpt = getDataFromTables('sub_categories',$status=NULL,'id',$value,$activeStatus=NULL,$activeTop=NULL);
                            $row = $getfeedbackOpt->fetch_assoc();
                          ?>
                            <input type="checkbox" name="feedback_options[]" value="<?php echo $value ?>"> <?php echo $row['feedback_option']; ?>
                          <?php
                            }
                            }
                          ?></div>
                          </div>
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