<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Admin | Authentication</title>

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


        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="{{asset('backend/css/oneui.min.css')}}">

    </head>
    <body>
      
        @yield("content")
        
        <script src="{{asset('backend/js/oneui.core.min.js')}}"></script>

        <script src="{{asset('backend/js/oneui.app.min.js')}}"></script>

        <script src="{{asset('backend/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

        <script src="{{asset('backend/js/pages/op_auth_signin.min.js')}}"></script>

        <script src="{{asset('backend/js/pages/op_auth_signup.min.js')}}"></script>

    </body>
</html>
