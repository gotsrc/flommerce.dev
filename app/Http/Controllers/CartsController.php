<?php

namespace App\Http\Controllers;

use App\User;
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
        $this->middleware('auth');
        $cart = Cart::content();

        return view('cart.index', compact('cart'));
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $id = Input::get('id');
        $rows = Cart::content();
        $rowId = $rows->where('id', $id)->first()->rowId;
        dd($rowId);

        $item = [
            'id'    => $product->id,
            'name'  => $product->title,
            'price' =>  $product->price,
            'qty'   =>  $quantity
        ];

        return Cart::store($item)->associate('Products');
    }

    //
    // Remove the associated item from the cart by given rowId.
    //
    public function remove($id, Request $request)
    {
        $product_id = Product::findOrFail($id);
        $rows = Cart::content();
        $rowId = $rows->where('id', $id)->first()->rowId;

        Cart::remove($rowId);

        return redirect('/cart');
    }

    public function update($id, Request $request)
    {
        $product_id = Product::findOrFail($id);
        $rows = Cart::content();
        $rowId = $rows->where('id', $id)->first()->rowId;

        return Cart::update($rowId);
    }

    public function checkout()
    {
        return view('cart.checkout-step-1');
    }
}
