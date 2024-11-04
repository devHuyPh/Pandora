<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Thêm CSS cho Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Thêm jQuery (nếu chưa có) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Thêm JS cho Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

  {{-- css --}}
  @include('admin.layouts.partials.css')


  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.layouts.partials.nav-header')

  <!-- ======= Sidebar ======= -->
  @include('admin.layouts.partials.sidebar')

  <main id="main" class="main" style="width: 80%;">

    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.layouts.partials.footer')


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  
  @include('admin.layouts.partials.js')

</body>

</html>