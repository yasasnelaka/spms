@extends('class_teacher_dashboard.dashboard')
@section('content')
<h1>Compare subject progress by term</h1>

<form action="/class_teacher/compare/subject" method="post">
	@csrf
    <div class="md-form">
        <div class="col-md-6">
            <label>Year</label>
            <input type="text" name="year" class="form-control">
        </div>
    </div>
    <div class="md-form">
        <div class="col-md-6">
            <label >Term</label>
            <input type="text"  class="form-control" name="term">
        </div>
    </div>

    <input type="submit" name="Compare" class="btn btn-primary" value="Compare Term Progress">
</form>
@endsection
