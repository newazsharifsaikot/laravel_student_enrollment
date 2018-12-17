<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    public function index(){
        $students = Student::all()->count();
        $teachers = Teacher::all()->count();
        return view('admin.dashboard', compact('students','teachers'));
    }
    public function logout(){
        Session::put('name', null);
        Session::put('id', null);
        return redirect::to('/admin');
    }

    public function store(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

       $email = $request->email;
       $password = md5($request->password);
       $result = DB::table('admin_logins')
                ->where('email', $email)
                ->where('password', $password)
                ->first();

       if($result){
           Session::put('email', $request->email);
           Session::put('id', $result->id);
            return Redirect::to('admin/dashboard');
       }else{
           Session::put('message', 'Email Or Password Not Match');
           return Redirect::to('/admin');
       }

    }
}
