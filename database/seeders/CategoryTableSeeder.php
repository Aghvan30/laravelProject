<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create([
            'name'=>'T-shirt',
        ]);
        Categories::create([
            'name'=>'Golf shirts',
        ]);
        Categories::create([
            'name'=>'Baseball shirt',
        ]);
        Categories::create([
            'name'=>'Dress shirt',
        ]);
    }
}
