<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;

class CategoryController extends Controller
{

    public $categoryService;

    /**
     * PersonalController constructor.
     */
    public function __construct()
    {
        $this->categoryService = new CategoryService;
    }

    public function show($slug){
        if($category = Category::where('slug', $slug)->active()->first()){
            return view('page.category',['category' => $category]);
        }
        abort(404);
    }
}
