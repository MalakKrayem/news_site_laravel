<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $imageables=[Post::class,User::class];
        $imageable_type=$this->faker->randomElement($imageables);
        return [
            'url'=>$this->faker->url,
            'imageable_type'=>$imageable_type,
            'imageable_id'=>$this->faker->unique()->numberBetween(1,$imageable_type::count())

        ];
    }
}
