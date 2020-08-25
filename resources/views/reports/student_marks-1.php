
<?php

if (empty($students)) {
	echo 'Students not found';
}
else{
?>

<form action="add" method="post">
@csrf
<h2>Student List</h2>

<select name="subject">
	<option value="100">Sub 1</option>
</select>



<table>

<tr>
	<td>Admission No.</td>
	<td>Mark</td>
</tr>

<?php
foreach($students as $data){
	echo '<tr>';
		/* td 1*/
		echo '<td>';
		echo $data->admission_number;
		echo '</td>';
		/* td 2*/
		echo '<td>';
		echo '<input type="hidden" name="stu_id" value="'.$data->admission_number.'">';
		echo '<input type="text" name="mark" value="">';
		echo '</td>';


	echo '<tr>';
} // loop end
?>

</table>

<input type="submit" name="add_marks" value="Add Marks">

</form>

<?php
} // main else end
?>
