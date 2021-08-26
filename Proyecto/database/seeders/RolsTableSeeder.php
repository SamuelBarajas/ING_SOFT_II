<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::truncate();

        Rol::create([
            'key' => 'admin',
            'name' => 'Rol Admin',
            'description' => 'Cateristicas de un usuario administrador',
        ]);
        Rol::create([
            'key' => 'regular',
            'name' => 'Rol Regular',
            'description' => 'Cateristicas de un usuario regular',
        ]);
    }
}
