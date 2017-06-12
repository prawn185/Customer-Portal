<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title><?= isset($pageTitle) && $pageTitle != '' ? $pageTitle : 'Customer Portal' ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
        <meta name="description" content="Netmatters offer business Website design in Norfolk and IT support in Norwich and Norfolk. Call us to find out how we can help you."/>
        <meta name="keywords" content="web design norfolk, IT Support Norwich"/>
        <meta name="verify-v1" content="XGicQenpaKPb0GbUsd+07jsaCuzRbdnSFmSIPta6gas="/>

        <link type="text/css" rel="stylesheet" href="/css/styles.css"/>
        <link type="text/css" rel="stylesheet" href="/css/animate.css"/>
        <link type="text/css" rel="stylesheet" href="/css/font-awesome.min.css"/>
        <link rel="stylesheet" type="text/css" href="/bin/js/timepicker/jquery.timepicker.css"/>

        <link rel="stylesheet" type="text/css" href="/cal/calendar.css"/>
        <link rel="stylesheet" type="text/css" href="/laravel/css/frontend-plugins.css"/>
        <link rel="stylesheet" type="text/css" href="/laravel/css/pikaday.css"/>
        <link rel="stylesheet" type="text/css" href="/laravel/css/tether.min.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="/css/admin.css"/>

        <link rel='stylesheet' media='screen and (max-height: 770px), screen and (max-width:1100px)' href='/css/screenHeight.css'/>

        <link rel="apple-touch-icon" href="/assets/apple-touch-icon.png"/>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <script type="text/javascript" src="/bin/js/jquery.min.js"></script>
        <script type="text/javascript" src="/bin/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/bin/js/functions.js"></script>
        <script type="text/javascript" src="/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="/bin/js/tinymce_init.js"></script>
        <script type="text/javascript" src="/cal/calendar_eu.js"></script>
        <script type="text/javascript" src="/laravel/js/tether.min.js"></script>
        <script type="text/javascript" src="/laravel/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/laravel/js/plugins/jquery-dropzone.js"></script>
        <script type="text/javascript" src="/laravel/js/vue.js"></script>
        <script type="text/javascript" src="/laravel/js/vue-resource.js"></script>
        <script type="text/javascript" src="/laravel/js/toastr.js"></script>
        <script type="text/javascript" src="/laravel/js/moment.js"></script>
        <script type="text/javascript" src="/laravel/js/pikaday.js"></script>
        <script type="text/javascript" src="/assets/js/sweetalert.js"></script>
        <script type="text/javascript" src="/assets/js/featherlight.min.js"></script>
        <script type="text/javascript" src="/bin/ajax-task-packages.js"></script>

        <script type="text/javascript" src="/bin/ajax_framework.js"></script>


        <script type="text/javascript" src="/bin/js/timepicker/jquery.timepicker.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

        <!-- Favicons -->
        <link rel="shortcut icon" href="/assets/favicon.ico">
        <link rel="apple-touch-icon-precomposed" href="/assets/apple-touch-icon.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/apple-touch-icon-72x72.png"/>
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/apple-touch-icon-114x114.png"/>


        @yield('page_meta')

        {{-- Header Css files --}}
        @section('header_css')
            <style>
                .text-center {
                    text-align: center;
                }
            </style>
        @show

        {{-- Header Javascript files --}}
        @section('header_javascript')

        @show
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

</head>
    <body>

    <div id="container">



        @yield('main')



</div>


    {{-- Header Javascript files --}}
    @section('footer_javascript')

    @show

    {{-- Toast Notifications --}}
    <script type="application/javascript">
        $(document).ready(function()
        {

            $('.nav-pills a').click(function(ev)
            {
                ev.preventDefault();
                $(this).tab('show');
            });

            toastr.options = {
                "positionClass" : "toast-top-full-width"
            };

            @if(session('status'))
                toastr.info('{{ session('status')}}', 'Info', {timeOut : 5000});
            @endif

            @if(session('warning'))
                toastr.warning('{{ session('warning')}}', 'Warning', {timeOut : 5000});
            @endif

            @if(session('error'))
                toastr.error('{{ session('error')}}', 'Error', {timeOut : 5000});
            @endif

            @if(session('success'))
                toastr.success('{{ session('success')}}', 'Success', {timeOut : 5000});
            @endif

            @if(session('info'))
                toastr.info('{{ session('info')}}', 'Information', {timeOut : 5000});
            @endif
        });
    </script>

    </body>
</html>
