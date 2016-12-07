<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
// use App\Cart;
use Cart;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Stripe\Stripe;

class CartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        $this->middleware('auth');
        $cart = Cart::content();

        return view('cart.index', compact('cart'));
    }

    //
    // Add the requested item to the cart by id.
    //
    public function postAddToCart($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $id = $product->id;
        $cart_id = Session::get('rowId');
        foreach ($items as $item) {
            $cart_id = $item->rowId;
        }

        Cart::add(array(
            'id'    => $product->id,
            'name'  => $product->title,
            'price' =>  $product->price,
            'qty'   =>  $quantity
        ))->associate('Product');

        $content = Cart::content();

        return redirect('/cart');
    }
    //
    // Remove the associated item from the cart by given rowId.
    //
    public function getRemoveCartItem($id, Request $request)
    {
        $product_id = Product::findOrFail($id);
        $rows = Cart::content();
        $rowId = $rows->where('id', $id)->first()->rowId;

        Cart::remove($rowId);

        return redirect('/cart');
    }

    public function show(Request $request, $id)
    {

        return view('cart.checkout');
    }

    public function update($id, Request $request)
    {
        $product_id = Product::findOrFail($id);
        $rows = Cart::content();
        $rowId = $rows->where('id', $id)->first()->rowId;

        return Cart::update($rowId);
    }

    public function getCheckoutSuccess()
    {
        return view('cart.success');
        return redirect()->url('/');
    }
}
