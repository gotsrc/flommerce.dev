<?php

namespace Flommerce\Http\Controllers;

use Flommerce\User;
use Flommerce\Product;
use Flommerce\Order;
use Flommerce\Cart;
use Illuminate\Http\Request;
use Flommerce\Http\Requests;
use Flommerce\Http\Controllers\Controller;
use Prophecy\Exception\Exception;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Session;
use Auth;

class CartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        $this->middleware('auth');

        return view('cart.index', compact('cart'));
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart'))
        {
            return redirect()->route('cart.index');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        \Stripe\Stripe::setApiKey('sk_test_FbY7lvfLfYgd0p5bvrxbIdBW');
        $totalPrice = $cart->totalPrice;
        $token = $request->get('stripeToken');
        $cardholder_name = $request->get('cardholder_name');

        $customer = \Stripe\Customer::create(array(
            // "source"    =>  $token,
            "description" => $cardholder_name
        ));
        try {
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "gbp",
                "source" => $request->input('stripeToken'),
                "description" => "Testing payments again."
            ));
            $order = new Order();
            $order->cart = serialize($cart);
            $order->name = $request->input('name');
            $order->address1 = $request->input('address1');
            $order->address2 = $request->input('address2');
            $order->city = $request->input('city');
            $order->county = $request->input('county');
            $order->post_code = $request->input('post_code');
            $order->country = $request->input('country');
            $order->payment_id = $charge->id;

            Auth::user()->orders()->save($order);

        } catch (Stripe\Error\Card $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
            Session::forget('cart');
            Session::flash('message','Your payment was successful, and will be dispatched once we verify your order letting you know when you will receive your newly purchased items.');
            return redirect()->route('checkout.success');
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
