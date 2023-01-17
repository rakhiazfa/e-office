<!-- Left Sidebar -->
<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ route('dashboard') }}" class="logo text-center logo-light">
        <span class="h-[70px] flex justify-center items-center">
            <img class="w-[145px]" src="{{ asset('assets/images/EOFFICE.png') }}" alt="">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a href="{{ route('dashboard') }}" class="side-nav-link">
                    <i class="uil-apps"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSurat" aria-expanded="false" aria-controls="sidebarSurat"
                    class="side-nav-link">
                    <i class="uil-envelope-edit"></i>
                    <span> Surat </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSurat">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('incoming-mails') }}">Surat Masuk</a>
                        </li>
                        <li>
                            <a href="{{ route('outgoing-mails') }}">Surat Keluar</a>
                        </li>
                        <li>
                            <a href="{{ route('memos') }}">E-Memo</a>
                        </li>
                        <li>
                            <a href="{{ route('notulens') }}">Notulen</a>
                        </li>
                    </ul>
                </div>
            </li>

            @role('admin')
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarMasterData" aria-expanded="false"
                        aria-controls="sidebarMasterData" class="side-nav-link">
                        <i class="uil-database"></i>
                        <span> Master Data </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMasterData">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{ route('jobs') }}">Jabatan</a>
                            </li>
                            <li>
                                <a href="{{ route('employees') }}">Karyawan</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endrole

            <li class="side-nav-item">
                <a href="{{ route('logout') }}" class="side-nav-link">
                    <i class="uil-sign-out-alt"></i>
                    <span> Logout </span>
                </a>
            </li>

        </ul>
        <!--- /Sidemenu -->

        <div class="clearfix"></div>

    </div>
    <!-- /Sidebar - left -->

</div>
<!-- /Left Sidebar -->
