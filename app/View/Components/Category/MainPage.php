<?php

namespace App\View\Components\Category;

use App\Models\Category;
use Illuminate\View\Component;

class MainPage extends Component
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
        return view('components.category.main-page',['categories'=> $this->getData()]);
    }
}
