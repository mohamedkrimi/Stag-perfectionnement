<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function reserverDetaile($id)
    {
        $produit = Produit::where(['is_deleted'=> false,'id'=>$id])->first();
        //$categories = Category::where('is_deleted', false)->orderBy('id','desc')->get();
        return view('reservation', compact(['produit']));
    }
    public function index()
    {
        $produits = Produit::where('is_deleted', false)->orderBy('id','desc')->get();
        $categories = Category::where('is_deleted', false)->orderBy('id','desc')->get();
        return view('welcome', compact(['categories','produits']));
    }
    public function offres()
    {
        $produits = Produit::where('is_deleted', false)->orderBy('id','desc')->get();
        $categories = Category::where('is_deleted', false)->orderBy('id','desc')->get();
        return view('offres', compact(['categories','produits']));
    }

    public function filter($id)
    {
        $produits = Produit::where(['is_deleted'=> false,'categorie_id'=>$id])->orderBy('id','desc')->get();
        $categories = Category::where('is_deleted', false)->orderBy('id','desc')->get();
        return view('offres', compact(['categories','produits']));
    }
}
