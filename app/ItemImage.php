<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemsImages extends Model
{
    public function items()
    {
        return $this->belongsTo('App\Item');
    }
}
