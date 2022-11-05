@extends('layout')
{{-- @section('main') --}}
<!-- main -->
{{-- <main class="container">
      <section class="single-blog-post">
        <h1> {{$post->title}} </h1>

        <p class="time-and-author">
          {{$post->created_at->diffForHumans()}}
          <span>Written By {{$post->user->name}} </span>
        </p>

        <div class="single-blog-post-ContentImage" data-aos="fade-left">
          <img src="{{asset($post->imagePath)}}" alt="postimage" />
        </div>

        <div class="about-text">
          {!! $post->body !!}
        </div> --}}
{{-- Post Comment --}}
{{-- <h2 class="mt-6 leading-10 text-4xl tracking-tight font-bold text-gray-900 text-center">Comments</h2>
                <form action="/posts/{{ $post->id }}/comments" method="POST" class="mb-0">
                    @csrf
                    <label for="author" class="mt-6 text-sm font-medium text-gray-700">Text</label>
                    <textarea name="text" class="mt-1 py-2 px-3 block w-full borded border-gray-400 rounded-md shadow-sm" required>{{old('text')}}</textarea>
                    <input type="submit" value="Submit" />
                </form> --}}

{{-- <div class="mt-6">
                @foreach ($comments as $comment)
                    <div class="mt-3">
                        <div class="mb-5 bg-white px-4 py-6 rounded-sm shadow-md">
                            <div class="flex">
                                <div class="mr-3 flex flex-col justify-center">
                                    <div>
                                        <?php
                                        $parts = explode(' ', $comment->author);
                                        $initials = strtoupper($parts[0][0] . $parts[count($parts) - 1][0]);
                                        ?>
                                        <span class="bg-gray-300 p-3 rounded-full"></span>
                                        {{ $initials }}
                                    </div>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <p>{{ $comment->author }}</p>
                                    <p> {{$comment->created_at->diffForHumans()}} </p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p>{{ $comment->text }}</p>
                            </div>
                        </div>
                        
                        
                    </div>
                @endforeach
                {{ $comments->links('pagination::default') }}
            </div> --}}
{{-- </section> --}}
{{-- <section class="recommended">
        <p>Related</p>
        <div class="recommended-cards">
          
          @foreach ($relatedPosts as $relatedPost)
          <a href="">
            <div class="recommended-card">
              <img src="{{asset($relatedPost->imagePath)}}" alt="" loading="lazy" />
              <h4>
                {{$relatedPost->title}}
              </h4>
            </div>
          </a>
          @endforeach

        </div>
      </section> --}}
{{-- </main> --}}
{{-- @endsection --}}
@section('main')
    <div class="container-fluid">
        <main class="tm-main">
            <div class="row tm-row">
                <div class="col-12">
                    <hr class="tm-hr-primary tm-mb-55">
                    <img width="890" height="535" src="{{ asset($post->imagePath) }}" alt="image" class="tm-mb-40">
                </div>
            </div>
            @auth()
                @if (auth()->user()->id === $post->user->id)
                    <div class="post-buttons">
                        <a href="{{ route('blog.edit', $post) }}">Edit</a>
                        <form action="{{ route('blog.destroy', $post) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value=" Delete">
                        </form>
                    </div>
                @endif
            @endauth
            <div class="row tm-row">
                <div class="col-lg-8 tm-post-col">
                    <div class="tm-post-full">
                        <div class="mb-4">
                            <h2 class="pt-2 tm-color-primary tm-post-title">{{ $post->title }}</h2>
                            <p class="tm-mb-40">{{ $post->created_at->diffForHumans() }} {{ $post->user->name }}</p>
                            {!! $post->body !!}
                        </div>

                        <!-- Comments -->
                        <div>
                            <h2 class="tm-color-primary tm-post-title">Comments</h2>
                            <hr class="tm-hr-primary tm-mb-45">
                            @foreach ($comments as $comment)
                                <div class="tm-comment tm-mb-45">
                                    <figure class="tm-comment-figure">
                                        <figcaption class="tm-color-primary text-center">{{ $comment->author }}</figcaption>
                                    </figure>
                                    <div>
                                        <p>{{ $comment->text }}</p>
                                        <div class="d-flex justify-content-between">
                                            <span
                                                class="tm-color-primary">{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                        <form action="/posts/{{ $post->id }}/comments" method="POST" class="mb-0">
                            @csrf
                            <label for="author" class="mt-6 text-sm font-medium text-gray-700">Text</label>
                            <textarea name="text" class="mt-1 py-2 px-3 block w-full borded border-gray-400 rounded-md shadow-sm" required>{{ old('text') }}</textarea>
                            <input class="tm-btn tm-btn-primary tm-btn-small" type="submit" value="Submit" />
                        </form>
                    </div>
                </div>
            </div>
            <aside class="col-lg-4 tm-aside-col">
                <div class="tm-post-sidebar">
                    <hr class="mb-3 tm-hr-primary">
                    <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
                    <ul class="tm-mb-75 pl-5 tm-category-list">
                        @foreach ($categories as $category)
                            <li><a class="tm-color-primary"
                                    href="{{ route('blog.index', ['category' => $category->name]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <hr class="mb-3 tm-hr-primary">
                    <h2 class="tm-mb-40 tm-post-title tm-color-primary">Related Posts</h2>

                    @foreach ($relatedPosts as $relatedPost)
                        <a href="{{ route('blog.show', $post) }}" class="d-block tm-mb-40">
                            <figure>
                                <img src="{{ asset($relatedPost->imagePath) }}" alt="Image" class="mb-3 img-fluid">
                                <figcaption class="tm-color-primary">{{ $relatedPost->title }}</figcaption>
                            </figure>
                        </a>
                    @endforeach
                </div>
            </aside>
    </div>
    </main>
    </div>
@endsection
