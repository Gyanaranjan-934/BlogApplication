@extends('layout')

@section('head')
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
@endsection
@section('main')
<main class="container" style="background-color:#fff">
    <section id="contact-us">
        <h1 style="padding-top: 50px;">Edit Category</h1>
        @include('includes.flash-message')
        <div class="contact-form">
            <form action="{{route('categories.update',$category)}}" method="post">
                @method('put')
                @csrf
                <!-- name -->
                <label for="name"><span>Name</span></label> 
                <input type="text" name="name" id="name" placeholder="Name" value="{{ $category->name }}">
                <!-- To show error message -->
                @error('name')
                {{-- The $attributeValue field is/must be $validationRule --}}
                    <p style="color:red;">{{$message}}</p>
                @enderror
                
                
                <!-- Button -->
                <input type="submit" value="Submit" />
            </form>
        </div>
        <div class="create-categories">
            <a href="{{route('categories.index')}}">Category List <span>&#8594;</span></a>
        </div>
    </section>
</main>
@endsection

@section('scripts')
<script>
    CKEDITOR.replace('body');
  </script>
@endsection