@extends('teacher_dashboard.dashboard')
@section('content')
<h1>Term Progress</h1>

<form action="subject" method="post">
	@csrf
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

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <select  class="mdb-select md-form" name="term">
                <option value="0">Select Term</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4">
             <input type="submit" name="Compare" class="btn btn-primary" value="Compare Term Progress">
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
