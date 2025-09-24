@extends('layouts.admin')

@section('content')
    <h1>Product detail</h1>
    <a href="{{ route('admin.product') }}">See All</a>
    <div class="flex w-[50%] justify-between p-[10px]">
        <h1>ID</h1>
        <div class="">{{ $product->id }}</div>
    </div>
    <div class="flex w-[50%] justify-between p-[10px]">
        <h1>Category</h1>
        <div class="">{{ $product->category->name }}</div>
    </div>
    <div class="flex w-[50%] justify-between p-[10px]">
        <h1>Name</h1>
        <div class="">{{ $product->name }}</div>
    </div>
    <div class="flex w-[50%] justify-between p-[10px]">
        <h1>Price</h1>
        <div class="">{{ $product->price }}</div>
    </div>
    <div class="flex w-[50%] justify-between p-[10px]">
        <h1>Description</h1>
        <div class="">{{ $product->description }}</div>
    </div>
    <div class="flex w-[50%] justify-between p-[10px]">
        <h1>Stock</h1>
        <div class="">{{ $product->stock }}</div>
    </div>
    <div class="flex w-[50%] justify-between p-[10px]">
        <h1>Image</h1>
        <div class="">
            @if ($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="">
            @endif
        </div>
    </div>

@endsection
