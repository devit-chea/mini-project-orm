@extends('welcome')

@section('content1')
<section class="container">
 <div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
   <h2>{{$get_article_detail->title}}</h2><br>
   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('images/uploads/file/image-default.png')}}" style="height: 500px;" class="d-block w-100" alt="...">
      </div>
      @foreach ($get_article_detail->articlePhoto as $item2)
      <div class="carousel-item">
        <img src="{{asset($item2->path)}}" style="height: 500px;" class="d-block w-100" alt="...">
      </div>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
   </div>
  </div>
  <div class="col-md-2"></div>
 </div>
 <div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
   <p>{{$get_article_detail->content}}</p>
   <p>{{$get_article_detail->description}}</p>
  </div>
  <div class="col-md-2"></div>
 </div>
</section>
<div class="card-footer text-muted">
 <p class="text-center">Article Created At {{$get_article_detail->created_at}}</p>
</div>
@endsection