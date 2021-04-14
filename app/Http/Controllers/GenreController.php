<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

use Session;

class GenreController extends Controller
{
    public function index()
    {
      $movies = Movie::get();
      $cart = session('cart');
      $shoppingCart = [];

      if($cart){
      foreach ($cart as $id => $quantity)
      {
        $movie = Movie::find($id);

        $item = ['movie' => $movie, 'quantity' => $quantity];

        array_push($shoppingCart, $item);
      }}

      return view('dashboard', ['movies' => $movies], ['cart' => $shoppingCart]);
    }

    public function filter(Request $postData)
    {

      $genres = ['all', 'Action', 'Adventure', 'Comedy', 'Animation', 'Musical', 'Thriller', 'Mystery', 'Science Fiction'];

      $genre_id = $postData['genre'];
      if($genre_id == 0)
      {
        $movies = Movie::get();
      }
      else
      {
        $genre = $genres[$genre_id];
        $movies = Movie::where('genre', '=', $genre)->get();
      }
      return view('movies', ['movies' => $movies]);
    }




}
