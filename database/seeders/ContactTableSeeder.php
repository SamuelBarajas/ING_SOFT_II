<?php

namespace Database\Seeders;

//use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Contact::factory(15)->create();
        /*Contact::truncate();
        
        //$categories = Category::all();

        for ($i=0; $i <= 10; $i++){ 
            Contact::create([
                'name' => "Juan $i",
                'email' => "juan$i@gmail.com",
                'commentary' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            ]);
        }*/
    }
}
