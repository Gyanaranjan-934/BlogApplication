@extends('layouts.master')
@section('content')
@include('includes.flash-message')
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">
            <h4>View Category 
                <a href="{{ route('register') }}" class="btn btn-primary btn-sm float-end">Add User</a> </h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>E mail</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
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
                            <td>
                                <a href="{{ url('admin/delete-user/'.$item->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Category</li>
    </ol>
    <div class="row">

    </div>
@endsection
