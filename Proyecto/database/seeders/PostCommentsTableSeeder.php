<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Database\Seeder;

class PostCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostComment::truncate();
        
        $posts = Post::all()->where("id", "<=", "10");

        foreach ($posts as $key => $post) {
            for ($i=1; $i <= ($key + 1); $i++){ 
                PostComment::create([
                    'title' => "Titulo del Post $post->title",
                    'commentary' => "-------Comentario----------",
                    'user_id' => 1,
                    'post_id' => $post->id
                ]);
            }
        }
    }
}
