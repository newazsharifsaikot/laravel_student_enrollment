@extends('student.student_master')

@section('title', 'Profile')

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
        <h1 class="page-title">Profile</h1>
        <div class="row user-profile">
            <div class="col-lg-8 side-left">
                <div class="card mb-4">
                    <div class="card-body avatar">
                        <h2 class="card-title">Info</h2>
                        <img src="{{asset('uploads/student/'.$student->student_image)}}" alt="">
                        <p class="name">Name : {{$student->student_name}}</p>
                        <p class="designation">Roll : {{$student->student_roll}}</p>
                        <a class="email" href="#"> Email : {{$student->student_email}}</a>
                        <a class="number" href="#">Phone : {{$student->student_phone}}</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body overview">
                        <div class="wrapper about-user">
                            <h2 class="card-title mt-4 mb-3">Address</h2>
                            {{--<p>{{$student->student_address}}</p>--}}
                        </div>
                        <div class="wrapper about-user">
                            <h2 class="card-title mt-4 mb-3">Father's Name : </h2>
                            <p>{{$student->student_fatherName}}</p>
                        </div>
                        <div class="wrapper about-user">
                            <h2 class="card-title mt-4 mb-3">Mother's Name : </h2>
                            <p>{{$student->student_motherName}}</p>
                        </div>
                        <div class="wrapper about-user">
                            <h2 class="card-title mt-4 mb-3">Department : </h2>
                            <p>{{department($student->student_department)}}</p>
                        </div>
                        <div class="wrapper about-user">
                            <h2 class="card-title mt-4 mb-3">Admission Year : </h2>
                            <p>{{$student->student_admissionYear}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')


@endsection