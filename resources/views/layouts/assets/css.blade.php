<title>@yield('title')</title>
<meta name="description" content="Itrust" />
<meta name="keywords" content="Itrust" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta charset="utf-8" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Itrust" />
<meta property="og:url" content="https://keenthemes.com/metronic" />
<meta property="og:site_name" content="Itrust" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
{{--<link rel="shortcut icon" href="{{asset('assets/dashboard')}}/media/logos/favicon.ico" />--}}
{{--<link rel="shortcut icon" href="{{get_file(setting()->fave_icon)}}" />--}}

<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Page Vendor Stylesheets(used by this page)-->
<link href="{{asset('assets/dashboard')}}/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Page Vendor Stylesheets-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="{{asset('assets/dashboard')}}/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />

@if(app()->getLocale()=='ar')
    <link href="{{asset('assets/dashboard')}}/css/style.bundle.rtl.css" rel="stylesheet" type="text/css" />


@else
<link href="{{asset('assets/dashboard')}}/css/style.bundle.css" rel="stylesheet" type="text/css" />

@endif

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">



<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet" />

<link rel="stylesheet" href="{{url('assets')}}/dashboard/backEndFiles/alertify/css/alertify.min.css" />
<!-- include a theme -->
<link rel="stylesheet" href="{{url('assets')}}/dashboard/backEndFiles/alertify/css/themes/default.min.css" />

{{--@include('layouts.loader.loaderCss')--}}


<!--end::Global Stylesheets Bundle-->
@yield('css')