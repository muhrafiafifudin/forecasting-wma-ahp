<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li>
                    <a href="{{ url('/') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i><span> Dashboard </span>
                    </a>
                </li>
                <li class="menu-title">Data Master</li>
                <li>
                    <a href="{{ route('product.index') }}" class="waves-effect"><i class="mdi mdi-calendar-check"></i><span> Produk (Alternatif) </span></a>
                </li>
                <li>
                    <a href="{{ route('criteria.index') }}" class="waves-effect"><i class="mdi mdi-calendar-check"></i><span> Kriteria </span></a>
                </li>
                <li class="menu-title">Peramalan</li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-location"></i><span> Peramalan WMA <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{ route('wma.actual-sale') }}">Data Aktual</a></li>
                    </ul>
                    <ul class="submenu">
                        <li><a href="{{ route('wma.choose-period') }}">Hasil</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-location"></i><span> Peramalan AHP <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="#">Perbandingan Alternatif</a></li>
                        <li><a href="#">Perbandingan Kriteria</a></li>
                    </ul>
                </li>
                <li class="menu-title">Laporan</li>
                <li>
                    <a href="#" class="waves-effect"><i class="mdi mdi-calendar-check"></i><span> Hasil </span></a>
                </li>
            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->
</div>
