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

class AdminController extends Controller
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

        return view('notifications.admin_notification')->with('find',$x);
    }

// view all notification (admin)
    public function admin_notification(){
        $notification=DB::table('notifications')
            ->orderBy('id','desc')
            ->get();
        return view('notifications.all_admin_notification')->with('notifi',$notification);
    }
    public function newsview(){
        return view('news_&_updates.news_&_updates');
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


        return view('admin.view_registered',['students'=>$students]);
    }

    public function student_update(Request $request){
        $student=DB::table('students')->where('admission_number',$request->id)->first();

        return view('admin.student_update_form')->with('student',$student);
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
        return view('admin.teacher_update_form')->with('teacher',$teacher);
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
        return view('admin.view_registered_teachers')->with('teachers',$teacher);
    }
    public function teacher_update_submit(Request $request){
        $teacher = Teacher::where('staff_id',$request->Staff_Id)->first();

        $teacher->staff_id = $request->Staff_Id;
        $teacher->full_name  = $request->Full_Name_Teacher;
        $teacher->name_with_initials = $request->Initial_Name_Teacher;
        $teacher->dob = $request->Date_Of_Birth_Teacher;
        $teacher->tp_number = $request->Telephone_Number_Teacher;
        $teacher->email = $request->Email;
        $teacher->address = $request->Address_Teacher;

        $teacher->save();


            $array = array(
                'subject_id' =>$request->Subject ,
                'teacher_id' => $request->Staff_Id,
                'grade' => $request->Grade_Teacher,
                'class' => $request->Class_Teacher,
            );
            Teacher_subject::insert($array);

        return redirect()->back()->with('message','Update successful....');
    }
    //class update
    public function view_update_class(){
        $count=Student::all()
            ->count();

        return view('admin.update_class',['count'=>$count]);
    }
    public function update_class(Request $request){
        $student=DB::table('students')
            ->join('cal_marks','cal_marks.student_admission_number','=','students.admission_number')
            ->where('grade',6)
            ->orderby('avg','asc')
            ->get();


            $count=count($student);
            $y=($count/($request->size));

        for($i=0 ; $i<$y ;$i++){
           ${'data'.$i}=array();
           for ($j=0; $j<($request->size);$j++){
               ${'data'.$i}[$i]=$student[$j];
               $class_update=new Class_update;
                   foreach (${'data'.$i} as $key=>$value){
                       $class_update->student_admission_number =$value->admission_number;
                       $class_update->year = 2020;
                       if ($j==0){
                           $class_update->class ='A';
                       }elseif ($j==1){
                           $class_update->class ='B';
                       }elseif ($j==2){
                           $class_update->class ='C';
                       }elseif ($j==3){
                           $class_update->class ='D';
                       }elseif ($j==4){
                           $class_update->class ='E';
                       }
                       $class_update->grade =7;
                       $class_update->save();

                   }

           }

        }
        return redirect()->back()->with('message','success');

    }
    public function view_student_class(){
        $classes=Class_update::join('students','students.admission_number','=','class_updates.student_admission_number')
            ->select('students.full_name','class_updates.*')
            ->get();
        return view('admin.view_students_classes')->with('classes',$classes);

    }
    public function class_edit(Request $request){
        $class=Class_update::where('student_admission_number',$request->admission_number)
            ->first();
        $class->grade = $request->grade;
        $class->class = $request->class;

        $class->save();
        return redirect()->back()->with('message','Update successful....');
    }
}

//
