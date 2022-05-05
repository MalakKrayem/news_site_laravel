<?php

namespace Database\Seeders;

use App\Models\Tagable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tagable::factory()->count(100)->create();
    }
}
