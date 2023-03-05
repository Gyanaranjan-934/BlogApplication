@extends('layout')
@section('main')
  <!-- Search form -->
  @include('includes.flash-message')
  <div class="row tm-row">
    <div class="col-12">
        <form method="" class="form-inline tm-mb-80 tm-search-form">                
            <input class="form-control tm-search-input" name="search" type="text" placeholder="Search..." aria-label="Search">
            <button class="tm-search-button" type="submit">
                <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
            </button>                                
        </form>
    </div>                
</div> 
<div class="categories">
  <ul>
    @foreach ($categories as $category)
      <li><a href="{{ route('blog.index', ['category' => $category->name] )}}">{{$category->name}}</a></li>
    @endforeach
  </ul>
</div>
<div class="row tm-row">
@forelse ($posts as $post)
  <article class="col-12 col-md-6 tm-post">
    {{-- <hr class="tm-hr-primary"> --}}
    <a href="{{route('blog.show',$post)}}" class="effect-lily tm-post-link tm-pt-60">
        <div class="tm-post-link-inner">
            <img src="{{asset($post->imagePath)}}" alt="Image" class="img-fluid" height="260px" width="490px">                            
        </div>
        {{-- <span class="position-absolute tm-new-badge">New</span> --}}
        <a class="tm-pt-30 tm-color-primary tm-post-title" href="{{route('blog.show',$post)}}">{{$post->title}}</a>
    </a>
    <div class="d-flex justify-content-between tm-pt-45">
        <span class="tm-color-primary">created at {{$post->created_at->format('d-m-Y')}}</span>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
        {{-- <span>36 comments</span> --}}
        <span>Written By {{$post->user->name}}</span>
    </div>
</article>
@empty
<p>No posts related to your search</p>
@endforelse
</div>

<div class="row tm-row tm-mt-50 tm-mb-75">
  <div class="tm-paging-wrapper">
      <nav class="tm-paging-nav d-inline-block">
        {{ $posts->links('pagination::default') }}
      </nav>
  </div>                
</div> 
@endsection