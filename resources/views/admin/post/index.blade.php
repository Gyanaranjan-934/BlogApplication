@extends('layouts.master')
@section('content')
@include('includes.flash-message')
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">
            <h4>View Post 
                <a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm float-end"> Add Post </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Post title</th>
                        <th>Post author</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td> {{ $item->user->name}} </td>
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
