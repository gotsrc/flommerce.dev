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
use Mail;
use Flommerce\Mail\OrderShipped;
use Auth;

class CartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Load the Main Cart View
     * @method index
     * @return [type] [description]
     */
    public function index()
    {
        $this->middleware('auth');

        return view('cart.index', compact('cart'));
    }

    /**
     * Process the actual Payment providing that the User has items in
     * his / her cart. This uses the Stripe Library, you may need to setup
     * your own Stripe account to test this functionality.
     *
     * Note: Please provide your own API Key / Token.
     *
     * @method postCheckout
     * @param  Request      $request [description]
     * @return [type]                [description]
     */
    public function postCheckout(Request $request)
    {
        if (!Session::has('cart'))
        {
            return redirect()->route('cart.index');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        // Get an API Key from http://dashboard.stripe.com/register
        // This should be the Secret (sk_*************) Api Key.
        // Without this the checkout will NOT work!!!!!
        \Stripe\Stripe::setApiKey('');
        
        $totalPrice = $cart->totalPrice;
        $token = $request->get('stripeToken');
        $cardholder_name = $request->get('cardholder_name');

        $customer = \Stripe\Customer::create(array(
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

            // Mail the user upon success.
            $user = Auth::user();
            $email_address = $user->email;
            Mail::to($email_address)->send(new OrderShipped('Order Shipped'));
            Session::flash('message','Your payment was successful, ane email will be dispatched to verify your order letting you know when you will receive your newly purchased items.');
            return redirect()->route('checkout.success');

    }

    /**
     * Show the Current Cart for the User
     * @method show
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function show(Request $request, $id)
    {
        return view('cart.checkout');
    }

    /**
     * Update the Listing.
     * @method update
     * @param  [type]  $id      [description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update($id, Request $request)
    {
        $product_id = Product::findOrFail($id);
        $rows = Cart::content();
        $rowId = $rows->where('id', $id)->first()->rowId;

        return Cart::update($rowId);
    }

    /**
     * Did the Checkout Succeed? If so, then return the cart success.
     * @method getCheckoutSuccess
     * @return [type]             [description]
     */
    public function getCheckoutSuccess()
    {
        return view('cart.success');
        return redirect()->url('/');
    }
}
