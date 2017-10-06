<?php include_once 'admin_includes/main_header.php'; ?>
      <div class="site-content">
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <div class="widget widget-tile-2 bg-primary m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Supervisor Admin</div>
                <div class="wt-number"><?php echo getRowsCount('supervisors_admin_users')?></div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-accounts"></i> 
              </div>
            </div>
          </div>
        
          <div class="col-md-3 col-sm-3">
            <div class="widget widget-tile-2 bg-success m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Good</div>
                <div class="wt-number"><?php echo getRowsCount('feedback_options')?></div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-mood zmdi-hc-fw"></i>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-3">
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
          <div class="col-md-3 col-sm-3">
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
        <div>
        <?php
          $client_name = $_SESSION['client_admin_user_name'];
          $sql = "SELECT * FROM client_admin_users WHERE client_name = '$client_name' AND status=0";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
        ?>
        <?php if ($row) { ?>
        <center><table>
          <h1 style="text-align:center;">Client Information</h1>
          <tr>
            <td>Name: </td>
            <td><?php echo $row['client_name'];?></td>
          </tr>
          <tr>
            <td>Email: </td>
            <td><?php echo $row['client_email'];?></td>
          </tr>
          <tr>
            <td>Mobile: </td>
            <td><?php echo $row['client_mobile'];?></td>
          </tr>
          <tr>
            <td>Country: </td>
            <td><?php $getCountryData =  getDataFromTables('lkp_countries',$status=NULL,'id',$row['client_country_id'],$activeStatus=NULL,$activeTop=NULL); $country = $getCountryData->fetch_assoc(); echo $country['country_name']?></td>
          </tr>
          <tr>
            <td>State: </td>
            <td><?php $getStateData =  getDataFromTables('lkp_states',$status=NULL,'id',$row['client_state_id'],$activeStatus=NULL,$activeTop=NULL); $state = $getStateData->fetch_assoc(); echo $state['state_name']?></td>
          </tr>
          <tr>
            <td>City: </td>
            <td><?php $getCityData =  getDataFromTables('lkp_cities',$status=NULL,'id',$row['client_city_id'],$activeStatus=NULL,$activeTop=NULL); $city = $getCityData->fetch_assoc(); echo $city['city_name']?></td>
          </tr>
          <tr>
            <td>Status: </td>
            <td>Active</td>
          </tr>
          <tr>
            <td>Created Account Date: </td>
            <td><?php echo $row['created_at'];?></td>
          </tr>
          <tr>
        </table></center>
        <?php } ?>
        </div>

        <style>
          table {
              font-family: arial, sans-serif;
              border-collapse: collapse;
              width: 50%;
          }

          td {
              text-align: center;
              padding: 8px;
          }

          tr:nth-child(even) {
              background-color: #dddddd;
          }
          </style>

       <!--  <div class="col-md-6 m-b-30">
          <h4 class="m-t-0 m-b-30">Pie chart</h4>
          <div id="pie" style="height: 300px"></div>
        </div> -->


      </div>
     <?php include_once 'admin_includes/footer.php'; ?>
     