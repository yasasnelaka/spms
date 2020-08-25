<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Reports;

class ReportController extends Controller
{

public function index(){
    return view('reports.admin_index');
}

public function student_by($field,$chart_type=1){
    $field = strtolower($field);
    if ($chart_type == 1) {
        $gct = 'PieChart';
    }
    elseif ($chart_type == 2) {
        $gct = 'ColumnChart';
    }
    else{
        $gct = 'PieChart';
    }

    $title = 'Students by '.ucwords(str_replace("_", " ",$field));
    //$chart_type;
    //echo __CLASS__;
    $vaxis = '';
    $haxis = '';

    $data = DB::table('students')
        ->select(
        DB::raw($field .' as tbl_field'),
        DB::raw('count(*) as number'))
        ->groupBy($field)
        ->get();
    $array[] = [$field, 'Count'];
    if ($data->isEmpty()) {
        return view('reports.admin_reports_error')->with(['error'=> 'Report not Found']);
    }else{
        foreach($data as $key => $value){
            $array[++$key] = ["{$value->tbl_field}", $value->number];
        }
    return view('reports.admin_reports')->with(['result'=> json_encode($array),'chart_title'=>$title,'chart_type'=>$gct,'vaxis'=>$vaxis,'haxis'=>$haxis]);
    }
}

/* use to set marks */
public function set_marks(Request $request){
   $class = $request->input('class');
   $grade = $request->input('grade');

    /* select student belongs to selected class*/
    $students = DB::table('students')
                ->select('admission_number','class','grade','full_name')
                ->where(['grade'=>$grade,'class'=>$class])
                ->get()->all();

    /* select all subjects*/
    $subject_list = DB::table('subjects')
                ->select('id','subject_name')
                ->get()->all();
    /* get current term */
    $current_term = DB::table('academic_term')
                ->where(['is_current_term'=>1])
                ->select('aca_year','aca_term')
                ->take(1)
                ->get();

return view('reports.student_marks')->with(['students'=>$students,'subject_list'=>$subject_list,'current_term'=>$current_term]);

}

/* use to insert marks to the DB with dynamic data*/
public function add_marks(Request $request){
    /* insert dynamic data to db*/
    foreach ($request->input('mark') as $key=>$mark) {

        /* if marks is empty leave the insert */
        if ($request->mark[$key] != "") {
            DB::table('marks')->insert(
            array(
            'admission_number' => $request->stu_id[$key],
            'year'  => $request->input('current_year'), // student year
            'student_grade' => $request->input('grade'),
            'class' => $request->input('class'),
            'term' => $request->input('current_term'),
            'subject_id' => $request->input('subject'),
            'marks' => $mark)
            );
        }

    }
    /* Should Redirect with a message */
     //echo $message = 'Marks added Successfully';
    return redirect('marks/select-class')->with('message', 'Marks added Successfully');
}

/* use to view marks individually */
public function get_marks_by_student(Request $request){
   $stu_id = $request->input('stu_id');
   $class = $request->input('class');
   $grade = $request->input('grade');
   $year = $request->input('year');
   $marks = DB::table('marks')
                ->select('*')
                //->join('students','students.admission_number','=','marks.admission_number')
                ->join('subjects','subjects.id','=','marks.subject_id')
                ->where(['admission_number'=>$stu_id,'student_grade'=>$grade,'class'=>$class,'year'=>$year])
                //->groupBy('year','term')
                ->get()->all();
        return view('reports.individual_marks')->with(['marks'=>$marks,'year'=>$year]);
}

// with comparision graph
public function student_marks_compare(Request $request){
    $select = strtolower('marks');
    $gct = 'ColumnChart';
    $year = $request->input('year');
    $subject_id = $request->input('subject');
    $admission_number = $request->input('stu_id');;
    $group = 'term';

    $title = 'Subject Marks by '.ucwords(str_replace("_", " ",$group));

    $data = DB::table('marks')
        ->select(
        DB::raw($select .' as tbl_field'),
        DB::raw('subject_name'),
        DB::raw('term as number'))
        ->join('subjects','subjects.id','=','marks.subject_id')
        ->where(['admission_number'=>$admission_number,'year'=>$year,'subject_id'=>$subject_id])
        ->groupBy($group)
        ->get();
        /*echo '<pre>';
        var_dump($data->isEmpty());
        echo '</pre>';
        exit(); */

    $array[] = [$select, 'Mark'];
    if ($data->isEmpty()) {
        return view('reports.admin_reports_error')->with(['error'=> 'Report not Found']);
    }else{
        $vaxis = $data[0]->subject_name.' Marks';
        $haxis = "Terms";
        foreach($data as $key => $value){
            $array[++$key] = [$value->number,$value->tbl_field];
        }
    return view('reports.admin_reports')->with(['result'=> json_encode($array),'chart_title'=>$title,'chart_type'=>$gct,'vaxis'=>$vaxis,'haxis'=>$haxis]);
    }
}

/* get individual student marks gorm */
public function individual_marks(Request $request){

    /* select all subjects*/
    $subject_list = DB::table('subjects')
                ->select('id','subject_name')
                ->get()->all();

return view('reports.compare_stu_sub_marks')->with(['subject_list'=>$subject_list]);

}

// get comparision if subjects
public function subject_compare(Request $request){
    $select = strtolower('marks');
    $gct = 'ColumnChart';
    $year = $request->input('year');
    $term = $request->input('term');

    $group = 'subject_id';

    $title = 'Subject comparision by average students marks';

    $data = DB::table('marks')
        ->select(
        DB::raw($select .' as tbl_field'),
        DB::raw('subject_name'),
        DB::raw('AVG(marks) as number'))
        ->join('subjects','subjects.id','=','marks.subject_id')
        ->where(['year'=>$year,'term'=>$term])
        ->groupBy($group)
        ->get();

        /*echo '<pre>';
        var_dump($data);
        var_dump($data->isEmpty());
        echo '</pre>';*/
        //exit();

    $array[] = [$select, 'Average'];
    if ($data->isEmpty()) {
        return view('reports.admin_reports_error')->with(['error'=> 'Report not Found']);
    }else{
        $vaxis = 'Average';
        $haxis = "Subjects";
        foreach($data as $key => $value){
           // $val = int()$value;
            $array[++$key] = [strtoupper($value->subject_name),(int)$value->number];
        }
    return view('reports.admin_reports')->with(['result'=> json_encode($array),'chart_title'=>$title,'chart_type'=>$gct,'vaxis'=>$vaxis,'haxis'=>$haxis]);
    }
}

/* get individual student marks gorm */
public function term_subject_comparision(Request $request){
    /* select all subjects*/
    //$subject_list = DB::table('subjects')
      //          ->select('id','subject_name')
      //          ->get()->all();
    return view('reports.term_compare_by_subject');

}




} // End Class
