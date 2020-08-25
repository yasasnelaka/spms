<!DOCTYPE html>
<html lang="en">

<head>
    @include('bootstrap.css')

</head>

<body class="fixed-sn white-skin">

<!-- Main Navigation -->
<header>

    @include('principle_dashboard.script')
    <!-- Sidebar navigation -->
    @include('principle_dashboard.sidenav')
<!-- Sidebar navigation        -->

    <!-- Navbar -->
   @include('principle_dashboard.nav')
    <!-- Navbar -->

</header>
<!-- Main Navigation -->
<script>$('.toast').toast('show');</script>

<!-- Main layout -->
<main>
@yield('content')

</main>

</body>

</html>
