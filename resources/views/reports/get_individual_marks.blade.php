@extends('teacher_dashboard.dashboard')
@section('content')
<h1>Insert Student details to view marks</h1>
<form action="display-marks" method="post">
	@csrf
    <div class="row">
        <div class="col-md-6">
            <div  class="md-form ">
                <label class="mdb-main-label">Admission ID</label>
                <input class="form-control" type="text" name="stu_id">
            </div>
        </div>
    </div>
    <div class="row">
        <div  class="col-md-6">
                <select class="mdb-select md-form" name="grade">
                    <option value="0">Select Grade</option>
                    <?php for($i=6;$i<=7;$i++){?>
                    <option value="<?= $i;?>"><?= $i; ?></option>
                <?php }; ?>
                </select>
                <label class="mdb-main-label">Grade</label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div  class="md-form ">
                <label class="mdb-main-label">Class</label>
                <input class="form-control" type="text" name="class">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div  class="md-form ">
                <label>Year</label>
                <input class="form-control" type="text" name="year">
            </div>
        </div>
    </div>
	<input type="submit" class="btn btn-primary" name="Search" value="Search">
	<input type="reset" class="btn btn-primary" name="clear" value="clear">

</form>
    <script>
        // Material Select Initialization

        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>
@endsection
