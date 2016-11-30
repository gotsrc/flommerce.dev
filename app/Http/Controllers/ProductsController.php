<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;

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
        return view('products.create');
    }

    //
    // Store the data after user input and send the user
    // back to the products page to review.
    //
    public function store(CreateProductRequest $request)
    {
        Product::create($request->all());

        return redirect('products');
    }
}
