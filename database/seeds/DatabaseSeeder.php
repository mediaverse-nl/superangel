<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ItemCatagory::class);
         $this->call(CarouselSeeder::class);
         $this->call(ItemSeeder::class);
    }
}
