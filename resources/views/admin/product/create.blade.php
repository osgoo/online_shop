@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data" id="create">
        @csrf
        <div class="">
            <label for="">Category</label>
            <select name="category_id" id="">
                <option value="">Select</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <label for="">Name</label>
            <input type="text" name="name">
        </div>
        <div class="">
            <label for="">Price</label>
            <input type="number" name="price">
        </div>
        <div class="">
            <label for="">Stock</label>
            <input type="number" name="stock">
        </div>
        <div class="">
            <label for="">Description</label>
            <textarea name="description" id="" cols="3"></textarea>
        </div>

        <div class="">
            <label for="">Image</label>
            <input type="file" name="image">
        </div>
        <button type="submit">Save</button>

    </form>
@endsection
