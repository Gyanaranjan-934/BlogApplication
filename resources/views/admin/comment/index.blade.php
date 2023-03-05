@extends('layouts.master')
@section('content')
@include('includes.flash-message')
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-body">
            <h4>View Comments</h4> 
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Comment author</th>
                        <th>View</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td> {{ $comment->author }} </td>
                            <td> 
                                {{-- <a href="{{ url('admin/view/'. $comment->id , $comment ) }}" class="btn btn-secondary">View</a> --}}
                                <a href="{{ route('comment.show', $comment) }}" class="btn btn-secondary">View</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.comment.destroy', $comment) }}" method="post">
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
