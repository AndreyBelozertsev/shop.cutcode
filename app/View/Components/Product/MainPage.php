<?php

namespace App\View\Components\Product;

use App\Models\Product;
use Illuminate\View\Component;

class MainPage extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    protected function getData(){
        return Product::active()->with('raiting')->limit(8)->get();;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product.main-page',['products'=>$this->getData()]);
    }
}
