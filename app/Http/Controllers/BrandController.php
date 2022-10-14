<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Services\BrandService;

class BrandController extends Controller
{
    public $brandService;

    /**
     * PersonalController constructor.
     */
    public function __construct()
    {
        $this->brandService = new BrandService;
    }

    public function show($slug){
        if($brand = Brand::where('slug', $slug)->active()->first()){
            return view('page.brand',['brand' => $brand]);
        }
        abort(404);
    }
}
