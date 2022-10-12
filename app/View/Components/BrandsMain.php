<?php

namespace App\View\Components;

use App\Models\Brand;
use Illuminate\View\Component;

class BrandsMain extends Component
{
    
    protected function getData(){
        return Brand::active()->get();
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.brands-main',['brands'=> $this->getData()]);
    }
}
