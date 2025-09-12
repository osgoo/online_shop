@extends('layouts.admin')

@section('content')
    <h1>Create</h1>
    <form action="{{route('admin.category.update', ['id'=>$category->id])}}" method="POST" class="ml-5 mt-5 border-2 border-[#cccc] rounded-md p-5 w-80 duration-200 hover:scale-105">
        @csrf
        @method('PUT')
        <div class="field">
            <label for="name">Name</label>
            <input name="name" id="name" type="text" value="{{$category->name}}" class="rounded-lg" required>
        </div>
        <div class="flex justify-center mt-2">
            <button type="submit" class="btn border-2 border-blue-500 rounded-lg w-[100px] text-blue-500 hover:bg-blue-500 hover:text-white duration-200 hover:duration:200">Save</button>
        </div>
    </form>
@endsection