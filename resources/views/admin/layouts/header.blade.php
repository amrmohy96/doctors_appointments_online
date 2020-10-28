<!DOCTYPE html>
<html class="loading" lang="ar" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description"
          content="Morie admin is modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="Morie">
    <meta name="author" content="Morie">
    <title>{{ $title ?? 'Morie Dashboard'}}</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700"
          rel="stylesheet">

    {{-- shared styles  --}}
    @include('admin.layouts.shared')

    {{-- styles  depending on the direction --}}
    @include('admin.layouts.styles')
</head>
<!-- END: Head-->
