<?php

namespace App\Http\Controllers;

use App\Mark;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Table;

class StudentController extends Controller
{

    public function student(){
        $loginuser=DB::table('users')
            ->join('students','students.user_id','=','users.id')
            ->where('users.id',Auth::user()->id)
            ->first();


        session_start();
        session(['user' => $loginuser]);
        return view('student.students');
    }
    public function view_results(){

        return view('student.view_student_results');
    }
    public function Extra_Activities(){
        $extra=DB::table('extra_activities')
            ->join('students','students.admission_number','=','admission_number_student')
            ->join('users','users.id','=','students.user_id')
            ->where('users.id',Auth::user()->id)
            ->get()
            ->groupBy('admission_number_student');

        return view('student.extra_activities')->with('extra',$extra);
    }
    public function student_profile(){
        $find=DB::table('students')
            ->join('users','users.id','=','students.user_id')
            ->where('students.user_id',Auth::user()->id)
            ->first();
        return view('student.student_profile',['find'=>$find]);
    }
    public function updates(Request $request){
        $student=User::where('id',$request->user_id)->first();
//'email' => 'unique:users,email_address,' . $userId,
//If creating, proceed as usual:
//
////rules
//'email' => 'unique:users,email_address',



        if (request()->has('file')) {
            $profileImage = request()->file('file');
            $profileImageSaveAsName = time() . Auth::id() . "-file." .
                $profileImage->getClientOriginalExtension();

            $public_path = 'profile_pictures/';
            $profile_image_url = $public_path . $profileImageSaveAsName;
            $profileImage->move($public_path, $profileImageSaveAsName);

            $student->username = $request->username;
            $student->password = Hash::make($request->password);
            $student->profile_picture = $profile_image_url;
            $student->role_id = $request->role_id;

            $student->save();
            return redirect()->back();
        }else{
            $student->username = $request->username;
            $student->password = Hash::make($request->password);
            $student->role_id = $request->role_id;
            $student->save();
            return redirect()->back();
        }
    }

    public function search_results(Request $request){
        $find=DB::table('marks')
            ->join('students','students.admission_number','=','marks.admission_number')
            ->join('users','users.id','=','students.user_id')
            ->join('subjects','subjects.id','=','marks.subject_id')
            ->where('students.user_id',Auth::user()->id)
            ->where('student_grade',$request->grade)
            ->where('year',$request->year)
            ->where('term',$request->term)
            ->get();

        $avg = DB::table('cal_marks')
            ->join('students','students.admission_number','=','cal_marks.student_admission_number')
            ->join('users','users.id','=','students.user_id')
            ->where('students.user_id',Auth::user()->id)
            ->where('year',$request->year)
            ->where('term',$request->term)
            ->select('avg')
            ->first();

        return view('student.student_result_view_table')->with(['find'=>$find,'avg'=>$avg]);
    }
    public function graph(Request $request){
        $find=DB::table('marks')
            ->join('students','students.admission_number','=','marks.admission_number')
            ->join('users','users.id','=','students.user_id')
            ->join('subjects','subjects.id','=','marks.subject_id')
            ->where('students.user_id',Auth::user()->id)
            ->where('year',$request->year)
            ->where('subject_id',$request->subject)
            ->orderBy('term','asc')
            ->get()
            ->groupBy('year');
        $graph = array();

        $i = 0 ;

            foreach ($find as $find){
                foreach ($find as $find)
              $graph[$i++] = $find->marks;
            }

            $pg=o;
            if ($graph[0]<$graph[1] && $graph[1]<$graph[2] ){
                $pg = 'very Good.child has improved in this subject.Keep it up';
            }elseif ($graph[0]<$graph[1] && $graph[2]<$graph[1]){
                $pg = 'Good.Child has slightly improved.Third term marks has been reduced.pay more attention.';
            }elseif ($graph[1]<$graph[0] && $graph[2]<$graph[0]){
                $pg ='marks has been decreased in all terms.child should pay more attention to this subject.';
            }


        return response()->json(array('graph'=>$graph,'message'=>$pg));
    }
    public function graph_form(){
        $year=DB::table('marks')->select('year')->distinct()->get();

        return view('student.graph_form')->with('year',$year);

    }
    public function graph_form_2(){

        return view('student.graph_marks_form');

    }
    public function graph_2(Request $request){
        $find=DB::table('marks')
            ->join('students','students.admission_number','=','marks.admission_number')
            ->join('users','users.id','=','students.user_id')
            ->join('subjects','subjects.id','=','marks.subject_id')
            ->where('students.user_id',Auth::user()->id)
            ->where('subject_id',$request->subject)
            ->where('term',3)
            ->orderBy('term','asc')
            ->get()
            ->groupBy('year');
        $graph_2 = array();

        $i = 0 ;

        foreach ($find as $find){
            foreach ($find as $find)
                $graph_2[$i++] = $find->marks;
        }

        return response()->json($graph_2);
    }
}

