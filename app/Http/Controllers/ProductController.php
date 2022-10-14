<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{

    public $productService;

    /**
     * PersonalController constructor.
     */
    public function __construct()
    {
        $this->productService = new ProductService;
    }
    public function show($slug){
        if($product = Product::where('slug', $slug)->active()->first()){
            return view('page.product',['product' => $product]);
        }
        abort(404);
    }

    public function index(){
        
    }
}
