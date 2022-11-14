

@include('includes.flash-message')
<h1>Post Title : {{ $post->title }}</h1>
<hr>
<h2>Author : {{ $comment->author }}</h2>
<h4>{{ $comment->created_at }}</h4>
<hr>
<p>{{ $comment->text }}</p>
