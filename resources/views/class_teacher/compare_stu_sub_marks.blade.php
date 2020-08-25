@extends('class_teacher_dashboard.dashboard')
@section('content')
<h1>Select Student details to compare</h1>
<form action="/class_teacher/by-term" method="post">
	@csrf
        <div class="row">
            <div  class="col-md-6">
                <div  class="md-form ">
                <label>Admission ID</label>
                <input type="text"  class="form-control" name="stu_id">
                </div>
            </div>
        </div>
         <div class="row">
             <div  class="col-md-6">
                <select class="mdb-select md-form" name="subject">
                    <option value="">Subject</option>
                    @foreach($subject_list as $sub)
                    <option value="{{$sub->id}}">{{$sub->subject_name}}</option>
                    @endforeach
                </select>
                 <label class="mdb-main-label">Select Subject</label>
             </div>
        </div>
    <div class="row">
        <div  class="col-md-6">
            <div  class="md-form">
            <label>Year</label>
            <input  class="form-control" type="text" name="year">
            </div>
        </div>
    </div>
    <div class="row">
        <div  class="col-md-6">
            <div  class="md-form ">
	        <input   class="form-control btn btn-primary " type="submit" name="Compare" value="Compare">
            </div>
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
