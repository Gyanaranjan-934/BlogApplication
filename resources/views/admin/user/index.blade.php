@extends('layouts.master')
@section('content')
@include('includes.flash-message')
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">
            <h4>View Users</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>E mail</th>
                        <th>Role</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td> {{$item->email}} </td>
                            <td> {{$item->role_as == '1' ? 'Admin' : 'User' }} </td>
                            <td>
                                <a href="{{ url('admin/edit-user/'.$item->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
