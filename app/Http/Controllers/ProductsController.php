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
use Stripe\Stripe;
use Stripe\Charge;

class ProductsController extends Controller
{

    /**
     * Main Products View.
     * @method index
     * @return [type] [description]
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show a Product with a Given ID.
     * @method show
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    /**
     * Load the Form so that the user can add a Product
     * @method create
     * @return [type] [description]
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Add a Product to a Category
     * @method store
     * @param  ProductRequest $request [description]
     * @return [type]                  [description]
     */
    public function store(ProductRequest $request)
    {
        Product::create($request->all());

        return redirect('products');
    }

    /**
     * Add the requested Item to the cart by ID.
     * @method getAddToCart
     * @param  Request      $request [description]
     * @param  [type]       $id      [description]
     * @return [type]                [description]
     */
    public function getAddToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    /**
    * Increment the Item Quantity by One.
    * @method getIncrementItemByOne
    * @param  [type]                $id [description]
    * @return [type]                    [description]
    */
    public function getIncrementItemByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->incrementItemByOne($id);

        Session::put('cart', $cart);
        return redirect()->route('cart');
    }

    /**
     * Reduce the Item Quantity by One.
     * @method getReduceItemByOne
     * @param  [type]             $id [description]
     * @return [type]                 [description]
     */
    public function getReduceItemByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->reduceItemByOne($id);

        if(count($cart->items) > 0)
        {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        
        return redirect()->route('cart');

    }

    public function getRemoveAllItems($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->removeAllItems($id);

        if(count($cart->items) > 0)
        {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('cart');
    }

    /**
     * Retrieve the current Cart for the associated User.
     * @method getCart
     * @return [type]  [description]
     */
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

    /**
     * Get the Current Checkout before Submitting the Form so that
     * the user can verify the amounts and process payment.
     * @method getCheckout
     * @return [type]      [description]
     */
    public function getCheckout()
    {
        if (!Session::has('cart'))
        {
            return view('cart.index');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $totalPrice = $cart->totalPrice;
        // dd($totalPrice);
        return view('cart.checkout', ['totalPrice' => $totalPrice]);

    }

    /**
     * Edit the current Product (Functionality not implemented front end.)
     *
     * Can be accessed by typing /edit after the Product ID in URI.
     *
     * @method edit
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the actual form.
     * @method update
     * @param  [type]         $id      [description]
     * @param  ProductRequest $request [description]
     * @return [type]                  [description]
     */
    public function update($id, ProductRequest $request)
    {
        $product = Product::find($id);

        $product->update($request->all());

        return view('products.show', compact('product'));
    }

}
