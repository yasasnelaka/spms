<?php

namespace App\Http\Controllers;

use App\Cal_mark;
use App\Class_update;
use App\Mark;
use App\News;
use App\Notification;
use App\Performance;
use App\Student;
use App\Teacher;
use App\Teacher_subject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;
use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\Foreach_;

class PrincipleController extends Controller
{
    //view latest notification for admin
    public function read(){
        $x=DB::table('notifications')
            ->select('notifications.*')
            ->where('status','new')
            ->get();

        $change=Notification::where('status','=','new')
            ->get();
        foreach($change as $change) {
            $change->status = 'view';
            $change->save();
        }

        return view('principle.admin_notification')->with('find',$x);
    }

// view all notification (admin)
    public function admin_notification(){
        $notification=DB::table('notifications')
            ->orderBy('id','desc')
            ->get();
        return view('principle.all_admin_notification')->with('notifi',$notification);
    }
    public function newsview(){
        return view('principle.news_&_updates');
    }
//front page news
    public function news(Request $request){
        $profileImage = request()->file('file');
        $profileImageSaveAsName = time() . Auth::id() . "-file." .
            $profileImage->getClientOriginalExtension();

        $public_path = 'uploads/';
        $profile_image_url = $public_path . $profileImageSaveAsName;
        $profileImage->move($public_path, $profileImageSaveAsName);

        $news = new News;

        $news->topic = $request->Tittle;
        $news->description = $request-> Description ;
        $news->picture = $profile_image_url;

        $news->save();
        return redirect()->back();
    }

    public function reg_view(){
        $students =User::join('students','students.user_id','=','users.id')
            ->get();


        return view('principle.view_registered',['students'=>$students]);
    }

    public function student_update(Request $request){
        $student=DB::table('students')->where('admission_number',$request->id)->first();

        return view('principle.student_update_form')->with('student',$student);
    }
//Student update
    public function student_update_submit(Request $request){
        $student=Student::where('admission_number',$request->Admission_Number)->first();

        $student->full_name = $request->Full_name;
        $student->name_with_initials = $request->Initial_Name;
        $student->address = $request->Address;
        $student->dob = $request->Date_Of_Birth;
        $student->blood_group = $request->Blood_Group;
        $student->grade = $request->Grade;
        $student->class = $request->Class;
        $student->red_cross_participation = $request->Red_cross_participation;
        $student->guiding_participation = $request ->Guiding_participation;
        $student->guardian_name = $request->Guardian_Name;
        $student->admission_number = $request->Admission_Number;
        $student->nationality = $request->Nationality;
        $student->transport_method = $request->Transport_Method;
        $student->religion = $request->Religion;
        $student->grade_5_scholarship_marks = $request->Grade_5_Scholarship_Marks;
        $student->guardian_tp_number = $request->Guardian_Telephone_Number;

        $student->save();

//        $students =User::join('students','students.user_id','=','users.id')
//            ->get();
//
//        return view('admin.view_registered',['students'=>$students]);
        return redirect()->back()->with('message','Update successful....');

    }
//delete student
    public function student_delete(Request $request){

        $cal_marks = Cal_mark::where('student_admission_number', $request->id)->get();
        foreach($cal_marks as $cal_mark){
            $cal_mark->delete();
        }

        $class_update=Class_update::where('student_admission_number',$request->id)->get();
        foreach($class_update as $class_update){
            $class_update->delete();
        }

        $performance=Performance::where('admission_number_student',$request->id)->get();
        foreach($performance as $performance){
            $performance->delete();
        }
        $marks=Mark::where('admission_number',$request->id)->get();
        foreach($marks as $mark){
            $mark->delete();
        }

        $student=Student::where('admission_number',$request->id)->first();
        $student->delete();

        $user=User::where('id',$request->user_id)->first();
        $user->delete();
        return redirect()->back()->with('message','Delete Successful..');
    }

