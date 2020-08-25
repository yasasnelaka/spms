@extends('class_teacher_dashboard.dashboard')
@section('content')
<!doctype html>
<html lang="en">
  <head>
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <meta name="description" content="">--}}
{{--    <meta name="author" content="">--}}
{{--    <title>Reports : SPMS</title>--}}

    <!-- Bootstrap core CSS -->
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}

    <!-- Custom styles for this template -->
{{--    <link href="dashboard.css" rel="stylesheet">--}}
  </head>

  <body>
{{--    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">--}}
{{--      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">SPMS</a>--}}

{{--      <ul class="navbar-nav px-3">--}}
{{--        <li class="nav-item text-nowrap">--}}
{{--          <a class="nav-link" href="#">Sign out</a>--}}
{{--        </li>--}}
{{--      </ul>--}}
{{--    </nav>--}}

    <div class="container-fluid">
      <div class="row">
{{--        @section('nav')--}}

{{--        <nav class="col-md-2 d-none d-md-block bg-light sidebar">--}}
{{--          <div class="sidebar-sticky">--}}
{{--            <ul class="nav flex-column">--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link active" href="#">--}}
{{--                  <span data-feather="home"></span>--}}
{{--                  </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="reports">--}}
{{--                  <span data-feather="file"></span>--}}
{{--                  Reports--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              --}}
{{--            </ul>--}}
{{--          </div>--}}
{{--        </nav>--}}
{{--        @section('main')--}}
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
{{--          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">--}}
{{--            <h1 class="h2">Generate Reports</h1>--}}
{{--            <div class="btn-toolbar mb-2 mb-md-0">--}}
{{--              <div class="btn-group mr-2">--}}
{{--                <button class="btn btn-sm btn-outline-secondary">Export</button>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
<div class="row">
<div class="col-lg-4">
	<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
  Student Reports
  </a>
  <a href="/class_teacher/reports/student-by/grade/1" class="list-group-item list-group-item-action ">By Grade</a>
  <a href="/class_teacher/reports/student-by/gender/1" class="list-group-item list-group-item-action">By Gender</a>
  <a href="/class_teacher/reports/student-by/nationality/2" class="list-group-item list-group-item-action">By Nationality</a>
  <a href="/class_teacher/reports/student-by/blood_group/2" class="list-group-item list-group-item-action">By Blood Group</a>
  <a href="/class_teacher/reports/student-by/religion/1" class="list-group-item list-group-item-action ">By Religion</a>
  <a href="/class_teacher/reports/student-by/transport_method/1" class="list-group-item list-group-item-action ">By Transportation method</a>
  <a href="/class_teacher/reports/student-by/red_cross_participation/2" class="list-group-item list-group-item-action ">By Red Cross Participation</a>
</div>
</div>

<!-- column 2 -->
<div class="col-lg-4">
  <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
  Teacher Reports
  </a>
  <a href="/class_teacher/reports/student-by/grade/1" class="list-group-item list-group-item-action ">By Grade</a>


</div>
</div>


</div>

        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

{{--	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}

 </body>
</html>
@endsection
