@extends('welcome')

@section('content1')
<div class="container">
 @foreach ($all_articles as $item)
 <div class="row">
     <div class="col-md-10">
         <div class="card">
             <div class="card-header">
               <h3>{{ $item->title}}</h3>
             </div>
             <div class="card-body">
               <div class="row">
                 <div class="col-md-5">
                  <img src="https://media.gettyimages.com/photos/angkor-wat-picture-id546436533?s=612x612" class="img-fluid" alt="Responsive image">
                 </div>
                 <div class="col-md-7"><h5 class="card-title">{{ $item->title .'/'. $item->published_at}}</h5>
                  <p class="card-text">{{ $item->content}}</p></div>
               </div>
             </div>
           </div>
     </div>
 </div>
 @endforeach
</div>
@endsection