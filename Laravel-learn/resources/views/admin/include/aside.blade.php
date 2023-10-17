
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('/AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Phone Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block" href="javascript:void">
            <i class="fa-regular fa-user"></i>
            {{ Auth::user()->name }}
        </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa-solid fa-house"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}" class="nav-link active">
                    <i class="fa-solid fa-list nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.posts.index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Post</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.products.index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link active">
                  <i class="fa-solid fa-user nav-icon"></i>
                  <p>user</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.carts.index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>cart</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.profiles.index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.wishlists.index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Whislish</p>
                </a>
              </li>

            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
