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
    return view('student_login');
});
Route::get('/admin', function () {
    return view('admin.admin_login');
});

Route::group(['namespace'=> 'Admin'], function (){
    Route::get('admin/dashboard', 'AdminLoginController@index')->name('admin.dashboard');
    Route::post('adminLogin', 'AdminLoginController@store')->name('admin.adminLogin');
    Route::get('admin/logout', 'AdminLoginController@logout')->name('admin.logout');
    Route::get('logout', 'StudentController@logout')->name('student.logout');
    Route::post('studentLogin', 'StudentController@studentLogin')->name('student.studentLogin');
    Route::get('dashboard', 'StudentController@student_dashboard')->name('student.dashboard');

    //Student Route
    Route::get('student', 'StudentController@index')->name('student.index');
    Route::get('student/create', 'StudentController@create')->name('student.create');
    Route::post('student/store', 'StudentController@store')->name('student.store');
    Route::get('student/edit/{id}', 'StudentController@edit')->name('student.edit');
    Route::get('student/show/{id}', 'StudentController@show')->name('student.show');
    Route::put('student/update/{id}', 'StudentController@update')->name('student.update');
    Route::delete('student/delete/{id}', 'StudentController@destroy')->name('student.destroy');

    //Department WIse Student
    Route::get('cse', 'StudentController@cse')->name('cse');
    Route::delete('cse/delete/{id}', 'StudentController@destroy')->name('cse.destroy');
    Route::get('eee', 'StudentController@eee')->name('eee');
    Route::delete('eee/delete/{id}', 'StudentController@destroy')->name('eee.destroy');
    Route::get('bba', 'StudentController@bba')->name('bba');
    Route::delete('bba/delete/{id}', 'StudentController@destroy')->name('bba.destroy');
    Route::get('mba', 'StudentController@mba')->name('mba');
    Route::delete('mba/delete/{id}', 'StudentController@destroy')->name('mba.destroy');

    //Teacher Route
    Route::get('teacher', 'TeacherController@index')->name('teacher.index');
    Route::get('teacher/create', 'TeacherController@create')->name('teacher.create');
    Route::post('teacher/store', 'TeacherController@store')->name('teacher.store');
    Route::get('teacher/edit/{id}', 'TeacherController@edit')->name('teacher.edit');
    Route::put('teacher/update/{id}', 'TeacherController@update')->name('teacher.update');
    Route::get('teacher/show/{id}', 'TeacherController@show')->name('teacher.show');
    Route::delete('teacher/delete/{id}', 'TeacherController@destroy')->name('teacher.destroy');

    //student profile route
    Route::get('student/profile', 'StudentController@profile')->name('student.profile');
    Route::get('student/settings', 'StudentController@settings')->name('student.settings');
    Route::put('student/profile/update', 'StudentController@profileUpdate')->name('student.profile.update');


});
