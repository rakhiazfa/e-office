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


            @role('admin')
                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="uil-clipboard-notes"></i>
                        <span> RUP </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarProvider" aria-expanded="false"
                        aria-controls="sidebarProvider" class="side-nav-link">
                        <i class="uil-user-check"></i>
                        <span> Akun Penyedia </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProvider">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="#">Products</a>
                            </li>
                            <li>
                                <a href="#">Products Details</a>
                            </li>
                            <li>
                                <a href="#">Orders</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarNonProvider" aria-expanded="false"
                        aria-controls="sidebarNonProvider" class="side-nav-link">
                        <i class="uil-user-times"></i>
                        <span> Akun Non Penyedia </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarNonProvider">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="#">Products</a>
                            </li>
                            <li>
                                <a href="#">Products Details</a>
                            </li>
                            <li>
                                <a href="#">Orders</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="uil-database"></i>
                        <span> Master Data </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="uil-files-landscapes-alt"></i>
                        <span> Anggaran </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="uil-file-alt"></i>
                        <span> Berita </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="uil-rss-alt"></i>
                        <span> Pengumuman </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="uil-file-bookmark-alt"></i>
                        <span> Kebijakan </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="uil-question-circle"></i>
                        <span> FAQ </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="uil-list-ul"></i>
                        <span> Daftar Hitam </span>
                    </a>
                </li>
            @endrole

        </ul>
        <!--- /Sidemenu -->

        <div class="clearfix"></div>

    </div>
    <!-- /Sidebar - left -->

</div>
<!-- /Left Sidebar -->
