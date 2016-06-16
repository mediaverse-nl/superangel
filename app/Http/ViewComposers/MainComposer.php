<?php

namespace App\Http\ViewComposers;

use App\ItemCategory;
use Illuminate\Contracts\View\View;

class MainComposer
{
    
    protected $menu;

    public function __construct(){
        $this->menu = ItemCategory::where('group', '')->get();
        foreach ($this->menu as $object) {
            $object->subcategories = ItemCategory::where('group', $object->name)->get();
        }
    }

    public function compose(View $view)
    {
        $view->with('menu_categories', $this->menu);
    }
}