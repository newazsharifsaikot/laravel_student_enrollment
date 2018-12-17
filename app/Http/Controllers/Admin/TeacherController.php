<?php

namespace App\Http\Controllers\Admin;

use App\Teacher;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    public function index(){
        $teachers = Teacher::all();
        return view('admin.teacher.all_teacher', compact('teachers'));
    }

    public function create(){
        return view('admin.teacher.add_teacher');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'department' => 'required',
            'address' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,bmp,gif'
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/teacher')){
                mkdir('uploads/teacher', 0777, true);
            }
            $image->move('uploads/teacher',$imageName );
        }else{
            $imageName = 'default.png';
        }
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->image = $imageName;
        $teacher->phone = $request->phone;
        $teacher->department = $request->department;
        $teacher->address = $request->address;
        $teacher->save();
        Toastr::success('Teacher added Successfully', 'Success');
        return redirect()->route('teacher.index');
    }

    public function edit($id){
        $teacher = Teacher::findOrFail($id);
        return view('admin.teacher.edit', compact('teacher'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'mimes:jpeg,jpg,png,bmp,gif'
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        $teacher = Teacher::findOrFail($id);
        if (isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/teacher')){
                mkdir('uploads/teacher', 0777, true);
            }
            if (file_exists('uploads/teacher/'.$teacher->image)){
                unlink('uploads/teacher/'.$teacher->image);
            }
            $image->move('uploads/teacher',$imageName );
        }else{
            $imageName = $teacher->image;
        }
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->image = $imageName;
        $teacher->phone = $request->phone;
        $teacher->address = $request->address;
        $teacher->save();
        Toastr::success('Teacher Updated Successfully', 'Success');
        return redirect()->route('teacher.index');
    }

    public function show($id){
        $teacher = Teacher::findOrFail($id);
        return view('admin.teacher.show', compact('teacher'));
    }

    public function destroy($id){
        $teacher = Teacher::findORFail($id);
        if(file_exists('uploads/teacher/'.$teacher->image)){
            unlink('uploads/teacher/'.$teacher->image);
        }
        $teacher->delete();
        Toastr::success('Teacher Delete Successfully', 'Success');
        return redirect()->back();

    }

}
