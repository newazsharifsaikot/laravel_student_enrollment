@extends('layouts.master')

@section('title', 'All-Teacher')

@section('css')
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/backend/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />

@endsection

@section('content')
    <div class="content-wrapper">
        <a href="{{URL::to('teacher/create')}}" class="btn btn-primary">ADD NEW TEACHER</a>
        <h1 class="page-title">All Teacher Info</h1>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"></h2>
                <div class="row">
                    <div class="col-12">
                        <table id="order-listing" class="table table-striped" style="width:100%;">
                            <thead>

                            <tr>
                                <th width="10%">Serial</th>
                                <th width="10%"> Name</th>
                                <th width="10%"> Email</th>
                                <th width="10%"> Phone</th>
                                <th width="10%"> Image</th>
                                <th width="10%"> Department</th>
                                <th width="30%">Actions</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($teachers as $key=>$teacher)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$teacher->name}}</td>
                                <td>{{$teacher->email}}</td>
                                <td>{{$teacher->phone}}</td>
                                <td><img src="{{asset('uploads/teacher/'.$teacher->image)}}" alt="" class="img-thumbnail" width="100px" height="100px"></td>
                               <td>
                                   @if($teacher->department == 1)
                                    <span class="badge bg-success">cse</span>
                                    @elseif($teacher->department == 2)
                                       <span class="badge bg-danger">eee</span>
                                   @elseif($teacher->department == 3)
                                       <span class="badge bg-primary">bba</span>
                                   @elseif($teacher->department == 4)
                                       <span class="badge bg-info">mba</span>
                                   @endif
                               </td>
                               <td>
                                   <a href="{{route('teacher.show', $teacher->id)}}" class="btn btn-info btn-sm">View</a>
                                   <a href="{{route('teacher.edit', $teacher->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                   <button type="button" class="btn btn-danger" onclick="deleteTeacher({{$teacher->id}})">
                                       <i class="material-icons">delete</i>
                                   </button>
                                   <form id="delete-form-{{$teacher->id}}" action="{{route('teacher.destroy', $teacher->id)}}" method="post" style="display: none">
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
        function deleteTeacher(id){
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