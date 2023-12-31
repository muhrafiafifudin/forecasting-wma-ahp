<div class="sidebar">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level">{{ ucfirst(Auth::user()->getRoleNames()->first()) }}</span>
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a href="{{ url('/') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Data Master</h4>
                </li>
                <li class="nav-item {{ request()->is('produk') ? 'active' : '' }}">
                    <a href="{{ route('product.index') }}">
                        <i class="fas fa-th-list"></i>
                        <p>Produk (Alternatif)</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('kriteria') ? 'active' : '' }}">
                    <a href="{{ route('criteria.index') }}">
                        <i class="fas fa-th-list"></i>
                        <p>Kriteria</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('penjualan-aktual') ? 'active' : '' }}">
                    <a href="{{ route('actual-sale.index') }}">
                        <i class="fas fa-th-list"></i>
                        <p>Penjualan Aktual</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('bobot-alternatif') ? 'active' : '' }}">
                    <a href="{{ route('alternative-weight.index') }}">
                        <i class="fas fa-th-list"></i>
                        <p>Nilai Bobot Alternatif</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Peramalan</h4>
                </li>
                <li class="nav-item {{ request()->is('peramalan-wma/data-ramal', 'peramalan-wma/pilih-periode', 'peramalan-wma/hasil-akhir') ? 'active submenu' : '' }}">
                    <a data-toggle="collapse" href="#forecastingWMA">
                        <i class="fas fa-layer-group"></i>
                        <p>Peramalan WMA</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('peramalan-wma/data-ramal', 'peramalan-wma/pilih-periode', 'peramalan-wma/hasil-akhir') ? 'show' : '' }}" id="forecastingWMA">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('peramalan-wma/data-ramal') ? 'active' : '' }}">
                                <a href="{{ route('wma.actual-sale') }}">
                                    <span class="sub-item">Data Ramal</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('peramalan-wma/pilih-periode', 'peramalan-wma/hasil-akhir') ? 'active' : '' }}">
                                <a href="{{ route('wma.choose-period') }}">
                                    <span class="sub-item">Peramalan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->is('pembobotan-ahp') ? 'active submenu' : '' }}">
                    <a data-toggle="collapse" href="#forecastingAHP">
                        <i class="fas fa-layer-group"></i>
                        <p>Pembobotan AHP</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('pembobotan-ahp') ? 'show' : '' }}" id="forecastingAHP">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('pembobotan-ahp') ? 'active' : '' }}">
                                <a href="{{ route('ahp.index') }}">
                                    <span class="sub-item">Pembobotan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Hasil</h4>
                </li>
                <li class="nav-item {{ request()->is('proses-wma-ahp') ? 'active' : '' }}">
                    <a href="{{ route('wma-ahp.index') }}">
                        <i class="fa fa-file" aria-hidden="true"></i>
                        <p>Proses WMA - AHP</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
