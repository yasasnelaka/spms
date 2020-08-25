@extends('teacher_dashboard.dashboard')
@section('content')
    <div>
<h1>Select Grade and class to add Marks </h1>
        @if(session()->has('message'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif
<form class="md-form" action="set" method="post">

	@csrf
    <div class="row">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-md-6">
            <select  class="mdb-select md-form" name="grade" required>
              <option value="">Select Grade</option>
        		<?php for($i=6;$i<=7;$i++){?>
        		<option value="<?= $i;?>"><?= $i; ?></option>
        	<?php }; ?>
            </select>
        </div>
    </div>
    <div>
        <div class="col-md-6">
            <div class="md-form">
            <label> Class</label>
            <input class="form-control" type="text" name="class" required>
            </div>
        </div>
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input  class="btn btn-info btn-sm" type="submit" name="Search" value="Search">
</form>
    </div>
    <script>
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>

@endsection
