<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategoriesMain extends Component
{
    

    protected function getData(){
        return Category::active()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.categories-main',['categories'=> $this->getData()]);
    }
}
