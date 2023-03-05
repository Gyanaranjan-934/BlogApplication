@extends('layout')
@section('main')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>Hii {{ Auth::user()->name }} </h2>
                    <div class="dashboard">
                        <ul>
                            <li class="btn btn-success"><a style="text-decoration: none;color: white" href="{{route('blog.showown',Auth::user()->id)}}">Show Posts</a></li>
                            <li class="btn btn-primary"><a style="text-decoration: none;color: white"  href="{{route('categories.create')}}">Create Categories</a></li>
                            <li class="btn btn-secondary"><a style="text-decoration: none;color: white"  href="{{route('categories.index')}}">View all categories</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection