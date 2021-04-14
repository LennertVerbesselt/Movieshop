<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Cart;

use Session;

class CartController extends Controller
{
  public function addToCart(Request $request)
  {

    $movies = Movie::get();
    $emptyCart = [];

    foreach ($movies as $movie)
    {
      $emptyCart[$movie->id] = '0';
    }

    $movie_id = $request['movie_id'];
    $addedMovie = Movie::find($movie_id);

    if($request->session()->get('cart')){
      $oldCart = $request->session()->pull('cart', 'default');
    } else {
      $oldCart = $emptyCart;
    }

    if(array_key_exists($addedMovie->id, $oldCart))
    {
      $oldCart[$addedMovie->id]++;
    } else {
      $oldCart[$addedMovie->id] = 1;
    }

    $request->session()->put('cart', $oldCart);




    $shoppingCart = [];

    foreach ($oldCart as $id => $quantity)
    {
      $movie = Movie::find($id);

      $item = ['movie' => $movie, 'quantity' => $quantity];

      array_push($shoppingCart, $item);
    }

    return view('cart', ['cart' => $shoppingCart]);
  }

  public function deleteCart(Request $request)
  {
    $movie_id = $request['movie_id'];

    $oldCart = $request->session()->pull('cart', 'default');

    $oldCart[$movie_id]--;
    $request->session()->put('cart', $oldCart);

    $shoppingCart = [];

    foreach ($oldCart as $id => $quantity)
    {
      $movie = Movie::find($id);

      $item = ['movie' => $movie, 'quantity' => $quantity];

      array_push($shoppingCart, $item);
    }

    return view('cart', ['cart' => $shoppingCart]);

  }
}
