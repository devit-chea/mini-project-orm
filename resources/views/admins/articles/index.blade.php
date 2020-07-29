@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Articles List
                  <a class="float-right btn btn-primary" role="button" href="{{url('admin/articles/create')}}">Create Article</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Publised At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                          $i = 1;
                          @endphp
                          @foreach ($articles as $record)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{$record->title}}</td>
                            <td>{{$record->description}}</td>
                            <td>{{$record->categories->title}}</td>
                            <td>{{$record->published_at}}</td>
                            <td>
                              <a class="btn btn-danger" href="{{url('admin/articles/delete').'/'.$record->id}}">Delete</a>
                              <a class="btn btn-dark" href="{{url('admin/articles/show').'/'.$record->id}}">Update</a>
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
