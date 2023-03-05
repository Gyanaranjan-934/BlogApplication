@extends('layout')

@section('main')
    <div class="categories-list">
        <h1>Categories List</h1>
        @include('includes.flash-message')
{{-- 
        @foreach ($categories as $category)
                <h3 style="color: black;">{{ $category->name }}</h3>
        @endforeach
        <div class="index-categories">
            <a href="{{ route('categories.create') }}">Create category<span>&#8594;</span></a>
        </div> --}}
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Created</th>
                    </tr>
                </thead>
                @foreach ($categories as $category)
                <tbody>
                        <td><a href="{{ route('blog.index', ['category' => $category->name] )}}">{{$category->name}}</a></td>
                        <td>{{ $category->created_at->format('d-m-Y') }}</td>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
