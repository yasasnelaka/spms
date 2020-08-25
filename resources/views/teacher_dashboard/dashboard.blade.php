
<!DOCTYPE html>
<html lang="en">

<head>
    @include('bootstrap.css')

</head>

<body class="fixed-sn white-skin">

<!-- Main Navigation -->
<header>

    @include('teacher_dashboard.script')
    <!-- Sidebar navigation -->
    @include('teacher_dashboard.sidenav')
<!-- Sidebar navigation        -->

    <!-- Navbar -->
   @include('teacher_dashboard.nav')
    <!-- Navbar -->

</header>
<!-- Main Navigation -->

<!-- Main layout -->
<main>
@yield('content')

</main>

</body>

</html>
