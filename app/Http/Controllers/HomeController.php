<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductRaiting;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    public function index(){
        
        
        return view('welcome');
    }
}
