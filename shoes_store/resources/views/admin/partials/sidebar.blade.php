<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('admin_lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-ticket"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-ticket"></i> <span>Size</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ route('size.index') }}"><i class="fa fa-circle-o"></i> List Size </a></li>
          <li><a href="{{ route('size.create') }}"><i class="fa fa-circle-o"></i> New </a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-ticket"></i> <span>Color</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ route('color.index') }}"><i class="fa fa-circle-o"></i> List Color </a></li>
          <li><a href="{{ route('color.create') }}"><i class="fa fa-circle-o"></i> New </a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-ticket"></i> <span>Category</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i> List Category </a></li>
          <li><a href="{{ route('category.create') }}"><i class="fa fa-circle-o"></i> New </a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-ticket"></i> <span>Shoes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ route('shoes.index') }}"><i class="fa fa-circle-o"></i> List Shoes </a></li>
          <li><a href="{{ route('shoes.create') }}"><i class="fa fa-circle-o"></i> New </a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-ticket"></i> <span>Customer</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ route('customer.index') }}"><i class="fa fa-circle-o"></i> List Customers </a></li>
          <li><a href="{{ route('customer.create') }}"><i class="fa fa-circle-o"></i> New </a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-ticket"></i> <span>Banner</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ route('banner.index') }}"><i class="fa fa-circle-o"></i> List Banners </a></li>
          <li><a href="{{ route('banner.create') }}"><i class="fa fa-circle-o"></i> New </a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
