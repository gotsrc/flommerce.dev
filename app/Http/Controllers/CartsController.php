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

    public function checkout(Request $request)
    {
        $this->middleware('auth');

        $rows = Cart::content();
        $rowId = $rows->where('id', $id)->first()->rowId;

        $content = Cart::get($rowId);
        return view('cart.checkout', compact('content'));
    }

    public function postMakePayment()
    {
        $payment = "NULL";
        if ($payment == 'SUCCESS') {
            return view('cart.success', compact('content'));
        } else {
            redirect('/cart/checkout');
        }
    }
}
