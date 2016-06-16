<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function images()
    {
        return $this->hasMany('App\ItemImage');
    }

    public function category()
    {
        return $this->hasOne('App\ItemCategory', 'id','category_id');
    }

    public function stocks()
    {
        return $this->hasMany('App\ItemStocks');
    }
}
