<?php

namespace App\Http\Controllers;

use App\Cal_mark;
use App\Class_update;
use App\Mark;
use App\Performance;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Illuminate\Support\Facades\Mail;
use App\Mail\send_mail;

class ClassTeacherController extends Controller
{
    public function view(){
        return view('class_teacher.class_teacher');
    }
    public function cal_avg_condition(){
        return view('class_teacher.avg_cal_condition');
    }

    public function  view_cal_avg(Request $request){
        $students=Student::join('marks','marks.admission_number','=','students.admission_number')
            ->get();

        $marks=DB::table('marks')
            ->join('subjects','subjects.id','=','marks.subject_id')
            ->orWhere('year',$request->year)
            ->where('student_grade',$request->grade)
            ->where('class',$request->class)
            ->orderBy('subject_id','asc')
            ->get()
            ->groupBy('admission_number');

        return view('class_teacher.cal_average')->with(['students'=>$students,'marks'=>$marks,'year'=>$request->year,'term'=>$request->term]);
    }
    public function cal_avg(Request $request){


        $marks=DB::table('marks')
            ->where('term',$request->term)
            ->get()
            ->groupBy('admission_number');


        foreach($marks as $mark){
            $sum=0;
            $avg=new Cal_mark;
            foreach($mark as $mar){
                $sum+=$mar->marks;
                $y= $mar->admission_number;
            }
             $cal_avg=$sum/10;

            $avg->student_admission_number = $y;
            $avg->term = $request->term;
            $avg->avg = $cal_avg;
            $avg->year=$request->year;
            $avg->save();

        }
        $a=$request->year;
        $b=$request->term;
        return  $this->avg_rank($a,$b);


    }
    public function avg_rank(String $a,$b){
        $avg=DB::table('cal_marks')
            ->join('students','students.admission_number','=','cal_marks.student_admission_number')
            ->where('year',$a)
            ->where('term',$b)
            ->orderBy('avg', 'asc')
            ->get();
        return view('class_teacher.view_avg_marks_&_rank')->with('avgs',$avg);
    }


    //performance
    public function add_performance(){

        return view('class_teacher.performances');
    }
    public function insert_performance(Request $request){

//       $this->validate($request,['admission_number'=>'exists : students,admission_number']);
        $request->validate([
            'admission_number'=>'required|exists:students,admission_number',
            'date' => 'required',
        ]);
        //,['admission_number.exists'=>'error msg']
        $exists=Performance::where('admission_number_student',$request->admission_number)
            ->where('date',$request->date)
            ->where('event',$request->event)
            ->where('grade',$request->grade)
            ->exists();

        if ($exists == true){
            return redirect()->back()->with('message', 'This recode already exists');
        }else {
            $performance = New Performance;

            $performance->admission_number_student = $request->admission_number;
            $performance->date = $request->date;
            $performance->event = $request->event;
            $performance->rank = $request->rank;
            $performance->category = $request->category;
            if (($request->physical) == null) {
                $performance->activity = $request->none_physical;
            } else {
                $performance->activity = $request->physical;
            }
            $performance->level = $request->level;
            $class_exists = null;
            $class_exists_st = null;
            $class_exists = Class_update::where('student_admission_number', $request->admission_number)
                ->where('grade', $request->grade)
                ->exists();
            $class_exists_st = Student::where('admission_number', $request->admission_number)
                ->where('grade', $request->grade)
                ->exists();

            if ($class_exists == true || $class_exists_st == true) {
                $performance->grade = $request->grade;
                $performance->save();
                return redirect()->back()->with('message', 'Successfully added');
            } else {
                return redirect()->back()->with('message', 'Grade does not exists');
            }
        }

    }
    public function update_performance(Request $request){
        $student=Performance::where('id',$request->id)
            ->first();

        $student->admission_number_student = $request->admission_number;
        $student->date = $request->date;
        $student->event = $request->event;
        $student->rank = $request->rank;
        $student->category = $request->category;
        $student->activity = $request->activity;
        $student->level = $request->level;
        $student->grade = $request->grade;

        $student->save();
        return redirect()->back()->with('message','Successfuly updated');
    }
    public function update_performance_form(Request $request){
        $student=Performance::where('id',$request->id)
            ->first();
        return view('class_teacher.performance_update')->with('student',$student);
    }

