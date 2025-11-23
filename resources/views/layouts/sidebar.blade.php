<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/') }}" class="brand-link">
    <img src="{{ asset('assets/img/mandarin.png') }}" alt="Logo"
         class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Mandarin Feast</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" 
          data-widget="treeview" role="menu" data-accordion="false">
        
        <!-- Menu Utama -->
        <li class="nav-item">
          <a href="{{ url('/') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Pesan -->
        <li class="nav-item">
          <a href="{{ url('/pesanan') }}" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>Pesan</p>
          </a>
        </li>

        <!-- Tabel Dropdown -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Tabel
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/menu') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Menu</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/pelanggan') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pelanggan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/pembayaran') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pembayaran</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Tabel Dropdown PEGAWAI -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Tabel Pegawai
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/pelayan') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pelayan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/kasir') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kasir</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/koki') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Koki</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
