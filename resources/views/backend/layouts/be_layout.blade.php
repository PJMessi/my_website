<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Admin | Prajwal Shrestha</title>

        <meta name="description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="OneUI">
        <meta property="og:description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">


        <link rel="shortcut icon" href="{{asset('backend/media/favicons/favicon.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('backend/media/favicons/favicon-192x192.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('backend/media/favicons/apple-touch-icon-180x180.png')}}">

        <!--for dashboard-->
        <link rel="stylesheet" href="{{asset('backend/js/plugins/slick-carousel/slick.css')}}">
        <link rel="stylesheet" href="{{asset('backend/js/plugins/slick-carousel/slick-theme.css')}}">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="{{asset('backend/css/oneui.min.css')}}">

    </head>
    <body>
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
            
            @include("backend.includes.navbar")
            
            @yield("content")          

            <!-- Footer -->
            <footer id="page-footer" class="bg-body-light">
                <div class="content py-3">
                    <div class="row font-size-sm">
                        <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-right">
                            Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                        </div>
                        <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                            <a class="font-w600" href="https://1.envato.market/xWy" target="_blank">OneUI 4.1</a> &copy; <span data-toggle="year-copy">2018</span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->    


        </div>

        <script src="{{asset('backend/js/oneui.core.min.js')}}"></script>

        <script src="{{asset('backend/js/oneui.app.min.js')}}"></script>

        <script src="{{asset('backend/js/pages/be_pages_dashboard.min.js')}}"></script>

        <script src="{{asset('backend/js/plugins/slick-carousel/slick.min.js')}}"></script>

        <script>jQuery(function(){One.helpers('slick');});</script>

    </body>
</html>
