<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Share>
 */
class ShareFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $shareables=[Video::class,Post::class];
        $shareable_type=$this->faker->randomElement($shareables);
        $shareable=$shareable_type::all()->random();

        return [
            'number'=>$this->faker->randomNumber(1,100),
            'shareable_type'=>$shareable_type,
            'shareable_id'=>$shareable->id
        ];
    }
}
