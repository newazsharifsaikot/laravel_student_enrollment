@extends('student.student_master')


@section('title', 'Student')
@php
    function department($value){
        $values = [
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
        <h1 class="page-title">Update Your Profile</h1>
        <div class="row">
            <div class="col-12 col-lg-10 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{route('student.profile.update')}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group {{ $errors->has('student_password') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Student Password</label>
                                <input type="password" class="form-control p-input" name="student_password" value="{{$result->student_password}}">
                                {!! $errors->first('student_password', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('student_phone') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Student Phone</label>
                                <input type="text" class="form-control p-input" name="student_phone" value="{{$result->student_phone}}">
                                {!! $errors->first('student_phone', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('student_address') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Student Address</label>
                                <input type="text" class="form-control p-input" name="student_address" value="{{$result->student_address}}">
                                {!! $errors->first('student_address', '<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')

@endsection