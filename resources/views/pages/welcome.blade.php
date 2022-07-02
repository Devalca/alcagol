<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Sistem Penggajian Guru dan Karyawan</title>
        <link rel = "icon" href = "/storage/logo/Logo BPK Penabur kotak.png" type = "image/x-icon" width = "100x100">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

    </head>
    <body style="background:#e8e8fa">
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-lg mb-5 bg-body rounded">
                    <div class="card-header" style="font-size:18px;background: 	#fcfcb5">
                        BPK PENABUR KOTA SUKABUMI</div>
                        <div class="card-body text-center">
                            <img class="shadow mb-5 bg-body"src="/storage/logo/Logo BPK Penabur.png" alt="" width="200pt" 
                            style="margin:20px;padding:25px;border-radius:20px;border:3px solid;background:	#DCDCDC"><br>
                            <h1 class="text-center"><b>SELAMAT DATANG</b></h1>
                            <h2 class="text-center">di {{$title}}<br>BPK Penabur Kota Sukabumi</h2><hr style="border:1px solid">
                            <p class="text-center"><a class="btn btn-primary btn-lg" href="/login" role="button">
                                Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
