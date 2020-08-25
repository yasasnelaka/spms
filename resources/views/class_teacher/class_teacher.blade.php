@extends('class_teacher_dashboard.dashboard')
@section('content')
    <!-- Second container -->
    <div class="container mb-5">

        <!-- Secion heading -->
        <h2 class="text-uppercase text-center font-weight-bold my-4 pt-5 wow fadeIn" data-wow-delay="0.2s">Class Teacher</h2>

        <hr class="between-sections pb-5">

        <!-- First row -->
        <div class="row  wow fadeIn" data-wow-delay="0.2s">


            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a   href="{{url('/class_teacher/select-class')}}"
                         class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

                        <i class="fas fa-pencil-alt d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">ADD MARKS</strong></h6>

                    <p class="mt-4">Add any subject marks of student</p>

                </div>

            </div>


            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a href="{{url('/class_teacher/cal_avg_condition')}}"
                       class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">
                        <i class="w-fa fas fa-chart-line d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">CAL AVERAGE MARKS OF TERM</strong></h6>

                    <p class="mt-4">View all marks  , Check all marks & Calculate average marks  </p>

                </div>

            </div>


            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a href="{{url('/class_teacher/add_performance')}}"
                       class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">
                        <i class="w-fa fas fa-chart-line d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">ADD PERFORMANCE</strong></h6>

                    <p class="mt-4">Sportmeet , Competition , Olympiad , Debeting or Dancing</p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a href="{{url('/class_teacher/individual')}}"
                       class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">
                        <i class="fas fa-compress d-flex justify-content-center" aria-hidden="true"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">SELECT STUDENT DETAILS TO COMPARE</strong></h6>

                    <p class="mt-4"></p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a href="{{url('class_teacher/compare/term-subject')}}"
                       class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">
                        <i class="w-fa fas fa-chart-line d-flex justify-content-center"></i>
                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">GRAPH</strong></h6>

                    <p class="mt-4">Compare subject progress by term</p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a   href="{{url('/class_teacher/reports')}}"
                         class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">
                        <i class="fa fa-address-book justify-content-center" aria-hidden="true"></i>
                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">REPORTS</strong></h6>

                    <p class="mt-4">Student reports and teacher reports</p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a href="{{url('/class_teacher/view_performance')}}"
                       class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

                        <i class="w-fa fas fa-user d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">PERFORMANCE</strong></h6>

                    <p class="mt-4">Update,Delete,View Students Details of Performance.</p>

                </div>

            </div>


            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a href="{{url('/class_teacher/student_number_recomedation')}}"
                       class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

                        <i class="w-fa fas fa-user d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">Recommendation Letter</strong></h6>

                    <p class="mt-4">Send Recommendation Letter to Email </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a   href="{{url('/class_teacher/select-student')}}"
                         class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

                        <i class="fas fa-pencil-alt d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">VIEW MARKS</strong></h6>

                    <p class="mt-4">Insert Student details to view marks</p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a   href="{{url('/class_teacher/view_marks_form')}}"
                         class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

                        <i class="fas fa-pencil-alt d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">VIEW MARKS</strong></h6>

                    <p class="mt-4">View ,Update & delete marks..</p>

                </div>

            </div>
            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a   href="{{url('/class_teacher/top10_form_subject')}}"
                         class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

                        <i class="fas fa-user-alt d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">TOP 10</strong></h6>

                    <p class="mt-4">higher marks students</p>

                </div>

            </div>
            <div class="col-lg-3 col-md-6 text-center mt-1">

                <div class="icon-area">

                    <a   href="{{url('/class_teacher/students_form_rank')}}"
                         class="btn-floating btn-lg blue darken-1 p-5 mb-4 d-inline-flex justify-content-center align-items-center">

                        <i class="fas fa-user-alt d-flex justify-content-center"></i>

                    </a>

                    <h6><strong class="font-weight-bold mb-3 pb-3">RANK</strong></h6>

                    <p class="mt-4">Rank of all students</p>

                </div>

            </div>

        </div>
        <!-- First row -->

    </div>
    <!-- Second container -->
@endsection
