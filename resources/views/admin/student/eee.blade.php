@extends('layouts.master')

@section('title', 'eee-Student')

@section('css')
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/backend/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />

@endsection

@section('content')
    <div class="content-wrapper">
        <h1 class="page-title">EEE Student Info</h1>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"></h2>
                <div class="row">
                    <div class="col-12">
                        <table id="order-listing" class="table table-striped" style="width:100%;">
                            <thead>

                            <tr>
                                <th width="10%">Serial</th>
                                <th width="10%">Student Roll</th>
                                <th width="10%">Student Name</th>
                                <th width="10%">Student Email</th>
                                <th width="10%">Student Phone</th>
                                <th width="10%">Student Image</th>
                                <th width="10%">Student Department</th>
                                <th width="30%">Actions</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($eee_students as $key=>$student)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$student->student_roll}}</td>
                                <td>{{$student->student_name}}</td>
                                <td>{{$student->student_email}}</td>
                                <td>{{$student->student_phone}}</td>
                                <td><img src="{{asset('uploads/student/'.$student->student_image)}}" alt="" class="img-thumbnail" width="60px" height="60px"></td>
                               <td>
                                   @if($student->student_department == 1)
                                    <span class="badge bg-success">cse</span>
                                    @elseif($student->student_department == 2)
                                       <span class="badge bg-danger">eee</span>
                                   @elseif($student->student_department == 3)
                                       <span class="badge bg-primary">bba</span>
                                   @elseif($student->student_department == 4)
                                       <span class="badge bg-info">mba</span>
                                   @endif
                               </td>
                               <td>
                                   <a href="{{route('student.show', $student->id)}}" class="btn btn-info btn-sm">View</a>
                                   <button type="button" class="btn btn-danger" onclick="deleteEeeStudent({{$student->id}})">
                                       <i class="material-icons">delete</i>
                                   </button>
                                   <form id="delete-form-{{$student->id}}" action="{{route('eee.destroy', $student->id)}}" method="post" style="display: none">
                                       @csrf
                                       @method('DELETE')
                                   </form>
                               </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Plugin js for this page-->
    <script src="{{asset('assets/backend/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/backend/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <!-- End plugin js for this page-->
    <script src="{{asset('assets/backend/js/data-table.js')}}"></script>
    <script type="text/javascript">
        function deleteEeeStudent(id){
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
            });

            swalWithBootstrapButtons({
                title: 'Are you sure?',
                text: "You want to delete this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' +id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                        'Cancelled',
                        'Your Data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>

@endsection