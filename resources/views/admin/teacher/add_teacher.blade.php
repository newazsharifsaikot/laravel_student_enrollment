@extends('layouts.master')


@section('title', 'Add_teacher')

@section('css')


@endsection

@section('content')
    <div class="content-wrapper">
        <h1 class="page-title">Add New Teacher</h1>
        <div class="row">
            <div class="col-12 col-lg-10 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{route('teacher.store')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Name</label>
                                <input type="text" class="form-control p-input" name="name" placeholder="Name">
                                {!! $errors->first('name', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Email</label>
                                <input type="email" class="form-control p-input" name="email" placeholder="Email">
                                {!! $errors->first('email', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Phone</label>
                                <input type="text" class="form-control p-input" name="phone" placeholder="Phone">
                                {!! $errors->first('phone', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Department</label>
                                <select name="department" class="form-control">
                                    <option value="1">cse</option>
                                    <option value="2">eee</option>
                                    <option value="3">bba</option>
                                    <option value="4">mba</option>
                                </select>
                            </div>
                            <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Address</label>
                                <input type="text" class="form-control p-input" name="address" placeholder="Address">
                                {!! $errors->first('address', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
                                <label>Upload Image</label>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="exampleInputFile2" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Browse</label>
                                        <input type="file" class="form-control-file" name="image" aria-describedby="fileHelp" id="exampleInputFile2">
                                        {!! $errors->first('image', '<p class="help-block" style="color:red">:message</p>') !!}
                                    </div>
                                </div>
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