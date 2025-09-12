<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
 
class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([        
            'name' => ['required', 'string']
        ]);
        category::create($validated);
        return redirect()->route('admin.category');
    }
    public function edit($id){
        $category=category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => ['required', 'string']
        ]);
        $category=category::findOrFail($id);
        $category->update($validated);
        $category->save();
        return redirect()->route('admin.category');

    }
    public function destroy($id){
        $category = category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }

}