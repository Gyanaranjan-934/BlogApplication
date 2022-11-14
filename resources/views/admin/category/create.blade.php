@extends('layouts.master')
@section('content')
@include('includes.flash-message')
        <div class="card">
            <div class="card-header">
                <h1 class="mt-4">Add Category</h1>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/add-category') }}" method="POST">
                    @csrf
                    <label for="name"><span>Name</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" />
                    @error('name')
                        {{-- The $attributeValue field is/must be $validationRule --}}
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror
                    <!-- Button -->
                    <input type="submit" class="btn btn-success" style="color: green" value="Submit" />
                </form>
            </div>
        </div>
@endsection
