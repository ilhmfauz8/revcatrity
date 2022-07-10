<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">

            <img src="{{ asset('assets_backend/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme"
                class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <span class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" aria-expanded="false">
                    @if(Auth::guard('admin')->check())
                    {{ Auth::guard('admin')->user()->name }}
                    @elseif(Auth::guard('penampung')->check())
                    {{ Auth::guard('penampung')->user()->name }}
                    @endif
                </span>
            </div>
            @if(Auth::guard('admin')->check())
            <p class="text-muted left-user-info">Admin</p>
            @elseif(Auth::guard('penampung')->check())
            <p class="text-muted left-user-info">Penampung</p>
            @endif
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">
                @if(Auth::guard('penampung')->check())
                {{-- <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{ route('penampung.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i> --}}
                        {{-- <span class="badge bg-success rounded-pill float-end">9+</span> --}}
                        {{-- <span> Dashboard </span>
                    </a>
                </li> --}}
                <li class="menu-title mt-2">Apps</li>
                <li>
                    <a href="{{ route('penampung.donasi') }}">
                        <i class="mdi mdi-calendar-blank-outline"></i>
                        <span> Donasi </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('penampung.laporan') }}">
                        <i class="mdi mdi-calendar-blank-outline"></i>
                        <span> Laporan </span>
                    </a>
                </li>
                @elseif(Auth::guard('admin')->check())
                <li class="menu-title">Navigation</li>
                {{-- <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i> --}}
                        {{-- <span class="badge bg-success rounded-pill float-end">9+</span> --}}
                        {{-- <span> Dashboard </span>
                    </a>
                </li>
                <li class="menu-title mt-2">Apps</li> --}}
                <li>
                    <a href="{{ route('admin.donasi') }}">
                        <i class="mdi mdi-calendar-blank-outline"></i>
                        <span> Donasi </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.laporan') }}">
                        <i class="mdi mdi-calendar-blank-outline"></i>
                        <span> Laporan </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.user_management') }}">
                        <i class="mdi mdi-calendar-blank-outline"></i>
                        <span> User Management </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.tips_trick') }}">
                        <i class="mdi mdi-calendar-blank-outline"></i>
                        <span> Tips And Trick </span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('admin.transaksi') }}">
                        <i class="mdi mdi-calendar-blank-outline"></i>
                        <span> Transaksi </span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('admin.pendonasi') }}">
                        <i class="mdi mdi-calendar-blank-outline"></i>
                        <span> Transaksi </span>
                    </a>
                </li>
                @endif
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
