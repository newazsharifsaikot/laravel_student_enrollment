@extends('layouts.master')


@section('title', 'Student')

@section('css')


@endsection

@section('content')
    <div class="content-wrapper">
        <h1 class="page-title">Add New Student</h1>
        <div class="row">
            <div class="col-12 col-lg-10 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{route('student.store')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{ $errors->has('student_roll') ? 'has-error' : ''}}">
                                <label for="exampleInputRoll">Student Roll</label>
                                <input type="text" class="form-control p-input" name="student_roll" placeholder="Student Roll">
                                {!! $errors->first('student_roll', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('student_name') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Student Name</label>
                                <input type="text" class="form-control p-input" name="student_name" placeholder="Student Name">
                                {!! $errors->first('student_name', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('student_fathername') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Student FatherName</label>
                                <input type="text" class="form-control p-input" name="student_fathername" placeholder="Student FatherName">
                                {!! $errors->first('student_fathername', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('student_mothername') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Student MotherName</label>
                                <input type="text" class="form-control p-input" name="student_mothername" placeholder="Student MotherName">
                                {!! $errors->first('student_mothername', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('student_email') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Student Email</label>
                                <input type="email" class="form-control p-input" name="student_email" placeholder="Student Email">
                                {!! $errors->first('student_email', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('student_password') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Student Password</label>
                                <input type="password" class="form-control p-input" name="student_password" placeholder="Student Password">
                                {!! $errors->first('student_password', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('student_phone') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Student Phone</label>
                                <input type="text" class="form-control p-input" name="student_phone" placeholder="Student Phone">
                                {!! $errors->first('student_phone', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('student_address') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Student Address</label>
                                <input type="text" class="form-control p-input" name="student_address" placeholder="Student Address">
                                {!! $errors->first('student_address', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('student_image') ? 'has-error' : ''}}">
                                <label>Upload Image</label>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="exampleInputFile2" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Browse</label>
                                        <input type="file" class="form-control-file" name="student_image" aria-describedby="fileHelp" id="exampleInputFile2">
                                        {!! $errors->first('student_image', '<p class="help-block" style="color:red">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Student Department</label>
                                <select name="student_department" class="form-control">
                                    <option value="1">cse</option>
                                    <option value="2">eee</option>
                                    <option value="3">bba</option>
                                    <option value="4">mba</option>

                                </select>

                            </div>
                            <div class="form-group {{ $errors->has('student_admission') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Student Admission Year</label>
                                <input type="date" class="form-control p-input" name="student_admission">
                                {!! $errors->first('student_admission', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')

@endsection