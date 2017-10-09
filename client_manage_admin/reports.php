<?php include_once 'admin_includes/main_header.php'; 
$id = $_SESSION['client_admin_user_id'];
?>
      <div class="site-content">
          <?php
          $sql = $conn->query("SELECT COUNT(DISTINCT tab_id) AS total FROM tab_mobile_feedbacks");
          $row = $sql->fetch_assoc();
          $res = $row['total'];
          for ($i=1; $i <= $res ; $i++) { ?>
        <div class="row">
          <h1>Tab <?php echo $i?></h1>
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
          <a href="average_report.php?uid=<?php echo $i;?>">
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
          <a href="poor_report.php?uid=<?php echo $i;?>">
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
     