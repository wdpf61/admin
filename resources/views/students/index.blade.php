@extends('layout.backend.main')
@section('page_content')
    <div class="row">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Student List</h4>
                    <div class=" row d-flex">
                        <div class="col-md-3 ">
                            <a class="btn btn-primary" href="{{ url('student/create') }}">Register</a>

                        </div>
                        <form class="col-md-9" action="{{ url('student/search') }}" method="post" >
                            @csrf
                            <div class="input">
                                <div class=" d-flex">
                                    <input type="text" class="form-control" name="name"   value="{{@$requestdata}}">
                                    <button class="btn btn-primary" >Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>Roll</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->roll }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->address }}</td>
                                        <td> <img width="50" height=""
                                                src="{{ asset('photo') }}/{{ $student->photo }}" alt="{{ $student->name }}"
                                                srcset=""> </td>
                                        <td>
                                            <a class="btn btn-info" href="{{ url("student/$student->id") }}">Show</a>
                                            <a class="btn btn-primary"
                                                href="{{ url("student/$student->id/edit") }}">Edit</a>
                                            <a class="btn btn-danger"
                                                href="{{ url("student/delete/$student->id") }}">Del</a>

                                                {{-- <form action="{{ route('student.destroy',$student->id) }}" method="post"> --}}
                                                <form action="{{ url("student/$student->id") }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button  type="submit" class="btn btn-danger">Del_r</button>
                                                </form>
                                          


                                        </td>
                                    </tr>
                                @empty
                                 <tr>
                                    <td col="6"> Data Not  found </td>
                                 </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-5">
                        {!! $students->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
