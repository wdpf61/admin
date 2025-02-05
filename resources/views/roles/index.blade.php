@extends('layout.backend.main')

@section('page_content')



<div class="row">
    <div class="col-md-12">
       @if (session('success'))
             <div class="alert alert-success">{{session('success')}}</div>  
       @endif


         <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                 @forelse ($roles as $role)
                 <tr>
                    <th>{{$role->id}}</th>
                    <th>{{$role->name}}</th>
                    <th >
                        <a class="btn btn-primary" href="">Show</a>
                        <a class="btn btn-secondary" href="{{url("role/{$role->id}/edit")}}">Edit</a>
                        <a class="btn btn-secondary" href="{{url("role/delete/{$role->id}")}}">MDel</a>
                         <form action="{{url("role/{$role->id}")}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-info " type="submit">Delete</button>
                         </form>
                    </th>
                 </tr>
                 @empty
                     <tr>
                        <td colspan="3">No data found</td>
                     </tr>
                 @endforelse
                 
            </tbody>
         </table>


    </div>
</div>
    
@endsection