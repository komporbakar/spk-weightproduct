<ul class="navbar-nav sidebar accordion" id="accordionSidebar" style="background-color: #FEF9EF">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img class="img-fluid" src="{{ asset('img/perkemi.png') }}" style="width: 50px;">
                </div>
                <div class="sidebar-brand-text mx-3" style="color: #000;">SPK KEMPO </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt" style="color: #000;"></i>
                    <span style="color: #000;">Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading" style="color: #000;">
                Interface
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item {{ Request::is('admin/kriteria*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kriteria.index') }}">
                    <i class="fas fa-fw fa-chart-area" style="color: #000;"></i>
                    <span style="color: #000;">Data Kriteria</span></a>
            </li>
            <li class="nav-item  {{ Request::is('admin/subkriteria*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('subkriteria.index') }}">
                    <i class="fas fa-fw fa-chart-area" style="color: #000;"></i>
                    <span style="color: #000;">Sub Kriteria</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item  {{ Request::is('admin/alternatif*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('alternatif.index') }}">
                    <i class="fas fa-fw fa-table" style="color: #000;"></i>
                    <span style="color: #000;">Data Alternatif</span></a>
            </li>

            <li class="nav-item  {{ Request::is('admin/nilai*') || Request::is('admin/hasil') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('nilai.index') }}">
                    <i class="fas fa-fw fa-table" style="color: #000;"></i>
                    <span style="color: #000;">Nilai</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline" style="color: #000;">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            

        </ul>