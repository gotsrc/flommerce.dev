<?php

namespace App\Http\Controllers;

use App\User;
use Cart;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
// use App\Http\Requests\ProductRequest;
// use App\Http\Requests\CartRequest;
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
        $id = Session::get('rowId');
        $items = Cart::content();
        foreach ($items as $item) {
            $cart_id = $item->rowId;
        }

        $total = Cart::total(2, '', '');
        Stripe::setApiKey('sk_test_Ek3YDzQZhUDjNTpTtu2r6s0p');
        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => $total,
                "currency" => "gbp",
                "source" => $request->input('stripeToken'),
                "description" => "Test Flommerce Charge"
            ));
        } catch (\Exception $e) {
            return view('cart.checkout')->with('error', $e->getMessage());
        }
            Session::forget('cart');
            return view('cart.success');
    }

    // public function postMakePayment(Request $request)
    // {
    //     if (!Session::has('cart')) {
    //         return redirect()->route('/cart');
    //     }
    //
    //     $rows = Cart::content();
    //     dd($rows);
    //     $rowId = $rows->where('id', $id)->first()->rowId;
    //     $content = Cart::get($rowId);
    // }
}
