@extends('layouts.master')
@section('content')
@include('includes.flash-message')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Category</li>
        </ol>
        <div class="row">

        </div>

        <div class="card">
            <div class="card-header">
                <h1 class="mt-4">Add Category</h1>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/update-category/'.$category->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <label for="name"><span>Name</span></label>
                    <input type="text" name="name" id="name" placeholder="Name" value="{{ $category->name }}">
                    @error('name')
                        {{-- The $attributeValue field is/must be $validationRule --}}
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror
                    <!-- Button -->
                    <input type="submit" value="Submit" />
                </form>
            </div>
        </div>
    @endsection
