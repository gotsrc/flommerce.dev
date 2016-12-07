<?php

namespace App\Http\Controllers;

use Auth;
use Cart;
use Stripe\Stripe;
use App\User;
use App\Product;
use App\Order;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use Session;

class ProductsController extends Controller
{
    public function __construct()
    {

    }
    
    public function index()
    {
        $products = Product::all();

        return view('products.index', ['products' => $products]);
    }

    //
    // Show a Product with a given ID.
    //
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    //
    // Show the form so that the user can create a category.
    // URI: flommerce.dev/category/create
    //
    public function create()
    {
        return view('products.create');
    }

    //
    // Store the data after user input and send the user
    // back to the products page to review.
    //
    public function store(ProductRequest $request)
    {
        Product::create($request->all());

        return redirect('products');
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

    public function postCheckout(Request $request)
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

        } catch (\Exception $e) {
            return view('cart.checkout')->with('error', $e->getMessage());
        }
            Session::forget('cart');
            Session::flash('message','Your payment was successful, and will be dispatched once we verify your order letting you know when you will receive your newly purchased items.');
            return redirect('/checkout/success');

    }

    //
    // Edit the current product.
    //
    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit', compact('product'));
    }

    public function update($id, ProductRequest $request)
    {
        $product = Product::find($id);

        $product->update($request->all());

        return view('products.show', compact('product'));
    }

}
