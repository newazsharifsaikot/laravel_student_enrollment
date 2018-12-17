@extends('student.student_master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-6 col-md-3 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">All Students</h2>
                        <p style="font-size: 26px; font-weight: 500; text-align: center">{{$student}}</p>
                    </div>
                    <div class="dashboard-chart-card-container">
                        <div id="dashboard-card-chart-1" class="card-float-chart"></div>

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">All Teacher</h2>
                        <p style="font-size: 26px; font-weight: 500; text-align: center">{{$teacher}}</p>
                    </div>
                    <div class="dashboard-chart-card-container">
                        <div id="dashboard-card-chart-2" class="card-float-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Tution Fees</h2>
                        <p style="font-size: 26px; font-weight: 500; text-align: center">30000TK</p>
                    </div>
                    <div class="dashboard-chart-card-container">
                        <div id="dashboard-card-chart-3" class="card-float-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Revenue</h2>
                        <p style="font-size: 26px; font-weight: 500; text-align: center">5000</p>
                    </div>
                    <div class="dashboard-chart-card-container">
                        <div id="dashboard-card-chart-4" class="card-float-chart"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection