@extends('layouts.master')


@section('title', 'Add_teacher')

    @php
        function department($value){
            $values =[
                1=>'cse',
                2=>'eee',
                3=>'bba',
                4=>'mba',
            ];

            return $values[$value];
        }
    @endphp

@section('css')


@endsection

@section('content')
    <div class="content-wrapper">
        <h1 class="page-title">Update Teacher Info</h1>
        <div class="row">
            <div class="col-12 col-lg-10 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{route('teacher.update', $teacher->id)}}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Name</label>
                                <input type="text" class="form-control p-input" name="name" value="{{$teacher->name}}">
                                {!! $errors->first('name', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Email</label>
                                <input type="email" class="form-control p-input" name="email" value="{{$teacher->email}}">
                                {!! $errors->first('email', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Phone</label>
                                <input type="text" class="form-control p-input" name="phone" value="{{$teacher->phone}}">
                                {!! $errors->first('phone', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Address</label>
                                <input type="text" class="form-control p-input" name="address" value="{{$teacher->address}}">
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