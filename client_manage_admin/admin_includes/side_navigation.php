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
            <!-- <li class="with-sub">
              <a href="#" aria-haspopup="true">
                <span class="menu-icon">
                  <i class="zmdi zmdi-accounts zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Users</span>
              </a>
              <ul class="sidebar-submenu collapse">
                <li class="menu-subtitle">Users</li>
                <li class="<?php if($page_name == 'admin_users.php' || $page_name == 'add_admin_users.php' || $page_name == 'edit_admin_users.php') { echo "active"; } ?>"><a href="admin_users.php">Super Admin</a></li> 
                <li class="<?php if($page_name == 'users.php' || $page_name == 'add_users.php' || $page_name == 'edit_users.php') { echo "active"; } ?>"><a href="users.php">Client Admin</a></li>
              </ul>
<<<<<<< HEAD
            </li>
            <!-- <li  class="<?php if($page_name == 'banners.php' || $page_name == 'add_banners.php' || $page_name == 'edit_banners.php' ) { echo "active"; } ?>">
              <a href="banners.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-collection-image zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Banners</span>
              </a>
            </li> -->
            <!-- <li  class="<?php if($page_name == 'content_pages.php' || $page_name == 'add_content_pages.php' || $page_name == 'edit_content_pages.php') { echo "active"; } ?>">
              <a href="content_pages.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-collection-item  zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Content Pages</span>
              </a>
            </li> -->
            <li  class="<?php if($page_name == 'categories.php' || $page_name == 'add_categories.php' || $page_name == 'edit_categories.php') { echo "active"; } ?>">
              <a href="categories.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-store zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Categories</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'sub_categories.php' || $page_name == 'add_sub_categories.php' || $page_name == 'edit_sub_categories.php') { echo "active"; } ?>">
              <a href="sub_categories.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-store zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Sub Categories</span>
              </a>
            </li>
            <!-- <li  class="<?php if($page_name == 'products.php' || $page_name == 'add_products.php' || $page_name == 'edit_products.php') { echo "active"; } ?>">
              <a href="products.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-shopping-basket zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Products</span>
              </a>
            </li> -->
            <!-- <li  class="<?php if($page_name == 'orders.php') { echo "active"; } ?>">
              <a href="orders.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Orders</span>
              </a>
            </li> -->
            <li  class="<?php if($page_name == 'change_password.php') { echo "active"; } ?>">
              <a href="change_password.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-account-box-mail zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Change Password</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'feedback_options.php' || $page_name == 'add_feedback_options.php' || $page_name == 'edit_feedback_options.php') { echo "active"; } ?>">
              <a href="feedback_options.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-account-box-mail zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Feedback Options</span>
              </a>
            </li> 
            <!-- <li  class="<?php if($page_name == 'product_offers.php' || $page_name == 'add_product_offers.php' || $page_name == 'edit_product_offers.php') { echo "active"; } ?>">
              <a href="product_offers.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-shopping-basket zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Offers</span>
              </a>
            </li> -->
            </li>
            <!-- <li  class="<?php if($page_name == 'customer_enqueries.php') { echo "active"; } ?>">
              <a href="customer_enqueries.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-account-box-mail zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Customer Enqueries</span>
              </a>
=======
>>>>>>> baef6edf9c287e77c9ee3bc7c9cd9907e490a9aa
            </li> -->
            
          </ul>
        </div>
      </div>