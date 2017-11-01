<?php include_once 'admin_includes/main_header.php'; ?>
<?php $id = $_GET['tabid']; $cid = $_GET['clientid'];
if($id != 0) {
$sql = "SELECT * FROM tab_mobile_feedbacks WHERE client_admin_id = '$cid' AND tab_id=$id AND feedback_status='Poor'"; $i=1; $getUsersData = $conn->query($sql);?>
     
      <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <h3 class="m-t-0 m-b-5">Poor Reports</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <div class="col s12 m12 l12">                  
                <?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE client_admin_id = '$cid' AND tab_id=$id AND feedback_status='Poor' GROUP BY feedback_option"; $getUsersData1 = $conn->query($sql);?>
                  <div class="form-group col-md-3">                    
                    <select id="select-feedback-option" class="custom-select">
                       <option value="">Select FeedBack Option</option>
                        <?php while ($row = $getUsersData1->fetch_assoc()) { ?>
                          <option value="<?php echo $row['feedback_option']; ?>"><?php echo $row['feedback_option']; ?></option>
                        <?php } ?>
                    </select>
                  </div>
                  <?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE client_admin_id = '$cid' AND tab_id=$id AND feedback_status='Poor' GROUP BY category"; $getUsersData1 = $conn->query($sql);?>
                  <div class="form-group col-md-3">                    
                    <select id="select-category" class="custom-select">
                       <option value="">Select Category</option>
                        <?php while ($row = $getUsersData1->fetch_assoc()) { ?>
                          <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                        <?php } ?>
                    </select>                    
                  </div>
                </div>
                <div class="clear_fix"></div>
                <p id="date_filter">
                  <span id="date-label-from" class="date-label">From: </span><input class="date_range_filter date" type="text" id="datepicker_from" />
                  <span id="date-label-to" class="date-label">To:<input class="date_range_filter date" type="text" id="datepicker_to" />
                </p>
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
          <div class="chart-wrapper">
            <canvas id="pie-canvas3"></canvas>
          </div>
        </div>
      </div>
      <?php } 
        else {
        echo "<script>alert('There are no tabs');window.location='tabs_list.php';</script>";
      }
      ?>
   <?php include_once 'admin_includes/footer.php'; ?>
   <script src="js/tables-datatables.min.js"></script>
   <script src="js/charts-flot.min.js"></script>
     <script>
    function createChart(id, type, options) {
      var data = {
        labels: ['No Tolilet Paper', 'Foul Smell', 'Litter Bin Full','Wet Floor','Dirty Basin','Dirty Tolilet Bowl','Temparature','Faulty Equipment'],
        datasets: [
          {
            label: 'My First dataset',
            data: [<?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE client_admin_id = '$cid' AND tab_id=$id AND feedback_status='Poor' AND feedback_option = 'No Tolilet Paper'";
                          $result = $conn->query($sql);
                          $noRows = $result->num_rows;
                          echo $noRows ?>,<?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE client_admin_id = '$cid' AND tab_id=$id AND feedback_status='Poor' AND feedback_option = 'Foul Smell'";
                          $result = $conn->query($sql);
                          $noRows = $result->num_rows;
                          echo $noRows ?>,<?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE client_admin_id = '$cid' AND tab_id=$id AND feedback_status='Poor' AND feedback_option = 'Litter Bin Full'";
                          $result = $conn->query($sql);
                          $noRows = $result->num_rows;
                          echo $noRows ?>,<?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE client_admin_id = '$cid' AND tab_id=$id AND feedback_status='Poor' AND feedback_option = 'Wet Floor'";
                          $result = $conn->query($sql);
                          $noRows = $result->num_rows;
                          echo $noRows ?>,<?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE client_admin_id = '$cid' AND tab_id=$id AND feedback_status='Poor' AND feedback_option = 'Dirty Basin'";
                          $result = $conn->query($sql);
                          $noRows = $result->num_rows;
                          echo $noRows ?>,<?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE client_admin_id = '$cid' AND tab_id=$id AND feedback_status='Poor' AND feedback_option = 'Dirty Tolilet Bowl'";
                          $result = $conn->query($sql);
                          $noRows = $result->num_rows;
                          echo $noRows ?>,<?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE client_admin_id = '$cid' AND tab_id=$id AND feedback_status='Poor' AND feedback_option = 'Temparature'";
                          $result = $conn->query($sql);
                          $noRows = $result->num_rows;
                          echo $noRows ?>,<?php $sql = "SELECT * FROM tab_mobile_feedbacks WHERE client_admin_id = '$cid' AND tab_id=$id AND feedback_status='Poor' AND feedback_option = 'Faulty Equipment'";
                          $result = $conn->query($sql);
                          $noRows = $result->num_rows;
                          echo $noRows ?>],
            backgroundColor: [
              '#4D4D4D',
              '#5DA5DA',
              '#FAA43A',
              '#60BD68',
              '#F17CB0',
              '#B2912F',
              '#B276B2',
              '#4D4D4D'
            ]
          }
        ]
      };

      new Chart(document.getElementById(id), {
        type: type,
        data: data,
        options: options
      });
    }

    ['pie'].forEach(function (type) {
      createChart(type + '-canvas3', type, {
        responsive: true,
        maintainAspectRatio: false,
        pieceLabel: {
          render: 'percentage',
          // fontColor: function (args) {
          //   var rgb = hexToRgb(args.dataset.backgroundColor[args.index]);
          //   var threshold = 140;
          //   var luminance = 0.299 * rgb.r + 0.587 * rgb.g + 0.114 * rgb.b;
          //   return luminance > threshold ? 'black' : 'white';
          // },
          //precision: 2
        }
      });
    });
  </script>