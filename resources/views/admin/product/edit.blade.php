@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="">
            <label for="">Category</label>
            <select name="category_id" id="">
                <option value="">Select</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <label for="">Name</label>
            <input type="text" name="name" value="{{ $product->name }}">
        </div>
        <div class="">
            <label for="">Price</label>
            <input type="number" name="price" value="{{ $product->price }}">
        </div>
        <div class="">
            <label for="">Stock</label>
            <input type="number" name="stock" value="{{ $product->stock }}">
        </div>
        <div class="">
            <label for="">Description</label>
            <textarea name="description" id="" cols="3">{{ $product->description }}</textarea>
        </div>

        <div class="">
            <label for="">Image</label>
            @if($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="" class="w-24 h-24 rounded object-cover mb-2">
            @endif
            <input type="file" name="image">
        </div>
        <button type="submit">Update</button>
    </form>
@endsection