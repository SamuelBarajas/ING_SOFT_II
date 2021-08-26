<?php

namespace Database\Seeders;

use App\Models\Category;
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
        Category::truncate();

        Category::create([
            'title' => 'Matematicas',
            'url_clean' => 'Matematicas-1',
        ]);
        Category::create([
            'title' => 'Informatica',
            'url_clean' => 'Informatica-2',
        ]);
        Category::create([
            'title' => 'Social',
            'url_clean' => 'Social-3',
        ]);
        Category::create([
            'title' => 'Electronica',
            'url_clean' => 'Electronica-4',
        ]);
        Category::create([
            'title' => 'Quimica',
            'url_clean' => 'Quimica-5',
        ]);
    }
}
