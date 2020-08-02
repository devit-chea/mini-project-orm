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
                  <img src="{{asset($item->articlePhotoFisrt[0]->path)}}" class="img-fluid image-resolution" alt="Responsive image">
                 </div>
                 <div class="col-md-7"><h5 class="card-title">{{ $item->title .'/'. $item->published_at}}</h5>
                  <p class="card-text">{{ $item->description}}</p></div>
               </div>
             </div>
             <a class="float-right btn btn-info" href="{{url('view/article/detail/'.$item->id)}}">Read More...</a>
           </div>
     </div>
 </div>
 @endforeach
 <br>
 <div class="text-center">
  <span class="">{{ $all_articles->links() }}</span>
 </div>
</div>
@endsection