    public function view_performance(){

        $x=Performance::join('students','students.admission_number','=','extra_activities.admission_number_student')
            ->select('extra_activities.*','students.full_name')
            ->get();
        return view('class_teacher.view_performance')->with('students',$x);
    }

    public function delete_performance(Request $request){
        $delete=Performance::where('id',$request->delete_id)->first();

        $delete->delete();
        return redirect()->back()->with('message','Delete successfully');
    }

    //email
    public function student_number_recomedation(){
        return view('class_teacher.student_number_recomedation');
    }

    public function email_form(Request $request){
        $request->validate([
            'admission_number'=>'required|exists:students,admission_number',
        ]);
        $student=Student::where('admission_number',$request->admission_number)
            ->first();
        $performance=Performance::where('admission_number_student',$request->admission_number)
            ->get()
            ->groupby('admission_number');

        return view('class_teacher.send_email')->with(['student'=>$student,'performances'=>$performance]);
    }

    public function send_email(Request $request){

        foreach ($request->performance as $text){
            $array[] = array(
                'performance' => $text,
            );
        }

        $data=array(
           'full_name'  => $request->full_name,
            'admission_number' => $request->admission_number,
            'date' => $request->date,
            'other_qualification' => $request->other_qualifications,
            'description' => $request->description,
            'email' => $request->email,
            'recommendation_for' => $request->recommendation_for,
            'performance'=>$array,
        );
        Mail::to($request->email)->send(new send_mail($data));
        return back()->with('message', 'Successfully sent a mail');
    }


    // student mark allocate
    public function student_select_form(){
        return view('class_teacher.student_select_form');
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

        return view('class_teacher.student_marks')->with(['students'=>$students,'subject_list'=>$subject_list,'current_term'=>$current_term]);

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
        return redirect('class_teacher/select-class')->with('message', 'Marks added Successfully');
    }


    //view_marks
    public function view_marks_form(){
        $subjects=DB::table('subjects')
            ->get();
        return view('class_teacher.view_marks_form')->with('subjects',$subjects);
    }

    //view_marks_class

    public function  view_marks(Request $request){
        $marks=DB::table('marks')
            ->join('subjects','subjects.id','=','marks.subject_id')
            ->join('students','students.admission_number','=','marks.admission_number')
            ->select('marks.*','students.full_name','subjects.subject_name')
            ->orWhere('year',$request->year)
            ->where('student_grade',$request->grade)
            ->where('marks.class',$request->class)
            ->where('marks.subject_id',$request->subject_id)
            ->get();

        return view('class_teacher.view_marks')->with(['marks'=>$marks,'sub'=>$request->suject_id]);
    }

    public function edit_mark(Request $request){
        $mark=Mark::where('id',$request->id)
            ->first();
        $mark->marks = $request->mark;
        $mark->save();
        return redirect()->back()->with('message','Successfuly updated');
    }

    public function delete_mark(Request $request){
        $delete=Mark::where('id',$request->id)->first();

        $delete->delete();
        return redirect()->back()->with('message','Delete successfully');
    }


