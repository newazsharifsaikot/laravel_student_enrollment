@extends('layouts.master')

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
        <h1 class="page-title">{{$teacher->name}} Profile</h1>
        <div class="row user-profile">
            <div class="col-lg-8 side-left">
                <div class="card mb-4">
                    <div class="card-body avatar">
                        <h2 class="card-title">Info</h2>
                        <img src="{{asset('uploads/teacher/'.$teacher->image)}}" alt="">
                        <p class="name">Name : {{$teacher->name}}</p>
                        <a class="email" href="#"> Email : {{$teacher->email}}</a>
                        <a class="number" href="#">Phone : {{$teacher->phone}}</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body overview">
                        <div class="wrapper about-user">
                            <h2 class="card-title mt-4 mb-3">Address</h2>
                            <p>{{$teacher->address}}</p>
                        </div>
                        <div class="wrapper about-user">
                            <h2 class="card-title mt-4 mb-3">Department : </h2>
                            <p>{{department($teacher->department)}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')


@endsection