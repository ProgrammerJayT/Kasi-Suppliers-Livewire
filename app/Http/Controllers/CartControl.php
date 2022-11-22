<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartControl extends Controller
{
    //
    public static function add($id)
    {
        if (session()->has('cart') && in_array($id, session()->get('cart'))) {
            return response('Item already in cart', 403);
        } else {

            session()->has('cart') ? $cartItems = session()->get('cart') : $cartItems = [];
            $cartItems[count($cartItems)] = $id;
            session()->put('cart', $cartItems);

            return response('Item added to cart', 200);
        }
    }
}