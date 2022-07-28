<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App Favicon -->
    <link rel="shortcut icon" href="">
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Jquery JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">

    <!-- Select 2 JS -->
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>

    <!-- CKEditor 5 JS -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/super-build/ckeditor.js"></script>
    
    <!-- Hyper CSS -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
    
    <!-- App CSS -->
    @vite('./resources/css/app.css')
    
    <title>{{ $title }}</title>

</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false, "darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">

        <!-- Sidebar -->
        <x-auth.sidebar :user="$currentUser"></x-auth.sidebar>

        <!-- Page Content -->
        <div class="content-page">
            <!-- Content -->
            <div class="content">

                <!-- Topbar -->
                <x-auth.topbar :user="$currentUser"></x-auth.topbar>

                <!-- Container -->
                <div class="container-fluid">

                    {{ $slot }}

                </div>
                <!-- /Container -->

            </div>
            <!-- /Content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Basic Teknologi
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- /Footer -->
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Wrapper -->

    <script>
        $('select.field').select2();
    </script>

    <!-- Hyper JS -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <!-- App JS -->
    @vite('./resources/js/app.js')
</body>

</html>
