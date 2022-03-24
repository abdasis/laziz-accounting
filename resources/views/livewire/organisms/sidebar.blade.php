<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="left-side-menu">
        <div class="h-100" data-simplebar>
            <!-- User box -->
            <div class="user-box text-center">
                <img
                    src="{{ asset('/assets/images/users/user-3.jpg') }}"
                    alt="user-img"
                    title="Mat Helme"
                    class="rounded-circle avatar-md"
                />
                <div class="dropdown">
                    <a
                        href="javascript: void(0);"
                        class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                        data-bs-toggle="dropdown"
                    >{{auth()->user()->name}}</a
                    >
                    <div class="dropdown-menu user-pro-dropdown">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-user me-1"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings me-1"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-lock me-1"></i>
                            <span>Lock Screen</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-log-out me-1"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
                <p class="text-muted">Programmer</p>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul id="side-menu">
                    <li class="menu-title">Dashboard</li>
                    <li>
                        <a href="{{route('dashboard')}}">
                            <i class="ti ti-desktop mdi-24px"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('reports.index')}}">
                            <i class="icon icon-notebook mdi-24px"></i>
                            <span> Laporan </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('contacts.index')}}">
                            <i class="icon icon-people"></i>
                            <span> Kontak </span>
                        </a>
                    </li>
                    <li class="menu-title mt-2">Operasional</li>
                    <li>
                        <a href="{{route('sales.index')}}">
                            <i class="ti ti-wallet mdi-24px"></i>
                            <span> Penjualan </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('purchases.index')}}">
                            <i class="fe-shopping-cart"></i>
                            <span> Pembelian </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('cost.index')}}">
                            <i class="icon icon-tag mdi-24px"></i>
                            <span> Biaya </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('products.index')}}">
                            <i class="fe-shopping-bag"></i>
                            <span> Product </span>
                        </a>
                    </li>
                    <li class="menu-title mt-2">Finance</li>
                    <li>
                        <a href="{{route('purchases.index')}}">
                            <i class="ti ti-credit-card"></i>
                            <span> Kas dan Bank </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('accounts.index')}}">
                            <i class="ti ti-agenda"></i>
                            <span> Akun Biaya </span>
                        </a>
                    </li>

                    <li>
                        <a href="sahabat">
                            <i class="icon  icon-briefcase"></i>
                            <span> Data Aset </span>
                        </a>
                    </li>

                    <li class="menu-title">Sistem</li>

                    <li>
                        <a href="#setting" data-bs-toggle="collapse">
                            <i class="icon icon-settings"></i>
                            <span> Pengaturan </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="setting">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{route('category-account.index')}}">Kategori Akun</a>
                                </li>
                                <li>
                                    <a href="crm-dashboard.html">Data Perusahaan</a>
                                </li>
                                <li>
                                    <a href="crm-contacts.html">General</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -left -->
    </div>
</div>
