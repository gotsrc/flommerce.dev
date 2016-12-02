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
        dd($cart);
        return view('cart.index', compact('cart'));
    }

    public function show($id)
    {
        $cart = Cart::findOrFail($id);

        return view('cart.show', compact('cart'));
    }

    public function store(CartRequest $request)
    {
        $item = Cart::item('identifier');
        $product = Product::findOrFail($id);

        Cart::add([
                'id' => $product->id,
                'name' => $product->title,
                'qty' => $product->quantity,
                'price' => $product->price
        ]);
        $content = Cart::content();
        dd($content);
        ## return view('cart.index', ['cart_content' => $content]);
    }

    public function update($id, OrderRequest $request)
    {
        $order = Order::findOrFail($id);

        $order->update($request->all());
    }
}
