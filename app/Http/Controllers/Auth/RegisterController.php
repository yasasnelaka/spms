<?php

namespace App\Http\Controllers\Auth;

use App\role;
use App\Student;
use App\Teacher;
use App\Teacher_subject;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use phpDocumentor\Reflection\Element;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: back();
    }
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',array(['auth.admin']));

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

       if ($data['role_id']==3){
        return Validator::make($data, [
            'role_id' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'profile_picture'=>['sometimes'.'image','mimes:jpg.jpeg,bmp,svg,png','max:5000'],
            'Full_name'=>['required','string'],
            'Initial_Name'=>['required','string'],
            'Address'=>['required','string'],
            'Date_Of_Birth'=>['required','date'],
            'Blood_Group'=>['required'],
            'Grade'=>['required','int'],
            'Class'=>['required','string'],
            'Nationality'=>['required','string'],
            'Telephone_Number'=>['required'],
            'Transport_Method'=>['required','string'],
            'Religion'=>['required','string'],
            'Guardian_Telephone_Number'=>['required'],
            'Admission_Number'=>['required','string','unique:students'],
        ]);
       }elseif ($data['role_id']==4 || $data['role_id']==5 || $data['role_id']==2){
           return Validator::make($data, [
               'role_id' => ['required', 'string', 'max:255'],
               'username' => ['required', 'string', 'max:255', 'unique:users'],
               'password' => ['required', 'string', 'min:4', 'confirmed'],
               'profile_picture'=>['sometimes'.'image','mimes:jpg.jpeg,bmp,svg,png','max:5000'],
               'Full_Name_Teacher' => ['required','string'],
               'Initial_Name_Teacher' => ['required','string'],
               'Address_Teacher' => ['required','string'],
               'Date_Of_Birth_Teacher' => ['required','date'],
               'Telephone_Number_Teacher' => ['required'],
               'Staff_Id'=>['required','string','unique:teachers'],
           ]);
       }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

            if (request()->has('file')) {
                $profileImage = request()->file('file');
                $profileImageSaveAsName = time() . Auth::id() . "-file." .
                    $profileImage->getClientOriginalExtension();

                $public_path = 'profile_pictures/';
                $profile_image_url = $public_path . $profileImageSaveAsName;
                $profileImage->move($public_path, $profileImageSaveAsName);

                User::create([
                    'role_id' => $data['role_id'],
                    'username' => $data['username'],
                    'password' => Hash::make($data['password']),
                    'profile_picture' => $profile_image_url,

                ]);

                $id = User::max('id');

                if ($data['role_id'] == 3) {
                    Student::create([
                        'admission_number' => $data['Admission_Number'],
                        'user_id' => $id,
                        'full_name' => $data['Full_name'],
                        'name_with_initials' => $data['Initial_Name'],
                        'dob' => $data['Date_Of_Birth'],
                        'blood_group' => $data['Blood_Group'],
                        'religion' => $data['Religion'],
                        'nationality' => $data['Nationality'],
                        'address' => $data['Address'],
                        'transport_method' => $data['Transport_Method'],
                        'grade' => $data['Grade'],
                        'gender' => $data['Gender'],
                        'class' => $data['Class'],
                        'guardian_name' => $data['Guardian_Name'],
                        'grade_5_scholarship_marks' => $data['Grade_5_Scholarship_Marks'],
                        'red_cross_participation' => $data['Red_cross_participation'],
                        'guiding_participation' => $data['Guiding_participation'],
                        'guardian_tp_number' => $data['Guardian_Telephone_Number'],

                    ]);
                }else {
                        Teacher::create([
                            'staff_id' => $data['Staff_Id'],
                            'full_name' => $data['Full_Name_Teacher'],
                            'name_with_initials' => $data['Initial_Name_Teacher'],
                            'dob' => $data['Date_Of_Birth_Teacher'],
                            'tp_number' => $data['Telephone_Number_Teacher'],
                            'email' => $data['Email'],
                            'address' => $data['Address_Teacher'],
                            'user_id' => $id,
                        ]);

                            $array=array(
                                'subject_id' => $data['Subject'],
                                'teacher_id' => $data['Staff_Id'],
                                'grade' => $data['Grade_Teacher'],
                                'class' => $data['Class_Teacher'],
                            );
                            Teacher_subject::insert($array);


                }

            } else {
                User::create([
                    'role_id' => $data['role_id'],
                    'username' => $data['username'],
                    'password' => Hash::make($data['password']),


                ]);

                $id = User::max('id');
                if ($data['role_id'] == 3) {
                    Student::create([
                        'admission_number' => $data['Admission_Number'],
                        'user_id' => $id,
                        'full_name' => $data['Full_name'],
                        'name_with_initials' => $data['Initial_Name'],
                        'dob' => $data['Date_Of_Birth'],
                        'blood_group' => $data['Blood_Group'],
                        'religion' => $data['Religion'],
                        'nationality' => $data['Nationality'],
                        'address' => $data['Address'],
                        'transport_method' => $data['Transport_Method'],
                        'grade' => $data['Grade'],
                        'gender' => $data['Gender'],
                        'class' => $data['Class'],
                        'guardian_name' => $data['Guardian_Name'],
                        'grade_5_scholarship_marks' => $data['Grade_5_Scholarship_Marks'],
                        'red_cross_participation' => $data['Red_cross_participation'],
                        'guiding_participation ' => $data['Guiding_participation'],
                        'guardian_tp_number' => $data['Guardian_Telephone_Number'],

                    ]);
                } else {
                    Teacher::create([
                        'staff_id' => $data['Staff_Id'],
                        'full_name' => $data['Full_Name_Teacher'],
                        'name_with_initials' => $data['Initial_Name_Teacher'],
                        'dob' => $data['Date_Of_Birth_Teacher'],
                        'tp_number' => $data['Telephone_Number_Teacher'],
                        'email' => $data['Email'],
                        'address' => $data['Address_Teacher'],
                        'user_id' => $id,
                    ]);

                        $array=array(
                            'subject_id' => $data['Subject'],
                            'teacher_id' => $data['Staff_Id'],
                            'grade' => $data['Grade_Teacher'],
                            'class' => $data['Class_Teacher'],
                        );
                        Teacher_subject::insert($array);



                }

            }

    }
}
