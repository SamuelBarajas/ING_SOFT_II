<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => ucfirst($this->faker->word()),
            'url_clean' => $this->faker->unique()->slug(3,false),
            'content' => $this->faker->realText($maxNbChars = 600, $indexSize = 2),//$this->faker->text(300),
            'posted' => 'yes',
            'category_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
