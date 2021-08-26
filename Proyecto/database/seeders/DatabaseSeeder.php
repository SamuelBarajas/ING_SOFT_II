<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(PostCommentsTableSeeder::class);
        $this->call(PostImageTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(RolsTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
