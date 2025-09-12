@extends('layouts.admin')

@section('content')
    <h1 class="ml-8 text-3xl">Create</h1>
    <form action="{{route('admin.category.store')}}" method="POST" class="ml-5 mt-5 border-2 border-[#cccc] rounded-md p-5 w-80 duration-200 hover:scale-105">
        @csrf
        <div class="field">
            <label for="name" class="">Name</label>
            <input name="name" id="name" type="text" class="rounded-lg" required>
        </div>
        <div class="flex justify-center mt-2">
            <button type="submit" class="btn border-2 border-blue-500 rounded-lg w-[100px] text-blue-500 hover:bg-blue-500 hover:text-white duration-200 hover:duration:200">Save</button>
        </div>
    </form>
@endsection