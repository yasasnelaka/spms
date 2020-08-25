@extends('principle_dashboard.dashboard')
@section('content')
    <!-- Second container -->
    <div class="container mb-5">

        <!-- Secion heading -->
        <h2 class="text-uppercase text-center font-weight-bold my-4 pt-5 wow fadeIn" data-wow-delay="0.2s">Principal</h2>

        <hr class="between-sections pb-5">

        <!-- First row -->
        <div class="row  wow fadeIn" data-wow-delay="0.2s">


            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a   href="{{url('/principle/news_&_updates_form')}}"
                         class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

                        <i class="fas fa-pencil-alt d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">ADD NEWS & UPDATES</strong></h6>

                    <p class="mt-4"> Upcoming events,parents meeting etc..</p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a href="{{url('/principle/admin_notification')}}"
                       class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

                        <i class="w-fa far fa-check-square d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">NOTIFICATIONS</strong></h6>

                    <p class="mt-4">View all notifications</p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a href="{{url('/principle/view_reg')}}"
                       class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

                        <i class="w-fa fas fa-user d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">REGISTERED STUDENTS</strong></h6>

                    <p class="mt-4">Update,Delete,View Students details.</p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a href="{{url('/principle/view_reg_teachers')}}"
                       class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

                        <i class="w-fa fas fa-user d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">REGISTERED STAFF MEMBERS</strong></h6>

                    <p class="mt-4">Update,Delete,View staff members details.</p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a href="{{url('/principle/reports')}}"
                       class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

                        <i class="fas fa-registered d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">REPORTS</strong></h6>

                    <p class="mt-4">Report of students</p>

                </div>

            </div>

{{--            <div class="col-lg-3 col-md-6 text-center mt-1">--}}

{{--                <div class="icon-area">--}}

{{--                    <a href="{{url('/principle/add_performance')}}"--}}
{{--                       class="btn-floating btn-lg grey darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">--}}
{{--                        <i class="w-fa fas fa-chart-line d-flex justify-content-center"></i>--}}

{{--                    </a>--}}

{{--                    <h6><strong class="font-weight-bold mb-3 pb-3">ADD PERFORMANCE</strong></h6>--}}

{{--                    <p class="mt-4">Sportmeet , Competition , Olympiad , Debeting or Dancing</p>--}}

{{--                </div>--}}

{{--            </div>--}}

            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a href="{{url('/principle/view_performance')}}"
                       class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

                        <i class="w-fa fas fa-user d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">PERFORMANCE</strong></h6>

                    <p class="mt-4">Update,Delete,View Students Details of Performance.</p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a   href="{{url('/principle/top10_form_subject')}}"
                         class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

                        <i class="fas fa-user-alt d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">TOP 10</strong></h6>

                    <p class="mt-4">higher marks students</p>

                </div>

            </div>

        </div>
        <!-- First row -->

    </div>
    <!-- Second container -->
@endsection
