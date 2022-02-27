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
                            <i class="mdi mdi-tablet-dashboard mdi-24px"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard')}}">
                            <i class="mdi mdi-book-account mdi-24px"></i>
                            <span> Laporan </span>
                        </a>
                    </li>
                    <li class="menu-title mt-2">Operasional</li>
                    <li>
                        <a href="{{route('dashboard')}}">
                            <i class="mdi mdi-cart-arrow-up mdi-24px"></i>
                            <span> Penjualan </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard')}}">
                            <i class="mdi mdi-cash-register mdi-24px"></i>
                            <span> Pembelian </span>
                        </a>
                    </li>
                    <li class="menu-title mt-2">Finance</li>
                    <li>
                        <a href="#customer" data-bs-toggle="collapse">
                            <i class="fas fa-user-friends"></i>
                            <span> Customers </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="customer">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="crm-dashboard.html">Create Customer</a>
                                </li>
                                <li>
                                    <a href="crm-contacts.html">All Customers</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#supplier" data-bs-toggle="collapse">
                            <i class="fas fa-truck"></i>
                            <span> Suppliers </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="supplier">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="crm-dashboard.html">Tambah Supplier</a>
                                </li>
                                <li>
                                    <a href="crm-contacts.html">Semua Supplier</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#sidebarCrm" data-bs-toggle="collapse">
                            <i class="fas fa-users"></i>
                            <span> Karyawan </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCrm">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="crm-dashboard.html">Tambah Karyawan</a>
                                </li>
                                <li>
                                    <a href="crm-contacts.html">Semua Karyawan</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#asset" data-bs-toggle="collapse">
                            <i class="fas fa-box-open"></i>
                            <span> Data Aset </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="asset">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="crm-dashboard.html">Tambah Aset</a>
                                </li>
                                <li>
                                    <a href="crm-contacts.html">Semua Aset</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-title">Sistem</li>

                    <li>
                        <a href="#setting" data-bs-toggle="collapse">
                            <i class="fas fa-cogs"></i>
                            <span> Pengaturan </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="setting">
                            <ul class="nav-second-level">
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
