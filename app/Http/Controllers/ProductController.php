<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
    	$products = Product::orderBy('created_at', 'desc')->paginate(3);
    	return view('shop.index')->with('products', $products);
    }
}
