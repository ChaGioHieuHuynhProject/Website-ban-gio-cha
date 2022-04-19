<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?= RenderCSS("adminlte") ?>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li> -->
        <?php
        switch ($data["action"]) {
          case "Product": { ?>
              <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= Redirect("Admin", "Product") ?>/Create" class="nav-link">Tạo sản phẩm mới</a>
              </li>
            <?php break;
            }
          case "Order": { ?>
              <li class="nav-item d-none d-flex align-items-center">
                <form method="post">
                  <select name="filter-order-status">
                    <option value="">---Chọn trạng thái đơn hàng---</option>
                    <?php foreach ($data["statusList"] as $status) { ?>
                      <option value="<?= $status["id"] ?>" <?= (isset($_POST["filter-order-status"]) && $_POST["filter-order-status"] == $status["id"]) ? "selected" : "" ?>><?= $status["name"] ?></option>
                    <?php } ?>
                  </select>
                  <button class="btn btn-primary" type="submit"><i class="fa fa-filter" aria-hidden="true"></i></button>
                </form>
              </li>
            <?php break;
            }
          case "Banner": { ?>
              <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= Redirect("Admin", "Banner") ?>/Create" class="nav-link">Tạo banner mới</a>
              </li>
        <?php break;
            }
          case "QAA": { ?>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="<?= Redirect("Admin", "QAA") ?>/Create" class="nav-link">Tạo câu hỏi mới</a>
            </li>
          <?php }
          case "Stories": { ?>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="<?= Redirect("Admin", "Stories") ?>/Create" class="nav-link">Tạo câu chuyện mới</a>
            </li>
          <?php } 
        } ?>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Đăng xuất" href="<?= Redirect("Admin", "Logout") ?>" role="button">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= Redirect("Admin") ?>" class="brand-link">
        <img src="<?= ImageLink("Logo.png") ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Chả Giò Hiếu Huynh</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a id="DashBoard" href="<?= Redirect("Admin", "DashBoard") ?>" class=" nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a id="Product" href="<?= Redirect("Admin", "Product") ?>" class="nav-link">
                <i class="nav-icon fas fa-box-open"></i>
                <p>
                  Sản phẩm
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a id="Order" href="<?= Redirect("Admin", "Order") ?>" class="nav-link">
                <i class="nav-icon fas fa-file-invoice"></i>
                <p>
                  Đơn hàng
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a id="Contact" href="<?= Redirect("Admin", "Contact") ?>" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i>
                <p>
                  Liên hệ
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a id="QAA" href="<?= Redirect("Admin", "QAA") ?>" class="nav-link">
                <i class="nav-icon fas fa-circle-question"></i>
                <p>
                  Q&A
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a id="Stories" href="<?= Redirect("Admin", "Stories") ?>" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Câu chuyện
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a id="Banner" href="<?= Redirect("Admin", "Banner") ?>" class="nav-link">
                <i class="nav-icon fas fa-image"></i>
                <p>
                  Banner
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a id="MassUnit" href="<?= Redirect("Admin", "MassUnit") ?>" class="nav-link">
                <i class="nav-icon fas fa-money-bill"></i>
                <p>
                  Đơn vị khối lượng
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a id="UpdateInfo" href="<?= Redirect("Admin", "UpdateWebsiteInfo") ?>" class="nav-link">
                <i class="nav-icon fas fa-circle-info"></i>
                <p>
                  Cập nhật thông tin
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content will be here -->
      <section class="content">
        <main class="container-fluid">
          <?php require_once "./Views/Pages/Admin/{$data['page']}.php" ?>
        </main>
      </section>
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>
  </div>
  <?= RenderJs("bootstrap.bundle");
  RenderJs("adminlte") ?>
  <script>
    $("#<?= $data["action"] ?>").addClass("active")
  </script>
</body>

</html>