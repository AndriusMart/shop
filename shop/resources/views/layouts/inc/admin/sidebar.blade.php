<nav class="sidebar sidebar-offcanvas active" >

  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="dashboard">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-item" aria-expanded="false" aria-controls="ui-item">
        <i class="mdi mdi-shape-outline menu-icon"></i>
        <span class="menu-title">Items</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-item">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('i_index') }}">List</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('i_create') }}">Add new</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-subc" aria-expanded="false" aria-controls="ui-subc">
        <i class="mdi mdi-sitemap menu-icon"></i>
        <span class="menu-title">SubCategories</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-subc">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('subc_index') }}">List</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('subc_create') }}">Add new</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-cat" aria-expanded="false" aria-controls="ui-cat">
        <i class="mdi mdi-sitemap menu-icon"></i>
        <span class="menu-title">Categories</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-cat">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('c_index') }}">List</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('c_create') }}">Add new</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
        <i class="mdi mdi-shape-outline menu-icon"></i>
        <span class="menu-title">Orders</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-orders">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('i_index') }}">List</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="mdi mdi-account menu-icon"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('index')}}"> Home </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('list')}}"> List </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('cart') }}"> Cart </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
        </ul>
      </div>
    </li>
  </ul>

</nav>
