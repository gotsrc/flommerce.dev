<?php

namespace Flommerce\Http\Controllers;

use Flommerce\User;
use Flommerce\Product;
use Flommerce\Order;
use Flommerce\Cart;
use Illuminate\Http\Request;
use Flommerce\Http\Requests;
use Flommerce\Http\Controllers\Controller;
use Session;
use Prophecy\Exception\Exception;
use Stripe\Stripe;
use Stripe\Charge;

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

    //
    // Add the requested item to the cart by id.
    //
    // public function postAddToCart(Request $request, $id)
    // {
    //     $product = Product::findOrFail($id);
    //     $id = $product->id;
    //     $cart_id = Session::get('rowId');
    //     foreach ($items as $item) {
    //         $cart_id = $item->rowId;
    //     }
    //
    //     Cart::add(array(
    //         'id'    => $product->id,
    //         'name'  => $product->title,
    //         'price' =>  $product->price,
    //         'qty'   =>  $quantity
    //     ))->associate('Product');
    //
    //     Cart::content();
    //
    //     return redirect('/cart');
    // }
    // //
    // // Remove the associated item from the cart by given rowId.
    // //
    // public function getRemoveCartItem($id, Request $request)
    // {
    //     $product_id = Product::findOrFail($id);
    //     $rows = Cart::content();
    //     $rowId = $rows->where('id', $id)->first()->rowId;
    //
    //     Cart::remove($rowId);
    //
    //     return redirect('/cart');
    // }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart'))
        {
            return redirect()->route('cart.index');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $total = $cart->totalPrice;
        dd($total);

        Stripe::setApiKey('sk_test_Ek3YDzQZhUDjNTpTtu2r6s0p');
        try {
            $charge = Charge::create(array(
                "amount" => $total * 100,
                "currency" => "gbp",
                "source" => $request->input('stripeToken'),
                "description" => "Some description"
            ));
            // $order = new Order();
            // $order->cart = serialize($cart);
            // $order->name = $request->input('name');
            // $order->address1 = $request->input('address1');
            // $order->address2 = $request->input('address2');
            // $order->city = $request->input('city');
            // $order->county = $request->input('county');
            // $order->post_code = $request->input('post_code');
            // $order->country = $request->input('country');
            // $order->payment_id = $charge->id;
            //
            // return Order::order()->save($order);
        } catch (\Exception $e) {
            return redirect('/cart/checkout')->with('error', $e->getMessage());
        }
            Session::forget('cart');
            Session::flash('message','Your payment was successful, and will be dispatched once we verify your order letting you know when you will receive your newly purchased items.');
            return redirect()->url('/checkout/success');
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
