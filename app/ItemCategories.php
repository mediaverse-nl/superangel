<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategories extends Model
{
    public function items()
    {
        return $this->belongsTo('App\Items');
    }
}
