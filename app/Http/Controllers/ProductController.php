<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug){
        if($product = Product::where('slug', $slug)->active()->first()){
            return view('page.product',['product' => $product]);
        }
        abort(404);
    }
}
