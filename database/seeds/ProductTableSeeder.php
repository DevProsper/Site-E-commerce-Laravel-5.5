<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product([
        	'image' => 'http://www.google.com/image.jpg',
        	'title' => 'Sweet Rose',
        	'description' => 'Un super sweet rose',
        	'price' => 35
        ]);
        $product->save();

        $product = new Product([
        	'image' => 'http://www.google.com/image.jpg',
        	'title' => ' 2 Sweet Rose',
        	'description' => '2 Un super sweet rose',
        	'price' => 35
        ]);
        $product->save();

        $product = new Product([
        	'image' => 'http://www.google.com/image.jpg',
        	'title' => '3 Sweet Rose',
        	'description' => '3 Un super sweet rose',
        	'price' => 35
        ]);
        $product->save();

        $product = new Product([
        	'image' => 'http://www.google.com/image.jpg',
        	'title' => '4 Sweet Rose',
        	'description' => '4 Un super sweet rose',
        	'price' => 35
        ]);
        $product->save();

        $product = new Product([
        	'image' => 'http://www.google.com/image.jpg',
        	'title' => '5 Sweet Rose',
        	'description' => '5 Un super sweet rose',
        	'price' => 35
        ]);
        $product->save();
    }
}
