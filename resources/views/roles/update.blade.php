@extends('layout.backend.main')

@section('page_content')

<div class="row">
    <div class="col-md-12">

      <form  action="{{url("role/{$role->id}")}}" method="post">
        @csrf
        @method('put')
         <div>
            <label  for="name">Name</label><br>
            <input class="form-control" type="text" name="name" value="{{old('name', $role->name )}}"> <br>
            @error('name')
               <span style="color: red">{{$message}}</span> 
            @enderror
         </div> <br>
        <div>
              <button class="btn btn-primary" type="submit">Update</button>
        </div>

      </form>
    </div>
</div>

@endsection