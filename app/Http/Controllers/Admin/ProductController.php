<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }
    public function create(){
        $categories = category::all();
        return view('admin.product.create', compact('categories'));
    }
    public function store(ProductRequest $request){
        $validated = $request->validated();

        if(request()->hasFile('image')){
            $validated['image'] = request()->file('image')->store('images', 'public');
        }
        Product::create($validated);

        return redirect()->route('admin.product')->with('success', 'Барааг амжилттай хадгаллаа');
    }
    public function edit($id){
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }
    public function update(ProductRequest $request, $id){
        $product = Product::findOrFail($id);

        $validated = $request->validated();


        if($request->hasFile('image')){
            if($product->image){
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('images', 'public');
        }
        else{
            unset($validated['image']);
        }

        $product->update($validated);

        return redirect()->route('admin.product')->with('success', 'Барааг амжилттай шинэчлэлээ');
    }
    public function destroy($id){
        $product = Product::findOrFail($id);

        if($product->image){
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.product')->with('success', 'Барааг амжилттай устгалаа');
    }
    public function show($id){
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.product.show', compact('product', 'categories'));
    }
}
