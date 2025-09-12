@extends('layouts.admin')

@section('content')
    <div class="container m-10">
        <h1 class="ml-[90px] text-3xl italic">Categories</h1>
            @forelse ($categories as $category)
                <div class="w-80 break-words border-2 border-gray-300 rounded-xl mt-3 p-5 duration-300 hover:scale-105">
                    <h3 class="mb-2">{{ $category->name }}</h3> 
                    <div class="flex gap-2 text-center">
                        <a class="border-2 border-green-500 text-green-500 rounded-md p-1 w-1/2 hover:bg-green-500 hover:text-white duration-300 hover:duration-300" href="{{ route('admin.category.edit',['id' => $category->id]) }}">Edit category</a>
                        <a class="border-2 border-red-500 text-red-500 rounded-md p-1 w-1/2 hover:bg-red-500 hover:text-white duration-300 hover:duration-300" href="{{ route('admin.category.destroy',['id' => $category->id]) }}">Delete category</a>
                    </div>

                </div>
            @empty 
                <p>Одоогоор пост алга</p>
            @endforelse
    
@endsection