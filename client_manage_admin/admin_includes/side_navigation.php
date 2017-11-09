<?php
    $currentFile = $_SERVER["PHP_SELF"];
    $parts = Explode('/', $currentFile);
    $page_name = $parts[count($parts) - 1];
?>
<div class="site-left-sidebar">
        <div class="sidebar-backdrop"></div>
        <div class="custom-scrollbar">
          <ul class="sidebar-menu">
            <li class="menu-title">Menu</li>
             <li  class="<?php if($page_name == 'dashboard.php') { echo "active"; } ?>">
              <a href="dashboard.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Dashboard</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'reports.php' || $page_name == 'average_report.php' || $page_name == 'poor_report.php') { echo "active"; } ?>">
              <a href="reports.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-account-box-mail zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Reports</span>
              </a>
            </li>
            <li class="with-sub">
              <a href="#" aria-haspopup="true">
                <span class="menu-icon">
                  <i class="zmdi zmdi-accounts zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Admins</span>
              </a>
              <ul class="sidebar-submenu collapse">
                <li class="menu-subtitle">Admins</li> 
                <li class="<?php if($page_name == 'users.php' || $page_name == 'add_users.php' || $page_name == 'edit_users.php') { echo "active"; } ?>"><a href="users.php">Supervisor Admin</a></li>
              </ul>
            </li>
            
                <li  class="<?php if($page_name == 'tabs_registration.php' || $page_name == 'add_tabs_registration.php' || $page_name == 'edit_tabs_registration.php') { echo "active"; } ?>">
                  <a href="tabs_registration.php" aria-haspopup="true">
                    <span class="menu-icon">
                       <i class="zmdi zmdi-store zmdi-hc-fw"></i>
                    </span>
                    <span class="menu-text">Tabs Registration</span>
                  </a>
                </li>
            <?php $cid = $_SESSION['client_admin_user_id'];
              $sql = "SELECT * FROM client_admin_users WHERE id = '$cid' AND client_ads_status = 0";
              $res = $conn->query($sql);
              $noRows = $res->num_rows;
              ?>
              <?php if($noRows!=0){ ?>
            <li  class="<?php if($page_name == 'advertisement.php' || $page_name == 'add_advertisement.php' || $page_name == 'edit_advertisement.php') { echo "active"; } ?>">
              <a href="advertisement.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-store zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Advertisement</span>
              </a>
            </li>
            <?php }?>
            <li  class="<?php if($page_name == 'change_password.php') { echo "active"; } ?>">
              <a href="change_password.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-account-box-mail zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Change Password</span>
              </a>
            </li>
          </ul>
        </div>
      </div>