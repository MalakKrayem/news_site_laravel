<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence,
            'content'=>$this->faker->text,
            'featured_image'=>'posts/images/featuredImages/img.png',
            'large_image'=>'posts/images/largeImages/img.png',
            'views'=>$this->faker->randomNumber(),
            'shares'=>$this->faker->randomNumber(),
            'category_id'=>Category::all()->random(),
            'user_id'=>User::all()->random(),

        ];
    }
}
