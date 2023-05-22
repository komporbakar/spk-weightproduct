<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #BE5A83">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SPK ATLIT <sup>WP</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item {{ Request::is('admin/kriteria*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kriteria.index') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Kriteria</span></a>
            </li>
            <li class="nav-item  {{ Request::is('admin/subkriteria*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('subkriteria.index') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Sub Kriteria</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item  {{ Request::is('admin/alternatif*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('alternatif.index') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Alternatif</span></a>
            </li>

            <li class="nav-item  {{ Request::is('admin/nilai*') || Request::is('admin/hasil') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('nilai.index') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Nilai</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            

        </ul>