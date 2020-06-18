<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" href="{{url('/back/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{url('/back/assets/vendors/iconfonts/ionicons/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{url('/back/assets/vendors/iconfonts/typicons/src/font/typicons.css')}}">
    <link rel="stylesheet" href="{{url('/back/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{url('/back/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{url('/back/assets/vendors/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="{{url('/back/assets/css/shared/style.css')}}">
    <link rel="stylesheet" href="{{url('/back/assets/css/demo_1/style.css')}}">
    <link rel="shortcut icon" href="{{url('/back/assets/images/favicon.png')}}"/>
    <link rel="stylesheet" href="{{url('back/scroll/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" href="{{url('/chosen/chosen.css')}}">

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea.introduction",
            directionality: "rtl",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | ltr rtl",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
    <script src="{{url('ckeditor/ckeditor.js')}}"></script>

</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
@include('back.navbar')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->


    @include('back.sidebar')

    <!-- partial -->

        @yield('profile')
        @yield('category')
        @yield('content')

        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

@include('back.footer')

<script src="{{url('back/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{url('back/assets/vendors/js/vendor.bundle.addons.js')}}"></script>
<script src="{{url('back/assets/js/shared/off-canvas.js')}}"></script>
<script src="{{url('back/assets/js/shared/misc.js')}}"></script>
<script src="{{url('back/assets/js/demo_1/dashboard.js')}}"></script>
<script src="{{ url ('chosen/chosen.jquery.js') }}"></script>
<script src="{{url('back/scroll/jquery.mCustomScrollbar.js')}}"></script>
<script src="{{url('back/scroll/jquery.mousewheel.js')}}"></script>

<script>

    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!};
    var route_prefix = "{{url(config('lfm.url_prefix',config('lfm.prefix')))}}";
    $('#lfm').filemanager('image',{prefix:route_prefix});


    $('.catShow').click(function () {
        $(this).parent('td').find('.boxCategory').slideDown(300);
    });

    $('.btnShow').click(function () {
        $(this).parent('td').find('.boxShow').slideDown(300);
    });
    $('.close').click(function () {
        $('.boxCat').slideUp(300);
        $('.boxShow').slideUp(300);
    });

    $('.slShow').hover(function () {
        $(this).parent('.font').find('.slugShow').fadeIn(200);
    },function () {
        $(this).parent('.font').find('.slugShow').fadeOut(200);
    });

    $('.complete').hover(function () {
        $(this).parent('.font').find('.fullTitle').fadeIn(200);
    },function () {
        $(this).parent('.font').find('.fullTitle').fadeOut(200);
    });

    $('.commentBtn a').click(function () {
        $('.show_body').slideUp(200);
        $(this).parents('.parent').find('.show_body').slideDown(200);
    });

    $('.show_body .closeBody').click(function () {
        $('.show_body').slideUp(200);
    });

    $('.chosen-select').chosen();

    $('.scroll').mCustomScrollbar({
        setWidth: false,
        setHeight: false,
        scrollbarPosition: "inside",
        mouseWheel: {
            enable: true,
            scrollAmount: "auto",
            axis: "y"
        },
        scrollButtons: {
            enable: true,
            scrollType: "stepless",
            scrollAmount: "auto"
        },
        keyboard: {
            enable: true,
            scrollType: "stepless",
            scrollAmount: "auto"
        },
        updateOnContentResize: true,
        theme: "dark-thin",
    });

    $('.articleTitle').hover(function () {
        $(this).parent('.title').find('.articleSpan').fadeIn(200);
    },function () {
        $(this).parent('.title').find('.articleSpan').fadeOut(200);
    });

    $('.image i').click(function () {
        $('.image').fadeOut(200);
    });
    $('.btn-image').click(function () {
        $('.image').fadeOut(200);
        $(this).parent('td').find('.image').fadeIn(200);
    })
</script>

</body>

</html>
