<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use App\Teacher;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PHPUnit\Util\Test;

class StudentController extends Controller
{
    public function studentLogin(Request $request){
        $email = $request->email;
        $password = md5($request->password);
        $result = DB::table('students')
            ->where('student_email', $email)
            ->where('student_password', $password)
            ->first();

        if ($result){
            Session::put('email', $request->email);
            Session::put('id', $result->id);
            return redirect()->route('student.dashboard');
        }else{
            Session::put('message', 'Email Or Password Not Match');
            return redirect('/');
        }
    }

    public function student_dashboard(){
        $student = Student::all()->count();
        $teacher = Teacher::all()->count();
        return view('student.dashboard', compact('student', 'teacher'));
    }

    public function logout(){
        Session::put('name', null);
        Session::put('id', null);
        return redirect::to('/');
    }

    public function index(){
        $students = Student::all();
        return view('admin.student.index',compact('students'));
    }

    public function create(){
        return view('admin.student.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'student_roll' => 'required',
            'student_name' => 'required',
            'student_fathername' => 'required',
            'student_mothername' => 'required',
            'student_email' => 'required|email',
            'student_password' => 'required',
            'student_phone' => 'required',
            'student_address' => 'required',
            'student_image' => 'required|mimes:jpeg,jpg,png,bmp,gif',
            'student_department' => 'required',
            'student_admission' => 'required'
        ]);
        $image = $request->file('student_image');
        $slug = str_slug($request->student_name);
        if (isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/student')){
                mkdir('uploads/student', 0777, true);
            }
            $image->move('uploads/student',$imageName );
        }else{
            $imageName = 'default.png';
        }
        $student = new Student();
        $student->student_roll = $request->student_roll;
        $student->student_name = $request->student_name;
        $student->student_fatherName = $request->student_fathername;
        $student->student_motherName = $request->student_mothername;
        $student->student_email = $request->student_email;
        $student->student_password = md5($request->student_password);
        $student->student_phone = $request->student_phone;
        $student->student_address = $request->student_address;
        $student->student_image = $imageName;
        $student->student_department = $request->student_department;
        $student->student_admissionYear = $request->student_admission;
        $student->save();
        Toastr::success('Student added Successfully', 'Success');
       return redirect()->route('student.index');
    }

    public function edit($id){
        $student = Student::findOrFail($id);
        return view('admin.student.edit', compact('student'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'student_roll' => 'required',
            'student_name' => 'required',
            'student_fathername' => 'required',
            'student_mothername' => 'required',
            'student_email' => 'required|email',
            'student_password' => 'required|min:6',
            'student_phone' => 'required',
            'student_address' => 'required',
            'student_image' => 'mimes:jpeg,jpg,png,bmp,gif',
            'student_admission' => 'required'
        ]);
        $image = $request->file('student_image');
        $slug = str_slug($request->student_name);
        $old_student = Student::findOrFail($id);
        if (isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/student')){
                mkdir('uploads/student', 0777, true);
            }
            if (file_exists('uploads/student/'.$old_student->student_image)){
                unlink('uploads/student/'.$old_student->student_image);
            }
            $image->move('uploads/student',$imageName );
        }else{
            $imageName = $old_student->student_image;
        }

        $old_student->student_roll = $request->student_roll;
        $old_student->student_name = $request->student_name;
        $old_student->student_fatherName = $request->student_fathername;
        $old_student->student_motherName = $request->student_mothername;
        $old_student->student_email = $request->student_email;
        $old_student->student_password = bcrypt($request->student_password);
        $old_student->student_phone = $request->student_phone;
        $old_student->student_address = $request->student_address;
        $old_student->student_image = $imageName;
        $old_student->student_admissionYear = $request->student_admission;
        $old_student->save();
        Toastr::success('Student Update Successfully', 'Success');
        return redirect()->route('student.index');
    }

    public function show($id){
        $student = Student::findOrFail($id);
        return view('admin.student.show', compact('student'));
    }

    public function destroy($id){
        $student = Student::findOrFail($id);
        if(file_exists('uploads/student/'.$student->student_image)){
            unlink('uploads/student/'.$student->student_image);
        }
        $student->delete();
        Toastr::success('Student Deleted Successfully', 'Success');
        return redirect()->back();

    }


    public function cse(){
        $cse_students = Student::where('student_department', 1)->get();
        return view('admin.student.cse', compact('cse_students'));
    }
    public function eee(){
        $eee_students = Student::where('student_department', 2)->get();
        return view('admin.student.eee', compact('eee_students'));
    }

    public function bba(){
        $bba_students = Student::where('student_department', 3)->get();
        return view('admin.student.bba', compact('bba_students'));
    }

    public function mba(){
        $mba_students = Student::where('student_department', 4)->get();
        return view('admin.student.mba', compact('mba_students'));
    }


    public function profile(){
        $student_id = Session::get('id');
        $student = Student::where('id', $student_id)->first();
        if ($student){
            return view('student.student_profile', compact('student'));
        }else{
            return redirect()->back();
        }
    }

    public function settings(){
        $student_id = Session::get('id');
        $result = DB::table('students')
            ->where('id', $student_id)
            ->first();
        if ($result){
            return view('student.settings', compact('result'));
        }else{
            return redirect()->back();
        }
    }

    public function profileUpdate(Request $request){
        $student_id = Session::get('id');
        $data['student_password'] = $request->student_password;
        $data['student_phone'] = $request->student_phone;
        $data['student_address'] = $request->student_address;

         DB::table('students')
            ->where('id', $student_id)
            ->update($data);
        Toastr::success('Profile Updated Successfully', 'Success');
        return redirect()->back();



    }


}
