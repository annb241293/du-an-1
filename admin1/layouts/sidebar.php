<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="<?= ADMIN_URL ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="ion ion-bag"></i>
            <span>Thành viên</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= ADMIN_URL . "users" ?>"><i class="fa fa-circle-o"></i>Danh sách</a></li>
            <li><a href="<?= ADMIN_URL . "users/add.php" ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= ADMIN_URL . "products" ?>"><i class="fa fa-circle-o"></i>Danh sách</a></li>
            <li><a href="<?= ADMIN_URL . "products/add.php" ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>