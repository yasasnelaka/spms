@extends('class_teacher_dashboard.dashboard')
@section('content')
<!doctype html>
<html lang="en">
{{--  <head>--}}
{{--    <!-- Required meta tags -->--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}

{{--    <!-- Bootstrap CSS -->--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}

{{--    <title></title>--}}
{{--  </head>--}}
  <body>

<pre>
<?php
//print_r($marks);
?>
</pre>

<div class="container">
<div class="row">
	<div class="col-lg-6">


<?php
/* get the grade from subject marks*/
function get_grade($mark){
	$label = '';
	if ($mark >= 75) {
		$label = 'A';
	}
	elseif ($mark >= 55) {
		$label = 'B';
	}
	elseif ($mark >= 45) {
		$label = 'C';
	}
	elseif ($mark >= 25) {
		$label = 'D';
	}
	else{
		$label = 'F';
	}
return $label;
}
?>


<h1>Student Marks</h1>
<?php
if(empty($marks)){
	echo 'No result found';
}else{
?>
<!-- <p>Student Name. {{$marks[0]->admission_number}}</p> -->
<p>Student Index No. {{$marks[0]->admission_number}}</p>

<p class="text-danger"><?= $year.' Term One'?></p>
<table class="table">
	<thead>
		<tr>
			<th>Subject Name</th>
			<th>Marks</th>
			<th>Grade</th>
		</tr>
	</thead>
	<tbody>
		@foreach($marks as $mark)
		<!-- For term one -->
		<?php
		if ($mark->year == $year && $mark->term == 1 ) {?>

		<tr>
			<td>{{$mark->subject_name}}</td>
			<td>{{$mark->marks}}</td>
			<td><?= get_grade($mark->marks); ?></td>
		</tr>
		<?php } ?>
	</tbody>
		@endforeach
	</thead>
</table>

<!-- Term 2 -->
<br>
<p class="text-danger"><?= $year.' Term Two'?></p>
<table class="table">
	<thead>
		<tr>
			<th>Subject Name</th>
			<th>Marks</th>
			<th>Grade</th>
		</tr>
	</thead>
	<tbody>
		@foreach($marks as $mark)
		<?php
		if ($mark->year == $year && $mark->term == 2 ) {?>

		<tr>
			<td>{{$mark->subject_name}}</td>
			<td>{{$mark->marks}}</td>
			<td><?= get_grade($mark->marks); ?></td>
		</tr>
		<?php } ?>
	</tbody>
		@endforeach
	</thead>
</table>

<br>
<p class="text-danger"><?= $year.' Term Three'?></p>
<table class="table">
	<thead>
		<tr>
			<th>Subject Name</th>
			<th>Marks</th>
			<th>Grade</th>
		</tr>
	</thead>
	<tbody>
		@foreach($marks as $mark)

		<?php
		if ($mark->year == $year && $mark->term == 3 ) {?>
		<tr>
			<td>{{$mark->subject_name}}</td>
			<td>{{$mark->marks}}</td>
			<td><?= get_grade($mark->marks); ?></td>
		</tr>
		<?php } ?>
	</tbody>
		@endforeach
	</thead>
</table>



<?php } ?>

<!-- bootstrap container -->
</div>
</div>
</div>



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}
  </body>
</html>
@endsection
