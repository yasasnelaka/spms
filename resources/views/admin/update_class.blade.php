@extends('dashboard.dashboard')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif

    <center>
        <section class="pb-3 align-content-center">
            <!-- Grid row -->
            <div class="row flex-center">

                <!-- Grid column -->
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

                    <!-- Card Primary -->
                    <div class="card classic-admin-card primary-color">
                        <div class="card-body">
                            <div class="pull-right">
                                <i class="fas fa-child"></i>
                                <i class="fas fa-female"></i>
                            </div>
                            <p class="white-text">Count of Students</p>
                            <h4 class="check">{{$count}}</h4>
                        </div>
                    </div>
                    <!-- Card Primary -->

                </div>
                <!-- Grid column -->
            </div>
        </section>
        <div class="md-form">
            <form  action="{{url('/view_student_class')}}" method="get">
                @csrf
                <div class="md-form">
                    <input type="submit" value="View all student's classes" class="btn btn-sm btn-primary" >
                </div>
            </form>
        </div>
    <div class="md-form">
        <form  action="{{url('/update_class')}}" method="get">
            @csrf
            <b>How many classes do you wont to separate</b><br>
            <input type="number" name="size">
            <div class="md-form">
                <input type="submit" value="Submit" class="btn btn-sm btn-primary" >
                <input type="reset" value="clear" class="btn btn-sm btn-primary" >
            </div>
        </form>
    </div>

    </center>
    <script>
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>
@endsection
