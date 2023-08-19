<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_deleted', false)->orderBy('id','desc')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('404');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect('/dashboard/categories')->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect('/dashboard/categories')->with('success', 'Category updated successfully');
    }

    public function destroy( $id)
    {
        $model = Category::find($id);
        $model->update(['is_deleted' => 1]);
        return response()->json(['result' => true]);
    }
}
