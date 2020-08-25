<!DOCTYPE html>
<html lang="en">

<head>
    @include('bootstrap.css')

</head>

<body class="fixed-sn white-skin">

<!-- Main Navigation -->
<header>

    @include('dashboard.script')
    <!-- Sidebar navigation -->
    @include('dashboard.sidenav')
<!-- Sidebar navigation        -->

    <!-- Navbar -->
   @include('dashboard.nav')
    <!-- Navbar -->

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
</body>

</html>
