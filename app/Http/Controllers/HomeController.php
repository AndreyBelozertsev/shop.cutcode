<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductRaiting;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::active()->with('raiting')->limit(8)->get();
        return view('welcome',['categories' => $categories, 'products' => $products]);
    }
}
