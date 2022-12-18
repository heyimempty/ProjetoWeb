<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Platform;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(){
        //$cart = Cart::content();
        $games = Game::latest()->paginate(4);
        return view('index',['games' => $games]);
    }

    /**
     * Show the form for creating a new Product.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function create(){
        $categories = Category::all()->pluck('category', 'id');

        return view('games.create', ['categories' => $categories]);
    }


    /**
     * Store a newly created Product.
     */
    public function store(Request $request){

        $request->validate([
            'name' => 'required|min:6|max:40',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        $filename = $request->file('thumbnail')->name('thumbnail');
        $request->file('image')->store('/public/images/products');
        $game = new Game;
        $game->name = $request->input('gameName');
        $game->categories_id = $request->input('category');
        $game->description = $request->input('description');
        //$product->image = $filename;
       // $product->path = $request->file('image')->hashName();
        $game->save();
        return redirect()->back()->with('Product added sucessfully!');
    }
}