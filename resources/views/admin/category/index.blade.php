@extends('layouts.admin')

@section('content')
    <div class="container m-10">
        <h1 class="ml-[90px] text-3xl italic">Categories</h1>
            @forelse ($categories as $category)
                <div class="w-80 break-words border-2 border-gray-300 rounded-xl mt-3 p-5 duration-300 hover:scale-105">
                    <h3 class="mb-2">{{ $category->name }}</h3>
                    <div class="flex gap-2 text-center">
                        <a class="border-2 border-green-500 text-green-500 rounded-md p-1 w-1/2 hover:bg-green-500 hover:text-white duration-300 hover:duration-300" href="{{ route('admin.category.edit',['id' => $category->id]) }}">Edit category</a>

                        <form onclick="confirmDelete({{ $category->id }})" class="border-2 border-red-500 text-red-500 rounded-md p-1 w-1/2 hover:bg-red-500 hover:text-white duration-300 hover:duration-300" action="{{ route('admin.category.destroy', ['id'=>$category->id]) }}"  method="POST" id="delete-form-{{$category->id}}">
                                @csrf
                                @method('DELETE')
                                <button type="button">Delete category</button>
                            </form>
                    </div>

                </div>
            @empty
                <p>Одоогоор пост алга</p>
            @endforelse
            <a class="absolute right-10 top-20 duration-200 hover:bg-[#cccc] hover:text-[#000] p-2 rounded-lg" href="{{route('admin.category.create')}}">
                        <span class="leading-none">Add category</span>
            <script>
                function confirmDelete(id){
                    Swal.fire({
                        title: "Устгахдаа итгэлтэй байна уу",
                        showCancelButton: true,
                        confirmButtonText: "Устгах",
                        cancelButtonText: "Цуцлах",
                        icon: "warning",
                    }).then((result)=>{
                        if(result.isConfirmed){
                            document.getElementById('delete-form-' + id).submit();
                        }
                    });
                }
            </script>

@endsection
