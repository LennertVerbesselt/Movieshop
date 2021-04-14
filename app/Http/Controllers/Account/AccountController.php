<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index()
    {
      return view('account');
    }

    public function updateDeliveryAddressForm()
    {
      return view('updatedeliveryaddress');
    }

    public function updateDeliveryAddress(Request $request)
    {



      $user_id = $request['user_id'];
      $newDeliveryAddress = $request['deliveryaddress'];

      DB::table('users')
                    ->where('id', $user_id)
                    ->update(['deliveryaddress' => $newDeliveryAddress]);

      return view('account');
    }
}
