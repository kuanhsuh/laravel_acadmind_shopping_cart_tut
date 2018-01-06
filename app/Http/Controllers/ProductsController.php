<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Cart;
use App\Product;
use Stripe\Stripe;
class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('shop.index', ['products'=> $products]);
    }
    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('product.index');
    }

    public function getCart()
    {
        if(!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total'=> $total]);
    }

    public function postCheckout(Request $request)
    {
        if(!Session::has('cart')) {
            return redirect()->route('shop.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        Stripe::setApiKey("sk_test_UawoxUENSN7VkeeMIVKgmHMZ");
        try {
            \Stripe\Charge::create(array(
                "amount" => ($cart->totalPrice) * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge"
              ));
        } catch (\Exception $e) {
            return redirect()->route("checkout")->with("error", $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Success Transaction');
    }
}
