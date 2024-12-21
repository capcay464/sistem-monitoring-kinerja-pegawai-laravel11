<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          </li>
          <li class="menu-header">Master Data</li>
          <li class="nav-item dropdown {{ Request::routeIs('pegawai','jabatan','bagian') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-user"></i> <span>Data Pegawai</span></a>
            <ul class="dropdown-menu">
              <li class="{{ request()->routeIs('pegawai') ? 'active' : '' }}"><a class="nav-link" href="{{ route('pegawai') }}">List Pegawai</a></li>
              <li class="{{ request()->routeIs('jabatan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('jabatan') }}">List Jabatan</a></li>
              <li class="{{ request()->routeIs('bagian') ? 'active' : '' }}"><a class="nav-link" href="{{ route('bagian') }}">List Bagian</a></li>
            </ul>
          </li>
          <li><a class="nav-link" href="{{ route('pegawai') }}"><i class="far fa-book"></i> <span>List Pegawai</span></a></li>
    
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
          </a>
        </div>
    </aside>
  </div>