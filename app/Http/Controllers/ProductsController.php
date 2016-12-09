<?php

namespace Flommerce\Http\Controllers;

use Flommerce\User;
use Flommerce\Product;
use Flommerce\Order;
use Flommerce\Cart;
use Illuminate\Http\Request;
use Flommerce\Http\Requests;
use Flommerce\Http\Requests\ProductRequest;
use Session;
// use ShoppingCart;
use Stripe\Stripe;
use Stripe\Charge;

class ProductsController extends Controller
{
    public function __construct()
    {
        $products = Product::all();

        return view('products.index', ['products' => $products]);
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

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    public function getCart()
    {
        if (!Session::has('cart'))
        {
            return view('cart.index', ['products' => null]);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        // dd($cart);
        return view('cart.index', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    //
    // Add the requested item to the cart by id.
    //
    //
    public function postAddToCart(Request $request, $id)
    {
        $method = $request->method('post');
        if ($request->isMethod('post'))
        {
            $product = Product::findOrFail($id);
            $product_id = $request->get('product_id');
            $quantity = $request->get('quantity');

            Cart::add(array(
                'id'    => $product->id,
                'name'  => $product->title,
                'price' =>  $product->price,
                'qty'   =>  $quantity
            ))->associate('Product');
        }

        $cart = Cart::content();
        // dd($cart);
        return view('cart.index', ['cart' => $cart]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart'))
        {
            return redirect()->route('CartsController');
        }

        $oldCart = Session::get('cart');

        // $amount =
        $cart = new Cart($oldCart);
        $total = Cart::total(2, '', '');

        Stripe::setApiKey('sk_test_Ek3YDzQZhUDjNTpTtu2r6s0p');
        try {
            $charge = Charge::create(array(
                "amount" => $total,
                "currency" => "gbp",
                "source" => $request->input('stripeToken'),
                "description" => "Some Sexy Description"
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

            Order::order()->save($order);
        } catch (\Exception $e) {
            return redirect('/cart/checkout')->with('error', $e->getMessage());
        }
            Session::forget('cart');
            Session::flash('message','Your payment was successful, and will be dispatched once we verify your order letting you know when you will receive your newly purchased items.');
            return redirect()->url('/checkout/success');
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
