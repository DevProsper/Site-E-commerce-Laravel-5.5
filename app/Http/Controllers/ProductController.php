<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;

class ProductController extends Controller
{
    public function index(){
    	$products = Product::orderBy('created_at', 'desc')->paginate(3);
    	return view('shop.index')->with('products', $products);
    }

    public function addItem($id){
    	$product = Product::find($id);
    	$currentCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($currentCart);
    	$cart->add($product->id, $product);

    	Session::put('cart', $cart);
    	Session::save();

    	return redirect()->route('product.index')->with('success', 'Nouvel article ajouter au panier!');
    }

    public function getCart(){
        $currentCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($currentCart);

        return view('shop.cart')->with(['items' => $cart->items, 'totalP' => $cart->totalP]);
    }
}
