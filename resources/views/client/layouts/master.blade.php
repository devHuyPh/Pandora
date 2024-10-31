<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>aranoz</title>
    <link rel="icon" href="/client/img/favicon.png">
    <!-- Bootstrap CSS -->
    @include('client.layouts.partials.css')

</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        @include('client.layouts.partials.header_nav')
        @include('client.layouts.partials.header_search')
    </header>
    <!-- Header part end-->

    <!-- banner part start-->
    @yield('slide')
    <!-- banner part start-->

    @yield('content')
    
    <footer class="footer_part">
        @include('client.layouts.partials.footer')

    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->

    @include('client.layouts.partials.js')
</body>

</html>
