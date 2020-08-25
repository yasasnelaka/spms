@extends('student_dashboard.dashboard')
@section('content')
    <div class="school">
        <img src="img\school.jpg">
    </div>

    <!-- Second container -->
    <div class="container mb-5">

        <!-- Secion heading -->
        <h2 class="text-uppercase text-center font-weight-bold my-4 pt-5 wow fadeIn" data-wow-delay="0.2s" style="color:blue;">Welcome  {{session('user')->name_with_initials}}</h2>

        <hr class="between-sections pb-5">

        <!-- First row -->
        <div class="row  wow fadeIn" data-wow-delay="0.2s">

            <div class="col-lg-4 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a href="{{url('/student_profile')}}"
                       class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

                        <i class="fas fa-user d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">PROFILE</strong></h6>

                    <p class="mt-4">Your profile details</p>

                </div>

            </div>

            <div class="col-lg-4 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a   href="{{url('/view_student_results')}}"
                         class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

                        <i class="fas fa-pencil-alt d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3"> MARKS</strong></h6>



                </div>

            </div>

            <div class="col-lg-4 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a href="{{url('/extra_activities')}}"
                       class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

                        <i class="w-fa far fa-check-square d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">EXTRA ACTIVITIES</strong></h6>

                    <p class="mt-4">Your performance</p>

                </div>

            </div>

        </div>
        <!-- First row -->

    </div>
    <!-- Second container -->
@endsection

