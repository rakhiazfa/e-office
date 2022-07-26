<!-- Left Sidebar -->
<div class="leftside-menu">

    <!-- LOGO -->
    <a href="" class="logo text-center logo-light">
        <span class="h-[70px] flex justify-center items-center">
            <i class="uil-envelope-edit text-3xl text-white"></i>
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="uil-apps"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSurat" aria-expanded="false"
                    aria-controls="sidebarSurat" class="side-nav-link">
                    <i class="uil-envelope-edit"></i>
                    <span> Surat </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSurat">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="#">Surat Masuk</a>
                        </li>
                        <li>
                            <a href="#">Surat Keluar</a>
                        </li>
                        <li>
                            <a href="#">E-Memo</a>
                        </li>
                        <li>
                            <a href="#">Notulen</a>
                        </li>
                        <li>
                            <a href="#">Disposisi</a>
                        </li>
                    </ul>
                </div>
            </li>

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
                            <a href="#">Jabatan</a>
                        </li>
                        <li>
                            <a href="#">Jenis Surat</a>
                        </li>
                        <li>
                            <a href="#">Instansi</a>
                        </li>
                        <li>
                            <a href="#">Rapat</a>
                        </li>
                        <li>
                            <a href="#">Karyawan</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="uil-sign-out-alt"></i>
                    <span> Logout </span>
                </a>
            </li>

            @role('admin')
                
            @endrole

        </ul>
        <!--- /Sidemenu -->

        <div class="clearfix"></div>

    </div>
    <!-- /Sidebar - left -->

</div>
<!-- /Left Sidebar -->
