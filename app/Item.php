<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    public function images()
    {
        return $this->hasMany('App\ItemImages');
    }

    public function categorie()
    {
        $this->hasOne('App\ItemCategories');
    }
}
