@extends('layouts.app')

@section('content')
 <div class="container">
  <div class="row justify-content-center">
  <div class="col-md-10">
   <div class="card">
    <div class="card-header">
     Create Category
    </div>
    <div class="card-body">
     <form action="{{ url('admin/category/store') }}/{{ isset($object) ? $object->id : 0}}" method="POST" enctype='multipart/form-data'>
      {{csrf_field()}}
      <div class="form-group">
       <label for="exampleInputEmail1">Title</label>
       <input type="text" class="form-control" name="title" id="exampleInputEmail1" value="{{isset($object) ? $object->title : ''}}" aria-describedby="emailHelp" placeholder="Enter Title">
       <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
     </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <textarea class="form-control" name="description" id="" cols="30" rows="6" placeholder="Enter Description">{{isset($object) ? $object->description : ''}}</textarea>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-danger" role="button" href="{{url('admin/category')}}">Back</a>
    </form>
    </div>
   </div>
  </div>
 </div>
 </div>
@endsection