    /* use to view marks individually */
    public function get_individual_marks(){
        return view('class_teacher.get_individual_marks');
    }
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
        return view('class_teacher.individual_marks')->with(['marks'=>$marks,'year'=>$year]);
    }

    public function individual_marks(Request $request){

        /* select all subjects*/
        $subject_list = DB::table('subjects')
            ->select('id','subject_name')
            ->get()->all();

        return view('class_teacher.compare_stu_sub_marks')->with(['subject_list'=>$subject_list]);

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
            return view('class_teacher.admin_reports_error')->with(['error'=> 'Report not Found']);
        }else{
            $vaxis = $data[0]->subject_name.' Marks';
            $haxis = "Terms";
            foreach($data as $key => $value){
                $array[++$key] = [$value->number,$value->tbl_field];
            }
            return view('class_teacher.admin_reports')->with(['result'=> json_encode($array),'chart_title'=>$title,'chart_type'=>$gct,'vaxis'=>$vaxis,'haxis'=>$haxis]);
        }
    }
    public function index(){
        return view('class_teacher.admin_index');
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
            return view('class_teacher.admin_reports_error')->with(['error'=> 'Report not Found']);
        }else{
            foreach($data as $key => $value){
                $array[++$key] = ["{$value->tbl_field}", $value->number];
            }
            return view('class_teacher.admin_reports')->with(['result'=> json_encode($array),'chart_title'=>$title,'chart_type'=>$gct,'vaxis'=>$vaxis,'haxis'=>$haxis]);
        }
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
            return view('class_teacher.admin_reports_error')->with(['error'=> 'Report not Found']);
        }else{
            $vaxis = 'Average';
            $haxis = "Subjects";
            foreach($data as $key => $value){
                // $val = int()$value;
                $array[++$key] = [strtoupper($value->subject_name),(int)$value->number];
            }
            return view('class_teacher.admin_reports')->with(['result'=> json_encode($array),'chart_title'=>$title,'chart_type'=>$gct,'vaxis'=>$vaxis,'haxis'=>$haxis]);
        }
    }

    /* get individual student marks gorm */
    public function term_subject_comparision(Request $request){
        /* select all subjects*/
        //$subject_list = DB::table('subjects')
        //          ->select('id','subject_name')
        //          ->get()->all();
        return view('class_teacher.term_compare_by_subject');
    }

    //    top 10 form by average
    public function top10_form_subject(){
        $subject_list = DB::table('subjects')
            ->select('id','subject_name')
            ->get()->all();
        return view('class_teacher.top10_form_subject')->with(['subject_list'=>$subject_list]);
    }
    public function top10_subject(Request $request){
        $top10 =DB::table('marks')
            ->join('subjects','subjects.id','=','marks.subject_id')
            ->join('students','students.admission_number','=','marks.admission_number')
            ->where('year',$request->year)
            ->where('term',$request->term)
            ->where('student_grade',$request->grade)
            ->where('marks.class',$request->class)
            ->where('marks.subject_id',$request->subject)
            ->orderBy('marks','desc')
            ->take(10)->get();

        return view('class_teacher.top10_subject')->with('students',$top10);
    }

    //rank of students
    public function students_form_rank(){
        return view('class_teacher.student_form_rank');
    }
    public function students_rank(Request $request){
        $students =DB::table('cal_marks')
                 ->join('students','students.admission_number','=','cal_marks.student_admission_number')
          //       ->join('class_updates','class_updates.student_admission_number','=','students.admission_number')
                    ->Where('cal_marks.year',$request->year)
                    ->Where('cal_marks.term',$request->term)
                    //->orwhere('class_updates.class',$request->class)
                   // ->orwhere('class_updates.grade',$request->grade)
                    ->orwhere('students.grade',$request->grade)
                    ->orwhere('students.class',$request->class)


                 ->orderBy('cal_marks.avg', 'desc')
                 ->get();
        return view('class_teacher.student_rank')->with('students',$students);
    }

    public function view_filter_performance_form(){
        return view('class_teacher.view_performance_form');
    }

    public function view_filter_performance(Request $request){
        $x=Performance::join('students','students.admission_number','=','extra_activities.admission_number_student')
            ->where('category',$request->category)

            ->where( function ($query) use ($request) {
                if(!empty($request->level)){
                    $query->Where('level',$request->level);
                }
                if(!empty($request->grade)){
                    $query->where('extra_activities.grade',$request->grade);
                }
                if(!empty($request->event)){
                    $query->where('event',$request->event);
                }
                if(!empty($request->physical)){
                    $query->where('activity',$request->physical);
                }
                if(!empty($request->none_physical)){
                    $query->where('activity',$request->none_physical);
                }
                if(!empty($request->date)){
                    $query->where('date',$request->date);
                }
            })
//            ->orWhere('extra_activities.grade',$request->grade)
//            ->orWhere('event',$request->event)
//            ->orWhere('activity',$request->physical)
//            ->orWhere('activity',$request->none_physical)
//            ->orWhere('date',$request->date)
            ->select('extra_activities.*','students.full_name')
            ->get();
        return view('class_teacher.view_performance')->with('students',$x);

    }
}
