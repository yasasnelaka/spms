@extends('teacher_dashboard.dashboard')
@section('content')
    <html>
    <head>
        <style>
            .dropdown:hover>.dropdown-menu {
                display: block;
            }

            .dropdown>.dropdown-toggle:active {
                /*Without this, clicking will make it sticky*/
                pointer-events: none;
            }


        </style>
    </head>
    <body>

    <!-- First row -->
    <div class="row  wow fadeIn text-center" data-wow-delay="0.4s">

        <!-- First column -->
        <div class="col-md-3 mb-5">

            <!-- Panel -->
            <div class="card card-body  blue lighten-3 hoverable">


                <i class="fa fa-trophy fa-3x mb-4 mt-3 white-text" aria-hidden="true"></i>

                <!-- Link -->
                <div class="dropdown">
                    <label class=" dropdown-toggle  white-text text-uppercase" type="text" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown button
                    </label>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Panel -->

        </div>
        <!-- First column -->

        <!-- Second column -->
        <div class="col-md-3 mb-5">

            <!-- Panel -->
            <div class="card card-body pink lighten-3 hoverable">


                <i class="fas fa-edit fa-3x mb-4 mt-3 white-text"></i>

                <div class="dropdown">
                    <label class=" dropdown-toggle  white-text text-uppercase" type="text" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown button
                    </label>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>

            </div>
            <!-- Panel -->

        </div>
        <!-- Second column -->

        <!-- Third column -->
        <div class="col-md-3 mb-5">

            <!-- Panel -->
            <div class="card card-body indigo lighten-3 hoverable">


                <i class="fas fa-certificate fa-3x mb-4 mt-3 white-text"></i>
                <div class="dropdown">
                    <label class=" dropdown-toggle  white-text text-uppercase" type="text" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown button
                    </label>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>

            </div>
            <!-- Panel -->

        </div>
        <!-- Third column -->

        <!-- Third column -->
        <div class="col-md-3 mb-5">

            <!-- Panel -->
            <div class="card card-body deep-orange lighten-3 hoverable">

                <i class="fas fa-clipboard-list fa-3x mb-4 mt-3 white-text"></i>
                <div class="dropdown">
                    <label class=" dropdown-toggle  white-text text-uppercase" type="text" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown button
                    </label>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>

            </div>
            <!-- Panel -->

        </div>
        <!-- Third column -->

        <!-- fourth column -->
        <div class="col-md-3 mb-5">

            <!-- Panel -->
            <div class="card card-body deep-orange lighten-3 hoverable">


                <i class="fas fa-paste fa-3x mb-4 mt-3 white-text"></i>
                <div class="dropdown">
                    <label class=" dropdown-toggle  white-text text-uppercase" type="text" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown button
                    </label>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>

            </div>
            <!-- Panel -->

        </div>
        <!-- fourth column -->

    </div>
    </body>
    </html>
@endsection


