<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('auth.login');
});
Route::get('/dashboard',function(){
    return view('teacher.teacher_home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', 'RoleController@admin')->middleware(['auth','auth.admin']);



//student
Route::group(['middleware' => ['auth','auth.student']], function () {
    Route::get('/students','StudentController@student');
    Route::get('/view_student_results','StudentController@view_results');
    Route::get('/search_student_results','StudentController@search_results');
    Route::get('/extra_activities','StudentController@extra_activities');
    Route::get('/student_profile','StudentController@student_profile');
    Route::get('/students/graph','StudentController@graph');
    Route::get('/students/graph_form','StudentController@graph_form');
    Route::post('/student_profile_update','StudentController@updates');

    //graph 2
    Route::get('/students/graph_2','StudentController@graph_2');
    Route::get('/students/graph_form_2','StudentController@graph_form_2');


    });


//principle
Route::group(['middleware' => ['auth','auth.principle']], function () {
    Route::get('/principle', 'PrincipleController@principle_home');
    Route::post('/principle/news_&_updates' , 'PrincipleController@news');
    Route::get('/principle/news_&_updates_form' , 'PrincipleController@newsview');
    //student update & view & delete
    Route::get('/principle/view_reg' , 'PrincipleController@reg_view');
    Route::get('/principle/student_update' , 'PrincipleController@student_update');
    Route::put('/principle/student_update' , 'PrincipleController@student_update_submit');
    Route::delete('/principle/student_delete' , 'PrincipleController@student_delete');
    Route::get('/principle/student_details_view' , 'PrincipleController@student_details');
    //teacher update and view & delete
    Route::get('/principle/view_reg_teachers' , 'PrincipleController@view_reg_teachers');
    Route::get('/principle/teacher_update' , 'PrincipleController@teacher_update');
    Route::put('/principle/teacher_update' , 'PrincipleController@teacher_update_submit');
    Route::delete('/principle/teacher_delete' , 'PrincipleController@teacher_delete');
    //notification
    Route::get('/principle/notification','PrincipleController@read');
    Route::get('/principle/notification_change','PrincipleController@change');
    Route::get('/principle/admin_notification','PrincipleController@admin_notification');
    //count_of_students
    Route::get('/principle/count_of_students','PrincipleController@count_students');
    //performance
//    Route::get('/principle/add_performance','PrincipleController@add_performance');
//    Route::post('/principle/insert_performance','PrincipleController@insert_performance');
    Route::get('/principle/view_filter_performance_form','PrincipleController@view_filter_performance_form');
    Route::get('/principle/view_filter_performance','PrincipleController@view_filter_performance');
    Route::get('/principle/view_performance','PrincipleController@view_performance');
    Route::get('/principle/update_performance','PrincipleController@update_performance_form');
    Route::put('/principle/update_performance','PrincipleController@update_performance');
    Route::delete('/principle/delete_performance','PrincipleController@delete_performance');
    /* Reporting */
    Route::get('/principle/reports','PrincipleController@index');
    Route::get('/principle/reports/student-by/{type}/{chart_type}', ['uses'=>'PrincipleController@student_by']);
    //top 10 students
    Route::get('/principle/top10_form_subject', 'PrincipleController@top10_form_subject');
    Route::get('/principle/top10_subject', 'PrincipleController@top10_subject');

});

////class teacher
//        //Route::get('/view_my_account', 'ClassTeacherController@teacher');
//        Route::get('/view_student_details', 'ClassTeacherController@teacher');
//        Route::post('/view_student_details', 'ClassTeacherController@view_stu');
//        Route::get('/view_subject_wise_marks', 'ClassTeacherController@subjectmarks');
//        Route::get('/view_yearly_results_comparison', 'ClassTeacherController@yearly');
//        Route::get('/view_home_page', 'ClassTeacherController@home');


        //home page
        Route::get('/home_page', 'HomePageController@view');
        Route::post('/upload', 'HomePageController@upload');
        Route::post('/customize_message', 'HomePageController@store');


//prefect
Route::get('/prefect','PrefectController@view');
Route::post('/check','RegisterController@check');


//admin
Route::group(['middleware' => ['auth','auth.admin']], function () {
    Route::post('/news_&_updates', 'AdminController@news');
    Route::get('/news_&_updates_form', 'AdminController@newsview');
    //student update & view & delete
    Route::get('/view_reg', 'AdminController@reg_view');
    Route::get('/student_update', 'AdminController@student_update');
    Route::put('/student_update', 'AdminController@student_update_submit');
    Route::delete('/student_delete', 'AdminController@student_delete');
    //admin update class
    Route::get('/view_update_class', 'AdminController@view_update_class');
    Route::get('/update_class', 'AdminController@update_class');
    Route::get('/view_student_class', 'AdminController@view_student_class');
    Route::put('/student_class_edit', 'AdminController@class_edit');
    Route::delete('/student_class_delete', 'AdminController@class_edit');
    //teacher update and view & delete
    Route::get('/view_reg_teachers', 'AdminController@view_reg_teachers');
    Route::get('/teacher_update', 'AdminController@teacher_update');
    Route::put('/teacher_update', 'AdminController@teacher_update_submit');
    Route::delete('/teacher_delete', 'AdminController@teacher_delete');
    //notification
    Route::get('/notification', 'AdminController@read');
    Route::get('/notification_change', 'AdminController@change');
    Route::get('/admin_notification', 'AdminController@admin_notification');
});

//teacher
Route::group(['middleware' => ['auth','auth.teacher']], function () {
    Route::get('/teacher', 'TeacherController@view');
    //teacher->performance
    Route::get('/teacher/add_performance', 'TeacherController@add_performance');
    Route::post('/teacher/insert_performance', 'TeacherController@insert_performance');
    Route::get('/teacher/view_performance', 'TeacherController@view_performance');
    Route::get('/teacher/update_performance', 'TeacherController@update_performance_form');
    Route::put('/teacher/update_performance', 'TeacherController@update_performance');
    Route::delete('/teacher/delete_performance', 'TeacherController@delete_performance');
    //teacher add marks
    Route::get('/teacher/add_marks_form_view', 'TeacherController@add_marks_view');
    //teacher_view_marks
    Route::get('/teacher/view_marks_form', 'TeacherController@view_marks_form');
    Route::get('/teacher/view_marks', 'TeacherController@view_marks');
    Route::put('/teacher/edit_mark', 'TeacherController@edit_mark');
    Route::delete('/teacher/delete_mark', 'TeacherController@delete_mark');
    //top 10 students
    Route::get('/teacher/top10_form_subject', 'TeacherController@top10_form_subject');
    Route::get('/teacher/top10_subject', 'TeacherController@top10_subject');
    //graph for grading
    Route::get('/teacher/marks_grade_count_chart_form', 'TeacherController@view_chart_form');
    Route::get('/teacher/marks_grade_count_chart', 'TeacherController@subject_grade');

});

//class teacher
Route::group(['middleware' => ['auth','auth.classTeacher']], function () {
    Route::get('/class_teacher', 'ClassTeacherController@view');
    //avg clc
    Route::get('/class_teacher/view_cal_avg', 'ClassTeacherController@view_cal_avg');
    Route::get('/class_teacher/cal_avg_rank', 'ClassTeacherController@cal_avg');
    Route::get('/class_teacher/cal_avg_condition', 'ClassTeacherController@cal_avg_condition');
    Route::get('/class_teacher/view_avg_marks_&_rank', 'ClassTeacherController@avg_rank');
    //class_teacher->performance
    Route::get('/class_teacher/view_filter_performance_form', 'ClassTeacherController@view_filter_performance_form');
    Route::get('/class_teacher/view_filter_performance', 'ClassTeacherController@view_filter_performance');
    Route::get('/class_teacher/add_performance', 'ClassTeacherController@add_performance');
    Route::post('/class_teacher/insert_performance', 'ClassTeacherController@insert_performance');
    Route::get('/class_teacher/view_performance', 'ClassTeacherController@view_performance');
    Route::get('/class_teacher/update_performance', 'ClassTeacherController@update_performance_form');
    Route::put('/class_teacher/update_performance', 'ClassTeacherController@update_performance');
    Route::delete('/class_teacher/delete_performance', 'ClassTeacherController@delete_performance');
    //send email
    Route::get('/class_teacher/student_number_recomedation', 'ClassTeacherController@student_number_recomedation');
    Route::get('/class_teacher/email_form', 'ClassTeacherController@email_form');
    Route::post('/class_teacher/send_email', 'ClassTeacherController@send_email');
    // student mark allocate
    Route::get('/class_teacher/select-class', 'ClassTeacherController@student_select_form');
    Route::post('/class_teacher/set', 'ClassTeacherController@set_marks');
    Route::post('/class_teacher/add', 'ClassTeacherController@add_marks');
    //class_teacher_view_marks
    Route::get('/class_teacher/view_marks_form', 'ClassTeacherController@view_marks_form');
    Route::get('/class_teacher/view_marks', 'ClassTeacherController@view_marks');
    Route::put('/class_teacher/edit_mark', 'ClassTeacherController@edit_mark');
    Route::delete('/class_teacher/delete_mark', 'ClassTeacherController@delete_mark');
    // display marks
    Route::get('/class_teacher/select-student', 'ClassTeacherController@get_individual_marks');
    Route::post('/class_teacher/display-marks', 'ClassTeacherController@get_marks_by_student');

        // student marks
    Route::get('/class_teacher/individual', 'ClassTeacherController@individual_marks');
    Route::post('/class_teacher/by-term', 'ClassTeacherController@student_marks_compare');
    /* Reporting */
    Route::get('/class_teacher/reports', 'ClassTeacherController@index');
    Route::get('/class_teacher/reports/student-by/{type}/{chart_type}', ['uses' => 'ClassTeacherController@student_by']);
    // Subject Comparision by year and term (Based on Average)
    Route::get('/class_teacher/compare/term-subject', 'ClassTeacherController@term_subject_comparision');
    Route::post('/class_teacher/compare/subject', 'ClassTeacherController@subject_compare');
    //top 10 students
    Route::get('/class_teacher/top10_form_subject', 'ClassTeacherController@top10_form_subject');
    Route::get('/class_teacher/top10_subject', 'ClassTeacherController@top10_subject');
    //lowest 10 students
    Route::get('/class_teacher/lowest_form_subject', 'ClassTeacherController@top10_form_subject');
    Route::get('/class_teacher/lowest_subject', 'ClassTeacherController@top10_subject');
    //rank of students
    Route::get('/class_teacher/students_form_rank', 'ClassTeacherController@students_form_rank');
    Route::get('/class_teacher/students_rank', 'ClassTeacherController@students_rank');
});

/* ================ NEW ROUTES ================= */
Route::group(['middleware' => ['auth','auth.teacher']], function () {
    /* Reporting */
    Route::get('/reports', 'ReportController@index');
    Route::get('/reports/student-by/{type}/{chart_type}', ['uses' => 'ReportController@student_by']);

// student mark allocate
    Route::view('/marks/select-class', 'reports/student_select_form');
    Route::post('/marks/set', 'ReportController@set_marks');
    Route::post('/marks/add', 'ReportController@add_marks');

// display marks
    Route::view('/marks/select-student', 'reports/get_individual_marks');
    Route::post('/marks/display-marks', 'ReportController@get_marks_by_student');

// student marks
    Route::get('/marks/individual', 'ReportController@individual_marks');
    Route::post('/marks/by-term', 'ReportController@student_marks_compare');


// Subject Comparision by year and term (Based on Average)
    Route::get('/compare/term-subject', 'ReportController@term_subject_comparision');
    Route::post('/compare/subject', 'ReportController@subject_compare');

});

