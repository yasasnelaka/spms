
@extends('teacher_dashboard.dashboard')
@section('content')
    <br><br><br>
    <center>
        <div class="container-fluid">
            <form action="{{url('/teacher/top10_subject')}}" method="get">

                <div class="col-md-4">
                    <select class="mdb-select md-form" name="year">
                        <option value="" disabled selected>Choose year</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="mdb-select md-form" name="grade">
                        <option value="" disabled selected>Choose grade</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="mdb-select md-form" name="class">
                        <option value="" disabled selected>Choose class</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="mdb-select md-form" name="term">
                        <option value="" disabled selected>Choose Term</option>
                        <option value="1">1st term</option>
                        <option value="2">2nd term</option>
                        <option value="3">3rd term</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="mdb-select md-form" name="subject" required>
                        <option value="">Select Subject</option>
                        @foreach($subject_list as $sub)
                            <option value="{{$sub->id}}">{{$sub->subject_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <input type="submit" class="btn btn-primary" value="Check Top 10" id="submit" name="submit">
                </div>
            </form>
    </center>
    <script>
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>
@endsection
