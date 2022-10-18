<?php

namespace App\View\Components\Brand;

use App\Models\Brand;
use Illuminate\View\Component;

class MainPage extends Component
{
    
    protected function getData(){
        return Brand::active()->homePage()->orderBy('sort')->get();
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.brand.main-page',['brands'=> $this->getData()]);
    }
}
