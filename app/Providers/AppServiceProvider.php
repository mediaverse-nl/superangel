<?php

namespace App\Providers;

use App\ItemCategories;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data = ItemCategories::where('group', null)->get();
        foreach ($data as $object) {
            $object->subcategories = ItemCategories::where('group', $object->name)->get();
        }
        View::share('categories', $data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
