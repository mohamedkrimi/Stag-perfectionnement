<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProduitsController extends Controller
{
    public function index()
    {
        $produits = Produit::where('is_deleted', false)->orderBy('id','desc')->get();
        $categories = Category::where('is_deleted', false)->orderBy('id','desc')->get();
        return view('admin.produits.index', compact(['categories','produits']));
    }

    public function create()
    {
        return view('404');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'prix' => 'required',
            'description' => 'required',
            'categorie_id' => 'required'
        ]);
       // dd($request);
        if ($request->file('image')) {
            $imageName = $request->file('image')->store('images', 'public');
            Produit::create([
                'name' => $request->name,
                'image' => $imageName,
                'prix' => $request->prix,
                'description' => $request->description,
                'categorie_id' => $request->categorie_id

            ]);
            return redirect('/dashboard/produits')->with('success', 'Produits created successfully');
    }else{
        return redirect('/dashboard/produits')->with('error', 'Produits not created !!');
    }

        //return redirect('/dashboard/categories')->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'name' => 'required',
            'prix' => 'required',
            'description' => 'required',
            'categorie_id' => 'required'
        ]);

        if ($request->file('image')) {
            $imageName = $request->file('image')->store('images', 'public');
            $produit->update([
                'name' => $request->name,
                'image' => $imageName,
                'prix' => $request->prix,
                'description' => $request->description,
                'categorie_id' => $request->categorie_id

            ]);
            return redirect('/dashboard/produits')->with('success', 'Produits updated successfully');
    }else{
        $produit->update([
            'name' => $request->name,
            'image' =>  $request->image,
            'prix' => $request->prix,
            'description' => $request->description,
            'categorie_id' => $request->categorie_id

        ]);
        return redirect('/dashboard/produits')->with('error', 'Produits not updated !!');
    }
        $category->update([
            'name' => $request->name
        ]);

       // return redirect('/dashboard/categories')->with('success', 'Category updated successfully');
    }

    public function destroy( $id)
    {
        $model = Produit::find($id);
        $model->update(['is_deleted' => 1]);
        return response()->json(['result' => true]);
    }
}
