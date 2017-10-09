<?php include_once 'admin_includes/main_header.php'; ?>
      <div class="site-content">
        <div class="row">
          <div class="col-md-4 col-sm-5">
            <div class="widget widget-tile-2 bg-success m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Good
                  <span class="t-caret text-success">
                    <i class="zmdi zmdi-caret-up"></i>
                  </span>
                </div>
                <div class="wt-number"><?php echo getRowsCount('feedback_options')?></div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-mood zmdi-hc-fw"></i>
              </div>
            </div> 
          </div>
          <div class="col-md-4 col-sm-5">
            <div class="widget widget-tile-2 bg-warning m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Average</div>
                <div class="wt-number"><?php echo getRowsCount('feedback_options')?></div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-mood zmdi-hc-fw"></i>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-5">
            <div class="widget widget-tile-2 bg-danger m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Poor</div>
                <div class="wt-number"><?php echo getRowsCount('feedback_options')?></div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-mood-bad zmdi-hc-fw"></i>
              </div>
            </div>
          </div>
          
        </div>

       <!--  <div class="col-md-6 m-b-30">
          <h4 class="m-t-0 m-b-30">Pie chart</h4>
          <div id="pie" style="height: 300px"></div>
        </div> -->


      </div>
     <?php include_once 'admin_includes/footer.php'; ?>
     