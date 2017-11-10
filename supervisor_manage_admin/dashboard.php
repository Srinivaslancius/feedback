<?php include_once 'admin_includes/main_header.php'; 
$id = $_SESSION['supervisor_admin_user_name'];
?>
      <div class="site-content">
          <?php          
          $sql = "SELECT * FROM tab_mobile_feedbacks WHERE supervisor_admin_id = '$id' GROUP BY tab_id";
          $result1 = $conn->query($sql);
          //$row = $result->fetch_assoc();          
          //$res = $row['tab_id'];
          //$tab_id = $row['tab_id'];
          //for ($i=$tab_id; $i <= $res ; $i++) { 

          while($row1 = $result1->fetch_assoc()) {
               $tab_id = $row1['tab_id'];
            ?>
        <div class="row">
          <?php
          $getTabName = $conn->query("SELECT tab_ref_name FROM tabs_registration WHERE id = '$tab_id' ");
          $getTabName1 = $getTabName->fetch_assoc(); ?>
          <h1>&nbsp;&nbsp;<?php echo $getTabName1['tab_ref_name'];?></h1>
          <div class="col-md-3 col-sm-3">
            <div class="widget widget-tile-2 bg-success m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Good</div>
                <div class="wt-number"><?php
                $sql="SELECT * from tab_mobile_feedbacks WHERE  supervisor_admin_id = '$id' AND feedback_status  = 'Good' AND tab_id='$tab_id'";
                  $result = $conn->query($sql);
                  $noRows = $result->num_rows;
                  echo $noRows;?>
                </div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-mood zmdi-hc-fw"></i>
              </div>
            </div>
          </div>
          <a href="average_report.php?tabid=<?php echo $tab_id;?>&superVisorId=<?php echo $id; ?>">
          <div class="col-md-3 col-sm-3">
            <div class="widget widget-tile-2 bg-warning m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Average</div>
                <div class="wt-number"><?php
                $sql="SELECT * from tab_mobile_feedbacks WHERE  feedback_status  = 'Average' AND supervisor_admin_id = '$id' AND tab_id='$tab_id'";
                  $result = $conn->query($sql);
                  $noRows = $result->num_rows;
                  echo $noRows;?>
                </div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-mood zmdi-hc-fw"></i>
              </div>
            </div>
          </div>
          </a>
          <a href="poor_report.php?tabid=<?php echo $tab_id;?>&superVisorId=<?php echo $id; ?>">
          <div class="col-md-3 col-sm-3">
            <div class="widget widget-tile-2 bg-danger m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Poor</div>
                <div class="wt-number"><?php
                $sql="SELECT * from tab_mobile_feedbacks WHERE  supervisor_admin_id = '$id' AND feedback_status  = 'Poor' AND tab_id='$tab_id'";
                  $result = $conn->query($sql);
                  $noRows = $result->num_rows;
                  echo $noRows?>
                </div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-mood-bad zmdi-hc-fw"></i>
              </div>
            </div>
          </div>
          </a>
        </div>
        <?php } ?>

       <!--  <div class="col-md-6 m-b-30">
          <h4 class="m-t-0 m-b-30">Pie chart</h4>
          <div id="pie" style="height: 300px"></div>
        </div> -->


      </div>
     <?php include_once 'admin_includes/footer.php'; ?>
     