<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
    public $cartService;

    /**
     * PersonalController constructor.
     */
    public function __construct()
    {
        $this->cartService = new CartService;
    }
    public function index(){

    }
}
