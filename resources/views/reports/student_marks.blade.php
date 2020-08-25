@extends('teacher_dashboard.dashboard')
@section('content')


<?php
//var_dump($current_term);


if (empty($students)) {
	echo 'Students not found';
}
else{
?>
<h2>Student List</h2>

<form class="md-form" action="add" method="post">
@csrf
<!--  hidden fields -->
    <input type="hidden" name="grade" value="{{$students[0]->grade}}">
    <input type="hidden" name="class" value="{{$students[0]->class}}">
    <input type="hidden" name="current_year" value="{{$current_term[0]->aca_year}}">
    <input type="hidden" name="current_term" value="{{$current_term[0]->aca_term}}">
    <div class="col-md-6">
        <select class="mdb-select md-form" name="subject" required>
            <option value="">Select Subject</option>
            @foreach($subject_list as $sub)
           <option value="{{$sub->id}}">{{$sub->subject_name}}</option>
            @endforeach
        </select>
    </div>
    <table id="table1" class="table">
        <thead class="grey lighten-2">

        <tr>
            <td>Admission No.</td>
            <td>Full name</td>
            <td>Mark</td>
        </tr>
        </thead>
        <?php
        foreach($students as $data){
            echo '<tr>';
                /* td 1*/
                echo '<td>';
                echo $data->admission_number;
                echo '</td>';
                /* td 2*/
                echo '<td>';
                echo $data->full_name;
                echo '</td>';
                /* td 3*/
                echo '<td>';
                echo '<input type="hidden" name="stu_id[]" value="'.$data->admission_number.'">';
                echo '<input type="text" name="mark[]" value="">';
                echo '</td>';

            echo '<tr>';

        } // loop end
        ?>

        </table>
    <!-- Data Table -->
    <table cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
            <td class="gutter">
                <div class="line number1 index0 alt2" style="display: none;">1</div>
            </td>
            <td class="code">
                <div class="container" style="display: none;">
                    <div class="line number1 index0 alt2" style="display: none;">&nbsp;</div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>

    <input class="btn btn-primary" type="submit" name="add_marks" value="Add Marks">

</form>

<?php
} // main else end
?>

<script>
    // Material Select Initialization

    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });
</script>
@endsection
