<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemsCategories extends Model
{
    public function items()
    {
        return $this->belongsTo('App\Items');
    }
}
