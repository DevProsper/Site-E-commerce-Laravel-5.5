<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Cart;
use Session;
use Auth;

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

    public function getCheckout(){
        if (Auth::guest() || !Session::get('cart')) {
            return redirect()->route('product.index')->with('error', 'Merci de vous connecté');
        }
        return view('shop.checkout');
    }

    public function postCheckout(){
        
        if (Auth::guest() || !Session::get('cart')) {
            return redirect()->route('product.index')->with('error', 'Merci de vous connecté');
        }

        $totalP = Session::get('cart')->totalP * 100;
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_nZJyPhr5zXad7xqqMNZ49i3J");

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        // Charge the user's card:
        $charge = \Stripe\Charge::create(array(
          "amount" => $totalP,
          "currency" => "usd",
          "description" => "Paiement de test",
          "source" => $token,
        ));

        $cart = Session::get('cart');

        $order = new Order();
        $order->cart = serialize($cart);

        Auth::user()->orders()->save($order);

        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Votre commande a été éffectué');
    }

    public function reduceByOne($id){

        $currentCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($currentCart);
        $cart->reduceByOne($id);

        Session::put('cart', $cart);
        Session::save();

        if ($cart->items <= 0) {
            Session::forget('cart');
        }

        return redirect()->route('product.cart')->with('success', "L'article a bien été supprimé !");
    }

    public function deleteProduct($id){
        $currentCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($currentCart);
        $cart->delete($id);

        Session::put('cart', $cart);
        Session::save();

        if ($cart->items <= 0) {
            Session::forget('cart');
        }

        return redirect()->route('product.cart')->with('success', "L'article a bien été supprimé !");
    }

}
