<!DOCTYPE html>
<html lang="en">

<head>
    @include('bootstrap.css')
</head>

<body class="fixed-sn white-skin">

<!-- Main Navigation -->
<header>
    @include('bootstrap.javascript')
    <!-- Sidebar navigation -->
    @include('prefect_board_dashboard.sidenav')
<!-- Sidebar navigation -->

    <!-- Navbar -->
   @include('prefect_board_dashboard.nav')
    <!-- Navbar -->
    @include('prefect_board_dashboard.script')
</header>
<!-- Main Navigation -->

<!-- Main layout -->
<main>
@yield('content')

</main>
<!-- Main layout -->

<!-- Footer -->
<!--<footer class="page-footer pt-0 mt-5 rgba-stylish-light" >-->
    <!-- Copyright -->
   <!-- <div class="footer-copyright py-3 text-center">
        <div class="container-fluid">
            <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> </a>
        </div>
    </div>-->
    <!-- Copyright -->
<!--</footer>-->
<!-- Footer -->





<!-- End your project here-->

<!-- SCRIPTS -->


</body>

</html>
