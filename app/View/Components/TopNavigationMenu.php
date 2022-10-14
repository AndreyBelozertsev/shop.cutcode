<?php

namespace App\View\Components;

use App\Models\Navigation;
use Illuminate\View\Component;

class TopNavigationMenu extends Component
{
    
    protected function getData(){
        return Navigation::where('type','top')->orderBy('sort')->get();
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.top-navigation-menu',['navigation_items'=>$this->getData()]);
    }
}
