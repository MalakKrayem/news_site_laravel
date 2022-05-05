<?php

namespace Database\Factories;

use App\Models\Rule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RuleUser>
 */
class RuleUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>User::all()->random(),
            'rule_id'=>Rule::all()->random(),

        ];
    }
}
