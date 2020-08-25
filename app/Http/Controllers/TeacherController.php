<?php

namespace App\Http\Controllers;
use App\Class_update;
use App\Mark;
use App\Performance;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TeacherController extends Controller
{
    public function view(){
        return view('teacher.teacher');
    }

    public function add_performance(){

        return view('teacher.performances');
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
        return view('teacher.performance_update')->with('student',$student);
    }

    public function view_performance(){

        $x=Performance::join('students','students.admission_number','=','extra_activities.admission_number_student')
            ->select('extra_activities.*','students.full_name')
            ->get();
        return view('teacher.view_performance')->with('students',$x);
    }

    public function delete_performance(Request $request){
        $delete=Performance::where('id',$request->delete_id)->first();

        $delete->delete();
        return redirect()->back()->with('message','Delete successfully');
    }


    //add marks

    public function add_marks_view(){
        $students=Student::all();
        return view('teacher.marks_update')->with('students',$students);
    }

    //view_marks
    public function view_marks_form(){
        $subjects=DB::table('subjects')
            ->get();
        return view('teacher.view_marks_form')->with('subjects',$subjects);
    }
    //view_marks_class

    public function  view_marks(Request $request){
        $marks=DB::table('marks')
            ->join('subjects','subjects.id','=','marks.subject_id')
            ->join('students','students.admission_number','=','marks.admission_number')
            ->Where('year',$request->year)
            ->Where('term',$request->term)
            ->where('student_grade',$request->grade)
            ->where('marks.class',$request->class)
            ->where('marks.subject_id',$request->subject_id)
            ->select('marks.*','students.full_name','subjects.subject_name')
            ->get();

        return view('teacher.view_marks')->with(['marks'=>$marks,'sub'=>$request->suject_id]);
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

    //    top 10 form by average
    public function top10_form_subject(){
        $subject_list = DB::table('subjects')
            ->select('id','subject_name')
            ->get()->all();
        return view('teacher.top10_form_subject')->with(['subject_list'=>$subject_list]);
    }
    public function top10_subject(Request $request){
        $top10 =DB::table('marks')
            ->join('subjects','subjects.id','=','marks.subject_id')
            ->join('students','students.admission_number','=','marks.admission_number')
            ->Where('year',$request->year)
            ->Where('term',$request->term)
            ->where('student_grade',$request->grade)
            ->where('marks.class',$request->class)
            ->where('marks.subject_id',$request->subject)
            ->orderBy('marks','desc')
            ->take(10)->get();

        return view('teacher.top10_subject')->with('students',$top10);
    }
    public function view_chart_form(){
        $year=DB::table('marks')->select('year')->distinct()->get();
        $class=DB::table('marks')->select('class')->distinct()->get();

        return view('teacher.marks_grade_count_chart_form')->with(['year'=>$year,'class'=>$class]);

    }

    public function subject_grade(Request $request){
        $students_a=DB::table('marks')
            ->join('students','students.admission_number','=','marks.admission_number')
            ->join('subjects','subjects.id','marks.subject_id')
            ->where('marks','>','75')
            ->where('term',$request->term)
            ->where('year',$request->year)
            ->where('subject_id',$request->subject)
            ->where('marks.student_grade',$request->grade)
            ->count();
        $students_b=DB::table('marks')
            ->join('students','students.admission_number','=','marks.admission_number')
            ->join('subjects','subjects.id','marks.subject_id')
            ->where('marks','>=','65')
            ->where('marks','<','75')
            ->where('term',$request->term)
            ->where('year',$request->year)
            ->where('subject_id',$request->subject)
            ->where('marks.student_grade',$request->grade)
            ->count();
        $students_c=DB::table('marks')
            ->join('students','students.admission_number','=','marks.admission_number')
            ->join('subjects','subjects.id','marks.subject_id')
            ->where('marks','>=','55')
            ->where('marks','<','65')
            ->where('term',$request->term)
            ->where('year',$request->year)
            ->where('subject_id',$request->subject)
            ->where('marks.student_grade',$request->grade)
            ->count();
        $students_s=DB::table('marks')
            ->join('students','students.admission_number','=','marks.admission_number')
            ->join('subjects','subjects.id','marks.subject_id')
            ->where('marks','<','55')
            ->where('marks','>=','35')
            ->where('term',$request->term)
            ->where('year',$request->year)
            ->where('subject_id',$request->subject)
            ->where('marks.student_grade',$request->grade)
            ->count();

        $students_f=DB::table('marks')
            ->join('students','students.admission_number','=','marks.admission_number')
            ->join('subjects','subjects.id','marks.subject_id')
            ->where('marks','<','35')
            ->where('term',$request->term)
            ->where('year',$request->year)
            ->where('subject_id',$request->subject)
            ->where('marks.student_grade',$request->grade)
            ->count();

        $graph = array();

        $graph[0]= $students_a;
        $graph[1]= $students_b;
        $graph[2]= $students_c;
        $graph[3]= $students_s;
        $graph[4]= $students_f;
        return response()->json($graph);

    }
}
