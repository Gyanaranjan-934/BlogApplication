@extends('layout')

@section('main')
    <div class="categories-list">
        <h1>Categories List</h1>
        @include('includes.flash-message')
        @foreach ($categories as $category)
                <h3 style="color: black;">{{ $category->name }}</h3>
        @endforeach
        <div class="index-categories">
            <a href="{{ route('categories.create') }}">Create category<span>&#8594;</span></a>
        </div>
    </div>
@endsection
