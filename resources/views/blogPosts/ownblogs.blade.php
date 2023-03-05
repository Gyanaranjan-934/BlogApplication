@extends('layout')
@section('main')
@include('includes.flash-message')
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">
            <h4>View Posts 
                <a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm float-right"> Add Post </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Post title</th>
                        <th>Created on</th>
                        <th>Category</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td> {{ $item->created_at->format('d/m/Y') }} </td>
                            <td>{{ $item->category->name }}</td>
                            <td><a href="{{ route('blog.show', $item) }}" class="btn btn-success">View</a></td>
                            <td>
                                <a href="{{ route('blog.edit', $item) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('blog.destroy', $item) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-denger"value=" Delete">
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection