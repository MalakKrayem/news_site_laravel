<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            PhoneSeeder::class,
            RuleSeeder::class,
            RuleUserSeeder::class,
            ImageSeeder::class,
            VideoSeeder::class,
            ShareSeeder::class,
            TagSeeder::class,
            TagableSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
