
<link rel="stylesheet" type="text/css" href="assets/css/admin_menu_style.css">
<script type="text/javascript" src="assets/js/admin_menu.js"></script>

<!-- sidebar-header  -->

<div class="page-wrapper chiller-theme toggled m-0">

  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>

  <nav id="sidebar" class="sidebar-wrapper">
  <div class="sidebar-content">
      
<!-- sidebar-search  -->
    <div class="sidebar-search">
    <div>
        <div class="input-group">
            <input type="text" class="form-control search-menu" placeholder="Search...">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </div>
        </div>
    </div>
    </div>
      

    <div class="sidebar-menu">
    <ul>

        <li class="sidebar active">
            <a href="#">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>    
            </a>
        </li>

        <li class="sidebar">
            <a href="products.php">
              <i class="fa fa-shopping-cart"></i>
              <span>Products</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Manage Products</a>
                </li>
                <li>
                  <a href="#">Add Products</a>
                </li>
                <li>
                  <a href="#">Archive Products</a>
                </li>
              </ul>
            </div>
        </li>

        <li class="sidebar">
            <a href="category.php">
              <i class="fa fa-share-square"></i>
              <span>Category</span>    
            </a>
        </li>

        <li class="sidebar">
            <a href="supplier.php">
              <i class="fa fa-share-square"></i>
              <span>Supplier</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Manage Supplier</a>
                </li>
                <li>
                  <a href="#">Add Supplier</a>
                </li>
                <li>
                  <a href="#">Archive Supplier</a>
                </li>
              </ul>
            </div>
        </li>

        <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-chart-line"></i>
              <span>Reports</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="sales.php">Sales</a>
                </li>
                <li>
                  <a href="#">Inventory</a>
                </li>
                <li>
                  <a href="#">Supplier</a>
                </li>
              </ul>
            </div>
        </li>

    </ul>
    </div>

  </div>
  </nav>

</div>
