<?php include_once 'admin_includes/main_header.php'; 
$id = $_SESSION['client_admin_user_id'];
?>
      <div class="site-content">
          <?php
          $sql = $conn->query("SELECT tab_id,max(DISTINCT tab_id) AS total FROM tab_mobile_feedbacks WHERE client_admin_id = '$id'");
          $row = $sql->fetch_assoc();
          $res = $row['total'];
          $tab_id = $row['tab_id'];
          for ($i=$tab_id; $i <= $res ; $i++) { ?>
        <div class="row">
          <?php
          $getTabName = $conn->query("SELECT tab_ref_name FROM tabs_registration WHERE created_client_admin_id = '$id' AND id='$i'");
          $getTabName1 = $getTabName->fetch_assoc(); ?>
          <h1>&nbsp;&nbsp;<?php echo $getTabName1['tab_ref_name'];?></h1>
          <div class="col-md-3 col-sm-3">
            <div class="widget widget-tile-2 bg-success m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Good</div>
                <div class="wt-number"><?php
                $sql="SELECT * from tab_mobile_feedbacks WHERE  client_admin_id = '$id' AND feedback_status  = 'Good' AND tab_id='$i'";
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
          <a href="average_report.php?tabid=<?php echo $i;?>&clientid=<?php echo $id; ?>">
          <div class="col-md-3 col-sm-3">
            <div class="widget widget-tile-2 bg-warning m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Average</div>
                <div class="wt-number"><?php
                $sql="SELECT * from tab_mobile_feedbacks WHERE  feedback_status  = 'Average' AND client_admin_id = '$id' AND tab_id='$i'";
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
          <a href="poor_report.php?tabid=<?php echo $i;?>&clientid=<?php echo $id; ?>">
          <div class="col-md-3 col-sm-3">
            <div class="widget widget-tile-2 bg-danger m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Poor</div>
                <div class="wt-number"><?php
                $sql="SELECT * from tab_mobile_feedbacks WHERE  client_admin_id = '$id' AND feedback_status  = 'Poor' AND tab_id='$i'";
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
     