    public function teacher_update(Request $request){

        $teacher=DB::table('teachers')->join('users','users.id','=','teachers.user_id')
            ->join('roles','roles.id','=','users.role_id')
            ->join('teacher_subjects','teacher_subjects.teacher_id','=','teachers.staff_id')
            ->join('subjects','subjects.id','=','teacher_subjects.subject_id')
            ->where('staff_id',$request->id)
            ->first();

        return view('principle.teacher_update_form')->with('teacher',$teacher);
    }
    public function teacher_delete(Request $request){
        $subject=Teacher_subject::where('teacher_id',$request->id);
        $subject->delete();

        $teacher=Teacher::where('staff_id',$request->id);
        $teacher->delete();

        $user=User::where('id',$request->user_id);
        $user->delete();
        return redirect()->back()->with('message','Delete Successful..');
    }
    public function view_reg_teachers(){
        $teacher=DB::table('teachers')->join('users','users.id','=','teachers.user_id')
            ->join('roles','roles.id','=','users.role_id')
            ->get();
        return view('principle.view_registered_teachers')->with('teachers',$teacher);
    }
    public function teacher_update_submit(Request $request){
        $teacher=Teacher::where('staff_id',$request->Staff_Id)->first();

        $teacher->staff_id = $request->Staff_Id;
        $teacher->full_name = $request->Full_Name_Teacher;
        $teacher->name_with_initials = $request->Initial_Name_Teacher;
        $teacher->dob = $request->Date_Of_Birth_Teacher;
        $teacher->tp_number = $request->Telephone_Number_Teacher;
        $teacher->email = $request->Email;
        $teacher->address = $request->Address_Teacher;

        $teacher->save();

            $array = array(
                'subject_id' => $request->Subject,
                'teacher_id' => $request->Staff_Id,
                'grade' => $request->Grade_Teacher,
                'class' => $request->Class_Teacher,
            );
            Teacher_subject::insert($array);

        return redirect()->back()->with('message','Update successful....');
    }
    public function principle_home(){
        return view('principle.home_page');
    }
    public function student_details(Request $request){
        $student=DB::table('students')->where('admission_number',$request->id)->first();

        return view('principle.student_details_view')->with('student',$student);
    }
    public function count_students(){
        $count_male=Student::where('gender','male')
            ->count();
        $count_female=Student::where('gender','female')
            ->count();
        return view('principle.count_of_all_students',['count_male'=>$count_male,'count_female'=>$count_female]);
    }

    //performance
    public function add_performance(){

        return view('principle.performances');
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
        return view('principle.performance_update')->with('student',$student);
    }

    public function view_performance(){

        $x=Performance::join('students','students.admission_number','=','extra_activities.admission_number_student')
            ->select('extra_activities.*','students.full_name')
            ->get();
        return view('principle.view_performance')->with('students',$x);
    }

    public function delete_performance(Request $request){
        $delete=Performance::where('id',$request->delete_id)->first();

        $delete->delete();
        return redirect()->back()->with('message','Delete successfully');
    }

    public function index(){
        return view('principle.admin_index');
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
            return view('principle.admin_reports_error')->with(['error'=> 'Report not Found']);
        }else{
            foreach($data as $key => $value){
                $array[++$key] = ["{$value->tbl_field}", $value->number];
            }
            return view('principle.admin_reports')->with(['result'=> json_encode($array),'chart_title'=>$title,'chart_type'=>$gct,'vaxis'=>$vaxis,'haxis'=>$haxis]);
        }
    }
    //    top 10 form by average
    public function top10_form_subject(){
        $subject_list = DB::table('subjects')
            ->select('id','subject_name')
            ->get()->all();
        return view('principle.top10_form_subject')->with(['subject_list'=>$subject_list]);
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

        return view('principle.top10_subject')->with('students',$top10);
    }

    public function view_filter_performance_form(){
        return view('principle.view_performance_form');
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
            ->select('extra_activities.*','students.full_name')
            ->get();
        return view('principle.view_performance')->with('students',$x);

    }

}


