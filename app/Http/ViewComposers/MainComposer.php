<?php

namespace App\Http\ViewComposers;

use App\ItemCategory;
use Illuminate\Contracts\View\View;

class MainComposer
{
    
    protected $data;

    public function __construct(){
        $this->data = ItemCategory::where('group', '')->get();
        foreach ($this->data as $object) {
            $object->subcategories = ItemCategory::where('group', $object->name)->get();
        }
    }

    public function compose(View $view)
    {
        $view->with('menu_categories', $this->data);
    }
}