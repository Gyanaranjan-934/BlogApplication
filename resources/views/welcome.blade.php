@extends('layout')
@section('main')
    <!-- main -->
        <h1>Explore the World with the Blogs</h1>
        <div class="row tm-row">
      @forelse ($posts as $post)
        <article class="col-12 col-md-6 tm-post">
          <hr class="tm-hr-primary">
          <a href="{{route('blog.show',$post)}}" class="effect-lily tm-post-link tm-pt-60">
              <div class="tm-post-link-inner">
                  <img src="{{asset($post->imagePath)}}" alt="Image" class="img-fluid">                            
              </div>
              <span class="position-absolute tm-new-badge">New</span>
              <a class="tm-pt-30 tm-color-primary tm-post-title" href="{{route('blog.show',$post)}}">{{$post->title}}</a>
          </a>
          <div class="d-flex justify-content-between tm-pt-45">
              <span class="tm-color-primary">{{$post->created_at->diffForHumans()}}</span>
          </div>
          <hr>
          <div class="d-flex justify-content-between">
              {{-- <span>36 comments</span> --}}
              <span>Written By {{$post->user->name}}</span>
          </div>
      </article>
      @empty
      <p>No articles published</p>
      @endforelse
    </div>
@endsection