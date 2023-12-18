<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $topic = Topic::create([
                'title'     => fake()->name(),
                'content'   => fake()->paragraph(),
                'closed'    => fake()->randomElement([true,false]),
                'created_at'=> now(),
                'updated_at'=> now()
            ]);
        }
    }
}
