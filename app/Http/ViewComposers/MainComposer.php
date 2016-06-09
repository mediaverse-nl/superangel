<?php

namespace App\Http\ViewComposers;

use App\ItemCategories;
use Illuminate\Contracts\View\View;

class MainComposer
{
    
    protected $data;

    public function __construct(){
        $this->data = ItemCategories::where('group', '')->get();
        foreach ($this->data as $object) {
            $object->subcategories = ItemCategories::where('group', $object->name)->get();
        }
    }

    public function compose(View $view)
    {
        $view->with('menu_categories', $this->data);
    }
}