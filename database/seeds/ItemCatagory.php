<?php

use Illuminate\Database\Seeder;

class ItemCatagory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_categories')->insert([
            [
                'name' => 'Heren',
                'group' => null
            ],
            [
                'name' => 'Dames',
                'group' => null
            ],
            [
                'name' => 'Kinderen',
                'group' => null
            ],
            [
                'name' => 'Schoenen',
                'group' => 'Heren'
            ],
            [
                'name' => 'Schoenen',
                'group' => 'Dames'
            ],
            [
                'name' => 'Schoenen',
                'group' => 'Kinderen'
            ],
            [
                'name' => 'T-shirs',
                'group' => 'Heren'
            ],
            [
                'name' => 'T-shirs',
                'group' => 'Dames'
            ],
            [
                'name' => 'T-shirs',
                'group' => 'Kinderen'
            ],
            [
                'name' => 'Broeken',
                'group' => 'Heren'
            ],
            [
                'name' => 'Broeken',
                'group' => 'Dames'
            ],
            [
                'name' => 'Broeken',
                'group' => 'Kinderen'
            ],
            [
                'name' => 'Rokken',
                'group' => 'Dames'
            ]
        ]);
    }
}
