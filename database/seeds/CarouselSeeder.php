<?php

use Illuminate\Database\Seeder;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carousel_images')->insert([
            [
                'name' => 'Test',
                'url' => 'boris_nieuwe_col_002.jpg'
            ],
            [
                'name' => 'Test1',
                'url' => 'Halsoverkop.jpg'
            ],
            [
                'name' => 'Test2',
                'url' => 'Zara-collectie-mei-20101.jpg'
            ]
        ]);
    }
}
