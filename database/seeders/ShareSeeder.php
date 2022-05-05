<?php

namespace Database\Seeders;

use App\Models\Share;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Share::factory()->count(100)->create();
    }
}
