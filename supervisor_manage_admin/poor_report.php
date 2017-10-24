<?php include_once 'admin_includes/main_header.php'; ?>
<?php $id = $_SESSION['supervisor_admin_user_name'];
$sql = "SELECT * FROM tab_mobile_feedbacks WHERE supervisor_admin_id='$id' AND feedback_status='Poor'"; $i=1; $getUsersData = $conn->query($sql);?>
     
      <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <h3 class="m-t-0 m-b-5">Poor Reports</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Tab Name</th>
                    <th>Feedback Status</th>
                    <th>Created Date</th>
                    <th>FeedBack Option</th>
                    <th>FeedBack Category</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $getUsersData->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php $getTabsData =  getDataFromTables('tabs_registration',$status=NULL,'id',$row['tab_id'],$activeStatus=NULL,$activeTop=NULL); $tab = $getTabsData->fetch_assoc(); echo $tab['tab_ref_name']?></td>
                    <td><?php echo $row['feedback_status'];?></td>
                    <td><?php echo date('m/d/Y',strtotime($row['created_at']));?></td>
                    <td><?php echo $row['feedback_option'];?></td>
                    <td><?php echo $row['category'];?></td>
                  </tr>
                  <?php  $i++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6 m-b-30">
          <h4 class="m-t-0 m-b-30">Pie chart</h4>
          <div id="pie" style="height: 300px"></div>
        </div>
      </div>
      
   <?php include_once 'admin_includes/footer.php'; ?>
   <script src="js/tables-datatables.min.js"></script>
   <script src="js/charts-flot.min.js"></script>
     <script type="text/javascript">
            $(document).ready(function() {
                
                var pie = function () {
                    var data = [{
                        label: "No Tolilet Paper",
                        data: <?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE supervisor_admin_id='$id' AND feedback_status='Average' AND feedback_option = 'No Tolilet Paper'";
                          $result = $conn->query($sql);
                          $noRows = $result->num_rows;
                          echo $noRows ?>,
                        color: "#4D4D4D",
                    }, {
                        label: "Foul Smell",
                        data: <?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE supervisor_admin_id='$id' AND feedback_status='Average' AND feedback_option = 'Foul Smell'";
                          $result = $conn->query($sql);
                          $noRows = $result->num_rows;
                          echo $noRows ?>,
                        color: "#5DA5DA",
                    }, {
                        label: "Litter Bin Full",
                        data: <?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE supervisor_admin_id='$id' AND feedback_status='Average' AND feedback_option = 'Litter Bin Full'";
                          $result = $conn->query($sql);
                          $noRows = $result->num_rows;
                          echo $noRows ?>,
                        color: "#FAA43A",
                    }, {
                        label: "Wet Floor",
                        data: <?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE supervisor_admin_id='$id' AND feedback_status='Average' AND feedback_option = 'Wet Floor'";
                          $result = $conn->query($sql);
                          $noRows = $result->num_rows;
                          echo $noRows ?>,
                        color: "#60BD68",
                    }, {
                        label: "Dirty Basin",
                        data: <?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE supervisor_admin_id='$id' AND feedback_status='Average' AND feedback_option = 'Dirty Basin'";
                          $result = $conn->query($sql);
                          $noRows = $result->num_rows;
                          echo $noRows ?>,
                        color: "#F17CB0",
                    }, {
                        label: "Dirty Tolilet Bowl",
                        data: <?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE supervisor_admin_id='$id' AND feedback_status='Average' AND feedback_option = 'Dirty Tolilet Bowl'";
                          $result = $conn->query($sql);
                          $noRows = $result->num_rows;
                          echo $noRows ?>,
                        color: "#B2912F",
                    }, {
                        label: "Temparature",
                        data: <?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE supervisor_admin_id='$id' AND feedback_status='Average' AND feedback_option = 'Temparature'";
                          $result = $conn->query($sql);
                          $noRows = $result->num_rows;
                          echo $noRows ?>,
                        color: "#B276B2",
                    }, {
                        label: "Faulty Equipment",
                        data: <?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE supervisor_admin_id='$id' AND feedback_status='Average' AND feedback_option = 'Faulty Equipment'";
                          $result = $conn->query($sql);
                          $noRows = $result->num_rows;
                          echo $noRows ?>,
                        color: "#DECF3F",
                    }];
                    var options = {
                        series: {
                            pie: {
                                show: true
                            }
                        },
                        legend: {
                            labelFormatter: function(label, series){
                                return '<span class="pie-chart-legend">'+label+'</span>';
                            }
                        },
                        grid: {
                            hoverable: true
                        },
                        tooltip: true,
                        tooltipOpts: {
                            content: "%p.0%, %s",
                            shifts: {
                                x: 20,
                                y: 0
                            },
                            defaultTheme: false
                        }
                    };
                    $.plot($("#pie"), data, options);
                };

                pie();
               
            });
        </script>
     