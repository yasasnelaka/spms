@extends('teacher_dashboard.dashboard')
@section('content')
    <h1>Term Vise Comparison</h1>
    <form action="by-term" method="post">
        @csrf

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="md-form"><label  for="orangeForm-name">Admission ID</label>
                    <input type="text" class="form-control" name="stu_id"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <select  class="mdb-select md-form" name="subject">
                    <option value="">Select Subject</option>
                    @foreach($subject_list as $sub)
                        <option value="{{$sub->id}}">{{$sub->subject_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <select  class="mdb-select md-form" name="year">
                    <option value="0">Select year</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>

                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-4">
                <input type="submit" name="Compare" value="Compare" class="btn btn-primary">
            </div>
        </div>
    </form>
    <script>
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>
@endsection
