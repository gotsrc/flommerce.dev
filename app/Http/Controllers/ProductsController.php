<?php

namespace App\Http\Controllers;

use Cart;
use App\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    //
    // Populate the main route with all products. Within the database.
    //
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
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
        $this->middleware('auth');
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

    public function purchase($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $id = $product->id;
        //dd($product);
        $quantity = Request::get('quantity');

        Cart::add(array(
            'id'    => $product->id,
            'name'  => $product->title,
            'price' =>  $product->price,
            'qty'   =>  $quantity
        ));

        $content = Cart::content();
#dd($content);
        return view('cart.index', compact('content'));
    }
    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit', compact('product'));
    }

    public function update($id, ProductRequest $request)
    {
        $product = Product::find($id);

        $product->update($request->all());
    }

}
