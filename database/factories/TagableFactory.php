<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tagable>
 */
class TagableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tagables=[Video::class,Post::class];
        $tagable_type=$this->faker->randomElement($tagables);
        $tagable=$tagable_type::all()->random();

        return [
            'tag_id'=>Tag::all()->random(),
            'tagable_type'=>$tagable_type,
            'tagable_id'=>$tagable->id
        ];
    }
}
