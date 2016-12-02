<?php

namespace App\Http\Controllers;

use App\Userr;
use Cart;
use App\Product;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\CartRequest;
use App\Http\Controllers\Controller;

class CartsController extends Controller
{
    public function index()
    {
        $cart = Cart::content();

        return view('cart.index', compact('cart'));
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);

        $item = [
            'id'    => $product->id,
            'name'  => $product->title,
            'price' =>  $product->price,
            'qty'   =>  $quantity
        ];

        return Cart::store($item);
    }

    public function update($id, Request $request)
    {
        $cart = Product::findOrFail($id);

        $cart->update($request->all());
    }

    public function checkout()
    {

        return view('cart.checkout-step-1');
    }
}
