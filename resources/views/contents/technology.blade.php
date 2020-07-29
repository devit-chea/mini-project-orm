@extends('welcome')

@section('content1')
<div class="container">
 @foreach ($technologies as $item)
 <div class="row">
     <div class="col-md-10">
         <div class="card">
             <div class="card-header">
               <h3>{{ $item->title}}</h3>
             </div>
             <div class="card-body">
               <h5 class="card-title">{{ $item->title .'/'. $item->published_at}}</h5>
               <p class="card-text">{{ $item->content}}</p>
             </div>
           </div>
     </div>
 </div>
 @endforeach
</div>
@endsection