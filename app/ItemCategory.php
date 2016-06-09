<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
