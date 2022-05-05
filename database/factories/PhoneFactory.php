<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phone>
 */
class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $phones=['iPhone','Samsung','Oppo','Nokia','Shaomi'];
        $key=array_rand($phones);
        return [
            'name'=>$phones[$key],
            'user_id'=>$this->faker->unique()->numberBetween(1,User::count())
        ];
    }
}
